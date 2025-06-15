<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <p class="text-muted mb-4">
            <i class="fas fa-shield-alt me-2"></i>Pastikan akun Anda menggunakan password yang kuat dan acak untuk tetap aman.
        </p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="current_password" class="form-label">Password Saat Ini</label>
                <input id="current_password" name="current_password" type="password" 
                       class="form-control" autocomplete="current-password">
                @error('current_password', 'updatePassword')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input id="password" name="password" type="password" 
                       class="form-control" autocomplete="new-password">
                @error('password', 'updatePassword')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" 
                       class="form-control" autocomplete="new-password">
                @error('password_confirmation', 'updatePassword')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-3 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Password
                </button>

                @if (session('status') === 'password-updated')
                    <p class="text-success mb-0">
                        <i class="fas fa-check-circle me-2"></i>Disimpan
                    </p>
                @endif
            </div>
        </form>
    </div>
</div>