<x-guest-layout>
    @section('title', 'Confirm Password')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Confirm Password</h1>
    </div>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="user">
        @csrf

        <div class="form-group">
            <input type="password" name="password"
                class="form-control form-control-user @error('password') is-invalid @enderror"
                placeholder="Password" required autocomplete="current-password">
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Confirm
        </button>
    </form>
</x-guest-layout>
