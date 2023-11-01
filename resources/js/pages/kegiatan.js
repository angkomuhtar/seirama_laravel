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

// $(document).on('submit', '#sending_form', (e) => {
//     e.preventDefault();
//     var type = $("#sending_form").data('type');
//     var data = $('#sending_form').serializeArray();
//     var id = $("#sending_form").find("input[name='id']").val()
//     var url = type == 'submit' ? '{!! route('kegiatan.store') !!}' : '{!! route('masters.division.update', ['id' => ':id']) !!}';
//     $.ajax({
//         type: "post",
//         url: url.replace(':id', id),
//         data: data,
//         beforeSend: () => {
//             $('.error-message').removeClass('inline-block').addClass('hidden').html('')
//         },
//         success: ({
//             success,
//             data
//         }) => {
//             if (success) {
//                 // if (currentStep < steps.length - 1) {
//                 //     currentStep++;
//                 //     updateStep("next");
//                 // }
//             }
//         },
//         error: function(request) {
//             const {
//                 status,
//                 responseJSON
//             } = request;
//             $.each(responseJSON.error, (index, value) => {
//                 var err_msg = $(`[name='${index}']`).parent().parent().find(
//                     '.error-message');
//                 $(err_msg).removeClass('hidden').addClass('inline-block').html(value[
//                     0]);
//                 // $(errDiv).show();
//                 // $(errDiv).html(value[0])
//                 // console.log(errDiv);
//             })
//         }
//     });
//     // $.post(url.replace(':id', id), data)
//     //     .done(function(msg) {
//     //         console.log(msg);
//     //         if (!msg.success) {
//     //             Swal.fire({
//     //                 title: 'Error',
//     //                 text: 'data belum lengkap',
//     //                 icon: 'error',
//     //                 confirmButtonText: 'Oke'
//     //             })
//     //         } else {
//     //             Swal.fire({
//     //                 title: 'success',
//     //                 text: msg.message,
//     //                 icon: 'success',
//     //                 confirmButtonText: 'Oke'
//     //             }).then(() => {
//     //                 table.draw()
//     //                 $("#btn_cancel").click();
//     //             })
//     //         }
//     //     })
//     //     .fail(function(err) {

//     //         // const {
//     //         //     status,
//     //         //     responseJson
//     //         // } = xhr;
//     //         console.log(err);
//     //         // if (xhr.status == 422) {
//     //         //     var errDiv = $(`[name='${index}']`).parent().find('.error-message');
//     //         //     console.log(errDiv);
//     //         // }
//     //         // Swal.fire({
//     //         //     title: 'Error!',
//     //         //     text: 'Internal Error',
//     //         //     icon: 'error',
//     //         //     confirmButtonText: 'OK'
//     //         // })
//     //     });
// })

// $(document).on('click', '#btn-add', () => {
//     $("#sending_form").data("type", "submit");
// })
