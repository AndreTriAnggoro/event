<x-main-layout>
    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">All Galleries</h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($galleries as $gallery)
                    <div class="lg:flex bg-slate-100 dark:bg-gray-700 rounded-md">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                            src="{{ asset('/storage/' . $gallery->image) }}" alt="{{ $gallery->caption }}">

                            <div class="flex flex-col justify-between py-6 lg:mx-6">
                                <p class="text-sm p-1 dark:bg-gray-600 shadow-md dark:text-slate-300 px-4 py-1 rounded-md">{{ $gallery->caption }}</p>
                            </div>
                    </div>
                @endforeach
            </div>
            {{ $galleries->links() }}
        </div>
    </section>
</x-main-layout>