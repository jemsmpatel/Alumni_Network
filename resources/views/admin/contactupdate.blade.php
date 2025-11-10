<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <div class="h-full p-10">
        <section class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
            <h2 class="sm:text-4xl text-3xl text-center font-bold text-gray-800 mb-8">Update Contact</h2>
            @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('admin.update_contact', ['id' => $contact->id]) }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="name">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $contact->name}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="email">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $contact->email}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="subject">subject</label>
                    <input type="text" name="subject" id="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $contact->subject}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="message">message</label>
                    <input type="text" name="message" id="message" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $contact->message}}">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-gray-700 text-white px-6 py-2 mt-4 mb-2 rounded hover:bg-gray-800">Save Changes</button>
                </div>
            </form>
        </section>
    </div>
</x-admin-layout>