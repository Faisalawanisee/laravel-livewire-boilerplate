<x-guest-layout>
    <x-auth-card>

        <div class="mb-4">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" class="form-label" :value="__('Password')" />
                <x-input id="password" class="form-control"
                type="password"
                name="password"
                required autocomplete="current-password" />
            </div>

            <div class="mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
