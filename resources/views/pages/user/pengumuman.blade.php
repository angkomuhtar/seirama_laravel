<x-userLayout>
    <div class="h-32"></div>
    <section class='container'>
        <div class="bg-no-repeat bg-center bg-cover rounded-2xl"
            style="background-image: url('{{ asset('images/header.png') }}')">
            <div class='bg-font-950/80 rounded-2xl aspect-[7/2] p-12'>
                <h3 class='text-appNetral-50 lg:text-5xl md:text-3xl text-xl font-open_sans font-bold'>
                    Pengumuman
                </h3>
            </div>
        </div>
    </section>

    <section class='container py-14 space-y-10'>
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
</x-userLayout>
