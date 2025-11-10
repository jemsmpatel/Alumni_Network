<x-app-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>
    <!-- Profile Section -->
    <div class="h-full p-10">
        <section class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
            <h2 class="sm:text-4xl text-3xl text-center font-bold text-gray-800 mb-8">Request To Alumni</h2>
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('alumni.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="graduation_year">Graduation Year</label>
                    <input type="number" name="graduation_year" id="graduation_year" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="degree">Degree</label>
                    <input type="text" name="degree" id="degree" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="industry">Industry</label>
                    <input type="text" name="industry" id="industry" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="job">Job</label>
                    <input type="text" name="job" id="job" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="skills">Skills (comma seprated)</label>
                    <input type="text" name="skills" id="skills" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="location">Location</label>
                    <input type="text" name="location" id="location" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="resume">Resume</label>
                    <input type="file" name="resume" id="resume" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-gray-700 text-white px-6 py-2 mt-4 mb-2 rounded hover:bg-gray-800">Save Changes</button>
                </div>
            </form>
        </section>
    </div>
</x-app-layout>