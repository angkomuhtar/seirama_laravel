<x-userLayout>
    <div class="h-20"></div>
    <section class='container py-14 grid lg:grid-cols-5 grid-cols-4 gap-7'>
        <x-user.user-sidebar />
        <div class="col-span-4 grid gap-5 place-self-start w-full">
            <div class="px-3 py-2 rounded-md w-full bg-appPrimary-200/50 shadow-sm">
                <h3 class="text-lg font-Opensans font-semibold text-font-900">Details Kegiatan</h3>
            </div>

            <div class="grid grid-cols-3 gap-x-5 gap-y-10 rounded-md bg-appPrimary-200/50 shadow-sm p-5">
                <div class="py-2">
                    <h6 class="font-Inter font-light text-[10px] capitalize">Nama kegiatan</h6>
                    <p class="font-Opensans font-medium text-sm uppercase ">{{ $kegiatan->judul }}</p>
                </div>
                <div class="py-2">
                    <h6 class="font-Inter font-light text-[10px] capitalize">Pelaksana</h6>
                    <p class="font-Opensans font-medium text-sm uppercase ">{{ $kegiatan->pelaksana }}</p>
                </div>

                <div class="py-2">
                    <h6 class="font-Inter font-light text-[10px] capitalize">Lokasi Pelaksanaan</h6>
                    <p class="font-Opensans font-medium text-sm uppercase ">{{ $kegiatan->tempat }}</p>
                </div>
                <div class="py-2">
                    <h6 class="font-Inter font-light text-[10px]">jenis Kerjasama</h6>
                    <p class="font-Opensans font-medium text-sm uppercase">
                        {{ $kegiatan->kerjasama->nama }}
                    </p>
                </div>
                <div class="py-2">
                    <h6 class="font-Inter font-light text-[10px] capitalize">instansi Kerjasama</h6>
                    <p class="font-Opensans font-medium text-sm uppercase">
                        {{ $kegiatan->instansi }}
                    </p>
                </div>
                <div class="py-2">
                    <h6 class="font-Inter font-light text-[10px] capitalize">jenis peserta</h6>
                    <p class="font-Opensans font-semibold text-xs capitalize py-2">
                        <span class="bg-appPrimary-500 text-white rounded-md py-1 px-2">non-aparatur</span>
                        <span class="bg-appPrimary-500 text-white rounded-md py-1 px-2">aparatur</span>
                    </p>
                </div>
                <div class="py-2">
                    <h6 class="font-Inter font-light text-[10px] capitalize">Jumlah peserta</h6>
                    <p class="font-Opensans font-semibold text-sm capitalize">
                        {{ $kegiatan->peserta }} Orang
                    </p>
                </div>
                <div class="py-2">
                    <h6 class="font-Inter font-light text-[10px] capitalize">Tanggal Pelaksanaan</h6>
                    <p class="font-Opensans font-semibold text-sm uppercase">
                        {{ date('d', strtotime($kegiatan->start)) . ' - ' . date('d M Y', strtotime($kegiatan->end)) }}
                    </p>
                </div>
                <hr class="col-span-3">
                <div class="col-span-3 flex justify-end space-x-3 items-center">
                    @if ($is_join == 0)
                        <button type="button" id="join"
                            class="bg-appPrimary-500 px-3 py-2 text-white font-Opensans font-semibold text-sm rounded-md flex justify-center items-center">
                            <iconify-icon icon="uiw:user-add" class="text-xl mr-2"></iconify-icon>Ikuti Pelatihan
                        </button>
                        <a href="http://" target="_blank"
                            class="text-appPrimary-500 px-3 py-2 border border-appPrimary-500 font-Opensans font-semibold text-sm rounded-md flex justify-center items-center">
                            <iconify-icon icon="mingcute:close-fill" class="text-xl mr-2"></iconify-icon>Batal
                        </a>
                    @else
                        <a href="http://" target="_blank"
                            class="bg-appPrimary-500 px-3 py-2 text-white font-Opensans font-semibold text-sm rounded-md flex justify-center items-center">
                            <iconify-icon icon="mingcute:print-line" class="text-xl mr-2"></iconify-icon>Cetak ID
                            Card
                        </a>
                        <a href="http://" target="_blank"
                            class="bg-appPrimary-500 px-3 py-2 text-white font-Opensans font-semibold text-sm rounded-md flex justify-center items-center">
                            <iconify-icon icon="mingcute:print-line" class="text-xl mr-2"></iconify-icon>Cetak
                            Sertifikat
                        </a>
                    @endif

                </div>
            </div>

            <div class="grid grid-cols-3 grid-flow-row gap-16 ">
            </div>
        </div>
    </section>



    @push('scripts')
        <script type="module">
            $("#join").on('click', function() {
                $.post('{!! route('kegiatan.join', ['id' => $kegiatan->id]) !!}', {
                    "_token": "{!! csrf_token() !!}"
                }, (response) => {
                    console.log(response);
                })
            })
        </script>
    @endpush
</x-userLayout>
