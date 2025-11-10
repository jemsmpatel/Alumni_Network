<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <div class="h-full p-10">
        <section class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
            <h2 class="sm:text-4xl text-3xl text-center font-bold text-gray-800 mb-8">Update User</h2>
            @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('admin.update_alumni', ['id' => $alumni->id]) }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                @csrf
                <div class="text-right mr-5">
                    <a href="/admin/member/{{ $alumni->user_id }}" class="text-blue-600 hover:underline">Update User</a>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="graduation_year">Graduation Year</label>
                    <input type="text" name="graduation_year" id="graduation_year" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $alumni->graduation_year}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="degree">Degree</label>
                    <input type="text" name="degree" id="degree" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $alumni->degree}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="industry">Industry</label>
                    <input type="text" name="industry" id="industry" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $alumni->industry}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="job">Job</label>
                    <input type="text" name="job" id="job" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $alumni->job}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="skills">Skills</label>
                    <input type="text" name="skills" id="skills" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $alumni->skills}}">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="location">Location</label>
                    <input type="text" name="location" id="location" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $alumni->location}}">
                </div>
                <div>
                    <a href="/{{ $alumni->resume }}" target="_blank" class="hover:text-blue-600">Old Resume view Click</a>
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="resume">Resume</label>
                    <input type="file" name="resume" id="resume" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-semibold mb-1" for="is_active">Is Active</label>
                    <input type="number" name="is_active" id="is_active" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $alumni->is_active}}">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-gray-700 text-white px-6 py-2 mt-4 mb-2 rounded hover:bg-gray-800">Save Changes</button>
                </div>
            </form>
        </section>
    </div>
</x-admin-layout>