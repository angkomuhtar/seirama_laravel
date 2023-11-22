(function ($) {
    $(".flatpickr.time").flatpickr({
        dateFormat: "Y-m-d",
    });

    var table = $("#data-table, .data-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: "admin/kegiatan",
        dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
        paging: true,
        ordering: true,
        info: false,
        searching: true,
        pagingType: "full_numbers",
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
        columnDefs: [
            {
                searchable: false,
                targets: [-1],
            },
            {
                orderable: false,
                targets: [-1],
            },
            {
                className: "table-td",
                targets: "_all",
            },
        ],
        columns: [
            {
                data: "judul",
                name: "judul",
            },
            {
                data: "kerjasama.nama",
            },
            {
                data: "pelaksana",
            },
            {
                data: "waktu",
            },
            {
                data: "tempat",
            },
            {
                data: "pengajar",
            },
            {
                data: "instansi",
            },
            {
                data: "sarana",
            },
            {
                data: "peserta",
            },
            {
                data: "id",
                name: "action",
                render: (data, type, row, meta) => {
                    return `<div class="flex space-x-3 rtl:space-x-reverse">
        <button class="action-btn toolTip onTop cursor-pointer" data-tippy-content="Edit" id="btn-edit" data-id="${row.id}" data-tippy-theme="primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
          <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
        </button>
        <button class="action-btn toolTip onTop cursor-pointer" data-tippy-content="Hapus" id="btn-delete" data-id="${row.id}" data-tippy-theme="danger">
          <iconify-icon icon="heroicons:trash"></iconify-icon>
        </button>
      </div>`;
                },
            },
        ],
    });
});
