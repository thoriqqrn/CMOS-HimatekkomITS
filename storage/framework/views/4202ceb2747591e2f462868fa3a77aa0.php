<?php $__env->startSection('title', 'Detail Task'); ?>
<?php $__env->startSection('page-title', $task->title); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card animate-fadeIn">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-clipboard-check text-primary"></i>
                    Detail Task
                </h3>
                <div class="d-flex gap-2">
                    <span class="badge badge-<?php echo e($task->status_badge); ?>">
                        <?php echo e(ucfirst(str_replace('_', ' ', $task->status))); ?>

                    </span>
                    <span class="badge badge-<?php echo e($task->priority_badge); ?>">
                        <?php echo e(ucfirst($task->priority)); ?>

                    </span>
                </div>
            </div>
            <div class="card-body">
                <h4 class="mb-3"><?php echo e($task->title); ?></h4>
                
                <?php if($task->description): ?>
                <p class="text-muted"><?php echo e($task->description); ?></p>
                <?php endif; ?>
                
                <hr class="my-3">
                
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="text-muted fs-sm">Tipe Task</label>
                            <div class="fw-semibold">
                                <?php if($task->is_global): ?>
                                    <span class="badge badge-primary">Global</span>
                                <?php elseif($task->program_id): ?>
                                    <a href="<?php echo e(route('tasks.program', $task->program)); ?>"><?php echo e($task->program->name); ?></a>
                                <?php elseif($task->department_id): ?>
                                    <a href="<?php echo e(route('tasks.department.tasks', $task->department)); ?>"><?php echo e($task->department->name); ?></a>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="text-muted fs-sm">Departemen</label>
                            <div class="fw-semibold">
                                <?php echo e($task->program?->department?->name ?? $task->department?->name ?? 'Global'); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="text-muted fs-sm">Deadline</label>
                            <div class="fw-semibold <?php echo e($task->is_overdue ? 'text-danger' : ''); ?>">
                                <?php echo e($task->deadline?->format('d M Y') ?? '-'); ?>

                                <?php if($task->is_overdue): ?>
                                <span class="badge badge-danger">Overdue</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="text-muted fs-sm">Dibuat oleh</label>
                            <div class="d-flex align-center gap-2">
                                <?php if($task->creator): ?>
                                <img src="<?php echo e($task->creator->avatar_url); ?>" alt="<?php echo e($task->creator->name); ?>" class="avatar-sm">
                                <span class="fw-semibold"><?php echo e($task->creator->name); ?></span>
                                <?php else: ?>
                                <span class="text-muted">-</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr class="my-3">
                
                <!-- Progress Update -->
                <div class="mb-4">
                    <label class="form-label">Progress: <?php echo e($task->progress); ?>%</label>
                    <div class="progress mb-3" style="height: 12px;">
                        <div class="progress-bar <?php echo e($task->progress >= 100 ? 'success' : ''); ?>" style="width: <?php echo e($task->progress); ?>%;"></div>
                    </div>
                    
                    <?php if(auth()->user()->id === $task->assigned_to || auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
                    <form action="<?php echo e(route('tasks.progress', $task)); ?>" method="POST" class="d-flex align-center gap-3">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <input type="range" name="progress" class="flex-1" min="0" max="100" step="5" value="<?php echo e($task->progress); ?>" id="progressSlider">
                        <span id="progressValue" class="fw-bold" style="min-width: 40px;"><?php echo e($task->progress); ?>%</span>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
                
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-4">
        <!-- Assignee Card -->
        <div class="card animate-fadeIn mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user text-primary"></i>
                    Ditugaskan Kepada
                </h3>
            </div>
            <div class="card-body">
                <?php if($task->assignee): ?>
                <div class="text-center">
                    <img src="<?php echo e($task->assignee->avatar_url); ?>" alt="<?php echo e($task->assignee->name); ?>" class="avatar-lg mb-3">
                    <h5 class="mb-1"><?php echo e($task->assignee->name); ?></h5>
                    <p class="text-muted fs-sm mb-2"><?php echo e($task->assignee->email); ?></p>
                    <span class="badge badge-<?php echo e($task->assignee->role?->name === 'kabinet' ? 'info' : 'secondary'); ?>">
                        <?php echo e(ucfirst($task->assignee->role?->name ?? '-')); ?>

                    </span>
                </div>
                <?php else: ?>
                <div class="empty-state" style="padding: 1rem;">
                    <div class="empty-state-icon" style="width: 48px; height: 48px;">
                        <i class="fas fa-user-slash"></i>
                    </div>
                    <p class="text-muted fs-sm mb-0">Belum ada assignee</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Info Card -->
        <div class="card animate-fadeIn">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-info-circle text-primary"></i>
                    Info
                </h3>
            </div>
            <div class="card-body">
                <div class="d-flex justify-between mb-2">
                    <span class="text-muted">Dibuat</span>
                    <span class="fw-semibold"><?php echo e($task->created_at->format('d M Y H:i')); ?></span>
                </div>
                <div class="d-flex justify-between mb-2">
                    <span class="text-muted">Diupdate</span>
                    <span class="fw-semibold"><?php echo e($task->updated_at->format('d M Y H:i')); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('progressSlider')?.addEventListener('input', function() {
    document.getElementById('progressValue').textContent = this.value + '%';
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/tasks/show.blade.php ENDPATH**/ ?>