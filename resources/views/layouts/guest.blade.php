<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $header }}
            <main class="mt-[76px]">
                {{ $slot }}
            </main>
            <!-- Footer -->
            <footer class="bg-gray-900 text-white pt-10 pb-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col lg:flex-row gap-8">

                        <!-- Left Side: Logo and About (50%) -->
                        <div class="lg:w-1/2 w-full">
                            <div class="flex flex-col items-center mb-4 mr-10">
                                <img src="https://play-lh.googleusercontent.com/vc1c4PCVOHKpdxZSrHNUjmR3pxEEVzW1AYcA6j3Me3hkSVqkL5n-8n4LkwTyh28Ydw"
                                    alt="Alumni Logo" class="h-40 w-40 rounded-full shadow-md" />
                            </div>
                            <div class="text-2xl font-bold text-center mr-10">Alumni Network</div>
                            <p class="text-gray-400 text-sm mt-2">
                                We connect our alumni with the institution and each other, creating opportunities for
                                collaboration,
                                mentorship, and professional growth. Stay connected, stay inspired!
                            </p>
                        </div>

                        <!-- Right Side: Links & Contact Info (50%) -->
                        <div class="lg:w-1/2 w-full grid grid-cols-1 sm:grid-cols-3 gap-6">

                            <!-- Quick Links -->
                            <div>
                                <h2 class="text-xl font-semibold mb-4">Quick Links</h2>
                                <ul class="text-gray-400 text-sm space-y-2">
                                    <li><a href="#" class="hover:text-white">Home</a></li>
                                    <li><a href="#" class="hover:text-white">Events</a></li>
                                    <li><a href="#" class="hover:text-white">Gallery</a></li>
                                    <li><a href="#" class="hover:text-white">News</a></li>
                                </ul>
                            </div>

                            <!-- Useful Links -->
                            <div>
                                <h2 class="text-xl font-semibold mb-4">Useful Links</h2>
                                <ul class="text-gray-400 text-sm space-y-2">
                                    <li><a href="#" class="hover:text-white">Login</a></li>
                                    <li><a href="#" class="hover:text-white">Register</a></li>
                                    <li><a href="#" class="hover:text-white">Donate</a></li>
                                    <li><a href="#" class="hover:text-white">Contact Us</a></li>
                                </ul>
                            </div>

                            <!-- Contact Info -->
                            <div>
                                <h2 class="text-xl font-semibold mb-4">Contact Us</h2>
                                <p class="text-gray-400 text-sm">123 Alumni Street,<br>Surat, Gujarat - 395007</p>
                                <p class="text-gray-400 text-sm mt-2">Email: info@alumniportal.com</p>
                                <p class="text-gray-400 text-sm">Phone: +91 98765 43210</p>
                            </div>
                            <!-- Step 3: Social Icons -->
                            <div class="w-full"></div>
                            <div class="flex justify-center item-center space-x-9 text-white text-2xl mb-3">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Bar -->
                    <div class="mt-10 border-t border-gray-700 pt-4 text-center text-gray-500 text-sm">
                        © 2025 [Your College Name] Alumni Network. All rights reserved.
                    </div>

                </div>
            </footer>
        </div>
    </body>
</html>
