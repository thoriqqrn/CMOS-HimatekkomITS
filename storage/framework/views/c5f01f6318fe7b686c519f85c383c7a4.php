<?php $__env->startSection('title', 'Google Drive'); ?>
<?php $__env->startSection('page-title', 'Google Drive Organisasi'); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* Drive Modal */
.event-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    padding: 1rem;
}

.event-modal.show {
    display: flex;
}

.event-modal-content {
    background: var(--bg-card);
    border-radius: 16px;
    padding: 24px;
    max-width: 450px;
    width: 100%;
    animation: modalFadeIn 0.2s ease;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

@keyframes modalFadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

.alert-info {
    background: rgba(59, 130, 246, 0.1);
    border: 1px solid rgba(59, 130, 246, 0.3);
    color: #3B82F6;
    padding: 12px 16px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 1rem;
}

@media (max-width: 480px) {
    .event-modal-content {
        padding: 16px;
        max-width: 95%;
    }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="card animate-fadeIn">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fab fa-google-drive text-primary"></i>
            Daftar Drive
        </h3>
        <?php if(auth()->user()->isAdmin()): ?>
        <a href="<?php echo e(route('drives.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Drive
        </a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <?php $__empty_1 = true; $__currentLoopData = $drivesByDept; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deptName => $drives): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="mb-4">
            <h5 class="mb-3"><i class="fas fa-building text-muted"></i> <?php echo e($deptName); ?></h5>
            <div class="row">
                <?php $__currentLoopData = $drives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-center gap-3 mb-3">
                                <div class="stat-icon primary">
                                    <i class="fab fa-google-drive"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0"><?php echo e($drive->name); ?></h6>
                                    <span class="text-muted fs-xs"><?php echo e($drive->department?->name ?? 'Umum'); ?></span>
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-primary w-100" 
                                    data-drive-name="<?php echo e($drive->name); ?>"
                                    data-drive-email="<?php echo e($drive->email); ?>"
                                    data-drive-password="<?php echo e($drive->password); ?>"
                                    data-drive-url="<?php echo e($drive->drive_url); ?>"
                                    onclick="showDriveModal(this)">
                                <i class="fab fa-google-drive"></i>
                                Buka Drive
                            </button>
                            
                            <?php if(auth()->user()->isAdmin()): ?>
                            <div class="d-flex gap-1 mt-2">
                                <a href="<?php echo e(route('drives.edit', $drive)); ?>" class="btn btn-sm btn-secondary flex-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="<?php echo e(route('drives.destroy', $drive)); ?>" method="POST" class="flex-1"
                                      onsubmit="return confirm('Hapus drive ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger w-100">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fab fa-google-drive"></i>
            </div>
            <h5 class="empty-state-title">Belum Ada Drive</h5>
            <p class="empty-state-text">Admin belum menambahkan akun Google Drive.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Drive Login Modal -->
<div id="driveModal" class="event-modal">
    <div class="event-modal-content" style="max-width: 450px;">
        <div class="d-flex justify-between align-center mb-3">
            <h5 id="driveModalName" class="mb-0"></h5>
            <button type="button" class="btn btn-sm btn-icon btn-secondary" onclick="closeDriveModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            <span>Login dengan akun di bawah ini untuk mengakses Drive</span>
        </div>
        
        <div class="form-group">
            <label class="form-label">Email</label>
            <div class="d-flex gap-2">
                <input type="text" id="driveEmail" class="form-control" readonly>
                <button type="button" class="btn btn-secondary btn-icon" onclick="copyToClipboard('driveEmail')">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Password</label>
            <div class="d-flex gap-2">
                <input type="text" id="drivePassword" class="form-control" readonly>
                <button type="button" class="btn btn-secondary btn-icon" onclick="copyToClipboard('drivePassword')">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
        </div>
        
        <a href="#" id="driveUrl" target="_blank" class="btn btn-primary w-100 mt-3">
            <i class="fab fa-google-drive"></i>
            Buka Google Drive
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function showDriveModal(btn) {
    document.getElementById('driveModalName').textContent = btn.dataset.driveName;
    document.getElementById('driveEmail').value = btn.dataset.driveEmail;
    document.getElementById('drivePassword').value = btn.dataset.drivePassword;
    document.getElementById('driveUrl').href = btn.dataset.driveUrl;
    document.getElementById('driveModal').classList.add('show');
}

function closeDriveModal() {
    document.getElementById('driveModal').classList.remove('show');
}

function copyToClipboard(elementId) {
    const input = document.getElementById(elementId);
    input.select();
    document.execCommand('copy');
    
    Swal.fire({
        icon: 'success',
        title: 'Copied!',
        text: 'Teks berhasil disalin',
        timer: 1500,
        showConfirmButton: false
    });
}

document.getElementById('driveModal').addEventListener('click', function(e) {
    if (e.target === this) closeDriveModal();
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/drives/index.blade.php ENDPATH**/ ?>