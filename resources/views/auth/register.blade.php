<x-guest-layout>
    @section('title', 'Register')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
    </div>

    <form method="POST" action="{{ route('register') }}" class="user">
        @csrf

        <div class="form-group">
            <input type="text" name="name" value="{{ old('name') }}"
                class="form-control form-control-user @error('name') is-invalid @enderror"
                placeholder="Name" required autofocus autocomplete="name">
            @error('name')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="text" name="username" value="{{ old('username') }}"
                class="form-control form-control-user @error('username') is-invalid @enderror"
                placeholder="Username" required>
            @error('username')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="email" name="email" value="{{ old('email') }}"
                class="form-control form-control-user @error('email') is-invalid @enderror"
                placeholder="Email Address">
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
            Register Account
        </button>
    </form>

    <hr>

    <div class="text-center">
        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
    </div>
</x-guest-layout>
