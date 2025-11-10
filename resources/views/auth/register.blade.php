<x-guest-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>
    <x-auth-card>

        <h2 class="text-center text-4xl font-bold mb-4">Sign Up</h2>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>
            <!-- Year -->
            <div class="mt-4">
                <x-label for="year" :value="__('Year')" />
                <x-input id="year" class="block mt-1 w-full" type="number" name="year" :value="old('year')" required />
            </div>
            <!-- Intrasts -->
            <div class="mt-4">
                <x-label for="interests" :value="__('Interests (Comma Seprated)')" />
                <x-input id="interests" class="block mt-1 w-full" type="text" name="interests" :value="old('interests')" required />
            </div>
            <!-- Goals -->
            <div class="mt-4">
                <x-label for="goals" :value="__('Goals (Comma Seprated)')" />
                <x-input id="goals" class="block mt-1 w-full" type="text" name="goals" :value="old('goals')" required />
            </div>
            <!-- Image -->
            <div class="mt-4">
                <x-label for="image" :value="__('image')" />
                <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
