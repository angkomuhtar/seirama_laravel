<div class='navbar-container'>
    <nav class='navbar-box'>
        <x-user.app-icon />
        <div id="burger-menu" class="md:hidden flex justify-end items-center">
            <label for="burger">
                <input type="checkbox" id="burger" />
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="nav-menu-box hidden md:flex">
            <ul>
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
                    <a href='{{ route('account') }}'
                        class='font-semibold text-neutral-50 border-2 bg-appPrimary-500 border-appPrimary-500 text-center px-8 py-2 rounded-md'>
                        Akunku
                    </a>
                @else
                    <a href='{{ route('login') }}'
                        class='flex-1 font-semibold text-neutral-50 border-2 bg-appPrimary-500 border-appPrimary-500 text-center px-8 py-2 rounded-md'>
                        Masuk
                    </a>
                    <a href='{{ route('register') }}'
                        class='flex-1 font-semibold text-neutral-50 border-2 border-appPrimary-500 text-center px-8 py-2 rounded-md'>
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="">
    </div>
</div>
