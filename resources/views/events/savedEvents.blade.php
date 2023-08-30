<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Saved Events') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu event
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Country
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Host
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat Lengkap
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tag
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="{{ route('eventShow', $event) }}">
                                            {{ $event->title }}
                                        </a>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $event->start_date->format('d/F/Y') }} - {{ $event->end_date->format('d/F/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->country->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $event->country->name }}, {{ $event->city->name }}, {{ $event->address }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach ($event->tags as $tag)
                                        {{ $tag->name }}
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                {{ $event->description }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No events found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>