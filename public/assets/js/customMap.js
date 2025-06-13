
  const map = L.map('map',
  {
     maxBounds: [
        [-0.6, 116.6],  // Batas Barat Daya
        [0.8, 117.4]    // Batas Timur Laut
      ],
    maxBoundsViscosity: 1.0,
    minZoom: 13
    }).setView([-0.8897086958474641, 117.19389207894372], 5);
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

      // Fullscreen map button
      const fullscreenBtn = document.getElementById('fullscreen-map');
      fullscreenBtn.addEventListener('click', function() {
          const mapElement = document.getElementById('map');
          
          if (!document.fullscreenElement) {
              mapElement.requestFullscreen().catch(err => {
                  console.error(`Error attempting to enable fullscreen: ${err.message}`);
              });
              fullscreenBtn.innerHTML = '<i class="fas fa-compress text-gray-600"></i>';
          } else {
              document.exitFullscreen();
              fullscreenBtn.innerHTML = '<i class="fas fa-expand text-gray-600"></i>';
          }
      });
      
      // Refresh map button
      document.getElementById('refresh-map').addEventListener('click', function() {
          const btn = this;
          btn.innerHTML = '<i class="fas fa-sync-alt fa-spin text-gray-600"></i>';
          
          // Simulate API call delay
          setTimeout(() => {
              btn.innerHTML = '<i class="fas fa-sync-alt text-gray-600"></i>';
          }, 1000);
      });
            
  // ⛰️ Tampilkan marker gempa dari quakes.json
    // 📡 Tampilkan marker sensor dari dataSensor.json
    fetch('./data/dummy.json')
      .then(response => response.json())  
      .then(sensorData => {
        sensorData.forEach(sensor => {
          const {
            id_sensor,
            ketinggian_air,
            curah_hujan,
            kecepatan_aliran,
            koordinat_lat,
            koordinat_lon
          } = sensor;

          // Gunakan warna dan animasi berdasarkan ketinggian air
          let color = '#22c55e';
          let fillColor = '#bbf7d0';
          let markerClass = '';

          if (ketinggian_air >= 200) {
            color = '#ef4444';
            fillColor = '#fecaca';
            markerClass = 'vibrateHard';
          } else if (ketinggian_air >= 150) {
            color = '#f59e0b';
            fillColor = '#fff7ed';
            markerClass = 'vibrateMag';
          } else if (ketinggian_air >= 100) {
            color = '#3b82f6';
            fillColor = '#dbeafe';
          }

          L.circle([koordinat_lat, koordinat_lon], {
            radius: 15, // radius default 300 meter
            color: color,
            fillColor: fillColor,
            fillOpacity: 0.8,
            className: markerClass,
            originalRadius: 10
          }).addTo(map).bindPopup(`
            <div class="p-1">
              <h4 class="font-bold mb-1">Sensor ${id_sensor}</h4>
              <p class="text-sm">Ketinggian Air: ${ketinggian_air} cm</p>
              <p class="text-sm">Curah Hujan: ${curah_hujan} mm</p>
              <p class="text-sm">Kecepatan Aliran: ${kecepatan_aliran} m/s</p>
              <button class="btn btn-primary chooseSensor" data-id="${id_sensor}">Pilih Sensor</button>

            </div>
            <script>
            
            </script>
          `);

        });
        
        //dapatkan sensor aktif
        $(document).on("click", ".chooseSensor", function () {
          const id = $(this).data("id");
          $("#dataSebaranSensor").text(id);
          console.log("Sensor Aktif: " + id);
        });

        // Tambahkan ke tabel sensor jika ada
        const sensorTable = document.getElementById('sensor-table');
        if (sensorTable) {
          sensorData.forEach(sensor => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';
            row.innerHTML = `
              <td class="px-4 py-2 whitespace-nowrap text-sm">${sensor.id_sensor}</td>
              <td class="px-4 py-2 whitespace-nowrap text-sm">${sensor.ketinggian_air} cm</td>
              <td class="px-4 py-2 whitespace-nowrap text-sm">${sensor.curah_hujan} mm</td>
              <td class="px-4 py-2 whitespace-nowrap text-sm">${sensor.kecepatan_aliran} m/s</td>
              <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">${sensor.timestamp}</td>
            `;
            sensorTable.appendChild(row);
          });
        }
      })
      .catch(error => console.error('Gagal memuat dataSensor.json:', error));


          
  // 🌧️ Tampilkan data sensor dari dummy.json
  fetch('/public/storage/data/dummy.json')
    .then(response => response.json())
    .then(sensorData => {
      sensorData.forEach(sensor => {
        const entry = sensor.data[0];
        const { lat, lon } = sensor.koordinat;

        function addSensorMarker(offsetLat, offsetLon, color, fillColor, content) {
          L.circleMarker([lat + offsetLat, lon + offsetLon], {
            radius: 10,
            color: color,
            fillColor: fillColor,
            fillOpacity: 0.8,
            isSensor: true,
            originalRadius: 10
          }).addTo(map).bindPopup(content);
        }

        if (entry.ultrasonic) {
          addSensorMarker(0, 0, '#f59e0b', '#fbbf24', `
            <div class="p-1">
              <h4 class="font-bold mb-1">${sensor.lokasi}</h4>
              <p class="text-sm">Sensor ID: ${sensor.sensor_id}</p>
              <p class="text-sm">Ultrasonic: ${entry.ultrasonic.jarak_ke_air_cm} cm ke air</p>
            </div>
          `);
        }

        if (entry.svr) {
          addSensorMarker(0.0005, 0.0005, '#6366f1', '#a5b4fc', `
            <div class="p-1">
              <h4 class="font-bold mb-1">${sensor.lokasi}</h4>
              <p class="text-sm">Sensor ID: ${sensor.sensor_id}</p>
              <p class="text-sm">SVR: ${entry.svr.kecepatan_aliran_ms} m/s</p>
            </div>
          `);
        }

        if (entry.turbidity) {
          addSensorMarker(-0.0005, -0.0005, '#e879f9', '#f0abfc', `
            <div class="p-1">
              <h4 class="font-bold mb-1">${sensor.lokasi}</h4>
              <p class="text-sm">Sensor ID: ${sensor.sensor_id}</p>
              <p class="text-sm">Turbidity: ${entry.turbidity.ntu} NTU</p>
            </div>
          `);
        }

        if (entry.rain_gauge) {
          addSensorMarker(0.0005, -0.0005, '#0ea5e9', '#7dd3fc', `
            <div class="p-1">
              <h4 class="font-bold mb-1">${sensor.lokasi}</h4>
              <p class="text-sm">Sensor ID: ${sensor.sensor_id}</p>
              <p class="text-sm">Rain: ${entry.rain_gauge.curah_hujan_mm_per_jam} mm/jam</p>
            </div>
          `);
        }

        if (entry.soil_moisture) {
          addSensorMarker(-0.0005, 0.0005, '#14b8a6', '#5eead4', `
            <div class="p-1">
              <h4 class="font-bold mb-1">${sensor.lokasi}</h4>
              <p class="text-sm">Sensor ID: ${sensor.sensor_id}</p>
              <p class="text-sm">Soil Moisture: ${entry.soil_moisture.kelembapan_tanah_pct}%</p>
            </div>
          `);
        }

        if (entry.tilt) {
          addSensorMarker(0, 0.001, '#f97316', '#fdba74', `
            <div class="p-1">
              <h4 class="font-bold mb-1">${sensor.lokasi}</h4>
              <p class="text-sm">Sensor ID: ${sensor.sensor_id}</p>
              <p class="text-sm">Tilt: ${entry.tilt.kemiringan_deg}&deg;</p>
            </div>
          `);
        }

        if (entry.barometer) {
          addSensorMarker(0, -0.001, '#8b5cf6', '#c4b5fd', `
            <div class="p-1">
              <h4 class="font-bold mb-1">${sensor.lokasi}</h4>
              <p class="text-sm">Sensor ID: ${sensor.sensor_id}</p>
              <p class="text-sm">Tekanan Udara: ${entry.barometer.tekanan_udara_hpa} hPa</p>
            </div>
          `);
        }
      });
    })
    .catch(error => console.error('Gagal memuat dummy.json:', error));

