<x-LayoutUser>
    <div class="h-20"></div>

    <section class='container py-14 space-y-10 grid justify-items-center'>
        <div class="max-w-4xl">
            <div class="border-b border-b-appNetral-200 pb-5">
                <h3 class="font-Opensans text-xl md:text-2xl lg:text-3xl text-appPrimary-600">
                    {{ $news->judul }}</h3>
            </div>
            <div class="flex space-x-3 items-center py-2">
                <div class="h-12 aspect-[1/1] rounded-full bg-slate-300"></div>
                <div class="flex flex-col justify-center items-start">
                    <h3 class="text-lg font-Opensans font-semibold">Admin</h3>
                    <p class="font-Opensans font-semibold text-sm">
                        {{ date('d M Y', strtotime($news->created_at)) }}</p>
                </div>
            </div>

            <div class="w-full aspect-[5/3] overflow-hidden rounded-lg my-5">
                <img src="{{ asset('storage/' . $news->image) }}" class="object-cover w-full h-full" alt="">
            </div>

            <div class="my-5 font-Opensans text-xl leading-9">
                {!! $news->content !!}
            </div>
            <div class='grid grid-cols-2 lg:grid-cols-3 gap-5 min-h-[300px] pt-5'>
                <div class="col-span-2 lg:col-span-3">
                    <h3 class="font-Opensans text-xl font-semibold">Related Post</h3>
                </div>
                @foreach ($related as $item)
                    <div class='relative w-full aspect-[5/4] group cursor-pointer flex justify-center overflow-hidden'>
                        <img src='{{ asset('storage/' . $item->image) }}' alt=''
                            class='rounded-md object-cover w-full h-full' />
                        <div
                            class='absolute left-[50%] w-0 h-full group-hover:w-full group-hover:left-0 transition-all ease-in duration-300 bg-font-50/90'>
                        </div>
                        <div
                            class='absolute rounded-sm bg-appPrimary-500 text-font-950 px-2 py-1 text-[.6rem] font-semibold left-4 -top-10 group-hover:top-4 group-hover:transition-all group-hover:duration-300 group-hover:delay-300 '>
                            {{ $item->created_at }}
                        </div>
                        <div
                            class='py-2 px-4 top-[50%] absolute flex flex-col justify-center w-full opacity-0 invisible group-hover:transition-all group-hover:visible group-hover:opacity-100 group-hover:duration-300 group-hover:delay-[400ms] group-hover:-translate-y-[50%]'>
                            <h6
                                class='font-Opensans text-[.6rem] md:text-base font-bold text-font-900 leading-none md:leading-5'>
                                {{ $item->judul }}
                            </h6>
                            <p class='font-light text-[.4rem] md:text-xs'>
                                {!! substr($item->desc, 0, 75) !!}
                            </p>
                            <div class='w-full'>
                                <a href='{{ route('berita', ['id' => $item->id]) }}' rel='noopener noreferrer'
                                    class='text-appPrimary-500 font-semibold text-[.5rem] md:text-sm text-center hover:text-font-600'>
                                    read more
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    @push('scripts')
    @endpush
</x-LayoutUser>
