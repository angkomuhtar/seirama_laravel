<x-LayoutApp>
    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Peserta Kegiatan</h4>
                </header>
                <div class="card-body px-6 pb-6">
                    <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class="col-span-8 hidden"></span>
                        <span class="col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-slate-100 dark:divide-slate-700 data-table">
                                    <thead class="bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class="table-th">
                                                Nama Peserta
                                            </th>
                                            <th scope="col" class="table-th">
                                                Alamat
                                            </th>
                                            <th scope="col" class="table-th">
                                                Telp
                                            </th>
                                            <th scope="col" class="table-th">
                                                Instansi
                                            </th>
                                            <th scope="col" class="table-th">
                                                Jabatan
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
        </div>
    </div>



    @push('scripts')
        @vite(['resources/js/plugins/flatpickr.js'])
        <script type="module">
            $(".flatpickr.time").flatpickr({
                dateFormat: "Y-m-d"
            });

            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.kegiatan.peserta', ['id' => $id]) !!}',
                dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
                paging: true,
                ordering: true,
                info: false,
                searching: true,
                pagingType: 'full_numbers',
                lengthChange: true,
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
                        data: 'user.profile.nama',
                    },
                    {
                        data: 'user.profile.alamat',
                    },
                    {
                        data: 'user.profile.telp',
                    },
                    {
                        render: (data, type, row, meta) => {
                            if (row.user.user_data) {
                                return row.user.user_data.nama_kt
                            } else if (row.user.asn_data) {
                                return row.user.asn_data.unit_kerja
                            } else {
                                return ''
                            }
                        }
                    },
                    {
                        render: (data, type, row, meta) => {
                            if (row.user.user_data) {
                                return row.user.user_data.jabatan
                            } else if (row.user.asn_data) {
                                return row.user.asn_data.jabatan
                            } else {
                                return ''
                            }
                        }
                    },
                ],
            });
        </script>
    @endpush
</x-LayoutApp>
