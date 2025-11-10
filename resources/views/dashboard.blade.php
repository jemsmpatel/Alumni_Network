<x-app-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <!-- Carousel Section -->
    <div class="flex justify-center bg-gray-100 z-0">
        <div class="relative w-full overflow-hidden rounded-b-lg shadow-lg">

            <!-- Slides -->
            <div class="carousel-item active">
                <img src="/first.jpg"
                    class="w-full object-cover object-[center_50%] md:h-[80vh] h-[40vh]" />
                <div
                    class="hidden md:flex md:flex-col sm:absolute bottom-28 justify-center bg-black/50 text-white p-4 mx-[10%] rounded-3xl w-[80%]">
                    <h5 class="text-lg text-center font-bold">D.C. Patel Educational Campus</h5>
                    <p class="text-center">Where knowledge begins and lifelong connections grow.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/second.jpg"
                    class="w-full object-cover object-[center_70%] md:h-[80vh] h-[40vh]" />
                <div
                    class="hidden md:flex md:flex-col sm:absolute bottom-28 justify-center bg-black/50 text-white p-4 mx-[10%] rounded-3xl w-[80%]">
                    <h5 class="text-lg text-center font-bold">Strength. Discipline. Unity.</h5>
                    <p class="text-center">Our campus instills courage, leadership, and teamwork.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/third.jpg"
                    class="w-full object-cover md:h-[80vh] h-[40vh]" />
                <div
                    class="hidden md:flex md:flex-col sm:absolute bottom-28 justify-center bg-black/50 text-white p-4 mx-[10%] rounded-3xl w-[80%]">
                    <h5 class="text-lg text-center font-bold">A World of Knowledge</h5>
                    <p class="text-center">The library that shaped our ideas and inspired our journey.</p>
                </div>
            </div>

            <!-- Indicators -->
            <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-2 z-5">
                <button class="w-3 h-3 rounded-full bg-white opacity-70" onclick="goToSlide(0)" id="dot0"></button>
                <button class="w-3 h-3 rounded-full bg-white opacity-70" onclick="goToSlide(1)" id="dot1"></button>
                <button class="w-3 h-3 rounded-full bg-white opacity-70" onclick="goToSlide(2)" id="dot2"></button>
            </div>

            <!-- Prev / Next Buttons -->
            <button onclick="prevSlide()"
                class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-black/50 text-white p-2 rounded-full">
                &#10094;
            </button>
            <button onclick="nextSlide()"
                class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-black/50 text-white p-2 rounded-full">
                &#10095;
            </button>
        </div>
    </div>

    <!-- Carousel Script -->
    <script>
        let current = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const dots = [dot0, dot1, dot2];

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                slide.classList.add('hidden');
                dots[i].classList.remove('opacity-100');
                dots[i].classList.add('opacity-70');
            });
            slides[index].classList.remove('hidden');
            slides[index].classList.add('active');
            dots[index].classList.remove('opacity-70');
            dots[index].classList.add('opacity-100');
        }

        function nextSlide() {
            current = (current + 1) % slides.length;
            showSlide(current);
        }

        function prevSlide() {
            current = (current - 1 + slides.length) % slides.length;
            showSlide(current);
        }

        function goToSlide(index) {
            current = index;
            showSlide(current);
        }

        setInterval(() => {
            nextSlide();
        }, 3000); // Auto-slide every 3 seconds
    </script>

    <div class="bg-gray-100 min-h-screen py-16 sm:px-16 px-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-14 max-w-7xl mx-auto">
            @if($posts)
                @foreach($posts as $post)
                <div class="bg-white rounded-3xl shadow-md overflow-hidden" x-data="{ showAll: false }">
                    <!-- Post Header -->
                    <div class="flex items-center px-4 py-3">
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="{{ $post->user->profile_image }}" alt="User avatar">
                        <div class="ml-3">
                            <p class="text-sm font-semibold">{{ $post->user->name }}</p>
                        </div>
                    </div>

                    <!-- Post Image -->
                    <div class="flex justify-center">
                        <img class="max-h-[400px]" src="{{ $post->image }}" alt="Post image">
                    </div>

                    <!-- Likes -->
                    <div class="flex items-center px-4 py-2">
                        <form action="{{ route('posts.like', $post->id) }}" method="POST" class="mr-3">
                            @csrf
                            <button type="submit">
                                ❤️
                            </button>
                        </form>
                        Liked by <span class="font-bold ml-2"> {{ $post->total_likes }} users</span>
                    </div>

                    <!-- Caption -->
                    <div class="px-4 py-2 text-wrap break-words">
                        {{ $post->description }}
                    </div>

                    <!-- Comments -->
                    <div class="px-4 pb-2 text-sm text-gray-700">
                        @if($post->total_comments > 2)
                            <button class="text-gray-500 mb-2"
                                    @click="showAll = !showAll">
                                View all {{ $post->total_comments }} comments
                            </button>
                        @endif

                        <!-- Comments list -->
                        <div :class="showAll ? 'max-h-40 overflow-y-auto' : ''">
                            <template x-for="(comment, index) in {{ $post->comment->toJson() }}" :key="comment.id">
                                <div x-show="showAll || index < 2" class="flex items-start space-x-2 mb-2">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        :src="comment.user?.profile_image || 'default-avatar.png'"
                                        alt="User avatar">
                                    <div>
                                        <span class="font-semibold" x-text="comment.user?.name"></span>
                                        <span x-text="comment.message"></span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Add Comment -->
                    @if(session('success-comment'))
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @else
                    <form action="{{ route('comments.store', $post->id) }}" method="POST" class="px-4 py-2 w-full flex items-center border-t">
                        @csrf
                        <input
                            class="flex-1 outline-none text-sm h-10 px-3 border border-gray-300 rounded-lg"
                            name="message"
                            type="text"
                            placeholder="Add a comment..."
                        />
                        <button class="ml-2 text-white text-sm bg-gray-700 px-4 h-10 rounded-lg font-semibold hover:bg-gray-800" >
                            Post
                        </button>
                    </form>
                    @endif
                </div>
                @endforeach
            @endif
        </div>
    </div>


</x-app-layout>