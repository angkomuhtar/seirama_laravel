<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <x-application-logo />
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="navItem {{ \Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kegiatan') }}"
                    class="navItem {{ stripos(\Request::route()->getName(), 'admin.kegiatan') !== false ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="game-icons:mining-helmet"></iconify-icon>
                        <span>Kegiatan</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('kerjasama') }}"
                    class="navItem {{ stripos(\Request::route()->getName(), 'kerjasama') !== false ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="ic:outline-handshake"></iconify-icon>
                        <span>Jenis Kerjasama</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.berita') }}"
                    class="navItem {{ stripos(\Request::route()->getName(), 'admin.berita') !== false ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="ic:outline-handshake"></iconify-icon>
                        <span>Berita</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('kerjasama') }}"
                    class="navItem {{ stripos(\Request::route()->getName(), 'kewrjasama') !== false ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="ic:outline-handshake"></iconify-icon>
                        <span>Berita</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('kerjasama') }}"
                    class="navItem {{ stripos(\Request::route()->getName(), 'kerwjasama') !== false ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="ic:outline-handshake"></iconify-icon>
                        <span>Gallery</span>
                    </span>
                </a>
            </li>
            {{-- <li class="sidebar-menu-title">{{ __('S') }}</li> --}}
            {{-- <li class="{{ \Request::route()->getName() == 'absensi*' ? 'active' : '' }}">
                <a href="#" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons:finger-print-20-solid"></iconify-icon>
                        <span>Attendance</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href={{ route('absensi.attendance') }}
                            class="navItem {{ stripos(\Request::route()->getName(), 'absensi.attendance') !== false ? 'active' : '' }}">Attendance</a>
                    </li>
                    <li>
                        <a href={{ route('absensi.workhours') }}
                            class="navItem {{ stripos(\Request::route()->getName(), 'absensi.workhours') !== false ? 'active' : '' }}">Work
                            Hours</a>
                    </li>
                    <li>
                        <a href={{ route('absensi.clocklocations') }}
                            class="navItem {{ stripos(\Request::route()->getName(), 'absensi.clocklocations') !== false ? 'active' : '' }}">Clock
                            Location</a>
                    </li>
                </ul>
            </li>
            <li class="{{ \Request::route()->getName() == 'masters*' ? 'active' : '' }}">
                <a href="#" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons:cog-6-tooth"></iconify-icon>
                        <span>Master</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href={{ route('masters.users') }}
                            class="navItem {{ stripos(\Request::route()->getName(), 'masters.users') !== false ? 'active' : '' }}">Users</a>
                    </li>
                    <li>
                        <a href={{ route('masters.division') }}
                            class="navItem {{ stripos(\Request::route()->getName(), 'masters.division') !== false ? 'active' : '' }}">Departement</a>
                    </li>
                    <li>
                        <a href={{ route('masters.position') }}
                            class="navItem {{ stripos(\Request::route()->getName(), 'masters.position') !== false ? 'active' : '' }}">Jabatan</a>
                    </li>
                </ul>
            </li> --}}
        </ul>
        <div class="bg-slate-700 mb-10 mt-36 p-4 relative text-center rounded-2xl text-white"
            id="sidebar_bottom_wizard">
            <img src="{{ asset('images/worker.png') }}" alt="" class="mx-auto relative -mt-[110px] h-48">
            <div class="max-w-[160px] mx-auto mt-6">
                <div class="widget-title font-Inter mb-1">Unlimited Access</div>
                <div class="text-xs font-light font-Inter">
                    Upgrade your system to business plan
                </div>
            </div>
        </div>
    </div>
</div>
