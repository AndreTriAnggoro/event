<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">
                        {{ __("Welcome to your dashboard!") }}
                    </h3>

                    <div class="flex items-center bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        <a href="{{ route('all-events') }}" class="text-3xl font-semibold text-indigo-500 dark:text-indigo-400">
                            {{ $totalEvents }}
                        </a>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                {{ __("Total Events") }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ __("Total keseluruhan event yang ada") }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center bg-gray-100 dark:bg-gray-700 rounded-lg p-4 mt-4">
                        <a href="{{ route('events-by-city') }}" class="text-lg font-semibold text-green-500 dark:text-green-400">
                            {{ implode(', ', $mostFrequentCityNames->toArray()) }}
                        </a>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                {{ __("Kota dengan Event terbanyak") }}
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ implode(', ', $mostFrequentCityNames->toArray()) }} {{__("adalah kota yang mengadakan event terbanyak dengan jumlah") }} {{ $mostFrequentCityEventCount }}
                            </p>
                        </div>
                    </div>

                    @if ($mostFrequentTags->count() > 0)
                    <div class="flex items-center bg-gray-100 dark:bg-gray-700 rounded-lg p-4 mt-4">
                        @foreach ($mostFrequentTags as $tag)
                            @if ($loop->first) <!-- Hanya tampilkan tag pertama -->
                                <a href="{{ route('events-by-tag', ['tagName' => urlencode($tag->name)]) }}" class="text-lg font-semibold text-indigo-500 dark:text-indigo-400">
                                {{ $tag->name }}
                                </a>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ __("Tag Event") }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ __("Tag") }} {{ $tag->name }} {{ (" paling banyak digunakan dengan jumlah ") }} {{ $tag->total }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif


                    <!-- @if ($mostFrequentTags->count() > 0)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-2">Most Frequent Tags</h3>
                        <ul class="list-disc ml-6">
                            @foreach ($mostFrequentTags as $tag)
                                <li>{{ $tag->name }} ({{ $tag->total }} events)</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif -->


                    @if ($ongoingEvents->count() > 0)
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-2">Event Hari ini</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($ongoingEvents as $event)
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4">
                                    <div class="flex items-center mb-3">
                                        <div class="h-12 w-12">
                                            <img class="h-12 w-12 rounded-full" src="{{ asset('/storage/' . $event->image) }}" alt="{{ $event->title }}">
                                        </div>
                                        <div class="ml-2">
                                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $event->title }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $event->city->name }}</p>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                                        {{ $event->start_date->format('d M Y') }} - {{ $event->end_date->format('d M Y') }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $event->address }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                        {{ Str::limit($event->description, 100, ' ...') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

</div>
</div>
</div>
</div>
</x-app-layout>
