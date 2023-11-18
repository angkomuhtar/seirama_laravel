<x-LayoutUser>

    <div class="h-20"></div>
    <section class='container py-14 grid lg:grid-cols-5 grid-cols-4 gap-7'>
        <x-user.user-sidebar />
        <div class="col-span-4 grid gap-8 place-self-start w-full">

            <section class="profile_card grid gap-5">
                <div class="px-3 py-2 rounded-md w-full bg-appPrimary-200/50 shadow-sm">
                    <h3 class="text-lg font-Opensans font-semibold text-font-900">Profil</h3>
                </div>
                <div class="px-10 py-5 rounded-md w-full bg-appPrimary-200/50 shadow-sm grid grid-cols-5 gap-5">
                    <div class="place-content-start w-full aspect-[3/4] relative">
                        <img src="{{ asset('images/default_avatar.png') }}"
                            class="object-cover absolute h-full w-full rounded-md bg-white" alt="">
                    </div>
                    <div class="col-span-4">
                        <h3 class="text-xl font-Opensans font-bold mb-5">{{ $user->profile->nama }}</h3>
                        <div class="grid grid-cols-3">
                            <div class="py-2">
                                <h6 class="font-Inter font-light text-[10px] capitalize">type</h6>
                                <p class="font-Opensans font-semibold text-sm capitalize ">
                                    {{ $user->profile->isASN == 'Y' ? 'APARATUR' : 'Non-APARATUR' }}
                                </p>
                            </div>
                            <div class="py-2">
                                <h6 class="font-Inter font-light text-[10px] capitalize">jabatan</h6>
                                <p class="font-Opensans font-semibold text-sm capitalize ">{{ '--' }}</p>
                            </div>

                            <div class="py-2">
                                <h6 class="font-Inter font-light text-[10px] capitalize">instansi</h6>
                                <p class="font-Opensans font-semibold text-sm capitalize ">{{ '--' }}</p>
                            </div>
                            <div class="py-2 col-span-3">
                                <h6 class="font-Inter font-light text-[10px] capitalize">Alamat</h6>
                                <p class="font-Opensans font-semibold text-sm capitalize ">Kampung Loe, Tombolo,
                                    SombaOpu,
                                    Gowa</p>
                            </div>
                        </div>
                        <div class="flex justify-between pt-4">
                            <div class="border border-dashed border-font-900 p-4">
                                <span class="flex justify-center items-center font-Opensans font-bold text-xl">
                                    <iconify-icon icon="mingcute:document-2-line"
                                        class="text-appPrimary-500 text-xl mr-2"></iconify-icon>{{ $kegiatan }}
                                </span>
                                <p class="font-Opensans font-light text-base">Pelatihan</p>
                            </div>
                            <a href="{{ route('profile') }}" type="button"
                                class="btn bg-appPrimary-500 text-white flex justify-center items-center place-self-end">
                                <iconify-icon icon="mingcute:user-2-line" class="text-xl mr-2"></iconify-icon>Edit
                                Profil</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class=" grid gap-5 kegiatan_saya">
                <div class="px-3 py-2 rounded-md w-full bg-appPrimary-200/50 shadow-sm">
                    <h3 class="text-lg font-Opensans font-semibold text-font-900">Kegiatan Saya</h3>
                </div>
                @if ($kegiatan_terakhir)
                    <div class="border border-font-300 py-4 px-5 rounded-md grid gap-5">
                        <div class="flex justify-between items-center">
                            <img src="{{ asset('images/logo_hitam.svg') }}" alt="BBPP Batangkaluku"
                                class="aspect-[4/1] object-contain">
                            <button
                                class="py-1 px-3 bg-appPrimary-500 text-white font-Opensans font-medium rounded-md text-xs">Non-Aparatur</button>
                        </div>
                        <div class="content grid gap-3">
                            <h3 class="font-Opensans font-bold text-font-900 text-xl">
                                {{ $kegiatan_terakhir->kegiatan->judul }}
                            </h3>
                            <p class="font-Opensans font-normal text-sm text-font-500">
                                {{ $kegiatan_terakhir->kegiatan->pelaksana }}</p>
                            <p class="font-Opensans font-normal text-sm text-font-500">
                                {{ date('d M Y', strtotime($kegiatan_terakhir->kegiatan->start)) . ' - ' . date('d M Y', strtotime($kegiatan_terakhir->kegiatan->end)) }}
                            </p>
                        </div>
                        <div class="footer flex space-x-3 mt-4">
                            <button type="button"
                                class="rounded-md font-Opensans px-3 font-semibold py-2 bg-appPrimary-500 text-white flex justify-center items-center place-self-end">
                                <iconify-icon icon="mingcute:print-line" class="text-xl mr-2"></iconify-icon>Cetak ID
                                Card</button>
                            <button type="button"
                                class="rounded-md font-Opensans px-3 font-semibold py-2 bg-appPrimary-500 text-white flex justify-center items-center place-self-end">
                                <iconify-icon icon="mingcute:print-line" class="text-xl mr-2"></iconify-icon>Cetak
                                Sertifikat</button>
                        </div>
                    </div>
                @else
                @endif

            </section>


            <section class="kegiatan_berjalan grid gap-5">
                <div class="px-3 py-2 rounded-md w-full bg-appPrimary-200/50 shadow-sm">
                    <h3 class="text-lg font-Opensans font-semibold text-font-900">Kegiatan Berlangsung</h3>
                </div>

                <div class="card border border-font-300">
                    <div class="card-body px-6">
                        <div class="overflow-x-auto -mx-6 dashcode-data-table">
                            <span class="col-span-8 hidden"></span>
                            <span class="col-span-4 hidden"></span>
                            <div class="inline-block min-w-full align-middle">
                                <div class="">
                                    <table
                                        class="min-w-full divide-y divide-slate-100 dark:divide-slate-700 data-table">
                                        <thead class="bg-appPrimary-100">
                                            <tr>
                                                <th scope="col" class="table-th">
                                                    Pelatihan
                                                </th>
                                                <th scope="col" class="table-th">
                                                    Waktu
                                                </th>
                                                <th scope="col" class="table-th">
                                                    Lokasi
                                                </th>
                                                <th scope="col" class="table-th">
                                                    Proses
                                                </th>
                                                <th scope="col" class="table-th">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <form method="POST" action={{ route('logout') }}
                    class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                      dark:text-white font-normal">
                    @csrf
                    <button type="submit" class="country-list flex items-start">
                        <iconify-icon class="text-lg text-textColor dark:text-white mr-2" icon="carbon:logout">
                        </iconify-icon>
                        <span class="dropdown-option">
                            @lang('Log Out')
                        </span>
                    </button>
                </form>
            </section>


        </div>
    </section>


    @push('scripts')
        <script type="module">
            var edit = '{!! route('kegiatan.details', ['id' => ':id']) !!}'
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('account') !!}',
                // dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
                paging: true,
                ordering: false,
                info: false,
                searching: false,
                pagingType: 'full_numbers',
                lengthChange: false,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    lengthMenu: "Show _MENU_",
                    paginate: {
                        previous: `<iconify-icon icon="heroicons:chevron-left-20-solid"></iconify-icon>`,
                        next: `<iconify-icon icon="heroicons:chevron-right-20-solid"></iconify-icon>`,
                        first: `<iconify-icon icon="heroicons:chevron-double-left-20-solid"></iconify-icon>`,
                        last: `<iconify-icon icon="heroicons:chevron-double-right-20-solid"></iconify-icon>`,
                    },
                    search: "Search:",
                },
                "columnDefs": [{
                        "searchable": false,
                        "targets": [-1]
                    },
                    {
                        "orderable": false,
                        "targets": [-1]
                    },
                    {
                        'className': 'table-td',
                        "targets": "_all"
                    }
                ],
                columns: [{
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        render: (data, type, row, meta) => {
                            return `
                            <span class="whitespace-nowrap lowercase">${moment(row.start, 'YYYY-MM-DD').format('DD')} - ${moment(row.end, 'YYYY-MM-DD').format('DD MMM YY')}</span>
                            `
                        }
                    },
                    {
                        data: 'pelaksana',
                    },
                    {
                        data: 'tempat',
                    },
                    {
                        render: (data, type, row, meta) => {
                            return `
                            <a href="${edit.replace(':id', row.id)}" class="btn bg-appPrimary-500 text-white">Daftar</a>
                        
                            `
                        }
                    },
                ],
            });
        </script>
    @endpush
</x-LayoutUser>
