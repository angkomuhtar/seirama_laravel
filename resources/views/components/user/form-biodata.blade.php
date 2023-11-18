<div class="tab-pane fade show active" id="tabs-home-withIcon" role="tabpanel" aria-labelledby="tabs-home-withIcon-tab">
    <p class="text-sm text-gray-500 dark:text-gray-200 mb-7">
        Infromasu Pribadi
    </p>
    <form class="space-y-4" id="typeValidation">
        <div class="grid md:grid-cols-2 gap-7">
            <div class="flex flex-col">
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">No
                    KTP /
                    NIK</label>
                <input type="text" name="ktp" placeholder="Masukkan Nomor KTP Anda" value="{{ $profile->ktp }}"
                    class="bg-font-100 w-full py-2 px-3 rounded-sm font-Opensans ">
            </div>
            <div class="flex flex-col">
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Nama</label>
                <input type="text" name="nama" placeholder="Masukkan Nama Anda" value="{{ $profile->nama }}"
                    class="bg-font-100 w-full py-2 px-3 rounded-sm font-Opensans">
            </div>
            <div class="flex flex-col">
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Tempat
                    Lahir</label>
                <input type="text" name="tmp_lahir" value="{{ $profile->tmp_lahir }}"
                    placeholder="Masukkan Nomor Induk Pegawai Anda"
                    class="bg-font-100 w-full py-2 px-3 rounded-sm font-Opensans">
            </div>
            <div class="flex flex-col">
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Tanggal
                    Lahir</label>
                <input type="text" name="tmp_lahir" value="{{ $profile->tgl_lahir }}"
                    placeholder="Masukkan Nomor Induk Pegawai Anda" readonly
                    class="bg-font-100 w-full py-2 px-3 rounded-sm font-Opensans flatpickr time flatpickr-input">
            </div>
            <div class="flex flex-col">
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Agama</label>
                <select type="text" name="religion" class="bg-font-100 w-full py-2 px-3 rounded-sm font-Opensans">
                    <option value="">Pilih Agama anda</option>
                    @foreach ($agama as $item)
                        <option {{ $item->id == $profile->agama ? 'selected' : '' }} value="{{ $item->id }}">
                            {{ $item->value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Jenis
                    Kelamin</label>
                <div class="flex items-center space-x-7 flex-wrap">
                    <div class="basicRadio">
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" class="hidden" name="jenkel" value="M"
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
                            <input type="radio" class="hidden" name="jenkel" value="F"
                                {{ $profile->jenkel == 'F' ? 'checked="checked"' : '' }}>
                            <span
                                class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                            <span class="text-secondary-500 text-sm leading-6 capitalize">Perempuan</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">No.
                    Telp</label>
                <input type="text" name="tmp_lahir" value="{{ $profile->telp }}"
                    placeholder="Masukkan Nomor Induk Pegawai Anda"
                    class="bg-font-100 w-full py-2 px-3 rounded-sm font-Opensans">
            </div>
            <div class="flex flex-col">
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Status
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
                <label for="name" class="font-Opensans font-light text-sm mb-2 capitalize">Alamat</label>
                <textarea type="text" name="alamat" rows="3" placeholder="Masukkan Alamat Anda"
                    class="bg-font-100 w-full py-2 px-3 rounded-sm font-Opensans resize-none">{{ $profile->alamat }}</textarea>
            </div>
        </div>
    </form>
</div>
