<x-LayoutAuth>
    {{-- <x-login-form></x-login-form> --}}
    <form method="POST" action="{{ route('authenticate') }}" class="space-y-5">
        @csrf
        {{-- Email --}}
        <div class="fromGroup">
            <label for="email" class="block capitalize form-label">{{ __('Email') }}</label>
            <div class="relative ">
                <input type="text" name="email" id="email"
                    class="form-control py-2 @error('email') !border !border-red-500 @enderror"
                    placeholder="{{ __('Type your email') }}" autofocus value="{{ old('email') }}">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        {{-- Password --}}
        <div class="fromGroup">
            <label for="password" class="block capitalize form-label">{{ __('Kata Sandi') }}</label>
            <div class="relative ">
                <input type="password" value="{{ old('password') }}" name="password"
                    class="form-control py-2 @error('password') !border !border-red-500 @enderror"
                    placeholder="{{ __('Password') }}" id="password" autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>


        {{-- Remember Me checkbox --}}
        <button type="submit" class="btn bg-appPrimary-500 text-white block w-full text-center mt-4">
            {{ __('Sign In') }}
        </button>
        <div class="flex justify-between">
            <a href="" class="text-sm text-blue-800 dark:text-slate-400 leading-6 font-medium">
                {{ __('Forgot your password?') }}
            </a>
        </div>

    </form>
    <div class='md:max-w-[345px] mt-6 mx-auto font-normal text-slate-500 dark:text-slate-400mt-12 uppercase text-sm'>
        Belum Punya akun?
        <a href='{{ route('register') }}' class='text-slate-900 dark:text-white font-medium hover:underline'>
            Daftar
        </a>
    </div>
</x-LayoutAuth>
