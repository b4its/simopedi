<?php

namespace App\Http\Controllers\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
class SenderControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dataSensor = [];
     
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function triggerBencana($sensorId, $lokasi, $alasan, $koordinat)
    {
        // Simulasi: parsing nilai sensor jika ada
        $kelembapan = null;
        $kemiringan = null;

        foreach ($alasan as $a) {
            if (str_contains($a, 'lembap')) {
                preg_match('/(\d+)%/', $a, $match);
                $kelembapan = $match[1] ?? null;
            }

            if (str_contains($a, 'Kemiringan')) {
                preg_match('/(\d+(\.\d+)?)/', $a, $match);
                $kemiringan = $match[1] ?? null;
            }
        }

        $data = [
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

        Http::post('http://n8n.arjunagroup.org/webhook/Tim-arjuna', $data);
        logger("✅ Dikirim ke n8n (format cocok): " . json_encode($data));
    }

    public function store()
    {
        //
        $json = public_path('data/dummy');
        dd($json);
        $data = json_decode($json, true);

        foreach ($data as $sensor) {
            $latest = end($sensor['data']); // ambil data paling baru

            $isBencana = false;
            $alasan = [];

            // Logika deteksi bencana
            if (isset($latest['rain_gauge']['curah_hujan_mm_per_jam']) &&
                $latest['rain_gauge']['curah_hujan_mm_per_jam'] > 50) {
                $isBencana = true;
                $alasan[] = "Curah hujan tinggi: " . $latest['rain_gauge']['curah_hujan_mm_per_jam'] . " mm/jam";
            }

            if (isset($latest['tilt']['kemiringan_deg']) &&
                $latest['tilt']['kemiringan_deg'] > 10) {
                $isBencana = true;
                $alasan[] = "Kemiringan ekstrem: " . $latest['tilt']['kemiringan_deg'] . "°";
            }

            if (isset($latest['turbidity']['ntu']) &&
                $latest['turbidity']['ntu'] > 300) {
                $isBencana = true;
                $alasan[] = "Kekeruhan air tinggi: " . $latest['turbidity']['ntu'] . " NTU";
            }

            if (isset($latest['soil_moisture']['kelembapan_tanah_pct']) &&
                $latest['soil_moisture']['kelembapan_tanah_pct'] > 85) {
                $isBencana = true;
                $alasan[] = "Tanah sangat lembap: " . $latest['soil_moisture']['kelembapan_tanah_pct'] . "%";
            }

            if ($isBencana) {
                $this->triggerBencana(
                    $sensor['sensor_id'],
                    $sensor['lokasi'],
                    $alasan,
                    $sensor['koordinat'] ?? ['lat' => null, 'lon' => null]
                );
            }
        }

        $this->dataSensor = $data;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
