@php
    $items = [
        [
            'img' => 'images/svg/sk.svg',
            'title' => 'Meeting with client',
            'date' => '01 Nov 2021',
            'meet' => 'Zoom meeting',
        ],
        [
            'img' => 'images/svg/path.svg',
            'title' => 'Design meeting (team)',
            'date' => '01 Nov 2021',
            'meet' => 'Skyp meeting',
        ],
    ];
@endphp
<div class="mb-12">
    <div id="dashcode-mini-calendar"></div>
</div>
<ul class="divide-y divide-slate-100 dark:divide-slate-700">
    @foreach ($items as $item)
        <li class="block py-[10px]">
            <div class="flex space-x-2 rtl:space-x-reverse">
                <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                    <div class="flex-none">
                        <div class="h-8 w-8">
                            <img src={{ $item['img'] }} alt=""
                                class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                        </div>
                    </div>
                    <div class="flex-1">
                        <span class="block text-slate-600 text-sm dark:text-slate-300 mb-1 font-medium">
                            {{ $item['title'] }}
                        </span>
                        <span class="flex font-normal text-xs dark:text-slate-400 text-slate-500">
                            <span class="text-base inline-block mr-1">
                                <iconify-icon icon="heroicons-outline:video-camera"></iconify-icon>
                            </span>
                            {{ $item['meet'] }}
                        </span>
                    </div>
                </div>
                <div class="flex-none ">
                    <span class="block text-xs text-slate-600 dark:text-slate-400">
                        {{ $item['date'] }}
                    </span>
                </div>
            </div>
        </li>
    @endforeach
</ul>


@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/gh/wrick17/calendar-plugin@master/calendar.min.js"></script> --}}
    {{-- @vite(['resources/js/plugins/zabuto_calendar.min.js']) --}}
    @vite(['resources/js/plugins/calendar.js'])
    <script type="module">
        function selectDate(date) {
            $('#dashcode-mini-calendar').updateCalendarOptions({
                date: date
            });
            var dateNew = new Date(date)
            console.log(moment(dateNew).format('YYYY-MM-DD'));
        }

        var defaultConfig = {
            weekDayLength: 1,
            date: moment().format('MM/DD/YYYY'),
            onClickDate: selectDate,
            showYearDropdown: true,
            startOnMonday: false,
        };

        var calendar = $('#dashcode-mini-calendar').calendar(defaultConfig);
    </script>
@endpush
