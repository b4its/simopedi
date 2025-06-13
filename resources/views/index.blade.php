<x-layout>
    <main class="bg-gray-100 py-5 px-3 lg:px-16 xl:px-20">
        <div class="flex justify-between items-center mb-3">
            <div>
                <h3 class="font-bold text-xl">Monitoring Dashboard</h3>
            </div>
            <div class="px-2 py-1 rounded-lg bg-gray-200 items-center">
                <i class="bi bi-clock"></i>
                <span id="dateTime">
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-start mb-3">
            <div class="md:col-span-9 bg-white shadow-sm rounded-lg p-3 mb-3">
                <div class="mb-3">
                    <div class="mb-3">
                        <span class="font-bold">Map Aktivitas</span>
                    </div>
                    <div id="map" class="w-full h-[380px] xl:h-[500px]"></div>
                </div>
            </div>

            <div class="md:col-span-3 flex-none">
                <div class="grid grid-cols-2 md:grid-cols-1 items-start gap-3">
                    <div class="bg-white shadow-sm rounded-lg p-3 mb-3">
                        <div class="mb-3">
                            <span class="font-bold">Peringatan dan Bahaya</span>
                        </div>
                        <div>
                            <input id="default-range" type="range" value="50"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                        </div>
                    </div>
                    <div class="bg-white shadow-sm rounded-lg p-5 grid gap-3 text-sm">
                        <div class="items-center flex gap-5 bg-gray-200 px-4 py-2 rounded-lg shadow-sm">
                            <span class="w-[40px] h-[40px] border-4 border-blue-300 bg-blue-400 rounded-full"></span>
                            <p>Banjir Skala Aman</p>
                        </div>
                        <div class="items-center flex gap-5 bg-gray-200 px-4 py-2 rounded-lg shadow-sm">
                            <span
                                class="w-[40px] h-[40px] border-4 border-orange-300 bg-orange-400 rounded-full"></span>
                            <p>Banjir Skala Siaga</p>
                        </div>
                        <div class="items-center flex gap-5 bg-gray-200 px-4 py-2 rounded-lg shadow-sm">
                            <span class="w-[40px] h-[40px] border-4 border-red-300 bg-red-400 rounded-full"></span>
                            <p>Banjir Skala Darurat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-12 mb-3">
            <div class="col-span-12 md:col-span-9">
                <div class="grid grid-cols-3 gap-3">
                    <div
                        class="bg-white shadow-sm rounded-lg border-l-2 border-blue-600 p-3 flex justify-between items-center shaodw-lg">
                        <div>
                            <p class="font-bold">Tinggi Air</p>
                            <p class="">150 CM</p>
                            <div class="flex items-center gap-1 text-xs text-blue-600">
                                <i class="bi bi-caret-down"></i>
                                <p class="font-light">50 Cm Lebih Rendah</p>
                            </div>
                        </div>
                        <div>
                            <i class="bi bi-graph-up bg-blue-200 text-blue-600 rounded-full p-2"
                                style="font-size: 20px"></i>
                        </div>
                    </div>

                    <div
                        class="bg-white shadow-sm rounded-lg border-l-2 border-orange-600 p-3 flex justify-between items-center shaodw-lg">
                        <div>
                            <p class="font-bold">Tinggi Air</p>
                            <p class="">150 CM</p>
                            <div class="flex items-center gap-1 text-xs">
                                <i class="bi bi-caret-up"></i>
                                <p class="font-light">1 Liiter Lebih Tinggi</p>
                            </div>
                        </div>
                        <div>
                            <i class="bi bi-lightning-charge-fill bg-orange-200 text-orange-600 rounded-full p-2"
                                style="font-size: 20px"></i>
                        </div>
                    </div>

                    <div
                        class="bg-white shadow-sm rounded-lg border-l-2 border-green-600 p-3 flex justify-between items-center shaodw-lg">
                        <div>
                            <p class="font-bold">Tinggi Air</p>
                            <p class="">150 CM</p>
                            <div class="flex items-center gap-1 text-xs">
                                <i class="bi bi-caret-up"></i>
                                <p class="font-light">50 Cm Lebih Rendah</p>
                            </div>
                        </div>
                        <div>
                            <i class="bi bi-exclamation-triangle-fill bg-green-200 text-green-600 rounded-full p-2"
                                style="font-size: 20px"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- CHART --}}
        <div class="bg-white rounded-lg shadow-lg">
            <p class="font-bold p-3">Diagram Data Sensor</p>
            <div class="p-10 ">
                <canvas id="myChart"></canvas>
            </div>
        </div>

    </main>

    <x-slot:script>
        <script>
            const updateDateTime = () => {
                const date = new Date();
                const hour = date.toLocaleString('id-ID', {
                    timeZone: 'Asia/Makassar',
                    hour: '2-digit'
                });
                const minute = date.toLocaleString('id-ID', {
                    timeZone: 'Asia/Makassar',
                    minute: '2-digit'
                });
                const second = date.toLocaleString('id-ID', {
                    timeZone: 'Asia/Makassar',
                    second: '2-digit'
                });
                const formattedDate = `${hour}:${minute}:${second}`
                document.getElementById('dateTime').innerHTML = formattedDate;
            };
            setInterval(updateDateTime, 1000);
            updateDateTime();

            // LEAFLET
            var map = L.map('map').setView([-0.515065, 117.129529], 13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // CHART
            const config = {
                type: 'line',
                data: {
                    datasets: [{
                            data: []
                        },
                        {
                            data: []
                        }
                    ]
                },
                options: {
                    scales: {
                        x: {
                            type: 'realtime',
                            realtime: {
                                delay: 2000,
                                onRefresh: chart => {
                                    chart.data.datasets.forEach(dataset => {
                                        dataset.data.push({
                                            x: Date.now(),
                                            y: Math.random()
                                        });
                                    });
                                }
                            }
                        }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>
    </x-slot:script>
</x-layout>
