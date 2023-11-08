<div class='cursor-pointer relative aspect-[6/7] group' data-aos="fade-left" data-aos-delay="{{ $num }}">
    <img src='{{ asset('images/news.png') }}' alt='' class='object-fill absolute h-full w-full rounded-md -z-10' />
    <div class='bg-font-900/60 rounded-md h-full flex flex-col justify-center px-8'>
        <p class='capitalize font-normal text-xs text-font-50'>
            {{ $pretitle }}
        </p>
        <h3 class='capitalize font-bold text-lg text-font-50'>{{ $title }}</h3>
        @if ($pelaksana != '')
            <p class='capitalize font-bold text-[.5rem] text-font-50'>
                {{ $pelaksana }}
            </p>
        @endif
        <div class='max-h-0 overflow-hidden group-hover:max-h-60 transition-all group-hover:duration-700 mt-4'>
            <div class='space-y-3'>{{ $slot }}</div>
        </div>
    </div>
</div>
