<x-LayoutAuth>

    <form class="wizard-form mt-10" action="#">
        <div class="wizard-form-step active" data-step="1">
            <div class="grid gap-5">
                <div class="fromGroup">
                    <label for="email" class="block capitalize form-label">{{ __('Email') }}</label>
                    <div class="relative ">
                        <input type="text" name="email" id="email"
                            class="form-control py-2 @error('email') !border !border-red-500 @enderror"
                            placeholder="{{ __('Type your email') }}" value="{{ old('email') }}">
                        <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">This is
                            invalid state.</div>
                    </div>
                </div>
                <div class="fromGroup">
                    <label for="username" class="block capitalize form-label">{{ __('Username') }}</label>
                    <div class="relative ">
                        <input type="text" name="username" id="username"
                            class="form-control py-2 @error('username') !border !border-red-500 @enderror"
                            placeholder="{{ __('Type your username') }}" value="{{ old('username') }}">
                        <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">This is
                            invalid state.</div>
                    </div>
                </div>
                <div class="fromGroup">
                    <label for="password" class="block capitalize form-label">{{ __('Kata Sandi') }}</label>
                    <div class="relative ">
                        <input type="password" value="{{ old('password') }}" name="password"
                            class="form-control py-2 @error('password') !border !border-red-500 @enderror"
                            placeholder="{{ __('Password') }}" id="password">
                        <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">This is
                            invalid state.</div>
                    </div>
                </div>
                <div class="fromGroup">
                    <label for="password" class="block capitalize form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
                    <div class="relative ">
                        <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation"
                            class="form-control py-2 @error('password_confirmation') !border !border-red-500 @enderror"
                            placeholder="{{ __('Ulangi Kata Sandi') }}" id="confirm_password"
                            autocomplete="current-password">
                        <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">This is
                            invalid state.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wizard-form-step" data-step="2">
            <div class="grid gap-5">
                <div class="fromGroup">
                    <label for="nama" class="block capitalize form-label">{{ __('name') }}</label>
                    <div class="relative ">
                        <input type="text" name="nama" id="name" class="form-control py-2 "
                            placeholder="Masukkan Nama Anda" value="{{ old('nama') }}">
                        <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">This is
                            invalid state.</div>
                    </div>
                </div>
                <div class="fromGroup">
                    <label for="nama" class="block capitalize form-label">KK/KTP</label>
                    <div class="relative ">
                        <input type="text" name="ktp" class="form-control py-2 " placeholder="KTP / KK"
                            value="{{ old('ktp') }}">
                        <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">This is
                            invalid state.</div>
                    </div>
                </div>
                <div class="fromGroup">
                    <label for="nama" class="block capitalize form-label">Telp</label>
                    <div class="relative ">
                        <input type="text" name="telp" class="form-control py-2 " placeholder="No. Telp"
                            value="{{ old('telp') }}">
                        <div class="font-Inter text-sm text-danger-500 pt-2 error-message" style="display: none">This
                            is
                            invalid state.</div>
                    </div>
                </div>
                <div class="flex items-center space-x-7 flex-wrap">
                    <label for="nama" class="block capitalize form-label">Jenis Kelamin</label>
                    <div class="basicRadio">
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" class="hidden" name="jenkel" value="M" checked="checked">
                            <span
                                class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                            <span class="text-secondary-500 text-sm leading-6 capitalize">Laki - Laki</span>
                        </label>
                    </div>
                    <div class="basicRadio">
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" class="hidden" name="jenkel" value="F">
                            <span
                                class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                        duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                            <span class="text-secondary-500 text-sm leading-6 capitalize">Perempuan</span>
                        </label>
                    </div>
                </div>
                <div class="flex items-center space-x-7 flex-wrap">
                    <label for="nama" class="block capitalize form-label">Aparatur Sipil Negara (ASN)</label>
                    <div class="basicRadio">
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" class="hidden" name="isASN" value="Y" checked="checked">
                            <span
                                class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                            <span class="text-secondary-500 text-sm leading-6 capitalize">Ya</span>
                        </label>
                    </div>
                    <div class="basicRadio">
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" class="hidden" name="isASN" value="N">
                            <span
                                class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                        duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                            <span class="text-secondary-500 text-sm leading-6 capitalize">Tidak</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 space-x-3 flex justify-end">
            <button type="button" id="next"
                class="btn bg-appPrimary-500 text-white block w-full text-center mt-4">
                {{ __('Selanjutnya') }}
            </button>
        </div>
    </form>
    <div class='md:max-w-[345px] mt-6 mx-auto font-normal text-slate-500 dark:text-slate-400mt-12 uppercase text-sm'>
        Sudah Punya akun?
        <a href='{{ route('login') }}' class='text-slate-900 dark:text-white font-medium hover:underline'>
            Masuk
        </a>
    </div>

    @push('scripts')
        <script type="module">
            const form = $(".wizard-form");
            const formSteps = form.find(".wizard-form-step");
            let currentStep = form.find(".wizard-form-step.active").data('step');
            const nextBtn = form.find("#next");
            // const prevBtn = form.find(".prev-button");

            // !border !border-red-500
            $("#next").on('click', () => {

                // var url = ['{!! route('ajax.uservalidate') !!}', '{!! route('ajax.profilevalidate') !!}']
                let currentStep = form.find(".wizard-form-step.active").data('step');
                var data = $('.wizard-form').serialize() + '&step=' + currentStep;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: '{!! route('register.store') !!}',
                    data: data,
                    beforeSend: () => {
                        $('.error-message').hide()
                    },
                    success: (data) => {
                        if (currentStep == 1) {
                            $($(formSteps)[currentStep - 1]).removeClass("active");
                            $($(formSteps)[currentStep]).addClass("active");
                        } else if (data.success) {
                            Swal.fire({
                                title: 'success',
                                text: data,
                                icon: 'success',
                                confirmButtonText: 'Oke'
                            }).then(() => {
                                window.location.href = '{!! route('account') !!}';
                            })
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi Kesalahan',
                                icon: 'error',
                                confirmButtonText: 'Oke'
                            })
                        }
                    },
                    error: (err) => {
                        var data = err.responseJSON.errors;
                        $.each(data, (index, value) => {
                            var errDiv = $(`[name='${index}']`).parent().find(
                                '.error-message');
                            $(errDiv).show();
                            $(errDiv).html(value[0])
                        })
                    }
                });


            })
        </script>
    @endpush
</x-LayoutAuth>
