<x-guest-layout>
    @section('title', 'Verify Email')

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Verify Your Email</h1>
    </div>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="user">
        @csrf

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Resend Verification Email
        </button>
    </form>

    <hr>

    <form method="POST" action="{{ route('logout') }}" class="text-center">
        @csrf

        <button type="submit" class="btn btn-link btn-sm p-0">
            Log Out
        </button>
    </form>
</x-guest-layout>
