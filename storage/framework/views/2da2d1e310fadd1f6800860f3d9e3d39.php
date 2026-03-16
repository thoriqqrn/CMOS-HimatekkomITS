<?php $__env->startSection('title', 'Timeline'); ?>
<?php $__env->startSection('page-title', 'Timeline'); ?>

<?php $__env->startSection('content'); ?>
<div class="card animate-fadeIn">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-calendar-alt text-primary"></i>
            Semua Timeline
        </h3>
        <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
        <a href="<?php echo e(route('timelines.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Timeline
        </a>
        <?php endif; ?>
    </div>
    <div class="card-body p-0">
        <div class="table-container">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tipe</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
                        <th class="no-sort" style="width: 100px;">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex align-center gap-2">
                                <div style="width: 12px; height: 12px; background: <?php echo e($timeline->color); ?>; border-radius: 50%;"></div>
                                <span class="fw-semibold"><?php echo e($timeline->title); ?></span>
                            </div>
                            <?php if($timeline->description): ?>
                            <div class="text-muted fs-xs"><?php echo e(Str::limit($timeline->description, 50)); ?></div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge badge-<?php echo e($timeline->type === 'global' ? 'primary' : ($timeline->type === 'department' ? 'info' : 'secondary')); ?>">
                                <?php echo e(ucfirst($timeline->type)); ?>

                            </span>
                            <?php if($timeline->department): ?>
                                <div class="fs-xs text-muted"><?php echo e($timeline->department->name); ?></div>
                            <?php endif; ?>
                            <?php if($timeline->program): ?>
                                <div class="fs-xs text-muted"><?php echo e($timeline->program->name); ?></div>
                            <?php endif; ?>
                        </td>
                        <td class="fs-sm">
                            <?php echo e($timeline->start_date->format('d M')); ?> - <?php echo e($timeline->end_date->format('d M Y')); ?>

                        </td>
                        <td>
                            <?php if($timeline->end_date->isPast()): ?>
                                <span class="badge badge-secondary">Selesai</span>
                            <?php elseif($timeline->start_date->isFuture()): ?>
                                <span class="badge badge-info">Akan Datang</span>
                            <?php else: ?>
                                <span class="badge badge-success">Berlangsung</span>
                            <?php endif; ?>
                        </td>
                        <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="<?php echo e(route('timelines.edit', $timeline)); ?>" class="btn btn-sm btn-primary btn-icon" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('timelines.destroy', $timeline)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-sm btn-danger btn-icon" data-confirm-delete="<?php echo e($timeline->title); ?>" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/timelines/index.blade.php ENDPATH**/ ?>