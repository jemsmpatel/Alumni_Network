<x-app-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>

    <div class="bg-gray-100 py-10">
        <section class="max-w-6xl sm:mx-auto mx-5 bg-white p-10 rounded-xl shadow-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Contact Info -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Get in Touch</h2>
                    <p class="text-gray-600 mb-6">We'd love to hear from our alumni. Reach out with your questions, feedback, or just to say hello!</p>
                    <div class="space-y-4 text-gray-700">
                        <div>
                            <p class="text-4xl font-bold text-gray-800 mb-5">Need More Help?</p>
                            <strong>Email:</strong>
                            <p>alumni@example.com</p>
                        </div>
                        <div>
                            <strong>Phone:</strong>
                            <p>+91 98765 43210</p>
                        </div>
                        <div>
                            <strong>Address:</strong>
                            <p>Alumni Cell, ABC College,<br>Surat, Gujarat, India</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div>
                    <p class="text-4xl font-bold text-gray-800 mb-5 text-center">Contect Us</p>
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block mb-1 text-gray-700 font-medium">Full Name</label>
                            <input type="text" name="name" required class="w-full border border-gray-300 p-3 rounded"
                                placeholder="Enter Full Name">
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700 font-medium">Email</label>
                            <input type="email" name="email" required class="w-full border border-gray-300 p-3 rounded"
                                placeholder="Enter Your Email">
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700 font-medium">Subject</label>
                            <input type="Subject" name="subject" required class="w-full border border-gray-300 p-3 rounded"
                                placeholder="Enter Your Subject">
                        </div>
                        <div>
                            <label class="block mb-1 text-gray-700 font-medium">Message</label>
                            <textarea name="message" rows="5" required class="w-full border border-gray-300 p-3 rounded"
                                placeholder="Write Your Message Here"></textarea>
                        </div>
                        <div class="w-full mt-6 flex justify-center">
                            <button type="submit" class="bg-gray-700 text-white px-6 py-2 rounded hover:bg-gray-800">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

</x-app-layout>