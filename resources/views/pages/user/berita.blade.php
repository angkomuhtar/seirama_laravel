<x-LayoutUser>
    <div class="h-20"></div>

    <section class='container py-14 space-y-10'>
        <div class="border-b border-b-appNetral-200 pb-5">
            <h3 class="font-Opensans text-xl md:text-2xl lg:text-3xl text-appPrimary-600">Kementan Raih Penghargaan KIP
                sebagai Badan Publik
                Ramah Disabilitas dalam
                Pelayanan Informasi Publik</h3>
        </div>

        <div class='grid lg:grid-cols-2 gap-5 min-h-[300px]'>
            @for ($i = 0; $i < 5; $i++)
                <div class='p-4 bg-white rounded-lg drop-shadow-lg place-self-start'>
                    <h3 class='text-lg text-font-950 font-semibold'>
                        Pengumuman Penetapan Hasil Akhir Seleksi Internal Kementrian Pertanian
                        BBPP Batangkaluku 2023
                    </h3>
                    <div class='flex flex-row justify-between pt-5 items-center'>
                        <div class='flex flex-row space-x-4 items-center'>
                            <p
                                class='flex items-center justify-center font-Opensans text-xs text-font-300 font-semibold'>
                                <span class="text-xs inline-block mr-2">
                                    <iconify-icon icon="ooui:calendar"></iconify-icon>
                                </span>
                                24 Maret 2023
                            </p>
                            <p
                                class='flex items-center justify-center font-Opensans text-xs text-font-300 font-semibold'>
                                <span class="text-xs inline-block mr-2">
                                    <iconify-icon icon="zondicons:time"></iconify-icon>
                                </span>
                                24 Maret 2023
                            </p>
                        </div>
                        <div>
                            <a href="#" target="_blank"
                                class='btn btn-sm bg-appPrimary-500 text-white justify-center items-center font-semibold uppercase'>
                                download
                                <span class="text-xs inline-block ml-2">
                                    <iconify-icon icon="material-symbols:download"></iconify-icon>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </section>

    @push('scripts')
    @endpush
</x-LayoutUser>
