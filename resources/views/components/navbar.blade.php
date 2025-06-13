<nav class="flex justify-between items-center px-3 sm:px-12 lg:px-30 py-3 shadow-md border border-gray-300">
    <div>
        <img src="{{ asset('/images/logo.png') }}" alt="simopedi" class="w-36">
    </div>

    <div class="text-sm flex">
        {{-- MENU MOBILE --}}
        <button x-data="{ open: false }" x-on:click="open = !open"
            class="flex items-center space-x-2 focus:outline-none sm:hidden">
            {{-- <span x-text="open ? 'Close' : 'Open'" class="font-medium text-lg">Open</span> --}}

            <div class="w-6 flex items-center justify-center relative">
                <span x-bind:class="open ? 'translate-y-0 rotate-45' : '-translate-y-2'"
                    class="transform transition w-full h-px bg-current absolute"></span>

                <span x-bind:class="open ? 'opacity-0 translate-x-3' : 'opacity-100'"
                    class="transform transition w-full h-px bg-current absolute"></span>

                <span x-bind:class="open ? 'translate-y-0 -rotate-45' : 'translate-y-2'"
                    class="transform transition w-full h-px bg-current absolute"></span>
            </div>
        </button>

        {{-- MENU DESKTOP --}}
        <ul class="hidden sm:flex gap-5">
            <li class="relative">
                <a href=""
                    class="relative inline-block after:content-[''] after:block after:absolute after:h-[1px] after:w-1/2 after:bg-black after:left-0 after:-bottom-1">
                    Informasi
                </a>
            </li>
            <li>
                <a href="">Lapor</a>
            </li>
            <li>
                <a href="">Kontak</a>
            </li>
        </ul>
    </div>
    <script>
        // Pilih elemen button
        const button = document.querySelector('button');
        const spans = button.querySelectorAll('span');

        // Inisialisasi state open
        let open = false;

        // Tambahkan event listener untuk klik button
        button.addEventListener('click', () => {
            open = !open;

            // Update kelas untuk setiap span
            spans[0].className =
                `transform transition w-full h-px bg-current absolute ${open ? 'translate-y-0 rotate-45' : '-translate-y-2'}`;
            spans[1].className =
                `transform transition w-full h-px bg-current absolute ${open ? 'opacity-0 translate-x-3' : 'opacity-100'}`;
            spans[2].className =
                `transform transition w-full h-px bg-current absolute ${open ? 'translate-y-0 -rotate-45' : 'translate-y-2'}`;

            // Optional: Update teks button jika diperlukan
            // button.querySelector('span.font-medium').textContent = open ? 'Close' : 'Open';
        });
    </script>
</nav>
