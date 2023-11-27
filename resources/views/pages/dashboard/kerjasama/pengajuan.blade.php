<x-LayoutApp>

    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Jenis Kerjasama</h4>
                    <button data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"
                        class="btn btn-sm inline-flex justify-center btn-primary" id="btn-add">
                        <span class="flex items-center">
                            <span>Tambah Data</span>
                            <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2"
                                icon="mdi:database-plus-outline"></iconify-icon>
                        </span>
                    </button>
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
                                                Nama Kegiatan
                                            </th>
                                            <th scope="col" class="table-th">
                                                instansi
                                            </th>
                                            <th scope="col" class="table-th">
                                                lokasi
                                            </th>
                                            <th scope="col" class="table-th">
                                                waktu
                                            </th>
                                            <th scope="col" class="table-th">
                                                surat
                                            </th>
                                            <th scope="col" class="table-th">
                                                users
                                            </th>
                                            <th scope="col" class="table-th">
                                                Status
                                            </th>
                                            <th scope="col" class="table-th">
                                                action
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
        @vite(['resources/js/plugins/dropzone.min.js'])
        @vite(['resources/js/plugins/flatpickr.js'])
        <script type="module">
            Dropzone.autoDiscover = false;
            $("#myUploader").dropzone({
                url: "/",
                dictDefaultMessage: "",
                addRemoveLinks: true,
            });
            $(".flatpickr.time").flatpickr({
                dateFormat: "Y-m-d"
            });


            // console.log('{!! asset('') !!}');
            var path = '{!! asset('surat_kerjasama/') !!}';
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('pengajuan') !!}',
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
                        data: 'nm_kegiatan',
                    },
                    {
                        data: 'instansi',
                    },
                    {
                        data: 'lokasi',
                    },
                    {
                        render: (data, type, row, meta) => {
                            return `
                            <span class="whitespace-nowrap">${moment(row.start, 'YYYY-MM-DD').format('DD-MM-YYYY')}</span>
                            <span class="whitespace-nowrap">${moment(row.end, 'YYYY-MM-DD').format('DD-MM-YYYY')}</span>
                            `
                        }
                    },
                    {
                        render: (data, type, row, meta) => {
                            return `
                            <a href="${path+'/'+row.surat}" target="_blank" class="text-blue-500 text-xs font-Opensans">
                                lihat dokumen
                            </a>
                            `
                        }
                    },
                    {
                        data: 'user.profile.nama',
                    },
                    {
                        data: 'status',
                        render: (data) => {
                            if (data == 'wait') {
                                return `<span class="badge bg-secondary-500 text-white capitalize inline-flex items-center">
                                            <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="mdi:file-check"></iconify-icon>menunggu</span>`
                            } else if (data == 'accept') {
                                return `<span class="badge bg-success-500 text-white capitalize inline-flex items-center">
                                            <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="mdi:file-check"></iconify-icon>diterima</span>`
                            } else if (data == 'reject') {
                                return `<span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                            <iconify-icon class="ltr:mr-1 rtl:ml-1" icon="mdi:file-check"></iconify-icon>ditolak</span>`
                            }
                        }
                    },
                    {
                        data: 'id',
                        name: 'action',
                        render: (data, type, row, meta) => {
                            if (row.status == 'wait') {
                                return `<div class="flex space-x-3 rtl:space-x-reverse">
                                            <button class="action-btn btn-danger toolTip onTop cursor-pointer" data-tippy-content="Edit" id="btn-edit" data-id="${row.id}" data-tippy-theme="primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
                                            <iconify-icon icon="uil:file-times"></iconify-icon>
                                            </button>
                                            <button class="action-btn btn-success toolTip onTop cursor-pointer" data-tippy-content="Hapus" id="btn-delete" data-id="${row.id}" data-tippy-theme="danger">
                                            <iconify-icon icon="tabler:file-like"></iconify-icon>
                                            </button>
                                        </div>`
                            } else {
                                return 'No Action'
                            }
                        }
                    },
                ],
            });

            // DELETE
            $(document).on('click', '#btn-delete', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'terima pengajuan.?',
                    text: "anda tidak dapat mngulang langkah ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, lanjutkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = '{!! route('pengajuan.accept', ['id' => ':id']) !!}';
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: (msg) => {
                                if (msg.success) {
                                    Swal.fire(
                                        'Diterima!',
                                        'Pengajuan diterima dan kegiatan telah dibuat.',
                                        'success'
                                    ).then(() => {
                                        table.draw()
                                    })
                                }
                            }
                        })
                    }
                })
            })

            $(document).on('click', '#btn-edit', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'Tolak pengajuan.?',
                    text: "anda tidak dapat mengulang langkah ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, lanjutkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = '{!! route('pengajuan.reject', ['id' => ':id']) !!}';
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: (msg) => {
                                if (msg.success) {
                                    Swal.fire(
                                        'Ditolak !',
                                        'Pengajuan Ditolak.',
                                        'success'
                                    ).then(() => {
                                        table.draw()
                                    })
                                }
                            }
                        })
                    }
                })
            })
        </script>
    @endpush
</x-LayoutApp>
