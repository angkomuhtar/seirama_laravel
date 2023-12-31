<div class='relative w-full aspect-[5/3] group overflow-hidden'>
    @php
        use Carbon\Carbon;
    @endphp
    <img src={{ $img }} class='object-cover absolute w-full h-full' />
    <div class='absolute bg-appPrimary-950/70 top-0 right-0 bottom-0 w-0 group-hover:w-full transition-all duration-200'>
    </div>
    <div
        class='absolute -left-[100%] bottom-0 pl-2 md:pl-6 pb-2 md:pb-10 group-hover:left-0 transition-all group-hover:delay-150 group-hover:duration-100'>
        <h3 class='text-appNetral-50 font-Opensans font-bold text-[.6rem] md:text-base leading-none'>
            {{ $judul }}
        </h3>
        <p class='text-appNetral-50 font-Opensans font-medium text-[.4rem] md:text-xs'>
            {{ Carbon::parse($tanggal)->format('d F Y') }}
        </p>
    </div>
</div>
