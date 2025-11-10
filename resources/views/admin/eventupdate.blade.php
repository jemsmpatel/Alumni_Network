<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <div class="h-full p-10">
        <section class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
            <h2 class="sm:text-4xl text-3xl text-center font-bold text-gray-800 mb-8">Update Event</h2>
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.update_event', ['id' => $event->id]) }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="name">Event Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $event->name}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="location">location</label>
                    <input type="text" name="location" id="location" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $event->location}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="date">Date</label>
                    <input type="date" name="date" id="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $event->date}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="description">Description</label>
                    <input type="text" name="description" id="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $event->description}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="link">Form Link</label>
                    <input type="text" name="link" id="link" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $event->link}}">
                </div>
                <div>
                    <img src="/{{$event->image}}" alt="{{$event->name}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="image">Image</label>
                    <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="is_active">Is Active</label>
                    <input type="number" name="is_active" id="is_active" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $event->is_active}}">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-gray-700 text-white px-6 py-2 mt-4 mb-2 rounded hover:bg-gray-800">Save Changes</button>
                </div>
            </form>
        </section>
    </div>
</x-admin-layout>