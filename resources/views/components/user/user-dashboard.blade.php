<x-LayoutUser>

    <div class="h-12 md:h-20"></div>
    <section class='container py-14 grid grid-cols-5 gap-7'>
        <x-user.user-sidebar />
        <div class="col-span-5 w-full lg:col-span-4 grid gap-8 place-self-start">
            {{ $slot }}
        </div>
    </section>
</x-LayoutUser>
