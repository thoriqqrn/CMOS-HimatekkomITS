<?php $__env->startSection('title', $program->name); ?>
<?php $__env->startSection('page-title', $program->name); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card animate-fadeIn mb-4">
            <div class="card-body">
                <div class="d-flex align-center gap-3 mb-3">
                    <div class="stat-icon primary" style="width: 56px; height: 56px; font-size: 1.5rem;">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="flex-1">
                        <h5 class="mb-1"><?php echo e($program->name); ?></h5>
                        <span class="badge badge-<?php echo e($program->status === 'completed' ? 'success' : ($program->status === 'active' ? 'warning' : 'secondary')); ?>">
                            <?php echo e(ucfirst($program->status)); ?>

                        </span>
                    </div>
                </div>
                
                <?php if($program->description): ?>
                <p class="text-muted fs-sm"><?php echo e($program->description); ?></p>
                <?php endif; ?>
                
                <hr class="my-3">
                
                <div class="d-flex justify-between mb-2">
                    <span class="text-muted">Departemen</span>
                    <span class="fw-semibold"><?php echo e($program->department->name ?? '-'); ?></span>
                </div>
                <div class="d-flex justify-between mb-2">
                    <span class="text-muted">Periode</span>
                    <span class="fw-semibold"><?php echo e($program->start_date->format('d M')); ?> - <?php echo e($program->end_date->format('d M Y')); ?></span>
                </div>
                <div class="d-flex justify-between mb-2">
                    <span class="text-muted">PIC</span>
                    <span class="fw-semibold"><?php echo e($program->creator->name ?? '-'); ?></span>
                </div>
                
                <hr class="my-3">
                
                <div class="mb-3">
                    <label class="text-muted fs-sm">Progress</label>
                    <div class="d-flex align-center gap-2">
                        <div class="progress flex-1" style="height: 10px;">
                            <div class="progress-bar <?php echo e($program->progress_percentage >= 100 ? 'success' : ''); ?>" style="width: <?php echo e($program->progress_percentage); ?>%;"></div>
                        </div>
                        <span class="fw-bold"><?php echo e($program->progress_percentage); ?>%</span>
                    </div>
                </div>
                
                <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('programs.edit', $program)); ?>" class="btn btn-primary flex-1">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?php echo e(route('programs.index')); ?>" class="btn btn-secondary flex-1">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <?php else: ?>
                <a href="<?php echo e(route('programs.index')); ?>" class="btn btn-secondary w-100">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Team Members -->
        <div class="card animate-fadeIn">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-users text-primary"></i>
                    Tim
                </h3>
                <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                    <i class="fas fa-plus"></i>
                </button>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $program->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="d-flex align-center gap-2 <?php echo e(!$loop->last ? 'mb-3' : ''); ?>">
                    <img src="<?php echo e($member->avatar_url); ?>" alt="<?php echo e($member->name); ?>" class="avatar-sm">
                    <div class="flex-1">
                        <div class="fw-semibold fs-sm"><?php echo e($member->name); ?></div>
                        <span class="badge badge-<?php echo e($member->pivot->role === 'leader' ? 'primary' : 'secondary'); ?> fs-xs">
                            <?php echo e(ucfirst($member->pivot->role)); ?>

                        </span>
                    </div>
                    <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
                    <form action="<?php echo e(route('programs.members.remove', [$program, $member])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger btn-icon" title="Hapus">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-muted text-center mb-0">Belum ada anggota tim</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-8">
        <!-- Tasks -->
        <div class="card animate-fadeIn mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-tasks text-primary"></i>
                    Task
                </h3>
                <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
                <a href="<?php echo e(route('tasks.create')); ?>?program_id=<?php echo e($program->id); ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah Task
                </a>
                <?php endif; ?>
            </div>
            <div class="card-body p-0">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Assignee</th>
                                <th>Status</th>
                                <th>Progress</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $program->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="fw-semibold"><?php echo e($task->title); ?></td>
                                <td>
                                    <?php if($task->assignee): ?>
                                    <div class="d-flex align-center gap-2">
                                        <img src="<?php echo e($task->assignee->avatar_url); ?>" alt="" class="avatar-sm">
                                        <span class="fs-sm"><?php echo e($task->assignee->name); ?></span>
                                    </div>
                                    <?php else: ?>
                                    <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge badge-<?php echo e($task->status_badge); ?>">
                                        <?php echo e(ucfirst(str_replace('_', ' ', $task->status))); ?>

                                    </span>
                                </td>
                                <td style="min-width: 100px;">
                                    <div class="d-flex align-center gap-2">
                                        <div class="progress" style="flex: 1; height: 6px;">
                                            <div class="progress-bar" style="width: <?php echo e($task->progress); ?>%;"></div>
                                        </div>
                                        <span class="fs-xs"><?php echo e($task->progress); ?>%</span>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('tasks.show', $task)); ?>" class="btn btn-sm btn-secondary btn-icon">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada task
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Timelines -->
        <div class="card animate-fadeIn">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-calendar text-primary"></i>
                    Timeline
                </h3>
            </div>
            <div class="card-body">
                <?php $__empty_1 = true; $__currentLoopData = $program->timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="d-flex gap-3 <?php echo e(!$loop->last ? 'mb-3 pb-3' : ''); ?>" style="<?php echo e(!$loop->last ? 'border-bottom: 1px solid var(--border-color);' : ''); ?>">
                    <div style="width: 4px; background: <?php echo e($timeline->color); ?>; border-radius: 4px;"></div>
                    <div class="flex-1">
                        <div class="fw-semibold"><?php echo e($timeline->title); ?></div>
                        <div class="text-muted fs-xs">
                            <?php echo e($timeline->start_date->format('d M')); ?> - <?php echo e($timeline->end_date->format('d M Y')); ?>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-muted text-center mb-0">Belum ada timeline</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
<!-- Add Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('programs.members.add', $program)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Anggota Tim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">User</label>
                        <select name="user_id" class="form-control form-select" required>
                            <option value="">-- Pilih User --</option>
                            <?php $__currentLoopData = \App\Models\User::active()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-control form-select" required>
                            <option value="member">Member</option>
                            <option value="leader">Leader</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/programs/show.blade.php ENDPATH**/ ?>