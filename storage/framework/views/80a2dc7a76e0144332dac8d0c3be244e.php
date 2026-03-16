<?php $__env->startSection('title', 'Program Kerja'); ?>
<?php $__env->startSection('page-title', 'Program Kerja'); ?>

<?php $__env->startSection('content'); ?>
<div class="card animate-fadeIn">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-project-diagram text-primary"></i>
            Daftar Program Kerja
        </h3>
        <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
        <a href="<?php echo e(route('programs.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Program
        </a>
        <?php endif; ?>
    </div>
    <div class="card-body p-0">
        <div class="table-container">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Departemen</th>
                        <th>Periode</th>
                        <th>Task</th>
                        <th>Progress</th>
                        <th>Status</th>
                        <th class="no-sort" style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="fw-semibold"><?php echo e($program->name); ?></td>
                        <td class="fs-sm"><?php echo e($program->department->name ?? '-'); ?></td>
                        <td class="fs-sm">
                            <?php echo e($program->start_date->format('d M')); ?> - <?php echo e($program->end_date->format('d M Y')); ?>

                        </td>
                        <td>
                            <span class="badge badge-info"><?php echo e($program->tasks_count); ?> task</span>
                        </td>
                        <td style="min-width: 120px;">
                            <?php $progress = $program->progress_percentage ?>
                            <div class="d-flex align-center gap-2">
                                <div class="progress" style="flex: 1; height: 6px;">
                                    <div class="progress-bar <?php echo e($progress >= 100 ? 'success' : ''); ?>" style="width: <?php echo e($progress); ?>%;"></div>
                                </div>
                                <span class="fs-xs text-muted" style="width: 35px;"><?php echo e($progress); ?>%</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-<?php echo e($program->status === 'completed' ? 'success' : ($program->status === 'active' ? 'warning' : ($program->status === 'cancelled' ? 'danger' : 'secondary'))); ?>">
                                <?php echo e(ucfirst($program->status)); ?>

                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="<?php echo e(route('programs.show', $program)); ?>" class="btn btn-sm btn-secondary btn-icon" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
                                <a href="<?php echo e(route('programs.edit', $program)); ?>" class="btn btn-sm btn-primary btn-icon" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/programs/index.blade.php ENDPATH**/ ?>