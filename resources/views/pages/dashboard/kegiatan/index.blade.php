<x-LayoutApp>
    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96"
        tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
        <div
            class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300 dark:border-b-slate-900">
            <div>
                <h3 class="block text-xl font-Inter text-slate-900 capitalize font-medium dark:text-[#eee]">
                    Kegiatan baru
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
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Nama Kegiatan</label>
                            <div class="relative">
                                <input type="text" name="judul" class="form-control !pl-9"
                                    placeholder="Nama Kegiatan" error="test">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label capitalize">Jenis Kerjasama</label>
                            <div class="relative">
                                <select id="select" class="form-control !pl-9" name="kerjasama_id">
                                    <option selected disabled class="dark:bg-slate-700 text-slate-300">Pilih Data
                                    </option>
                                    @foreach ($kerjasama as $item)
                                        <option value="{{ $item->id }}" class="dark:bg-slate-700">
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <iconify-icon icon="heroicons:globe-alt"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Pelaksana</label>
                            <div class="relative">
                                <input type="text" name="pelaksana" class="form-control !pl-9"
                                    placeholder="Pelaksana Kegiatan">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label capitalize">Jenis Peserta</label>
                            <div class="relative">
                                <select id="select" class="form-control !pl-9" name="type_peserta">
                                    <option selected disabled class="dark:bg-slate-700 text-slate-300">Pilih Data
                                    </option>
                                    <option value="ASN" class="dark:bg-slate-700">Aparatur</option>
                                    <option value="Non-ASN" class="dark:bg-slate-700">Non Aparatur</option>
                                </select>
                                <iconify-icon icon="heroicons:globe-alt"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Waktu</label>
                            <div class="flex justify-between items-center space-x-3">
                                <div class="relative">
                                    <input class="form-control py-2 flatpickr time flatpickr-input active !pl-9"
                                        id="time-picker" name="start" placeholder="Waktu Pelaksanaan" value=""
                                        type="text" readonly="readonly">
                                    <iconify-icon icon="heroicons:globe-alt"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                                </div>
                                <div class="relative">
                                    <input class="form-control py-2 flatpickr time flatpickr-input active !pl-9"
                                        id="time-picker" name="end" placeholder="Waktu Pelaksanaan" value=""
                                        type="text" readonly="readonly">
                                    <iconify-icon icon="heroicons:globe-alt"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                                </div>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">tempat</label>
                            <div class="relative">
                                <input type="text" name="tempat" class="form-control !pl-9"
                                    placeholder="Tempat Kegiatan">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Pengajar</label>
                            <div class="relative">
                                <input type="text" name="pengajar" class="form-control !pl-9"
                                    placeholder="Pengajar">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">instansi</label>
                            <div class="relative">
                                <input type="text" name="instansi" class="form-control !pl-9"
                                    placeholder="Instansi">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Sarana</label>
                            <div class="relative">
                                <input type="text" name="sarana" class="form-control !pl-9"
                                    placeholder="Sarana Kegiatan">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Peserta</label>
                            <div class="relative">
                                <input type="number" name="peserta" class="form-control !pl-9"
                                    placeholder="Peserta Kegiatan">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Nomor MOU</label>
                            <div class="relative">
                                <input type="text" name="no_mou" class="form-control !pl-9"
                                    placeholder="Nomor MOU">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Lampiran Mou</label>
                            <div class="filePreview">
                                <label>
                                    <input type="file" class=" w-full hidden" name="mou">
                                    <span class="w-full h-[40px] file-control flex items-center custom-class">
                                        <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                            <span id="filename" class="text-slate-400 display-name">Choose a
                                                file</span>
                                        </span>
                                        <span
                                            class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Cakupan Kerjasama</label>
                            <div class="relative">
                                <input type="text" name="cakupan_kerjasama" class="form-control !pl-9"
                                    placeholder="Cakupan Kerjasama">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Sumber Pembiayaan</label>
                            <div class="relative">
                                <input type="text" name="sumber_dana" class="form-control !pl-9"
                                    placeholder="Sumber Pembiayaan">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Sasaran Kerjasama</label>
                            <div class="relative">
                                <input type="text" name="sasaran_kerjasama" class="form-control !pl-9"
                                    placeholder="Sasaran Kerjasama">
                                <iconify-icon icon="icon-park-outline:data-user"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
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

    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96"
        tabindex="-1" id="export" aria-labelledby="export">
        <div
            class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300 dark:border-b-slate-900">
            <div>
                <h3 class="block text-xl font-Inter text-slate-900 capitalize font-medium dark:text-[#eee]">
                    Export Kegiatan
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
                    <form class="space-y-4" id="export_form" method="POST"
                        action="{{ route('admin.kegiatan.export') }}">
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label capitalize">Export By</label>
                            <div class="relative">
                                <select id="select" class="form-control !pl-9" name="type" required>
                                    <option selected value="" disabled class="dark:bg-slate-700 text-slate-300">
                                        Pilih Data
                                    </option>
                                    <option value="monthly" class="dark:bg-slate-700">Bulan Ini</option>
                                    <option value="date" class="dark:bg-slate-700">Tanggal</option>
                                </select>
                                <iconify-icon icon="heroicons:globe-alt"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Waktu</label>
                            <div class="flex justify-between items-center space-x-3">
                                <div class="relative">
                                    <input class="form-control py-2 flatpickr time flatpickr-input active !pl-9"
                                        id="time-picker" name="start" placeholder="Waktu Pelaksanaan"
                                        value="" type="text" readonly="readonly">
                                    <iconify-icon icon="heroicons:globe-alt"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                                </div>
                                <div class="relative">
                                    <input class="form-control py-2 flatpickr time flatpickr-input active !pl-9"
                                        id="time-picker" name="end" placeholder="Waktu Pelaksanaan"
                                        value="" type="text" readonly="readonly">
                                    <iconify-icon icon="heroicons:globe-alt"
                                        class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                                </div>
                            </div>
                            <span
                                class="font-Opensans text-xs text-danger-500 pt-1 hidden error-message capitalize">This
                                is invalid
                                state.</span>
                        </div>
                        <div class="flex justify-end space-x-3">
                            {{-- <button type="reset" id="btn_cancel" data-bs-dismiss="offcanvas"
                                class="btn btn-sm btn-outline-danger inline-flex justify-center btn-dark">Batal</button> --}}
                            <button type="submit"
                                class="btn btn-sm inline-flex justify-center btn-dark">Export</button>
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
                    <h4 class="card-title">Kegiatan</h4>
                    <div class="flex items-center space-x-2">
                        <button data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas"
                            class="btn btn-sm inline-flex justify-center btn-primary" id="btn-add">
                            <span class="flex items-center">
                                <span>Tambah Data</span>
                                <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2"
                                    icon="mdi:database-plus-outline"></iconify-icon>
                            </span>
                        </button>
                        <button data-bs-toggle="offcanvas" data-bs-target="#export" aria-controls="export"
                            class="btn btn-sm inline-flex justify-center btn-primary" id="btn-add">
                            <span class="flex items-center">
                                <span>Export Data</span>
                                <iconify-icon class="text-xl ltr:ml-2 rtl:mr-2"
                                    icon="mdi:database-plus-outline"></iconify-icon>
                            </span>
                        </button>
                    </div>
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
                                                Instansi
                                            </th>
                                            <th scope="col" class="table-th">
                                                Peserta
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
            var url_edit = '{!! route('admin.kegiatan.show', ['id' => ':id']) !!}';
            var table = $("#data-table, .data-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.kegiatan') !!}',
                dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
                paging: true,
                ordering: false,
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
                        data: 'instansi',
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
                <a href="${url_edit.replace(':id', row.id)}" class="action-btn toolTip onTop cursor-pointer" >
                  <iconify-icon icon="heroicons:eye"></iconify-icon>
                </a>
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
                data.append('mou', $('input[name=mou]')[0].files[0])
                var id = $("#sending_form").find("input[name='id']").val()
                var url = type == 'submit' ? '{!! route('admin.kegiatan.store') !!}' : '{!! route('admin.kegiatan.update', ['id' => ':id']) !!}';
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
                            if (index == 'mou') {
                                $("#filename").html(value)
                            } else {
                                $(`[name='${index}']`).val(value);
                            }
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
