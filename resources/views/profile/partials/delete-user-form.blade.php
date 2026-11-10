<section>
    <header class="mb-4">
        <h2 class="h5 text-gray-900 mb-0">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmUserDeletionModal">
        <i class="fas fa-trash mr-1"></i> {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="form-group">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>
                            <input id="password" name="password" type="password"
                                class="form-control @if ($errors->userDeletion->get('password')) is-invalid @endif"
                                placeholder="{{ __('Password') }}">
                            @if ($errors->userDeletion->get('password'))
                                <div class="invalid-feedback">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="btn btn-danger">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@if ($errors->userDeletion->isNotEmpty())
    @push('scripts')
        <script>
            $(function() {
                $('#confirmUserDeletionModal').modal('show');
            });
        </script>
    @endpush
@endif
