<?php $__env->startSection('title', 'Proker Saya'); ?>
<?php $__env->startSection('page-title', 'Proker Saya'); ?>

<?php $__env->startSection('content'); ?>
<div class="card animate-fadeIn">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-project-diagram text-primary"></i>
            Daftar Proker Saya
        </h3>
    </div>
    <div class="card-body p-0">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Proker</th>
                        <th>Departemen</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Progress</th>
                        <th>Periode</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $user = auth()->user();
                        $isPic = $program->pics->contains('id', $user->id);
                        $isMember = $program->members->contains('id', $user->id);
                    ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('programs.show', $program)); ?>" class="fw-semibold">
                                <?php echo e($program->name); ?>

                            </a>
                        </td>
                        <td class="fs-sm"><?php echo e($program->department?->name ?? '-'); ?></td>
                        <td>
                            <?php if($isPic): ?>
                            <span class="badge badge-primary"><i class="fas fa-star"></i> PIC</span>
                            <?php elseif($isMember): ?>
                            <span class="badge badge-info">Member</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php
                                $statusBadge = match($program->status) {
                                    'planning' => 'secondary',
                                    'active' => 'warning',
                                    'completed' => 'success',
                                    'cancelled' => 'danger',
                                    default => 'secondary',
                                };
                            ?>
                            <span class="badge badge-<?php echo e($statusBadge); ?>"><?php echo e(ucfirst($program->status)); ?></span>
                        </td>
                        <td>
                            <div class="d-flex align-center gap-2">
                                <div class="progress" style="flex: 1; max-width: 100px;">
                                    <div class="progress-bar <?php echo e($program->progress >= 100 ? 'success' : 'primary'); ?>" style="width: <?php echo e($program->progress); ?>%;"></div>
                                </div>
                                <span class="fs-sm fw-semibold"><?php echo e($program->progress); ?>%</span>
                            </div>
                        </td>
                        <td class="fs-sm text-muted">
                            <?php echo e($program->start_date->format('d M')); ?> - <?php echo e($program->end_date->format('d M Y')); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada proker yang Anda ikuti
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/programs/my.blade.php ENDPATH**/ ?>