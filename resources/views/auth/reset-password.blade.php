<x-guest-layout>
    @section('title', 'Reset Password')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="user">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <input type="email" name="email" value="{{ old('email', $request->email) }}"
                class="form-control form-control-user @error('email') is-invalid @enderror"
                placeholder="Email Address" required autofocus autocomplete="username">
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password"
                class="form-control form-control-user @error('password') is-invalid @enderror"
                placeholder="Password" required autocomplete="new-password">
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation"
                class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                placeholder="Confirm Password" required autocomplete="new-password">
            @error('password_confirmation')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Reset Password
        </button>
    </form>

    <hr>

    <div class="text-center">
        <a class="small" href="{{ route('login') }}">Back to Login</a>
    </div>
</x-guest-layout>
