<x-LayoutApp>

    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Kegiatan akan datang</h4>
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
                                                Jenis Kerjasama
                                            </th>
                                            <th scope="col" class="table-th">
                                                Pelaksana
                                            </th>
                                            <th scope="col" class="table-th">
                                                Waktu
                                            </th>
                                            <th scope="col" class="table-th">
                                                Tempat
                                            </th>
                                            <th scope="col" class="table-th">
                                                Pengajar
                                            </th>
                                            <th scope="col" class="table-th">
                                                Instansi
                                            </th>
                                            <th scope="col" class="table-th">
                                                Sarana
                                            </th>
                                            <th scope="col" class="table-th">
                                                Peserta
                                            </th>
                                            <th scope="col" class="table-th">
                                                Jenis Peserta
                                            </th>
                                            <th scope="col" class="table-th">
                                                Sertifikat
                                            </th>
                                            <th scope="col" class="table-th">
                                                Action
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


            var path_peserta = '{!! route('admin.kegiatan.peserta', ['id' => ':id']) !!}';
            var path_cert = '{!! route('admin.kegiatan.sertifikat.edit', ['id' => ':id']) !!}';
            var add_cert = '{!! route('admin.kegiatan.sertifikat.add', ['id' => ':id']) !!}';
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.kegiatan.akan_datang') !!}',
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
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'kerjasama.nama',
                    },
                    {
                        data: 'pelaksana',
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
                        data: 'tempat',
                    },
                    {
                        data: 'pengajar',
                    },
                    {
                        data: 'instansi',
                    },
                    {
                        data: 'sarana',
                    },
                    {
                        render: (data, type, row, meta) => {

                            return `<a href="${path_peserta.replace(':id', row.id)}" target="_blank" class="btn btn-sm inline-flex justify-center btn-outline-danger">
                                            <span class="flex items-center">
                                                <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons:eye"></iconify-icon>
                                                <span>${row.total_peserta + '/' + (data ?? '0')}</span>
                                            </span>
                                        </a>`

                        }
                    },
                    {
                        data: 'type_peserta',
                    },
                    {
                        render: (data, type, row, meta) => {
                            if (row.sertifikat == null) {
                                return `<a href="${add_cert.replace(':id', row.id)}" class="btn btn-sm inline-flex justify-center btn-outline-danger">
                                        <span class="flex items-center">
                                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons:plus"></iconify-icon>
                                        <span>Tambah</span>
                                        </span>
                                        </a>`
                            } else {
                                return `<a href="${path_cert.replace(':id', row.id)}" class="btn btn-sm inline-flex justify-center btn-outline-danger">
                                        <span class="flex items-center">
                                            <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons:eye"></iconify-icon>
                                            <span>preview</span>
                                        </span>
                                    </a>`
                            }
                        }
                    },
                    {
                        data: 'id',
                        name: 'action',
                        render: (data, type, row, meta) => {
                            return `<div class="flex space-x-3 rtl:space-x-reverse">
                <button class="action-btn toolTip onTop cursor-pointer" data-tippy-content="Edit" id="btn-edit" data-id="${row.id}" data-tippy-theme="primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
                  <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                </button>
                <button class="action-btn toolTip onTop cursor-pointer" data-tippy-content="Hapus" id="btn-delete" data-id="${row.id}" data-tippy-theme="danger">
                  <iconify-icon icon="heroicons:trash"></iconify-icon>
                </button>
              </div>`
                        }
                    },
                ],
            });

            //CREATE
            $(document).on('click', '#btn-add', () => {
                $("#sending_form")[0].reset();
                $("#sending_form").data("type", "submit");
            })

            // STORE & UPDATE
            $(document).on('submit', '#sending_form', (e) => {
                e.preventDefault();
                var type = $("#sending_form").data('type');
                var data = $('#sending_form').serializeArray();
                var id = $("#sending_form").find("input[name='id']").val()
                var url = type == 'submit' ? '{!! route('admin.kegiatan.store') !!}' : '{!! route('admin.kegiatan.update', ['id' => ':id']) !!}';
                $.ajax({
                    type: "post",
                    url: url.replace(':id', id),
                    data: data,
                    beforeSend: () => {
                        $('.error-message').removeClass('inline-block').addClass('hidden').html('')
                    },
                    success: ({
                        success,
                        message
                    }) => {
                        if (success) {
                            console.log(data);
                            Swal.fire({
                                title: 'success',
                                text: message,
                                icon: 'success',
                                confirmButtonText: 'Oke'
                            }).then(() => {
                                table.draw()
                                $("#btn_cancel").click();
                            })
                        }
                    },
                    error: function(request) {
                        const {
                            status,
                            responseJSON
                        } = request;
                        // for validation
                        if (status == 422) {
                            $.each(responseJSON.error, (index, value) => {
                                var err_msg = $(`[name='${index}']`).parent().parent().find(
                                    '.error-message');
                                $(err_msg).removeClass('hidden').addClass('inline-block').html(
                                    value[
                                        0]);
                            })
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Internal Error',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                });

            })

            // EDIT
            $(document).on('click', '#btn-edit', (e) => {
                $("#sending_form").data("type", "update");
                var id = $(e.currentTarget).data('id');
                var url = '{!! route('admin.kegiatan.edit', ['id' => ':id']) !!}';
                url = url.replace(':id', id);
                // alert(id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: (msg) => {
                        $.each(msg.data, (index, value) => {
                            $(`[name='${index}']`).val(value);
                        })
                    }
                })
            })

            // DELETE
            $(document).on('click', '#btn-delete', (e) => {
                var id = $(e.currentTarget).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = '{!! route('admin.kegiatan.destroy', ['id' => ':id']) !!}';
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
                                        'Deleted!',
                                        'Your file has been deleted.',
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

            $(document).on('change', 'select[name="type"]', (e) => {
                // alert(e.val())
                console.log();

                if (e.currentTarget.value == 'date') {
                    $("input[name='start']").prop('required', true);
                    $("input[name='end']").prop('required', true);
                } else {
                    $("input[name='start']").prop('required', false);
                    $("input[name='end']").prop('required', false);
                }
            })
        </script>
    @endpush
</x-LayoutApp>
