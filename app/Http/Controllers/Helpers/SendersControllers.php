<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
class SendersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function cekSensor()
    {
        $json = Storage::disk('public')->get('dummy.json');
        $data = json_decode($json, true);

        foreach ($data as $sensor) {
            $latest = end($sensor['data']);

            $isBencana = false;
            $alasan = [];

            if (isset($latest['rain_gauge']['curah_hujan_mm_per_jam']) &&
                $latest['rain_gauge']['curah_hujan_mm_per_jam'] > 50) {
                $isBencana = true;
                $alasan[] = "Curah hujan tinggi: {$latest['rain_gauge']['curah_hujan_mm_per_jam']} mm/jam";
            }

            if (isset($latest['tilt']['kemiringan_deg']) &&
                $latest['tilt']['kemiringan_deg'] > 10) {
                $isBencana = true;
                $alasan[] = "Kemiringan ekstrem: {$latest['tilt']['kemiringan_deg']}°";
            }

            if (isset($latest['turbidity']['ntu']) &&
                $latest['turbidity']['ntu'] > 300) {
                $isBencana = true;
                $alasan[] = "Kekeruhan air tinggi: {$latest['turbidity']['ntu']} NTU";
            }

            if (isset($latest['soil_moisture']['kelembapan_tanah_pct']) &&
                $latest['soil_moisture']['kelembapan_tanah_pct'] > 85) {
                $isBencana = true;
                $alasan[] = "Tanah sangat lembap: {$latest['soil_moisture']['kelembapan_tanah_pct']}%";
            }

            if ($isBencana) {
                $this->triggerWebhook($sensor['sensor_id'], $sensor['lokasi'], $alasan, $sensor['koordinat'] ?? ['lat' => null, 'lon' => null]);
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Sensor checked and webhook sent if needed.']);
    }

    private function triggerWebhook($sensorId, $lokasi, $alasan, $koordinat)
    {
        $kelembapan = null;
        $kemiringan = null;

        foreach ($alasan as $a) {
            if (Str::contains($a, 'lembap')) {
                preg_match('/(\d+)%/', $a, $match);
                $kelembapan = $match[1] ?? null;
            }

            if (Str::contains($a, 'Kemiringan')) {
                preg_match('/(\d+(\.\d+)?)/', $a, $match);
                $kemiringan = $match[1] ?? null;
            }
        }

        $payload = [
            "location"     => $lokasi,
            "type"         => "banjir",
            "level"        => "tinggi",
            "time"         => now()->toIso8601String(),
            "message"      => "Sensor $sensorId mendeteksi potensi bencana di $lokasi",
            "lat"          => $koordinat['lat'],
            "lng"          => $koordinat['lon'],
            "status"       => "emergency",
            "kelembapan"   => $kelembapan,
            "kemiringan"   => $kemiringan
        ];

        Http::post('http://n8n.arjunagroup.org/webhook/Tim-arjuna', $payload);
        logger("🚨 Webhook dikirim ke n8n: " . json_encode($payload));
    }



}
