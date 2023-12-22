<x-LayoutApp>

    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <header class="card-header noborder">
                    <h4 class="card-title">Berita Baru</h4>
                </header>
                <div class="card-body px-6 pb-6">
                    <div class="p-6">
                        <form enctype="multipart/form-data" class="grid md:grid-cols-2 gap-8" method="POST"
                            action={{ route('admin.kegiatan.sertifikat.store', ['id' => $id]) }}>
                            @csrf
                            <div class="input-area">
                                <label for="largeInput" class="form-label">Cover</label>
                                <div class="filegroup">
                                    <label>
                                        <input type="file" class=" w-full hidden" name="image" id="file"
                                            accept="image/png, image/jpeg">
                                        <span class="w-full h-[40px] file-control flex items-center custom-class">
                                            <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                                <span class="text-slate-400 filename">Choose a file</span>
                                            </span>
                                            <span
                                                class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                        </span>
                                    </label>
                                </div>
                                @error('image')
                                    <span
                                        class="font-Opensans text-xs text-danger-500 pt-1 error-message capitalize block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-area relative has-error">
                                <label for="largeInput" class="form-label">Posisi Nama</label>
                                <div class="relative grid grid-cols-3 gap-2">
                                    <input type="text" name="top" class="form-control " placeholder="top"
                                        error="test" value="{{ old('top') ?? 0 }}">
                                    <input type="text" name="left" class="form-control " placeholder="Left"
                                        error="test" value="{{ old('left') ?? 0 }}">
                                    <input type="text" name="right" class="form-control " placeholder="Right"
                                        error="test" value="{{ old('right') ?? 0 }}">
                                </div>
                                @error('judul')
                                    <span
                                        class="font-Opensans text-xs text-danger-500 pt-1 error-message capitalize block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex justify-end space-x-3 md:col-span-2">
                                <a href="{{ route('admin.kegiatan') }}"
                                    class="btn btn-sm btn-outline-danger inline-flex justify-center btn-dark">Kembali</a>
                                <button type="submit"
                                    class="btn btn-sm inline-flex justify-center btn-dark">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @vite(['resources/js/plugins/dropzone.min.js', 'resources/js/plugins/flatpickr.js'])
        @vite([])

        @if (session('success'))
            <script type="module">
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                }).then(() => {
                    window.location.href = '{!! route('admin.kegiatan.sertifikat.edit', ['id' => $id]) !!}';
                });
            </script>
        @endif

        <script type="module">
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
            Dropzone.autoDiscover = false;
            $("#myUploader").dropzone({
                url: "/",
                dictDefaultMessage: "",
                addRemoveLinks: true,
            });
            $(".flatpickr.time").flatpickr({
                dateFormat: "Y-m-d"
            });

            $(document).on('change', '#file', function() {
                console.log(this);
                console.log($("#file")[0]);
                const file = this.files[0];
                if (file) {
                    var filename = 'Choose a file';
                    $('.filename').html(file.name);
                } else {
                    $('.filename').html(['Choose a file'])
                }
            })
        </script>
    @endpush

</x-LayoutApp>
