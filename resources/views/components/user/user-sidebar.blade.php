<div
    class="border border-appNetral-200 place-self-start py-6 px-1.5 w-full shadow-sm absolute bottom-0 right-0 left-0 lg:relative">
    <ul class="grid gap-2">
        <li
            class="hover:bg-appPrimary-500/30 hover:border-r-4 hover:border-r-appPrimary-500 {{ \Request::route()->getName() == 'account' ? 'bg-appPrimary-500/30 border-r-4 border-r-appPrimary-500' : '' }} ">
            <a href="{{ route('account') }}"
                class="flex items-center text-base font-Opensans font-semibold px-2 py-4 text-appPrimary-500">
                <iconify-icon icon="mingcute:right-line" class="text-2xl mr-5"></iconify-icon>
                Profile
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
