<x-app-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <!-- Alumni List Section -->
    <section class="max-w-7xl mx-auto py-12 sm:px-5 px-10">
        <h2 class="sm:text-5xl text-3xl font-semibold mb-11 text-center">Meet Our Alumni</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-5">
            @foreach($alumni as $alum)
            <div class="bg-white p-12 rounded-2xl shadow-lg hover:shadow-2xl transition">
                <img src="{{ $alum->user->profile_image }}" alt="Alumni 1" class="w-40 h-40 rounded-full mx-auto mb-6">
                <h3 class="text-3xl font-bold text-center">{{ $alum->user->name }}</h3>
                <p class="text-center text-gray-600 text-lg leading-relaxed">{{ $alum->job }}<br>{{ $alum->industry }}</p>
            </div>
            @endforeach
            <!-- <div class="bg-white p-12 rounded-2xl shadow-lg hover:shadow-2xl transition">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Alumni 1" class="w-40 h-40 rounded-full mx-auto mb-6">
                <h3 class="text-3xl font-bold text-center">Rahul Sharma</h3>
                <p class="text-center text-gray-600 text-lg leading-relaxed">Software Engineer<br>Google</p>
            </div>
            <div class="bg-white p-12 rounded-2xl shadow-lg hover:shadow-2xl transition">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Alumni 2" class="w-40 h-40 rounded-full mx-auto mb-6">
                <h3 class="text-3xl font-bold text-center">Neha Patel</h3>
                <p class="text-center text-gray-600 text-lg leading-relaxed">Data Analyst<br>Microsoft</p>
            </div>
            <div class="bg-white p-12 rounded-2xl shadow-lg hover:shadow-2xl transition">
                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Alumni 3" class="w-40 h-40 rounded-full mx-auto mb-6">
                <h3 class="text-3xl font-bold text-center">Amit Verma</h3>
                <p class="text-center text-gray-600 text-lg leading-relaxed">Project Manager<br>Infosys</p>
            </div> -->
        </div>
    </section>

</x-app-layout>