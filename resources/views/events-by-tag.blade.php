<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Events by Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-block align-middle mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        {{ __('Back to Dashboard') }}
                    </a>

                    @if ($mostFrequentTags->count() > 0)
                        <div class="flex items-center bg-gray-100 dark:bg-gray-700 rounded-t-md p-4 mt-4">
                            @foreach ($mostFrequentTags as $tag)
                                @if ($loop->first)
                                    <div class="text-lg font-semibold text-indigo-500 dark:text-indigo-400">
                                        {{ $tag->name }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                            {{ __("Tag Event") }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ __("Tag") }} {{ $tag->name }} {{ __("paling banyak digunakan dengan jumlah") }} {{ $tag->events_count }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class=" bg-gray-100 grid grid-cols-1 px-4 pb-4 rounded-b-md md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @forelse ($events as $event)
                                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md">
                                    <a href="{{ route('eventShow', $event->id) }}">
                                        <img src="{{ asset('/storage/' . $event->image) }}" alt="Event Image" class="w-full h-32 object-cover">
                                    </a>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $event->city->name }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                                            {{ __('Start Date') }}: {{ $event->start_date->format('d M Y') }}
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ __('End Date') }}: {{ $event->end_date->format('d M Y') }}
                                        </p>
                                        <!-- Tampilkan informasi event lainnya di sini -->
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600 dark:text-gray-400">{{ __('No events found.') }}</p>
                            @endforelse
                        </div>
                    @endif

                    @if ($secondMostFrequentTags->count() > 0)
                        <div class="flex items-center bg-gray-100 dark:bg-gray-700 rounded-t-md p-4 mt-4">
                            @foreach ($secondMostFrequentTags as $tag)
                                @if ($loop->first)
                                    <div class="text-lg font-semibold text-indigo-500 dark:text-indigo-400">
                                        {{ $tag->name }}
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                            {{ __("Tag Event") }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ __("Tag") }} {{ $tag->name }} {{ __("paling banyak digunakan dengan jumlah") }} {{ $tag->events_count }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="bg-gray-100 grid grid-cols-1 px-4 pb-4 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($tag->events as $event)
                                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md">
                                    <a href="{{ route('eventShow', $event->id) }}">
                                        <img src="{{ asset('/storage/' . $event->image) }}" alt="Event Image" class="w-full h-32 object-cover">
                                    </a>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $event->city ? $event->city->name : 'Unknown City' }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                                            {{ __('Start Date') }}: {{ $event->start_date->format('d M Y') }}
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ __('End Date') }}: {{ $event->end_date->format('d M Y') }}
                                        </p>
                                        <!-- Tampilkan informasi event lainnya di sini -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
