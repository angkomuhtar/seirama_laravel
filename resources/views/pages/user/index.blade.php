<x-userLayout>
    <section class='relative'>
        <div id="headerSlide" class="swiper h-screen w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide h-full w-full">
                    <img class="object-cover h-full w-full" src='{{ asset('images/cover1.png') }}' alt='' />
                </div>
                <div class="swiper-slide h-full w-full">
                    <img class="object-cover h-full w-full" src='{{ asset('images/cover2.png') }}' alt='' />
                </div>
                <div class="swiper-slide h-full w-full">
                    <img class="object-cover h-full w-full" src='{{ asset('images/cover3.png') }}' alt='' />
                </div>
            </div>
            {{-- <div class="swiper-pagination"></div> --}}
        </div>

    </section>

    <div
        class='absolute top-0 left-0 right-0 bottom-0 z-40 flex flex-col justify-center bg-gradient-to-r from-appPrimary-500/80 to-transparent'>
        <div class='container py-24 grid grid-cols-11 px-10'>
            <div class='col-span-8 pr-10'>
                <div class='grid space-y-6'>
                    <div class='space-y-2'>
                        <h3 class="font-bold text-5xl text-font-50 leading-tight font-Opensans">SEIRAMA</h3>
                        <h3 class="font-bold text-5xl text-font-50 leading-tight font-Opensans">(Sistem Informasi
                            Kerjasama)</h3>
                        <h3 class="font-bold text-5xl text-font-50 leading-tight font-Opensans">BBPP Batangkaluku</h3>
                    </div>
                    <p class='text-xl text-neutral-50 leading-8 font-Opensans'>
                        Menjadi Lembaga Pelatihan Terpercaya dan Berdaya Saling
                        untuk Menghasilkan SDM Pertanian yang Kreatif, Inovatif dan
                        Profesional.
                    </p>
                    <div class='flex space-x-5 items-center'>
                        <a href='announcement'>
                            <button type='button'
                                class='font-semibold text-font-950 bg-font-50 rounded py-[10px] px-4'>
                                Pengumuman
                            </button>
                        </a>
                        <button type='button'
                            class='font-semibold bg-appPrimary-500 text-font-50 rounded py-[10px] px-4'>
                            Daftar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section class='container py-14 space-y-10'>
        <div class="">
            <div class='flex justify-center space-x-8 items-center mb-3'>
                <div class='bg-appPrimary-500 h-0.5 w-1/4'></div>
                <h3 class='text-5xl font-light font-MrDafoe text-appPrimary-500 capitalize'>
                    informasi Kegiatan
                </h3>
                <div class='bg-appPrimary-500 h-0.5 w-1/4'></div>
            </div>
            <p class='font-Opensans text-lg text-font-400 font-light text-center capitalize'>
                Kegiatan yang sedang Berlangsung
            </p>
        </div>
        {{-- <div class="flex justify-center items-center py-5">
            <h6 class="text-base text-font-400 ">Belum ada Kegiatan Sedang Berlangsung</h6>
        </div> --}}
        <div id="KegiataSlide" class="swiper w-full">
            <div class="swiper-wrapper">
                @foreach ($kegiatan as $item)
                    <div class="swiper-slide h-full w-full">
                        <x-KegiatanCard pelaksana="{{ $item->pelaksana }}" pretitle="{{ $item->kerjasama->nama }}"
                            title="{{ $item->judul }}">
                            @if ($item->waktu != '')
                                <p class="flex items-center space-x-2 text-white text-[.8rem] capitalize">
                                    <iconify-icon icon="mdi:calendar-outline"></iconify-icon>
                                    <span class="text-[.6rem]">{{ date('d-m-Y', strtotime($item->waktu)) }}</span>
                                </p>
                            @endif
                            @if ($item->tempat != '')
                                <p class="flex items-center space-x-2 text-white text-[.8rem] capitalize">
                                    <iconify-icon icon="entypo:location"></iconify-icon>
                                    <span class="text-[.6rem]">{{ $item->tempat }}</span>
                                </p>
                            @endif
                            @if ($item->peserta != '')
                                <p class="flex items-center space-x-2 text-white text-[.8rem] capitalize">
                                    <iconify-icon icon="ci:users-group"></iconify-icon>
                                    <span class="text-[.6rem]">{{ $item->peserta }} peserta</span>
                                </p>
                            @endif
                            @if ($item->pengajar != '')
                                <p class="flex items-center space-x-2 text-white text-[.8rem] capitalize">
                                    <iconify-icon icon="mingcute:user-2-line"></iconify-icon>
                                    <span class="text-[.6rem]">{{ $item->pengajar }}</span>
                                </p>
                            @endif
                            @if ($item->instansi != '')
                                <p class="flex items-center space-x-2 text-white text-[.8rem] capitalize">
                                    <iconify-icon icon="tabler:building"></iconify-icon>
                                    <span class="text-[.6rem]">{{ $item->instansi }}</span>
                                </p>
                            @endif
                            @if ($item->sarana != '')
                                <p class="flex items-center space-x-2 text-white text-[.8rem] capitalize">
                                    <iconify-icon icon="mdi:store-marker-outline"></iconify-icon>
                                    <span class="text-[.6rem]">{{ $item->sarana }}</span>
                                </p>
                            @endif
                        </x-KegiatanCard>
                    </div>
                @endforeach
            </div>
            {{-- <div class="swiper-pagination"></div> --}}
        </div>

        {{-- <CarouselKegiatan /> --}}
    </section>

    <section class='container py-14 space-y-6'>
        <div class='grid grid-cols-3 gap-6'>
            <div>
                <div>
                    <div class="flex false space-x-8 items-center mb-3">
                        <h3 class="text-5xl font-light font-MrDafoe text-left text-appPrimary-500">Informasi E-Brosur
                        </h3>
                    </div>
                    <p class="font-Opensans text-lg text-font-400 font-light false"></p>
                </div>
                <h3 class="font-Opensans font-semibold text-xl">Berikut informasi e-brosur yang dapat di akases</h3>
            </div>
            {{-- <x-Brosurcard /> --}}
            @foreach ($brosur as $item)
                <x-Brosurcard title="Informasi {{ $item->nama }}" content="{{ $item->deskripsi }}"
                    img="{{ asset($item->image) }}" />
            @endforeach
        </div>
    </section>


    @push('scripts')
        <script>
            var swiper = new Swiper("#headerSlide", {
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                effect: "creative",
                creativeEffect: {
                    prev: {
                        shadow: true,
                        translate: ["-20%", 0, -1],
                    },
                    next: {
                        translate: ["100%", 0, 0],
                    },
                },
            });

            var swiper2 = new Swiper("#KegiataSlide", {
                centeredSlides: false,
                grabCursor: true,
                slidesPerView: 3.5,
                spaceBetween: 50,
            });
        </script>
    @endpush
</x-userLayout>
