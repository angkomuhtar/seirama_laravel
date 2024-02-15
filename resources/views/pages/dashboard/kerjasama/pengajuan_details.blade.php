<x-LayoutApp>

    {{-- table --}}
    <div class="space-y-8">
        <div class="space-y-5">
            <div class="card">
                <form method="POST" action="{{ route('pengajuan.update', ['id' => $data->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <header class="card-header noborder">
                        <h4 class="card-title">Detail Pengajuan Kerjasama</h4>
                    </header>
                    <div class="card-body px-6 pb-6 grid gap-8 grid-cols-3">
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Instansi</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->instansi }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Jenis Kerjasama</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->jenis_kerjasama->nama }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Nama Kegiatan</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->nm_kegiatan }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Lokasi Kegiatan</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->lokasi }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Tanggal Pelaksanaan</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->start)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->end)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Contact Person</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500 pt-1"></iconify-icon>
                                <span class="font-Opensans capitalize">
                                    {{ $data->cp }}
                                </span>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Surat Lampiran</label>
                            <div class="flex space-x-3">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="text-base text-slate-500"></iconify-icon>
                                <a href="{{ asset('surat_kerjasama/' . $data->surat) }}" target="_blank"
                                    class="text-blue-500 text-xs font-Opensans">
                                    lihat dokumen
                                </a>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Lampiran MoU</label>
                            @if ($data->mou == '')
                                <div class="filePreview">
                                    <label>
                                        <input type="file" class=" w-full hidden" name="mou">
                                        <span class="w-full h-[40px] file-control flex items-center custom-class">
                                            <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                                                <span id="placeholder" class="text-slate-400 display-name">Choose a file
                                                    or
                                                    drop it
                                                    here...</span>
                                            </span>
                                            <span
                                                class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                                        </span>
                                    </label>
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
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Nomor MoU</label>
                            <div class="relative">
                                <input type="text" name="no_mou" class="form-control !pl-9" placeholder="Nomor MOU"
                                    value="{{ $data->no_mou }}" />
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Cakupan Kerjasama</label>
                            <div class="relative">
                                <input type="text" name="cakupan" class="form-control !pl-9"
                                    placeholder="cakupan kerjasama" value="{{ $data->cakupan_kerjasama }}">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Sumber Pembiayaan</label>
                            <div class="relative">
                                <input type="text" name="sumber_dana" class="form-control !pl-9"
                                    placeholder="Sumber Dana" value="{{ $data->sumber_dana }}">
                                <iconify-icon icon="heroicons-outline:building-office-2"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 text-base text-slate-500"></iconify-icon>
                            </div>
                        </div>
                        <div class="input-area relative has-error" id="tanggal-box">
                            <label for="largeInput" class="form-label">Status Pengajuan</label>
                            <div class="flex">
                                @if ($data->status == 'wait')
                                    <span
                                        class="badge bg-secondary-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1"
                                            icon="mdi:file-check"></iconify-icon>menunggu</span>
                                @elseif ($data->status == 'accept')
                                    <span class="badge bg-success-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1"
                                            icon="mdi:file-check"></iconify-icon>diterima</span>
                                @elseif ($data->status == 'reject')
                                    <span class="badge bg-danger-500 text-white capitalize inline-flex items-center">
                                        <iconify-icon class="ltr:mr-1 rtl:ml-1"
                                            icon="mdi:file-check"></iconify-icon>ditolak</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-footer justify-end">
                        <div class="flex space-x-2">
                            <a href="{{ route('pengajuan') }}"
                                class="btn btn-sm btn-outline-danger justify-center btn-dark">Kembali</a>
                            <button type="submit" class="btn btn-sm justify-center btn-dark">Update</button>
                            @if ($data->status == 'wait')
                                <button type="button"
                                    class="btn btn-sm justify-center bg-red-500 text-white">Tolak</button>
                                <button type="button"
                                    class="btn btn-sm btn-danger justify-center btn-dark">Terima</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-LayoutApp>
