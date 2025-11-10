<x-app-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <!-- Edit Form -->
    <div class="h-full p-10">
        <section class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
            <h2 class="sm:text-4xl text-3xl text-center font-bold text-gray-800 mb-8">Update Profile</h2>
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('profile.submit') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->name}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="email">Email</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->email}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="phone">Contact</label>
                    <input type="text" name="phone" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->phone}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="year">Year</label>
                    <input type="number" name="year" id="year" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->year}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="interests">Interests</label>
                    <input type="text" name="interests" id="interests" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->interests}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="goals">Goals</label>
                    <input type="text" name="goals" id="goals" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{Auth::user()->goals}}">
                </div>
                <div>
                    @if(Auth::user()->profile_image)
                        <img src="{{ Auth::user()->profile_image}}" alt="">
                    @else
                        <img src="/profile.jpg" alt="Default User Photo" class="block sm:w-64 sm:h-64 w-40 h-40 rounded-full">
                    @endif
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="image">Image</label>
                    <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-gray-700 text-white px-6 py-2 mt-4 mb-2 rounded hover:bg-gray-800">Save Changes</button>
                </div>
            </form>
        </section>
    </div>
</x-app-layout>