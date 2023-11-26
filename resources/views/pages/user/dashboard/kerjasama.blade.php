<x-LayoutUser>
    <div class="h-20"></div>


    <section class='container py-14 grid lg:grid-cols-5 grid-cols-4 gap-7'>
        <x-user.user-sidebar />
        <div class="col-span-4 grid gap-8 place-self-start w-full">
            <section class="kegiatan_berjalan grid gap-5">
                <div
                    class="px-3 py-4 rounded-md w-full border-appPrimary-200 shadow-sm flex justify-between items-center">
                    <h3 class="text-lg font-Opensans font-semibold text-font-900">Kerjasama Instansi</h3>
                    <a href="{{ route('user_kerjasama.create') }}"
                        class="py-3 px-4 rounded-md 
            bg-appPrimary-500 align-middle text-center 
            font-Opensans font-bold text-white text-sm">
                        Ajukan Kerjasama Instansi</a>
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
                                                    Nama Kegiatan
                                                </th>
                                                <th scope="col" class="table-th">
                                                    Nama Instansi
                                                </th>
                                                <th scope="col" class="table-th">
                                                    Waktu
                                                </th>
                                                <th scope="col" class="table-th">
                                                    Jenis Kerjasama
                                                </th>

                                                <th scope="col" class="table-th">
                                                    Kontak
                                                </th>

                                                <th scope="col" class="table-th">
                                                    Lokasi Pelaksanaan
                                                </th>
                                                <th scope="col" class="table-th">
                                                    Status
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
        </div>
    </section>


    @push('scripts')
        <script type="module">
            var edit = '{!! route('kegiatan.details', ['id' => ':id']) !!}'
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('user_kerjasama') !!}',
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
                        data: 'nm_kegiatan',
                    }, {
                        data: 'instansi',
                    }, {
                        render: (data, type, row, meta) => {
                            return `
                    <span class="whitespace-nowrap lowercase">${moment(row.start, 'YYYY-MM-DD').format('DD')} - ${moment(row.end, 'YYYY-MM-DD').format('DD MMM YY')}</span>
                    `
                        }
                    }, {
                        data: 'jenis_kerjasama.nama',
                    }, {
                        data: 'cp',
                    }, {
                        data: 'lokasi',
                    }, {
                        data: 'status',
                        render: (data) => {
                            if (data == 'wait') {
                                return `
                                <span class="badge bg-secondary-500 text-white capitalize inline-flex items-center">
                                    <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="material-symbols-light:inactive-order"></iconify-icon>menunggu
                                </span>
                                `
                            } else if (data == 'accept') {
                                return `
                                <span class="badge bg-success-500 text-white capitalize inline-flex items-center">
                                    <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="material-symbols-light:order-approve"></iconify-icon>diterima
                                </span>
                                `
                            } else if (data == 'reject') {
                                return `
                                <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                    <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="material-symbols-light:inactive-order""></iconify-icon> ditolak
                                </span>
                                `
                            }
                        }
                    },
                    {
                        render: (data, type, row, meta) => {
                            return ''
                            // return `
                    // <a href="${edit.replace(':id', row.id)}" class="btn btn-primary btn-sm text-white">Cek Data</a>
                    // `
                        }
                    },
                ],
            });
        </script>
    @endpush
</x-LayoutUser>
