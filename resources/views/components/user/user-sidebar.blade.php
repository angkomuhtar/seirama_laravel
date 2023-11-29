<div class="fixed bottom-0 right-0 left-0 lg:relative z-10">
    <div class="md:hidden flex justify-between items-center py-0 rounded-lg bg-white px-5 ">
        <a href="{{ route('account') }}"
            class="flex items-center text-xs font-Opensans font-bold px-2 py-4 text-appPrimary-500">
            <iconify-icon icon="jam:home" class="text-3xl mr-2"></iconify-icon>
            {{ \Request::route()->getName() == 'account' ? 'Dashboard' : '' }}
        </a>
        <a href="{{ route('kegiatan') }}"
            class="flex items-center text-xs font-Opensans font-bold px-2 py-4 text-appPrimary-500">
            <iconify-icon icon="material-symbols:local-activity-outline-rounded" class="text-3xl mr-2"></iconify-icon>
            {{ str_starts_with(\Request::route()->getName(), 'kegiatan') ? 'Kegiatan' : '' }}
        </a>
        @if (count(auth()->guard('web')->user()->kerjasama) > 0)
            <a href="{{ route('user_kerjasama') }}"
                class="flex items-center text-xs font-Opensans font-bold px-2 py-4 text-appPrimary-500">
                <iconify-icon icon="ic:outline-handshake" class="text-3xl mr-2"></iconify-icon>
                {{ str_starts_with(\Request::route()->getName(), 'user_kerjasama') ? 'Kerjasama' : '' }}
            </a>
        @else
            <a href="{{ route('user_kerjasama.create') }}"
                class="flex items-center text-xs font-Opensans font-bold px-2 py-4 text-appPrimary-500">
                <iconify-icon icon="ic:outline-handshake" class="text-3xl mr-2"></iconify-icon>
                {{ str_starts_with(\Request::route()->getName(), 'user_kerjasama') ? 'Kerjasama' : '' }}
            </a>
        @endif
        <a href="{{ route('profile') }}"
            class="flex items-center text-xs font-Opensans font-bold px-2 py-4 text-appPrimary-500">
            <iconify-icon icon="mingcute:user-4-line" class="text-3xl mr-2"></iconify-icon>
            {{ \Request::route()->getName() == 'profile' ? 'Profile' : '' }}
        </a>
    </div>


    <div class="hidden md:block border border-appNetral-200 place-self-start py-6 px-1.5 w-full shadow-sm ">
        <ul class="grid gap-2">
            <li
                class="hover:bg-appPrimary-500/30 hover:border-r-4 hover:border-r-appPrimary-500 {{ \Request::route()->getName() == 'account' ? 'bg-appPrimary-500/30 border-r-4 border-r-appPrimary-500' : '' }} ">
                <a href="{{ route('account') }}"
                    class="flex items-center text-base font-Opensans font-semibold px-2 py-4 text-appPrimary-500">
                    <iconify-icon icon="mingcute:right-line" class="text-2xl mr-5"></iconify-icon>
                    Dashboard
                </a>
            </li>

            <li
                class="hover:bg-appPrimary-500/30 hover:border-r-4 hover:border-r-appPrimary-500 {{ str_starts_with(\Request::route()->getName(), 'kegiatan') ? 'bg-appPrimary-500/30 border-r-4 border-r-appPrimary-500' : '' }} ">
                <a href="{{ route('kegiatan') }}"
                    class="flex items-center text-base font-Opensans font-semibold px-2 py-4 text-appPrimary-500">
                    <iconify-icon icon="mingcute:right-line" class="text-2xl mr-5"></iconify-icon>
                    Kegiatan Saya
                </a>
            </li>
            @if (count(auth()->guard('web')->user()->kerjasama) > 0)
                <li
                    class="hover:bg-appPrimary-500/30 hover:border-r-4 hover:border-r-appPrimary-500 {{ str_starts_with(\Request::route()->getName(), 'user_kerjasama') ? 'bg-appPrimary-500/30 border-r-4 border-r-appPrimary-500' : '' }} ">
                    <a href="{{ route('user_kerjasama') }}"
                        class="flex items-center text-base font-Opensans font-semibold px-2 py-4 text-appPrimary-500">
                        <iconify-icon icon="mingcute:right-line" class="text-2xl mr-5"></iconify-icon>
                        Kerjasama Instansi
                    </a>
                </li>
            @endif
            <li
                class="hover:bg-appPrimary-500/30 hover:border-r-4 hover:border-r-appPrimary-500 {{ \Request::route()->getName() == 'profile' ? 'bg-appPrimary-500/30 border-r-4 border-r-appPrimary-500' : '' }} ">
                <a href="{{ route('profile') }}"
                    class="flex items-center text-base font-Opensans font-semibold px-2 py-4 text-appPrimary-500">
                    <iconify-icon icon="mingcute:right-line" class="text-2xl mr-5"></iconify-icon>
                    Edit Profil
                </a>
            </li>
        </ul>
    </div>
    @if (count(auth()->guard('web')->user()->kerjasama) == 0)
        <div class="flex w-ful">
            <a href="{{ route('user_kerjasama.create') }}"
                class="py-3 px-4 rounded-md 
            bg-appPrimary-500 mt-10 flex-1 align-middle text-center 
            font-Opensans font-bold text-white text-sm">
                Ajukan Kerjasama Instansi</a>
        </div>
    @endif
</div>
