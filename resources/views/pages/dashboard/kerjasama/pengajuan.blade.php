<x-LayoutApp>

    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Jenis Kerjasama</h4>
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
            var details = '{!! route('pengajuan.details', ['id' => ':id']) !!}';
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
                            return `<div>
                                      <div class="relative">
                                        <div class="dropdown relative">
                                          <button class="text-xl text-center block w-full " type="button" id="tableDropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                          </button>
                                          <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                  shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                            ${
                                                row.status == "wait" ? 
                                                `
                                                                                                                                                                                                                                                        <li>
                                                                                                                                                                                                                                                            <a href="#" id="btn-tolak" data-id="${row.id}" class="flex items-center text-slate-600 dark:text-white font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                                                                                                                                                                                                                <iconify-icon icon="uil:file-times" class="mr-2"></iconify-icon>
                                                                                                                                                                                                                                                                Tolak
                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                        </li>
                                                                                                                                                                                                                                                        <li>
                                                                                                                                                                                                                                                            <a href="#" id="btn-terima" data-id="${row.id}" class="flex items-center text-slate-600 dark:text-white font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                                                                                                                                                                                                                                <iconify-icon icon="tabler:file-like" class="mr-2"></iconify-icon>
                                                                                                                                                                                                                                                                Terima
                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                            </li>
                                                                                                                                                                                                                                        `
                                        : ""
                                            }
                                            <li>
                                              <a href="${details.replace(':id', row.id)}" class="flex items-center text-slate-600 dark:text-white font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                <iconify-icon icon="material-symbols:pageview-outline" class="mr-2"></iconify-icon>
                                                View/Edit
                                                </a>
                                            </li>
                                            <li>
                                              <a href="#" id="btn-delete" data-id="${row.id}" class="flex items-center text-slate-600 dark:text-white font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                <iconify-icon icon="material-symbols:delete-outline" class="mr-2"></iconify-icon>
                                                Hapus
                                                </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </td>`
                        }
                    },
                ],
            });

            // DELETE
            $(document).on('click', '#btn-terima', (e) => {
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

            $(document).on('click', '#btn-tolak', (e) => {
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
                    // if (result.isConfirmed) {
                    //     var url = '{!! route('pengajuan.reject', ['id' => ':id']) !!}';
                    //     url = url.replace(':id', id);
                    //     $.ajax({
                    //         url: url,
                    //         type: 'POST',
                    //         data: {
                    //             "_token": "{{ csrf_token() }}"
                    //         },
                    //         success: (msg) => {
                    //             if (msg.success) {
                    //                 Swal.fire(
                    //                     'Ditolak !',
                    //                     'Pengajuan Ditolak.',
                    //                     'success'
                    //                 ).then(() => {
                    //                     table.draw()
                    //                 })
                    //             }
                    //         }
                    //     })
                    // }
                })
            })

            $(document).on('click', '#btn-delete', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'hapus pengajuan.?',
                    text: "anda tidak dapat mengulang langkah ini",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, lanjutkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = '{!! route('pengajuan.destroy', ['id' => ':id']) !!}';
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: (msg) => {
                                if (msg.success) {
                                    Swal.fire(
                                        'Terhapus!',
                                        'Pengajuan Terhapus',
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
