<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="form-label" for="email" :value="__('Email')" class="text-green"> Email</label>
            <input class="form-control" id="email" class="l" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="form-label" for="password" :value="__('Password')" >password</label>

            <input class="form-control" id="password" class=""
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <input class="form-check-input" id="remember_me" type="checkbox" name="remember">

            <label class="form-check-label" for="remember_me" class="inline-flex items-center">
                <!-- <span >{{ __('Remember me') }}</span> -->
                Remember me
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="btn border">
            {{ __('Log in') }}
            </button>
            <!-- <a href="" class="btn border"></a> -->

            <a href="{{route('register')}}" class="btn border">register</a>
        </div>
    </form>
</x-guest-layout>
