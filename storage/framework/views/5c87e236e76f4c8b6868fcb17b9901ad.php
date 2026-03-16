<?php $__env->startSection('title', 'Edit Profil'); ?>
<?php $__env->startSection('page-title', 'Edit Profil'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.profile-card {
    max-width: 600px;
    margin: 0 auto;
}
.profile-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.avatar-upload {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
    padding: 24px;
    background: var(--gray-50);
    border-radius: 16px;
}
.avatar-preview {
    position: relative;
    width: 150px;
    height: 150px;
}
.avatar-preview img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--primary);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}
.avatar-preview .avatar-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
    cursor: pointer;
}
.avatar-preview:hover .avatar-overlay {
    opacity: 1;
}
.avatar-overlay i {
    color: white;
    font-size: 2rem;
}
.avatar-actions {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: center;
}
.file-input-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
}
.file-input-wrapper input[type=file] {
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
}
.user-info-card {
    background: var(--gray-50);
    border-radius: 12px;
    padding: 16px;
    margin-bottom: 24px;
}
.user-info-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 8px 0;
}
.user-info-item:not(:last-child) {
    border-bottom: 1px solid var(--border-color);
}
.user-info-item i {
    width: 24px;
    color: var(--primary);
}
.user-info-label {
    font-size: 0.8rem;
    color: var(--text-muted);
}
.user-info-value {
    font-weight: 500;
}
.modal-backdrop-custom {
    position: fixed;
    inset: 0;
    background: rgba(15, 23, 42, 0.55);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    padding: 16px;
}
.modal-backdrop-custom.is-active {
    display: flex;
}
.modal-card-custom {
    width: 100%;
    max-width: 520px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 24px 48px rgba(2, 6, 23, 0.2);
    overflow: hidden;
    animation: modalPop 0.2s ease;
}
.modal-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
}
.modal-card-title {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
}
.modal-card-body {
    padding: 20px;
}
.modal-card-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    padding: 0 20px 20px;
}
.modal-close-btn {
    border: none;
    background: transparent;
    color: var(--text-muted);
    font-size: 1.1rem;
    line-height: 1;
    cursor: pointer;
}
.password-help {
    margin-top: 4px;
    font-size: 0.78rem;
    color: var(--text-muted);
}
@keyframes modalPop {
    from {
        opacity: 0;
        transform: translateY(8px) scale(0.98);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $hasPasswordErrors = $errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation');
?>

<div class="profile-card">
    <div class="card animate-fadeIn">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-user-edit text-primary"></i>
                Edit Profil
            </h3>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                
                <!-- Avatar Upload -->
                <div class="avatar-upload">
                    <div class="avatar-preview">
                        <img src="<?php echo e($user->avatar_url); ?>" alt="<?php echo e($user->name); ?>" id="avatarPreview">
                        <label for="avatarInput" class="avatar-overlay">
                            <i class="fas fa-camera"></i>
                        </label>
                    </div>
                    <div class="avatar-actions">
                        <div class="file-input-wrapper">
                            <button type="button" class="btn btn-primary btn-sm">
                                <i class="fas fa-upload"></i> Ganti Foto
                            </button>
                            <input type="file" name="avatar" id="avatarInput" accept="image/*" onchange="previewAvatar(this)">
                        </div>
                        <?php if($user->avatar): ?>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeAvatar()">
                            <i class="fas fa-trash"></i> Hapus Foto
                        </button>
                        <?php endif; ?>
                    </div>
                    <small class="text-muted">Format: JPG, PNG, GIF, WebP. Maks 2MB</small>
                </div>
                
                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           value="<?php echo e(old('name', $user->name)); ?>" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                <!-- Read-only Info -->
                <div class="user-info-card">
                    <div class="user-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <div class="user-info-label">Email</div>
                            <div class="user-info-value"><?php echo e($user->email); ?></div>
                        </div>
                    </div>
                    <div class="user-info-item">
                        <i class="fas fa-user-tag"></i>
                        <div>
                            <div class="user-info-label">Role</div>
                            <div class="user-info-value"><?php echo e($user->role_name); ?></div>
                        </div>
                    </div>
                    <?php if($user->department): ?>
                    <div class="user-info-item">
                        <i class="fas fa-building"></i>
                        <div>
                            <div class="user-info-label">Departemen</div>
                            <div class="user-info-value"><?php echo e($user->department->name); ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="user-info-item">
                        <i class="fas fa-calendar"></i>
                        <div>
                            <div class="user-info-label">Bergabung</div>
                            <div class="user-info-value"><?php echo e($user->created_at->format('d M Y')); ?></div>
                        </div>
                    </div>
                </div>
                
                <div class="profile-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <button type="button" class="btn btn-warning" id="openPasswordModalBtn">
                        <i class="fas fa-lock"></i> Ubah Password
                    </button>
                    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal-backdrop-custom <?php echo e($hasPasswordErrors ? 'is-active' : ''); ?>" id="passwordModal" aria-hidden="<?php echo e($hasPasswordErrors ? 'false' : 'true'); ?>">
    <div class="modal-card-custom" role="dialog" aria-modal="true" aria-labelledby="passwordModalTitle">
        <div class="modal-card-header">
            <h5 class="modal-card-title" id="passwordModalTitle">
                <i class="fas fa-key text-primary"></i> Ubah Password
            </h5>
            <button type="button" class="modal-close-btn" id="closePasswordModalBtn" aria-label="Tutup">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form method="POST" action="<?php echo e(route('profile.password.update')); ?>" id="passwordForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="modal-card-body">
                <div class="form-group">
                    <label for="current_password" class="form-label">Password Saat Ini</label>
                    <input type="password" id="current_password" name="current_password"
                           class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           autocomplete="current-password" required>
                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" id="password" name="password"
                           class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           autocomplete="new-password" required>
                    <small class="password-help">Gunakan minimal 8 karakter kombinasi huruf, angka, dan simbol.</small>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           autocomplete="new-password" required>
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="modal-card-footer">
                <button type="button" class="btn btn-secondary" id="cancelPasswordModalBtn">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i> Simpan Password
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Remove Avatar Form -->
<form id="removeAvatarForm" action="<?php echo e(route('profile.avatar.remove')); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function previewAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatarPreview').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeAvatar() {
    Swal.fire({
        title: 'Hapus Foto Profil?',
        text: 'Foto profil akan dihapus dan diganti dengan avatar default.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EF4444',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('removeAvatarForm').submit();
        }
    });
}

