<x-LayoutUser>
    <section class='relative animate__animated animate__zoomIn'>
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
        </div>

        <div
            class='absolute top-0 left-0 right-0 bottom-0 z-40 flex flex-col justify-center bg-gradient-to-r from-appPrimary-500/80 to-transparent'>
            <div class='container py-24 grid grid-cols-11 px-10'>
                <div class='col-span-8 pr-10'>
                    <div class='grid space-y-6'>
                        <div class='space-y-2'>
                            <h3 class="font-bold text-5xl text-font-50 leading-tight font-Opensans">SEIRAMA</h3>
                            <h3 class="font-bold text-5xl text-font-50 leading-tight font-Opensans">(Sistem Informasi
                                Kerjasama)</h3>
                            <h3 class="font-bold text-5xl text-font-50 leading-tight font-Opensans">BBPP Batangkaluku
                            </h3>
                        </div>
                        <p class='text-xl text-neutral-50 leading-8 font-Opensans'>
                            Menjadi Lembaga Pelatihan Terpercaya dan Berdaya Saling
                            untuk Menghasilkan SDM Pertanian yang Kreatif, Inovatif dan
                            Profesional.
                        </p>
                        <div class='flex space-x-5 items-center'>
                            <a href='{{ route('pengumuman') }}'>
                                <button type='button'
                                    class='font-semibold text-font-950 bg-font-50 rounded py-[10px] px-4'>
                                    Pengumuman
                                </button>
                            </a>

                            @auth('web')
                            @else
                                <a href='{{ route('register') }}' type='button'
                                    class='font-semibold bg-appPrimary-500 text-font-50 rounded py-[10px] px-4'>
                                    Daftar
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class='container py-14 space-y-10'>
        <div class="">
            <div class='flex justify-center space-x-8 items-center mb-3' data-aos="fade-up">
                <div class='bg-appPrimary-500 h-0.5 w-1/4'></div>
                <h3 class='text-5xl font-light font-MrDafoe text-appPrimary-500 capitalize'>
                    informasi Kegiatan
                </h3>
                <div class='bg-appPrimary-500 h-0.5 w-1/4'></div>
            </div>
            <p data-aos="fade-down" class='font-Opensans text-lg text-font-400 font-light text-center capitalize'>
                Kegiatan yang sedang Berlangsung
            </p>
        </div>
        @if ($kegiatan->count() > 0)
            <div id="KegiataSlide" class="swiper w-full">
                <div class="swiper-wrapper">
                    @php
                        $keg_count = 0;
                    @endphp
                    @foreach ($kegiatan as $item)
                        <div class="swiper-slide h-full w-full">
                            <x-KegiatanCards num="{{ $keg_count++ * 500 }}" pelaksana="{{ $item->pelaksana }}"
                                pretitle="{{ $item->kerjasama->nama }}" title="{{ $item->judul }}">
                                @if ($item->start != '')
                                    <p class="flex items-center space-x-2 text-white text-[.8rem] capitalize">
                                        <iconify-icon icon="mdi:calendar-outline"></iconify-icon>
                                        <span class="text-[.6rem]">{{ date('d-m-Y', strtotime($item->start)) }}</span>
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
                            </x-KegiatanCards>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="flex justify-center items-center py-5 min-h-[250px]" data-aos="fade-right">
                <h6 class="text-base text-font-400 ">Belum ada Kegiatan Sedang Berlangsung</h6>
            </div>
        @endif

    </section>

    <section class='container py-14 space-y-6' id="ebrosur">
        <div class='grid grid-cols-3 gap-6'>
            <div data-aos="fade-right">
                <div>
                    <div class="flex false space-x-8 items-center mb-3">
                        <h3 class="text-5xl font-light font-MrDafoe text-left text-appPrimary-500">Informasi E-Brosur
                        </h3>
                    </div>
                    <p class="font-Opensans text-lg text-font-400 font-light false"></p>
                </div>
                <h3 class="font-Opensans font-semibold text-xl">Berikut informasi e-brosur yang dapat di akases</h3>
            </div>
            @php
                $num = 2;
            @endphp
            @foreach ($brosur as $item)
                <x-HomeBrosure num="{{ $num++ * 200 }}" title="Informasi {{ $item->nama }}"
                    content="{{ $item->deskripsi }}" img="{{ asset('images/' . $item->image) }}" />
            @endforeach
        </div>
    </section>

    <section class='container py-14 space-y-6'>
        <div>
            <div class="flex false space-x-8 items-center mb-3">
                <h3 class="text-5xl font-light font-MrDafoe text-left text-appPrimary-500">Berita Layanan
                </h3>
            </div>
            <p class="font-Opensans text-lg text-font-400 font-light false">Berikut berita terkait layanan kegiatan yang
                dapat Anda akses </p>
        </div>
        <div class="grid grid-cols-6 gap-5">

            <div class='col-span-4 grid grid-cols-3 gap-6 place-self-start'>
                @foreach ($brosur as $item)
                    <div class='relative w-full aspect-[3/4] group cursor-pointer flex justify-center overflow-hidden'>
                        <img src='{{ asset('images/cover1.png') }}' alt='' fill
                            class='rounded-md object-cover' />
                        <div
                            class='absolute left-[50%] w-0 h-full group-hover:w-full group-hover:left-0 transition-all ease-in duration-300 bg-font-50/90'>
                        </div>
                        <div
                            class='absolute rounded-sm bg-appPrimary-500 text-font-950 px-2 py-1 text-[.6rem] font-semibold left-4 -top-10 group-hover:top-4 group-hover:transition-all group-hover:duration-300 group-hover:delay-300 '>
                            20 Agustus 2023
                        </div>
                        <div
                            class='py-2 px-4 top-[50%] absolute opacity-0 invisible group-hover:transition-all group-hover:visible group-hover:opacity-100 group-hover:duration-300 group-hover:delay-[400ms] group-hover:-translate-y-[50%]'>
                            <h6 class='font-Opensans text-base font-bold text-font-900 leading-5 mb-3'>
                                Mentan melakukan kunjungan
                            </h6>
                            <p class='font-light text-xs'>
                                {{ substr('Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa magnam tempora corrupti incidunt. Voluptates beatae officiis consequuntur voluptatibus eius? Quia minus sit dolore hic laudantium sunt voluptate, et voluptates eveniet.', 0, 100) }}

                            </p>
                            <div class='w-full'>
                                <a href='http://' target='_blank' rel='noopener noreferrer'
                                    class='text-appPrimary-500 font-semibold text-sm text-center hover:text-font-600'>
                                    read more
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="lg:col-span-2 col-span-12 space-y-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kalender Kegiatan</h4>
                    </div>
                    <div class="card-body p-2">
                        <div class="">
                            <div id="dashcode-mini-calendar"></div>
                        </div>
                        <ul class="divide-y divide-slate-100 dark:divide-slate-700" id="calender_data">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class='py-14' id="galeri">
        <div class="container">
            <div class='flex justify-center space-x-8 items-center mb-3'>
                <div class='bg-appPrimary-500 h-0.5 w-1/4'></div>
                <h3 class='text-5xl font-light font-MrDafoe text-appPrimary-500 capitalize'>
                    Gallery
                </h3>
                <div class='bg-appPrimary-500 h-0.5 w-1/4'></div>
            </div>
            <p class='font-Opensans text-lg text-font-400 font-light text-center capitalize'>
                Foto dan Video Kegiatan BBPP Batangkaluku
            </p>
        </div>
        <div class='grid grid-cols-3 py-10'>
            <x-ImageCards img="{{ asset('images/cover1.png') }}" />
            <x-ImageCards img="{{ asset('images/cover3.png') }}" />
            <x-ImageCards img="{{ asset('images/cover2.png') }}" />
            <x-ImageCards img="{{ asset('images/cover3.png') }}" />
            <x-ImageCards img="{{ asset('images/cover2.png') }}" />
            <x-ImageCards img="{{ asset('images/cover1.png') }}" />
        </div>
    </section>



    @push('scripts')
        @vite(['resources/js/plugins/calendar.js'])
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
            AOS.init({
                easing: 'ease-in-out-sine'
            });
        </script>
        <script type="module">
            const getKegiatan = (date) => {
                var url = '{!! route('kalender_kegiatan', ['date' => ':id']) !!}';
                $.ajax({
                    type: "get",
                    url: url.replace(':id', date),
                    success: ({
                        data,
                        statusCode
                    }) => {
                        if (statusCode == 200) {
                            if (data.length > 0) {
                                var path = "{!! asset('images/') !!}"
                                $('#calender_data').html('');
                                $.each(data, (index, value) => {
                                    console.log(index, value);
                                    $('#calender_data').append(`
                            <li class="block py-[10px]">
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-1 flex space-x-2 rtl:space-x-reverse items-center">
                                        <div class="flex-none">
                                            <div class="h-10 w-10">
                                                <img src="${path}/${value.kerjasama.image}" alt=""
                                                    class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="block text-slate-600 text-xs dark:text-slate-300 mb-1 font-medium">
                                                ${value.judul}
                                            </span>
                                            <span class="flex font-Opensans font-semibold text-[8px] dark:text-slate-400 text-slate-500 lowercase mb-1">
                                                <span class="text-[8px] inline-block mr-1">
                                                    <iconify-icon icon="entypo:location"></iconify-icon>
                                                </span>
                                                ${value.tempat}
                                            </span>
                                            <div class="flex-none flex text-[8px] text-slate-600 dark:text-slate-400 space-x-1 font-Opensans font-semibold">
                                                <span class="block ">${moment(value.start, 'YYYY-MM-DD').format('DD MMM YY')}</span>
                                                <span class="block ">-</span>
                                                <span class="block">${moment(value.end, 'YYYY-MM-DD').format('DD MMM YY')}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            `)
                                });
                            } else {
                                $('#calender_data').html(
                                    `<li class="block py-[10px] flex justify-center items-center font-Opensans text-sm font-semibold capitalize">Tidak ada Kegiatan</li>`
                                )
                            }
                        }
                    },
                    error: (error) => {
                        console.log(error);
                    }
                });
            }

            getKegiatan(moment().format('YYYY-MM-DD'));

            function selectDate(date) {
                $('#dashcode-mini-calendar').updateCalendarOptions({
                    date: date
                });
                var dateNew = new Date(date)
                getKegiatan(moment(dateNew).format('YYYY-MM-DD'))
            }

            var defaultConfig = {
                weekDayLength: 1,
                date: moment().format('MM/DD/YYYY'),
                onClickDate: selectDate,
                showYearDropdown: true,
                startOnMonday: false,
            }

            var calendar = $('#dashcode-mini-calendar').calendar(defaultConfig);
        </script>
    @endpush
</x-LayoutUser>
