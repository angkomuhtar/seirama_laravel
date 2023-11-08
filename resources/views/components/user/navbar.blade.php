<div class='container'>
    <div class="relative">
        <nav
            class='absolute z-50 w-full top-0 bg-font-900 flex justify-between items-center rounded-[20px] py-4 px-16 mt-6 space-x-6'>
            <x-user.app-icon />
            <ul class='flex flex-1 justify-end space-x-7'>
                <li>
                    <a href='{{ route('home') }}' class='text-neutral-50 text-base font-semibold'>
                        Beranda
                    </a>
                </li>
                <li>
                    <a href='{{ route('home') }}#ebrosur' class='text-neutral-50 text-base font-semibold'>
                        E-Brosur
                    </a>
                </li>
                <li>
                    <a href='{{ route('home') }}#galeri' class='text-neutral-50 text-base font-semibold'>
                        Gallery
                    </a>
                </li>
            </ul>
            <div class='flex justify-between space-x-5'>
                @auth('web')
                    <a href='{{ route('account') }}'>
                        <button
                            class='font-semibold text-neutral-50 border-2 bg-appPrimary-500 border-appPrimary-500 px-10 py-2 rounded-md'>
                            Akunku
                        </button>
                    </a>
                @else
                    <a href='login'>
                        <button
                            class='font-semibold text-neutral-50 border-2 bg-appPrimary-500 border-appPrimary-500 px-10 py-2 rounded-md'>
                            Masuk
                        </button>
                    </a>
                    <button class='font-semibold text-neutral-50 border-2 border-appPrimary-500 px-8 py-2 rounded-md'>
                        Daftar
                    </button>
                @endauth
            </div>
        </nav>
    </div>
</div>
