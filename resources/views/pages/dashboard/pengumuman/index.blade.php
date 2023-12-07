<x-LayoutApp>
    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96"
        tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
        <div
            class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300 dark:border-b-slate-900">
            <div>
                <h3 class="block text-xl font-Inter text-slate-900 capitalize font-medium dark:text-[#eee]">
                    Pengumuman
                </h3>
            </div>
            <button type="button"
                class="box-content text-2xl w-4 h-4 p-2 pt-0 -my-5 -mr-2 text-black dark:text-white border-none rounded-none opacity-100 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="offcanvas">
                <iconify-icon icon="line-md:close"></iconify-icon>
            </button>
        </div>
        <div class="offcanvas-body flex-grow overflow-y-auto">
            <div class="settings-modal">
                <div class="divider"></div>
                <div class="p-6">
                    <form class="space-y-4" id="sending_form">
                        <input type="hidden" name="id" id="id" value="">
                        @csrf
                        <div class="input-area relative has-error" id="judul-box">
                            <label for="largeInput" class="form-label">judul</label>
                            <div class="relative">
                                <input type="text" name="judul" class="form-control !pl-9" placeholder="Judul"
                                    error="test">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area" id="images-box">
                            <label for="description" class="form-label">Image</label>
                            <div class="filePreview">
                                <label>
                                    <input type="file" class=" w-full hidden" name="images">
                                    <span class="w-full h-[40px] file-control flex items-center custom-class">
                                        <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                            <span id="placeholder" class="text-slate-400 display-name">Choose a file or
                                                drop it
                                                here...</span>
                                        </span>
                                        <span
                                            class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                    </span>
                                </label>
                                {{-- <div id="preview"
                                    class="relative w-full aspect-[4/2.5] justify-self-center border border-slate-200 mt-5 overflow-hidden rounded-md">
                                    <img src="" alt="" class=" object-cover absolute h-full w-full">
                                </div> --}}
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="reset" id="btn_cancel" data-bs-dismiss="offcanvas"
                                class="btn btn-sm btn-outline-danger inline-flex justify-center btn-dark">Batal</button>
                            <button type="submit"
                                class="btn btn-sm inline-flex justify-center btn-dark">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Pengumuman</h4>
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
                                                Judul
                                            </th>
                                            <th scope="col" class="table-th">
                                                File
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
        @vite(['resources/js/plugins/dropzone.min.js'])
        @vite(['resources/js/plugins/flatpickr.js'])
        <script type="module">
            $(".flatpickr.time").flatpickr({
                dateFormat: "Y-m-d"
            });

            $(document).on('change', 'input[name=images]', function() {
                const file = this.files[0];
                $('.display-name').html(file.name)
                if (file) {
                    var filename = ''
                }
                if ((["jpeg", "jpg", "png"]).includes((file?.name).split('.')[(file?.name).split('.').length - 1])) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#preview>img")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    $(".err-file").removeClass('hidden').html('file error : terlalu besar atau type tidak sesuai');
                }
            })

            var path = '{!! asset('storage') !!}';
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.pengumuman') !!}',
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
                    },
                    {
                        data: 'file',
                        render: (data, type, row, meta) => {
                            return `<span class="justify-self-center flex justify-center items-center">
                                    <a href="#" class="text-blue-500" target="_blank" > lihat File</a>
                                </span>`
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
            $(document).on('submit', '#sending_form', function(e) {
                e.preventDefault();
                var type = $("#sending_form").data('type');
                var data = new FormData(this);
                console.log(this);
                data.append('images', $('input[name=images]')[0].files[0]);
                var id = $("#sending_form").find("input[name='id']").val()
                var url = type == 'submit' ? '{!! route('admin.pengumuman.store') !!}' : '{!! route('admin.pengumuman.update', ['id' => ':id']) !!}';
                $.ajax({
                    contentType: false,
                    processData: false,
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
                                var err_msg = $(`#${index}-box`).find(
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
                var url = '{!! route('admin.pengumuman.edit', ['id' => ':id']) !!}';
                var path = '{!! asset('storage') !!}';
                url = url.replace(':id', id);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: (msg) => {
                        // console.log(msg.data.file);
                        $.each(msg.data, (index, value) => {
                            console.log(value);
                            if (index == 'file') {
                                $('.display-name').html(msg.data.file)
                            }
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
                        var url = '{!! route('admin.pengumuman.destroy', ['id' => ':id']) !!}';
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
        </script>
    @endpush
</x-LayoutApp>
