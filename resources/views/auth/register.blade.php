<x-guest-layout>
    @section('title', 'Register')
    <div class="flex min-h-screen">
        <div
        class="bg-gradient-to-t from-[#ff1361bf] to-[#44107A] w-1/2  min-h-screen hidden lg:flex flex-col items-center justify-center text-white dark:text-black p-4">
            <div class="w-full mx-auto mb-5"
                class="lg:max-w-[370px] xl:max-w-[500px] mx-auto" ></div>
                <img class="w-68 ml-[5px] flex-none" src="{{ URL('assets/images/ANAA33remove.png') }}" alt="image">
    </div>
        <div class="w-full lg:w-1/2 relative flex justify-center items-center">
            <div class="max-w-[480px] p-5 md:p-10">
                <h2 class="font-bold text-3xl mb-3">Sign Up</h2>
                <p class="mb-7">Enter your email and password to register</p>
                <form method="POST" class="space-y-5" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>


                    <button type="submit" class="btn btn-primary w-full">SIGN UP</button>
                </form>
                
                <p class="text-center mt-4">Already have an account ? <a href="{{ route('login') }}"
                        class="text-primary font-bold hover:underline">Sign In</a></p>
            </div>
        </div>
    </div>
</x-guest-layout>