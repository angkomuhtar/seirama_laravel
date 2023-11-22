<x-LayoutAuth>
    <x-login-form></x-login-form>
    <div class='md:max-w-[345px] mt-6 mx-auto font-normal text-slate-500 dark:text-slate-400mt-12 uppercase text-sm'>
        Belum Punya akun?
        <a href='{{ route('register') }}' class='text-slate-900 dark:text-white font-medium hover:underline'>
            Daftar
        </a>
    </div>
</x-LayoutAuth>