const passwordModal = document.getElementById('passwordModal');
const openPasswordModalBtn = document.getElementById('openPasswordModalBtn');
const closePasswordModalBtn = document.getElementById('closePasswordModalBtn');
const cancelPasswordModalBtn = document.getElementById('cancelPasswordModalBtn');

function openPasswordModal() {
    passwordModal.classList.add('is-active');
    passwordModal.setAttribute('aria-hidden', 'false');
}

function closePasswordModal() {
    passwordModal.classList.remove('is-active');
    passwordModal.setAttribute('aria-hidden', 'true');
}

openPasswordModalBtn.addEventListener('click', openPasswordModal);
closePasswordModalBtn.addEventListener('click', closePasswordModal);
cancelPasswordModalBtn.addEventListener('click', closePasswordModal);

passwordModal.addEventListener('click', function (event) {
    if (event.target === passwordModal) {
        closePasswordModal();
    }
});

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && passwordModal.classList.contains('is-active')) {
        closePasswordModal();
    }
});

<?php if(session('status') === 'password-updated'): ?>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: 'Password berhasil diperbarui.',
    timer: 2200,
    showConfirmButton: false
});
<?php endif; ?>

<?php if(session('success') && session('status') !== 'password-updated'): ?>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: <?php echo json_encode(session('success'), 15, 512) ?>,
    timer: 2200,
    showConfirmButton: false
});
<?php endif; ?>

<?php if($hasPasswordErrors): ?>
Swal.fire({
    icon: 'error',
    title: 'Gagal Ubah Password',
    text: 'Periksa kembali input password kamu.',
    confirmButtonText: 'Oke'
});
<?php endif; ?>
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/profile/edit.blade.php ENDPATH**/ ?>