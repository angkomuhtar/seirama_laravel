<x-LayoutApp>

    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <form method="POST" action="{{ route('pengajuan.update', ['id' => $data->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <header class="card-header noborder">
                        <h4 class="card-title">Detail Kegiatan</h4>
                    </header>
                    <div class="card-body px-6 pb-6 grid gap-8 grid-cols-3">
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Nama Kegiatan</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->judul }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Jenis Kerjasama</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->kerjasama->nama }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Tanggal kegiatan</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->start)->format('d M') }} -
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->end)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Lokasi Pelaksanaan</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->tempat }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Tenaga Pengajar</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->pengajar }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Instansi</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->instansi }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Sarana</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->sarana }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Peserta</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->type_peserta == 'ASN' ? 'Aparatur' : 'non-Aparatur' }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Jumlah Peserta</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->peserta }} Perserta
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Sumber Pembiayaan</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->sumber_dana }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Cakupan Kerjasama</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->cakupan_kerjasama }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Nomor Mou</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->no_mou }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Lampiran MoU</label>
                            @if ($data->mou == '')
                                <div class="flex space-x-3">
                                    <iconify-icon icon="heroicons-outline:building-office-2"
                                        class="text-base text-slate-500 pt-1"></iconify-icon>
                                    <span class="font-Opensans capitalize">
                                        -
                                    </span>
                                </div>
                            @else
                                <div class="flex space-x-3">
                                    <iconify-icon icon="heroicons-outline:building-office-2"
                                        class="text-base text-slate-500"></iconify-icon>
                                    <a href="{{ asset('storage/mou/' . $data->mou) }}" target="_blank"
                                        class="text-blue-500 text-xs font-Opensans">
                                        lihat dokumen
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="input-area relative has-error">
                            <label for="largeInput" class="form-label">Sasaran Kerjasama</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->sasaran_kerjasama }}
                                </span>
                            </div>
                        </div>




                    </div>
                    <div class="card-footer justify-end">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.kegiatan') }}"
                                class="btn btn-sm btn-outline-danger justify-center btn-dark">Kembali</a>
                            {{-- <button type="submit" class="btn btn-sm justify-center btn-dark">Update</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
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
                                        window.location.reload()
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
        </script>
    @endpush

</x-LayoutApp>
