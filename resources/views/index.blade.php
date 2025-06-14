<x-layout>
    <!-- Floating Button -->
    <button href="#" onclick="my_modal_1.showModal()"
        class="fixed bottom-6 right-6 z-50 bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-full shadow-lg transition duration-300 ease-in-out"
        title="Kembali ke atas">
        <img src="{{ asset('/images/magic-wand.png') }}" alt="404 Not Found" class="">
    </button>

    <dialog id="my_modal_1" class="modal">
    <div class="modal-box max-w-xl">
        <!-- Logo -->
        <div class="flex justify-center mb-5">
            <img src="{{ asset('/images/logo.png') }}" alt="404 Not Found" class="w-1/2">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col items-center text-blue-500 bg-gray-100 shadow-sm p-5 rounded-lg">
                <i class="bi bi-arrow-bar-down text-3xl mb-2"></i>
                <p class="text-center">Saturasi Rendah</p>
            </div>

            <div class="flex flex-col items-center text-blue-500 bg-gray-100 shadow-sm p-5 rounded-lg">
                <i class="bi bi-card-image text-3xl mb-2"></i>
                <p class="text-center">Sembunyikan gambar</p>
            </div>

            <div class="flex flex-col items-center text-blue-500 bg-gray-100 shadow-sm p-5 rounded-lg">
                <i class="bi bi-arrow-counterclockwise text-3xl mb-2"></i>
                <p class="text-center">Normal</p>
            </div>

            <div class="flex flex-col items-center text-blue-500 bg-gray-100 shadow-sm p-5 rounded-lg">
                <i class="bi bi-info-circle text-3xl mb-2"></i>
                <p class="text-center">Informasi</p>
            </div>
        </div>

        <!-- Modal Action -->
        <div class="modal-action mt-6">
            <form method="dialog">
                <button class="btn btn-primary">Tutup</button>
            </form>
        </div>
    </div>
</dialog>

    <dialog id="my_modal_2" class="modal">
        <div class="modal-box">
            <div class="flex justify-center">
                <img src="{{ asset('/images/logo.png') }}" alt="404 Not Found" class="w-1/2">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, nam!</p>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn" type="spotlight-button:start">Mulai</button>
                </form>
            </div>
        </div>
    </dialog>

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

        <div class="grid grid-cols-1  gap-3 items-start mb-3">
            <div class=" bg-white shadow-sm rounded-lg p-3 mb-3">
                <div class="mb-3">
                    <div class="mb-3 flex justify-between">
                        <span class="font-bold">Map Aktivitas</span>
                        <button id="fullscreen-map" class="cursor-pointer bg-gray-200 py-1 px-2 rounded-lg"><i
                                class="bi bi-fullscreen"></i></button>
                    </div>
                    <!-- Spotlight; ; Kami hadir menyediakan dashboard interaktif yang menyajikan data sensor lingkungan secara Realtime untuk memprediksi bencana seperti banjir di kota Samarinda. -->
                    <div id="map" class="w-full h-[380px] xl:h-[500px]"></div>
                </div>
            </div>
        </div>
        
        
        <div class="grid grid-cols-12 mb-3">
            <!-- Spotlight; ; Kami hadir menyediakan dashboard interaktif yang menyajikan data sensor lingkungan secara Realtime untuk memprediksi bencana seperti banjir di kota Samarinda. -->
            <div class="col-span-12">
                <div class="grid grid-cols-3 gap-3">
                    <div
                        class="bg-white shadow-sm rounded-lg border-l-2 border-blue-600 p-3 py-5 flex justify-between items-center shaodw-lg">
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
                        class="bg-white shadow-sm rounded-lg border-l-2 border-orange-600 p-3 py-5 flex justify-between items-center shaodw-lg">
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
                        class="bg-white shadow-sm rounded-lg border-l-2 border-green-600 p-3 py-5 flex justify-between items-center shaodw-lg">
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

        <div class="bg-white rounded-lg shadow-lg mb-3">
            <p class="font-bold p-3">Diagram Data Sensor</p>
            <div class="p-10 ">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div
            class="flex overflow-x-auto justify-center space-x-4 py-5 px-3 bg-gradient-to-r from-blue-500 to-blue-900 rounded-lg">
            <div class="flex-shrink-0 bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('/images/disdamkar.png') }}" alt="disdamkar" class="w-36">
            </div>
            <div class="flex-shrink-0 bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('/images/bmkg.png') }}" alt="bmkg" class="w-36">
            </div>
            <div class="flex-shrink-0 bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('/images/bpbd.png') }}" alt="bpbd" class="w-36">
            </div>
            <div class="flex-shrink-0 bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('/images/image.png') }}" alt="image" class="w-36">
            </div>
            <div class="flex-shrink-0 bg-white p-6 rounded-lg shadow-lg">
                <img src="{{ asset('/images/kominfo.png') }}" alt="kominfo" class="w-36">
            </div>
        </div>


    </main>

    <x-slot:script>
        <script type="module">
            import {
                spotlight
            } from 'https://cdn.jsdelivr.net/gh/cttricks/spotlight.js/dist/spotlight.min.js';

            const Spotlight = await spotlight();

            // Spotlight.start();
        </script>
        <script>
            my_modal_1.showModal()
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
