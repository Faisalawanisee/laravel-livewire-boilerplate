<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" class="form-label" :value="__('Email')" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" class="form-label" :value="__('Password')" />
                <x-input id="password" class="form-control"
                type="password"
                name="password"
                required autocomplete="current-password" />
            </div>
            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="text-center mt-4">
                <x-button class="mb-3">
                    {{ __('Log in') }}
                </x-button>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
    </x-auth-card>
            
</x-guest-layout>
