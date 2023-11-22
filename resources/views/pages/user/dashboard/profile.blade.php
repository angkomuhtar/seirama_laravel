<x-LayoutUser>
    <div class="h-20"></div>


    <section class='container py-14 grid lg:grid-cols-5 grid-cols-4 gap-7'>
        <x-user.user-sidebar />
        <div class="col-span-4 grid gap-8 place-self-start w-full">
            <section class="kegiatan_berjalan grid gap-5">
                {{-- <div class="px-3 py-2 rounded-md w-full bg-appPrimary-200/50 shadow-sm">
                    <h3 class="text-lg font-Opensans font-semibold text-font-900">Detail Profile</h3>
                </div> --}}

                <div class="">
                    <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4"
                        id="tabs-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-home-withIcon"
                                class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300"
                                id="tabs-home-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-home-withIcon"
                                role="tab" aria-controls="tabs-home-withIcon" aria-selected="true">
                                <iconify-icon class="mr-1" icon="heroicons-outline:user"></iconify-icon>
                                Biodata</a>
                        </li>
                        @if ($profile->isASN == 'Y')
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-profile-withIcon"
                                    class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                    id="tabs-profile-withIcon-tab" data-bs-toggle="pill"
                                    data-bs-target="#tabs-profile-withIcon" role="tab"
                                    aria-controls="tabs-profile-withIcon" aria-selected="false">
                                    <iconify-icon class="mr-1" icon="maki:college"></iconify-icon>
                                    Pendidikan dan Jabatan ASN</a>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-profile-withIcon"
                                    class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                    id="tabs-tani-withIcon-tab" data-bs-toggle="pill"
                                    data-bs-target="#tabs-tani-withIcon" role="tab"
                                    aria-controls="tabs-tani-withIcon" aria-selected="false">
                                    <iconify-icon class="mr-1" icon="maki:college"></iconify-icon>
                                    Pendidikan dan Kelompok tani</a>
                            </li>
                        @endif

                        <li class="nav-item" role="presentation">
                            <a href="#tabs-messages-withIcon"
                                class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                id="tabs-messages-withIcon-tab" data-bs-toggle="pill"
                                data-bs-target="#tabs-messages-withIcon" role="tab"
                                aria-controls="tabs-messages-withIcon" aria-selected="false">
                                <iconify-icon class="mr-1" icon="healthicons:i-training-class"></iconify-icon>
                                Kegiatan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-settings-withIcon"
                                class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                id="tabs-settings-withIcon-tab" data-bs-toggle="pill"
                                data-bs-target="#tabs-settings-withIcon" role="tab"
                                aria-controls="tabs-settings-withIcon" aria-selected="false">
                                <iconify-icon class="mr-1" icon="mdi:account-cog-outline"></iconify-icon>
                                Akun</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tabs-tabContent">
                        <div class="tab-pane fade show active" id="tabs-home-withIcon" role="tabpanel"
                            aria-labelledby="tabs-home-withIcon-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-200 mb-7">
                                Infromasi Pribadi
                            </p>
                            <form class="space-y-4" id="formBiodata">
                                <div class="grid md:grid-cols-2 gap-7">
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">No
                                            KTP /
                                            NIK</label>
                                        <input type="text" name="ktp" placeholder="Masukkan Nomor KTP Anda"
                                            value="{{ $profile->ktp }}"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Nama</label>
                                        <input type="text" name="nama" placeholder="Masukkan Nama Anda"
                                            value="{{ $profile->nama }}"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Tempat
                                            Lahir</label>
                                        <input type="text" name="tmp_lahir" value="{{ $profile->tmp_lahir }}"
                                            placeholder="Masukkan Tempat lahir"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Tanggal
                                            Lahir</label>
                                        <input type="text" name="tgl_lahir" value="{{ $profile->tgl_lahir }}"
                                            placeholder="Masukkan Nomor Induk Pegawai Anda" readonly
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs flatpickr time flatpickr-input">
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Agama</label>
                                        <select type="text" name="agama"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                            <option value="">Pilih Agama anda</option>
                                            @foreach ($agama as $item)
                                                <option {{ $item->id == $profile->agama ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->value }}</option>
                                            @endforeach
                                        </select>
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Jenis
                                            Kelamin</label>
                                        <div class="flex items-center space-x-7 flex-wrap">
                                            <div class="basicRadio">
                                                <label class="flex items-center cursor-pointer">
                                                    <input type="radio" class="hidden" name="jenkel"
                                                        value="M"
                                                        {{ $profile->jenkel == 'M' ? 'checked="checked"' : '' }}>
                                                    <span
                                                        class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                            duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                    <span class="text-secondary-500 text-sm leading-6 capitalize">Laki
                                                        -
                                                        Laki</span>
                                                </label>
                                            </div>
                                            <div class="basicRadio">
                                                <label class="flex items-center cursor-pointer">
                                                    <input type="radio" class="hidden" name="jenkel"
                                                        value="F"
                                                        {{ $profile->jenkel == 'F' ? 'checked="checked"' : '' }}>
                                                    <span
                                                        class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                    <span
                                                        class="text-secondary-500 text-sm leading-6 capitalize">Perempuan</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">No.
                                            Telp</label>
                                        <input type="text" name="telp" value="{{ $profile->telp }}"
                                            placeholder="Masukkan Nomor Induk Pegawai Anda"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Status
                                            Pernikahan</label>
                                        <div class="flex items-center space-x-7 flex-wrap">
                                            @foreach ($nikah as $item)
                                                <div class="basicRadio">
                                                    <label class="flex items-center cursor-pointer">
                                                        <input type="radio" class="hidden" name="status_pernikahan"
                                                            value="{{ $item->id }}"
                                                            {{ $profile->status_pernikahan == $item->id ? 'checked="checked"' : '' }}>
                                                        <span
                                                            class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                            duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                        <span
                                                            class="text-secondary-500 text-sm leading-6 capitalize">{{ $item->value }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Alamat</label>
                                        <textarea type="text" name="alamat" rows="3" placeholder="Masukkan Alamat Anda"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs resize-none">{{ $profile->alamat }}</textarea>
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>
                                </div>

                                <div class="flex justify-end pt-5">
                                    <button type="submit" class="btn bg-appPrimary-500 text-white">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                        </div>
                        @if ($profile->isASN == 'Y')
                            {{-- asn Data --}}
                            <div class="tab-pane fade" id="tabs-profile-withIcon" role="tabpanel"
                                aria-labelledby="tabs-profile-withIcon-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-200 mb-7">
                                    Informasi Pendidikan terakhir dan unit kerja
                                </p>
                                <form class="space-y-4" id="formAsn">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="grid md:grid-cols-2 gap-7">
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">NIP</label>
                                            <input type="text" name="nip" placeholder="Masukkan NIP Anda"
                                                value="{{ $asn_data->nip ?? '' }}"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">NPWP</label>
                                            <input type="text" name="npwp" placeholder="Masukkan NPWP Anda"
                                                value="{{ $asn_data->npwp ?? '' }}"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Jabatan</label>
                                            <input type="text" name="jabatan" placeholder="Masukkan Jabatan Anda"
                                                value="{{ $asn_data->jabatan ?? '' }}"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Golongan</label>
                                            <select type="text" name="golongan"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                                <option value="">Pilih Golongan anda</option>
                                                @foreach ($golongan as $item)
                                                    <option
                                                        {{ $asn_data != null && $item->id == $asn_data->golongan ? 'selected' : '' }}
                                                        value="{{ $item->id }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Jenis
                                                Jabatan</label>
                                            <select type="text" name="gol_jabatan"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                                <option value="">Pilih Jenis Jabatan anda</option>
                                                @foreach ($jabatan as $item)
                                                    <option
                                                        {{ $asn_data != null && $item->id == $asn_data->gol_jabatan ? 'selected' : '' }}
                                                        value="{{ $item->id }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Pendidikan
                                                terakhir</label>
                                            <select type="text" name="education"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                                <option value="">Pilih pendidikan terakhir anda</option>
                                                @foreach ($pendidikan as $item)
                                                    <option
                                                        {{ $asn_data != null && $item->id == $asn_data->education ? 'selected' : '' }}
                                                        value="{{ $item->id }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Nama Unit
                                                kerja</label>
                                            <input type="text" name="unit_kerja"
                                                value="{{ $asn_data->unit_kerja ?? '' }}"
                                                placeholder="Masukkan Unit Kerja"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">unit eselon
                                                I</label>
                                            <select type="text" name="unit_eselon"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                                <option value="">Pilih Unit Eselon I</option>
                                                @foreach ($eselon as $item)
                                                    <option
                                                        {{ $asn_data != null && $item->id == $asn_data->unit_eselon ? 'selected' : '' }}
                                                        value="{{ $item->id }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Alamat Unit
                                                Kerja</label>
                                            <textarea type="text" name="unit_address" rows="3" placeholder="Masukkan Alamat Anda"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs resize-none">{{ $asn_data->unit_address ?? '' }}</textarea>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Telepon</label>
                                            <input type="text" name="telp" value="{{ $asn_data->telp ?? '' }}"
                                                placeholder="Masukkan Unit Kerja"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                        </div>
                                        {{-- <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Email</label>
                                            <input type="text" name="email"
                                                placeholder="Masukkan Email Unit Kerja"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                        </div> --}}
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="!font-Opensans !font-light text-sm mb-2 capitalize">Propinsi</label>
                                            <select
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs"
                                                id="propinsi" name="propinsi">
                                                <option value="">pilih salah satu</option>
                                                @foreach ($propinsi as $item)
                                                    <option
                                                        {{ $asn_data != null && $item->kode == $asn_data->propinsi ? 'selected' : '' }}
                                                        value="{{ $item->kode }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="!font-Opensans !font-light text-sm mb-2 capitalize">Kabupaten</label>
                                            <select name="kabupaten"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs"
                                                id="kabupaten">
                                                <option value="">Pilih Unit Eselon I</option>
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>

                                    </div>
                                    <div class="flex justify-end pt-5">
                                        <button type="submit" class="btn bg-appPrimary-500 text-white">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @else
                            {{-- user data --}}
                            <div class="tab-pane fade" id="tabs-tani-withIcon" role="tabpanel"
                                aria-labelledby="tabs-profile-withIcon-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-200 mb-7">
                                    Informasi Pendidikan terakhir dan unit kerja
                                </p>
                                <form class="space-y-4" id="user_data">
                                    <div class="grid md:grid-cols-2 gap-7">
                                        <input type="hidden" name="user_id" value={{ $user->id }}>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Pendidikan
                                                Terakhir</label>
                                            <select type="text" name="pendidikan"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                                <option value="">Pilih Pendidikan </option>
                                                @foreach ($pendidikan as $item)
                                                    <option
                                                        {{ $user_data != null && $item->id == $user_data->pendidiikan ? 'selected' : '' }}
                                                        value="{{ $item->id }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Jenis
                                                Usaha</label>
                                            <input type="text" name="jenis_usaha"
                                                placeholder="Masukkan jenis usaha"
                                                value="{{ $user_data->jenis_usaha ?? '' }}"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">Nama kelompok
                                                tani</label>
                                            <input type="text" name="nama_kt" placeholder="Masukkan jenis usaha"
                                                value="{{ $user_data->nama_kt ?? '' }}"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="font-Opensans font-light text-sm mb-2 capitalize">jabatan
                                                kelompok
                                                tani</label>
                                            <input type="text" name="jabatan" placeholder="Masukkan jabatan"
                                                value="{{ $user_data->jabatan ?? '' }}"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="!font-Opensans !font-light text-sm mb-2 capitalize">Propinsi</label>
                                            <select
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs"
                                                id="propinsi" name="propinsi">
                                                <option value="">pilih salah satu</option>
                                                @foreach ($propinsi as $item)
                                                    <option
                                                        {{ $user_data != null && $item->kode == $user_data->propinsi ? 'selected' : '' }}
                                                        value="{{ $item->kode }}">{{ $item->value }}</option>
                                                @endforeach
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="!font-Opensans !font-light text-sm mb-2 capitalize">Kabupaten</label>
                                            <select name="kabupaten"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs"
                                                id="kabupaten">
                                                <option value="">Pilih Unit Eselon I</option>
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="!font-Opensans !font-light text-sm mb-2 capitalize">kecamatan</label>
                                            <select name="kecamatan"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs"
                                                id="kecamatan">
                                                <option value="">Pilih salah satu</option>
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="name"
                                                class="!font-Opensans !font-light text-sm mb-2 capitalize">Kelurahan /
                                                desa</label>
                                            <select name="desa"
                                                class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs"
                                                id="desa">
                                                <option value="">Pilih salah satu</option>
                                            </select>
                                            <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">
                                                This
                                                is
                                                invalid state.</div>
                                        </div>

                                    </div>
                                    <div class="flex justify-end pt-5">
                                        <button type="submit" class="btn bg-appPrimary-500 text-white">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <div class="tab-pane fade" id="tabs-messages-withIcon" role="tabpanel"
                            aria-labelledby="tabs-messages-withIcon-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-200 mb-7">
                                Informasi Pelatihan dan Kegiatan yang pernah diikiuti sebelumnya
                            </p>
                            <form class="space-y-4" id="typeValidation">
                                <div class="grid grid-cols-2 md:grid-cols-11 gap-7">
                                    <div class="col-span-3 flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Unit Kerja</label>
                                        <input type="text" name="unit" placeholder="Masukkan Nomor KTP Anda"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                    </div>
                                    <div class="col-span-2 flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Lama
                                            Pelatihan</label>
                                        <input type="text" name="lama" placeholder="Masukkan Nomor KTP Anda"
                                            value="{{ $profile->ktp }}"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                    </div>
                                    <div class="col-span-2 flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Tahun
                                            Pelatihan</label>
                                        <input type="text" name="tahun" placeholder="Masukkan Nomor KTP Anda"
                                            value="{{ $profile->ktp }}"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                    </div>
                                    <div class="col-span-3 flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Penyelenggara</label>
                                        <input type="text" name="penyelenggara"
                                            placeholder="Masukkan Nomor KTP Anda" value="{{ $profile->ktp }}"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                    </div>
                                </div>
                                <div class="flex justify-end pt-5">
                                    <button type="submit" class="btn bg-appPrimary-500 text-white">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tabs-settings-withIcon" role="tabpanel"
                            aria-labelledby="tabs-settings-withIcon-tab">
                            <p class="text-sm text-gray-500 dark:text-gray-200 mb-7">
                                Informasi Akun Seirama
                            </p>
                            <form class="space-y-4" id="typeValidation">
                                <div class="grid md:grid-cols-2 gap-7">
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Email</label>
                                        <input type="text" name="ktp" placeholder="Masukkan Nomor KTP Anda"
                                            readonly value="{{ $user->email }}"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs ">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Username</label>
                                        <input type="text" name="username" placeholder="Masukkan Nama Anda"
                                            value="{{ $user->username }}" readonly'
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">New
                                            Password</label>
                                        <input type="password" name="password"
                                            placeholder="Masukkan Nomor Induk Pegawai Anda"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="name"
                                            class="font-Opensans font-light text-sm mb-2 capitalize">Konfirmasi
                                            Password</label>
                                        <input type="password" name="confirm_password"
                                            placeholder="Masukkan Nomor Induk Pegawai Anda"
                                            class="bg-font-100 w-full py-3 px-3 rounded-sm font-Opensans text-xs">
                                        <div class="font-Inter text-xs text-danger-500 pt-2 error-message hidden">This
                                            is
                                            invalid state.</div>
                                    </div>


                                </div>

                                <div class="flex justify-end pt-5">
                                    <button type="submit" class="btn bg-appPrimary-500 text-white">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>


    @push('scripts')
        @vite(['resources/js/plugins/flatpickr.js'])
        @vite(['resources/js/plugins/Select2.min.js'])

        <script type="module">
            $(".flatpickr.time").flatpickr({
                dateFormat: "Y-m-d"
            });

            $("#propinsi, #kabupaten, #kecamatan, #desa").select2({
                placeholder: "Pilih Salah Satu",
            });

            const getKab = (data) => {
                var route = '{!! route('ajax.kabupaten') !!}'
                var url = route.replace(':id', data);
                $("#kabupaten").select2({
                    placeholder: 'Pilih Kabupaten',
                    ajax: {
                        url: url,
                        data: function(params) {
                            var query = {
                                search: params.term,
                                _token: "{{ csrf_token() }}",
                                id: data
                            }
                            return query;
                        },
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.value,
                                        id: item.kode,
                                        slug: item.value
                                    }
                                })
                            };
                        }

                    }
                })
            }

            const getKec = (data) => {
                var route = '{!! route('ajax.kecamatan') !!}'
                var url = route.replace(':id', data);
                $("#kecamatan").select2({
                    placeholder: 'Pilih Kecamatan',
                    ajax: {
                        url: url,
                        data: function(params) {
                            var query = {
                                search: params.term,
                                _token: "{{ csrf_token() }}",
                                id: data
                            }
                            return query;
                        },
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.value,
                                        id: item.kode,
                                        slug: item.value
                                    }
                                })
                            };
                        }

                    }
                })
            }

            const getDesa = (data) => {
                var route = '{!! route('ajax.desa') !!}'
                var url = route.replace(':id', data);
                $("#desa").select2({
                    placeholder: 'Pilih Desa',
                    ajax: {
                        url: url,
                        data: function(params) {
                            var query = {
                                search: params.term,
                                _token: "{{ csrf_token() }}",
                                id: data
                            }
                            return query;
                        },
                        processResults: function({
                            data
                        }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        text: item.value,
                                        id: item.kode,
                                        slug: item.value
                                    }
                                })
                            };
                        }

                    }
                })
            }
            $(document).on('change', '#propinsi', function(e) {
                getKab($(this).val())
            })


            $(document).on('change', '#kabupaten', function(e) {
                getKec($(this).val())
            })
            $(document).on('change', '#kecamatan', function(e) {
                getDesa($(this).val())
            })

            $(document).on('submit', "#formBiodata", function(e) {
                e.preventDefault();
                var data = $(this).serializeArray();
                data.push({
                    name: "_token",
                    value: "{{ csrf_token() }}"
                });
                console.log(data);
                var url = '{!! route('profile.update') !!}'
                $.ajax({
                    type: "post",
                    url: url,
                    data: data,
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
                                var err_msg = $(`[name='${index}']`).parent()
                                    .find(
                                        '.error-message');
                                $(err_msg).removeClass('hidden').html(value[0]);
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

            $(document).on('submit', "#formAsn", function(e) {
                e.preventDefault();
                var data = $(this).serializeArray();
                data.push({
                    name: "_token",
                    value: "{{ csrf_token() }}"
                });
                console.log(data);
                var url = '{!! route('asn_data.update') !!}'
                $.ajax({
                    type: "post",
                    url: url,
                    data: data,
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
                                var err_msg = $(`[name='${index}']`).parent()
                                    .find(
                                        '.error-message');
                                $(err_msg).removeClass('hidden').html(value[0]);
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

            $(document).on('submit', "#user_data", function(e) {
                e.preventDefault();
                var data = $(this).serializeArray();
                data.push({
                    name: "_token",
                    value: "{{ csrf_token() }}"
                });
                console.log(data);
                var url = '{!! route('user_data.update') !!}'
                $.ajax({
                    type: "post",
                    url: url,
                    data: data,
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
                                var err_msg = $(`[name='${index}']`).parent()
                                    .find(
                                        '.error-message');
                                $(err_msg).removeClass('hidden').html(value[0]);
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
