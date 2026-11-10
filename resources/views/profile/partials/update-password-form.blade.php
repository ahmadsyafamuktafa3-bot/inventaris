<section>
    <header class="mb-4">
        <h2 class="h5 text-gray-900 mb-0">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="update_password_current_password">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password"
                class="form-control @if ($errors->updatePassword->get('current_password')) is-invalid @endif"
                autocomplete="current-password">
            @if ($errors->updatePassword->get('current_password'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="update_password_password">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password"
                class="form-control @if ($errors->updatePassword->get('password')) is-invalid @endif"
                autocomplete="new-password">
            @if ($errors->updatePassword->get('password'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="form-control @if ($errors->updatePassword->get('password_confirmation')) is-invalid @endif"
                autocomplete="new-password">
            @if ($errors->updatePassword->get('password_confirmation'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save mr-1"></i> {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-success text-sm mb-0 ml-3">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
