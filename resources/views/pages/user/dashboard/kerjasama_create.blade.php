<x-LayoutUser>
    <div class="h-20"></div>
    <section class='container py-14 grid lg:grid-cols-5 grid-cols-4 gap-7'>
        <x-user.user-sidebar />
        <div class="col-span-4 grid gap-5 place-self-start w-full">
            <div class="px-3 py-2 rounded-md w-full bg-appPrimary-200/50 shadow-sm">
                <h3 class="text-lg font-Opensans font-semibold text-font-900">Pengajuan Kerjasama</h3>
            </div>

            <div class="grid">
                <form class="space-y-4" id="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="user_id" value="{{ auth()->guard('web')->user()->id }}" />
                    <div class="grid md:grid-cols-2 gap-7">
                        <div class="flex flex-col">
                            <label for="name"
                                class="font-Opensans font-light text-sm mb-2 capitalize">Instansi</label>
                            <input type="text" name="instansi" placeholder="Masukkan Instansi Anda"
                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                This
                                is
                                invalid state.</div>
                        </div>
                        <div class="flex flex-col">
                            <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Jenis
                                Kerjasama</label>
                            <select type="text" name="kerjasama_id"
                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                <option value="">Pilih Jenis Kejasama</option>
                                @foreach ($kerjasama as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach

                            </select>
                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                This
                                is
                                invalid state.</div>
                        </div>
                        <div class="flex flex-col">
                            <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Nama
                                Kegiatan</label>
                            <input type="text" name="nm_kegiatan" placeholder="Masukkan Nama Kegiatan"
                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                This
                                is
                                invalid state.</div>
                        </div>
                        <div class="flex flex-col">
                            <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Lokasi
                                Kegiatan</label>
                            <input type="text" name="lokasi" placeholder="Masukkan Lokasi Kegiatan"
                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                This
                                is
                                invalid state.</div>
                        </div>
                        <div class="flex flex-col">
                            <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Contact
                                Person</label>
                            <input type="text" name="cp" placeholder="Contact Person"
                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                This
                                is
                                invalid state.</div>
                        </div>
                        <div class="flex flex-col">
                            <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Tanggal
                                Pelaksanaan</label>
                            <input type="text" name="tanggal" placeholder="Contact Person"
                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs flatpickr time">
                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                This
                                is
                                invalid state.</div>
                        </div>
                        <div class="flex flex-col">
                            <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Document
                                Pendukung</label>
                            <div
                                class="w-full text-center border-dashed border border-secondary-500 rounded-md py-10 flex justify-center items-center">
                                <div class="dz-default dz-message">
                                    <input type="file" name="file" class="hidden" id="file"
                                        accept="image/png, image/jpeg, .pdf, .doc, .docx, .xlsx ">
                                    <button class="dz-button" type="button" id="btn-file">
                                        <img src="{{ asset('images/upload.svg') }}" alt=""
                                            class="mx-auto mb-4 max-w-[150px] rounded-md">
                                        <p class="text-sm text-slate-500 dark:text-slate-300">click to upload.</p>
                                    </button>
                                </div>
                            </div>
                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden err-file">
                                Harus diisi</div>
                        </div>


                    </div>
                    <div class="flex justify-end pt-5">
                        <button type="submit" class="btn bg-appPrimary-500 text-white">
                            Kirim Pengajuan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>



    @push('scripts')
        @vite(['resources/js/plugins/dropzone.min.js'])
        @vite(['resources/js/plugins/flatpickr.js'])
        <script type="module">
            $(document).on("click", "#btn-file", function() {
                $("#file").click()
            })
            $(".flatpickr.time").flatpickr({
                dateFormat: "Y-m-d",
                mode: "range",
                minDate: "today",
            });

            $(document).on('change', '#file', function() {
                console.log(this);
                console.log($("#file")[0]);
                const file = this.files[0];
                if (file) {
                    var filename = ''
                }
                if ((["jpeg", "jpg", "png"]).includes((file?.name).split('.')[(file?.name).split('.').length - 1])) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#btn-file>img")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                } else if ((["doc", "docx", "pdf"]).includes((file?.name).split('.')[(file?.name).split('.').length -
                        1])) {
                    var imageUrl = '{!! asset('images/document.svg') !!}';
                    $("#btn-file>img")
                        .attr("src", imageUrl);
                } else {
                    $(".err-file").removeClass('hidden').html('file error : terlalu besar atau type tidak sesuai');
                }
            })


            $(document).on("submit", "#form", function(e) {
                e.preventDefault();
                var Formdata = new FormData(this);
                var file = $('#file')[0];
                Formdata.append('surat', $('#file')[0].files[0]);
                $.ajax({
                    processData: false,
                    contentType: false,
                    type: "post",
                    url: '{!! route('user_kerjasama.post') !!}',
                    data: Formdata,
                    beforeSend: () => {
                        $('.error-message').addClass('hidden').html('')
                    },
                    success: ({
                        success,
                        message
                    }) => {
                        if (success) {
                            Swal.fire({
                                title: 'success',
                                text: message,
                                icon: 'success',
                                confirmButtonText: 'Oke'
                            }).then(() => {
                                window.location.href = '{!! route('account') !!}';
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
                                if (index == 'surat') {
                                    $(".err-file").removeClass('hidden').html(value[0]);
                                } else {
                                    var err_msg = $(`[name='${index}']`).parent()
                                        .find('.error-message');
                                    $(err_msg).removeClass('hidden').html(value[0]);
                                }
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
        </script>
    @endpush
</x-LayoutUser>
