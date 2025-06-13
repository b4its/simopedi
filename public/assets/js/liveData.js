// ajax
$(document).ready(function () {
    $('#filterForm').on('submit', function (e) {
        e.preventDefault(); // Mencegah reload halaman

        let interval = $('#intervalTime').val();

        if (!interval) {
            alert('Please select an interval.');
            return;
        }

        $.ajax({
            url: window.location.href, // Kirim ke halaman saat ini
            method: 'POST',
            data: { interval: interval },
            success: function (response) {
                console.log('Response:', interval);
                $("#dataInterval").text(interval);
                    var dataIni = $("#dataInterval").text();
                    console.log("Hasil dari Text: " + dataIni);
                    
                // Lakukan sesuatu dengan respons, misalnya update chart
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

});

// data grafik
  let nilaiData = [];
  let nilaiIndex = 0;

  const Utils = {
    CHART_COLORS: {
      red: 'rgb(255, 99, 132)',
      blue: 'rgb(54, 162, 235)',
      yellow: 'rgb(255, 205, 86)'
    },
    transparentize(color, opacity = 0.5) {
      const alpha = 1 - opacity;
      return color.replace('rgb', 'rgba').replace(')', `, ${alpha})`);
    }
  };

  const data = {
    datasets: [
      {
        label: 'Ketinggian Air',
        yAxisID: 'yKetinggian',
        backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue),
        borderColor: Utils.CHART_COLORS.blue,
        fill: false,
        data: []
      },
      {
        label: 'Curah Hujan',
        yAxisID: 'yCurahHujan',
        backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red),
        borderColor: Utils.CHART_COLORS.red,
        fill: false,
        data: []
      }
    ]
  };

  const onRefresh = chart => {
    const now = Date.now();
    if (nilaiData.length === 0) return;
    let filteredData = '';
    const sensor = nilaiData[nilaiIndex];
    // nilaiData.filter(sensor => sensor.id_sensor === 'S002')
    console.log()
    if ($("#dataSebaranSensor").text() == 'S002')
    {
        
        filteredData = nilaiData.filter(sensor => sensor.id_sensor === 'S002');
        $("#changeSensorTitle").text("S002");
    } else 
    {

        filteredData = nilaiData.filter(sensor => sensor.id_sensor === 'S001');
        $("#changeSensorTitle").text("S001");

    }

    let sumKetinggian = 0;
    let sumCurah = 0;
    // iterate over each item in the array
    for (let i = 0; i < filteredData.length; i++ ) {
        sumKetinggian += filteredData[i];
    }
    // iterate over each item in the array
    for (let i = 0; i < filteredData.length; i++ ) {
        sumCurah += filteredData[i];
    }
    // cari rata rata
    let rataRata = (sumKetinggian + sumCurah) / filteredData.length;
    
    // debugging
    // console.log(filteredData);
    // console.log("total data: "+ filteredData.length);

    // perhitungan interval data
    const min = -100;
    const max = 100;
    
    var ketinggian = Math.floor(Math.random() * (max - min + 2) + sensor.ketinggian_air);
    var curah = Math.floor(Math.random() * (max - min + 2) + sensor.curah_hujan);
    console.log("Ketinggian: " + ketinggian);
    console.log("Curah: " + curah);
    // Konversi ke angka
    // const ketinggian = parseFloat(sensor.ketinggian_air);
    // const curah = parseFloat(sensor.curah_hujan);

    data.datasets[0].data.push({ x: now, y: ketinggian });
    data.datasets[1].data.push({ x: now, y: curah });
    nilaiIndex++;
    if (nilaiIndex >= nilaiData.length) {
      nilaiIndex = 0; // loop ulang
    }
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      animation: false,
      scales: {
        x: {
          type: 'realtime',
          realtime: {
            duration: 20000,
            refresh: 2000,
            delay: 1000,
            onRefresh: onRefresh
          }
        },
        yKetinggian: {
          type: 'linear',
          position: 'left',
          title: {
            display: true,
            text: 'Ketinggian Air (cm)'
          }
        },
        yCurahHujan: {
          type: 'linear',
          position: 'right',
          title: {
            display: true,
            text: 'Curah Hujan (mm)'
          },
          grid: {
            drawOnChartArea: false // agar tidak tabrakan garis
          }
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: context => {
              const d = context.raw;
              return `${context.dataset.label}: ${d.y}`;
            }
          }
        },
        legend: {
          display: true
        }
      },
      interaction: {
        mode: 'nearest',
        intersect: false
      }
    }
  };

  // Ambil data JSON sensor
  fetch('data/dataSensor.json')
    .then(res => res.json())
    .then(json => {
      nilaiData = Array.isArray(json) ? json : [json]; // antisipasi jika hanya satu objek
      const ctx = document.getElementById('myChart').getContext('2d');
      new Chart(ctx, config);
    });
