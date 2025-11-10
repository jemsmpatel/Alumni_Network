<x-app-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <div class="flex min-h-screen">
        <main class="flex-1 p-6 mx-6">
            <div class="mb-6 text-center">
                <h2 class="sm:text-5xl text-3xl font-bold mb-2">Upcoming Student Events</h2>
                <p class="text-gray-600 sm:text-2xl text-lg">Stay updated with campus events</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($events as $event)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">
                    <div class="flex justify-center">
                        <img src="/{{ $event->image }}" alt="{{ $event->name }}" class="max-h-[400px] object-cover">
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $event->name }}</h3>
                        <p class="text-sm text-gray-500 mb-2">📍 {{ $event->location }} • 🗓️ {{ $event->date }}</p>
                        <p class="text-gray-700 mb-4">{{ $event->description }}</p>
                        <a class="mt-4 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800" target="_blank" href="{{ $event->link }}">Register</a>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>

</x-app-layout>