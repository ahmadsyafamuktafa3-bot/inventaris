<x-guest-layout>
    @section('title', 'Forgot Password')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Forgot Your Password?</h1>
    </div>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="user">
        @csrf

        <div class="form-group">
            <input type="email" name="email" value="{{ old('email') }}"
                class="form-control form-control-user @error('email') is-invalid @enderror"
                placeholder="Email Address" required autofocus>
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Email Password Reset Link
        </button>
    </form>

    <hr>

    <div class="text-center">
        <a class="small" href="{{ route('login') }}">Back to Login</a>
    </div>
</x-guest-layout>
