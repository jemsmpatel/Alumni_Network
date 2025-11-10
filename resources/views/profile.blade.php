<x-app-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>
    <!-- Profile Section -->
    <div class="h-full sm:p-16 p-5">
        <section class="flex justify-center items-center">
            <div class="bg-white sm:p-20 py-16 rounded-2xl shadow-2xl w-full max-w-6xl">
                <div class="flex flex-col md:flex-row items-center justify-center md:items-center gap-10">
                    <!-- Profile Image -->
                    <div>
                        @auth
                            @if(Auth::user()->profile_image)
                                <img src="{{ Auth::user()->profile_image }}" alt="User Photo" class="block sm:w-64 sm:h-64 w-40 h-40 rounded-full">
                            @else
                                <img src="/profile.jpg" alt="Default User Photo" class="block sm:w-64 sm:h-64 w-40 h-40 rounded-full">
                            @endif
                        @else
                                <img src="/profile.jpg" alt="User Photo" class="block sm:w-64 sm:h-64 w-40 h-40 rounded-full">
                        @endauth
                    </div>
                    <!-- User Info -->
                    <div class="mx-9">
                        <h2 class="sm:text-5xl text-3xl font-bold text-gray-800 mb-5 text-center sm:text-start">@auth {{ Auth::user()->name }} @else John Doe @endauth</h2>
                        <p class="text-gray-600 sm:text-2xl text-lg"><strong>Email:</strong> @auth {{ Auth::user()->email }} @else john@example.com @endauth</p>
                        <p class="text-gray-600 sm:text-2xl text-lg"><strong>Contact:</strong> @auth {{ Auth::user()->phone }} @else 2145326558 @endauth</p>
                        <p class="text-gray-600 sm:text-2xl text-lg"><strong>Year:</strong> @auth {{ Auth::user()->year }} @else 2000 @endauth</p>
                        <p class="text-gray-600 sm:text-2xl text-lg"><strong>interests:</strong> @auth {{ Auth::user()->interests }} @else cooding @endauth</p>
                        <p class="text-gray-600 sm:text-2xl text-lg"><strong>goals:</strong> @auth {{ Auth::user()->goals }} @else job @endauth</p>
                        @if(count($alumni) != 0)
                            @if($alumni[0] != null)
                                <p class="text-gray-600 sm:text-2xl text-lg"><strong>Graduation Year:</strong> {{ $alumni[0]->graduation_year }} </p>
                                <p class="text-gray-600 sm:text-2xl text-lg"><strong>Degree:</strong> {{ $alumni[0]->degree }} </p>
                                <p class="text-gray-600 sm:text-2xl text-lg"><strong>Industry:</strong> {{ $alumni[0]->industry }} </p>
                                <p class="text-gray-600 sm:text-2xl text-lg"><strong>Job:</strong> {{ $alumni[0]->job }} </p>
                                <p class="text-gray-600 sm:text-2xl text-lg"><strong>Skills:</strong> {{ $alumni[0]->skills }} </p>
                                <p class="text-gray-600 sm:text-2xl text-lg"><strong>Location:</strong> {{ $alumni[0]->location }} </p>
                                <p class="text-gray-600 sm:text-2xl text-lg"><strong>Resume:</strong> <a href="/{{ $alumni[0]->resume }}" target="_blank" class="hover:text-blue-600">View</a> </p>
                                <p class="text-gray-600 sm:text-2xl text-lg"><strong>Status:</strong> @if(is_null($alumni[0]->is_active)) Requested @elseif($alumni[0]->is_active == 1) Alumni @else Rejected @endif </p>
                            @endif
                        @endif
                        <div class="w-full mt-5 flex justify-center gap-6 sm:justify-start">
                            <a href="/edit-profile" class="inline-block mt-4 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">Edit Profile</a>
                            @if(count($alumni) != 0)
                                @if($alumni[0] != null)
                                    <a href="/alumni-form" class="inline-block mt-4 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">Update alumni</a>
                                @else
                                    <a href="/alumni-form" class="inline-block mt-4 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">Request To Alumni</a>
                                @endif
                            @else
                                <a href="/alumni-form" class="inline-block mt-4 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">Request To Alumni</a>
                            @endif
                            @if(count($alumni) != 0)
                                @if($alumni[0]->is_active == true)
                                    <a href="/posts" class="inline-block mt-4 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">Posts List</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
        </section>
    </div>
</x-app-layout>