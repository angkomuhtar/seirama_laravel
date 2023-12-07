<x-LayoutUser>
    <div class="h-32"></div>
    <section class='container'>
        <div class="bg-no-repeat bg-center bg-cover rounded-2xl"
            style="background-image: url('{{ asset('images/header.png') }}')">
            <div class='bg-font-950/80 rounded-2xl aspect-[7/2] p-12'>
                <h3 class='text-appNetral-50 lg:text-5xl md:text-3xl text-xl font-open_sans font-bold'>
                    Pengumuman
                </h3>
            </div>
        </div>
    </section>

    <section class='container py-14 space-y-10'>
        <div class='grid lg:grid-cols-2 gap-5 min-h-[300px]'>
            @if ($data->count() == 0)
                <h3 class="text-center lg:col-span-2 font-Opensans text-lg font-semibold text-black-400">Tidak ada
                    Pengumuman</h3>
            @endif

            @foreach ($data as $item)
                <div class='p-4 bg-white rounded-lg drop-shadow-lg place-self-start w-full'>
                    <h3 class='text-lg text-font-950 font-semibold'>
                        {{ $item->judul }}
                    </h3>
                    <div class='flex flex-row justify-between pt-5 items-center'>
                        <div class='flex flex-row space-x-4 items-center'>
                            <p
                                class='flex items-center justify-center font-Opensans text-xs text-font-300 font-semibold'>
                                <span class="text-xs inline-block mr-2">
                                    <iconify-icon icon="ooui:calendar"></iconify-icon>
                                </span>
                                {{ date('d M Y', strtotime($item->created_at)) }}
                            </p>
                            <p
                                class='flex items-center justify-center font-Opensans text-xs text-font-300 font-semibold'>
                                <span class="text-xs inline-block mr-2">
                                    <iconify-icon icon="zondicons:time"></iconify-icon>
                                </span>
                                {{ date('H:i', strtotime($item->created_at)) }}
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('download_pengumuman', ['file' => $item->file]) }}" target="_blank"
                                class='btn btn-sm bg-appPrimary-500 text-white justify-center items-center font-semibold uppercase'>
                                download
                                <span class="text-xs inline-block ml-2">
                                    <iconify-icon icon="material-symbols:download"></iconify-icon>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @push('scripts')
    @endpush
</x-LayoutUser>
