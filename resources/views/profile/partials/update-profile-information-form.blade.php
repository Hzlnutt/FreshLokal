<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <p class="text-muted mb-4">
            <i class="fas fa-info-circle me-2"></i>Update informasi profil dan alamat email Anda.
        </p>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input id="name" name="name" type="text" class="form-control" 
                       value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" 
                       value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3">
                        <p class="text-muted">
                            <i class="fas fa-exclamation-circle me-2"></i>Alamat email Anda belum terverifikasi.
                            <button form="send-verification" class="btn btn-link p-0 text-primary">
                                Klik di sini untuk mengirim ulang email verifikasi.
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="text-success mt-2">
                                <i class="fas fa-check-circle me-2"></i>Tautan verifikasi baru telah dikirim ke alamat email Anda.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-3 mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>

                @if (session('status') === 'profile-updated')
                    <p class="text-success mb-0">
                        <i class="fas fa-check-circle me-2"></i>Disimpan
                    </p>
                @endif
            </div>
        </form>
    </div>
</div>