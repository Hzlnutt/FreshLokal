<div class="card border-0 shadow-sm">
    <div class="card-body">
        <p class="text-muted mb-4">
            <i class="fas fa-exclamation-triangle me-2"></i>Setelah akun Anda dihapus, semua data dan resource akan dihapus secara permanen.
        </p>

        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" 
                       class="form-control" autocomplete="current-password">
                @error('password', 'userDeletion')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                    <i class="fas fa-trash-alt me-2"></i>Hapus Akun
                </button>
            </div>

            <!-- Confirmation Modal -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger">
                                <i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Penghapusan Akun
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus akun Anda? Tindakan ini tidak dapat dibatalkan.</p>
                            <p class="fw-bold">Semua data Anda akan dihapus secara permanen.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Batal
                            </button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt me-2"></i>Ya, Hapus Akun
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>