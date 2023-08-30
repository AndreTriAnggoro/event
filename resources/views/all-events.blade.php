<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard - Total Event') }}
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
     <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2">
                @foreach ($events as $event)
                    <div class="lg:flex bg-slate-200 dark:bg-gray-700 rounded-md">
                        <a href="{{ route('eventShow', $event->id) }}">
                            <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                                src="{{ asset('/storage/' . $event->image) }}" alt="{{ $event->title }}">
                        </a>

                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <a href="{{ route('eventShow', $event->id) }}"
                                class="text-2xl font-semibold text-gray-800 hover:text-blue-500 dark:text-white dark:hover:text-slate-300 ">
                                {{ $event->title }}
                            </a>

                            <span
                                class="text-sm dark:text-gray-300 dark:bg-indigo-600 bg-indigo-400 rounded-md p-2">{{ $event->country->name }}</span>
                            <span class="flex flex-wrap space-x-2">
                                @foreach ($event->tags as $tag)
                                    <p class="text-sm p-1 bg-green-500 py-1 px-4 rounded-md">{{ $tag->name }}</p>
                                @endforeach
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>