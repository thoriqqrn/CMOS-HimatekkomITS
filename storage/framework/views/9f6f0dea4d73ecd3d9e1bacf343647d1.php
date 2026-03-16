<?php $__env->startSection('title', $title . ' - Kanban'); ?>
<?php $__env->startSection('page-title', $title); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* ===== KANBAN LAYOUT ===== */
.kanban-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
}
.breadcrumb a { color: var(--text-muted); text-decoration: none; }
.breadcrumb a:hover { color: var(--primary); }
.breadcrumb .separator { color: var(--text-muted); }
.breadcrumb .current { color: var(--text-primary); font-weight: 500; }

.kanban-container {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    padding-bottom: 1.5rem;
    min-height: calc(100vh - 220px);
    align-items: flex-start;
}

.kanban-column {
    flex: 0 0 300px;
    background: var(--gray-100, #f3f4f6);
    border-radius: 16px;
    display: flex;
    flex-direction: column;
    max-height: calc(100vh - 180px);
}

/* ===== COLUMN HEADER ===== */
.column-header {
    padding: 1rem 1rem 0.75rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid;
    border-radius: 16px 16px 0 0;
}
.column-header.todo      { border-color: #6B7280; }
.column-header.in_progress { border-color: #F59E0B; }
.column-header.pending   { border-color: #8B5CF6; }
.column-header.done      { border-color: #10B981; }

.column-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    font-size: 0.9rem;
}
.dot { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }
.dot.todo        { background: #6B7280; }
.dot.in_progress { background: #F59E0B; }
.dot.pending     { background: #8B5CF6; }
.dot.done        { background: #10B981; }

.column-count {
    background: var(--gray-200, #e5e7eb);
    color: var(--text-secondary, #6b7280);
    font-size: 0.72rem;
    font-weight: 700;
    padding: 3px 9px;
    border-radius: 12px;
    min-width: 24px;
    text-align: center;
}

/* ===== COLUMN BODY ===== */
.column-body {
    flex: 1;
    padding: 0.75rem;
    overflow-y: auto;
    min-height: 120px;
}

/* ===== TASK CARD ===== */
.task-card {
    background: var(--bg-card, #fff);
    border-radius: 12px;
    padding: 0.875rem;
    margin-bottom: 0.625rem;
    cursor: grab;
    box-shadow: 0 1px 3px rgba(0,0,0,.08);
    transition: box-shadow .18s, transform .18s, opacity .18s;
    border: 1px solid var(--border-color, #e5e7eb);
    position: relative;
}
.task-card:active { cursor: grabbing; }
.task-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,.12);
    transform: translateY(-2px);
}
.task-card.dragging {
    opacity: .75;
    transform: rotate(2deg) scale(1.02);
    box-shadow: 0 8px 24px rgba(0,0,0,.18);
    cursor: grabbing;
}
.task-card.ghost {
    opacity: .35;
    background: var(--primary-light, #ede9fe);
    border: 2px dashed var(--primary, #7c3aed);
}

/* Card top row */
.task-card-top {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    margin-bottom: 0.5rem;
}
.task-title-text {
    flex: 1;
    font-weight: 600;
    font-size: 0.875rem;
    color: var(--text-primary, #111827);
    line-height: 1.4;
    word-break: break-word;
    cursor: text;
}
.task-title-text.done-text {
    text-decoration: line-through;
    opacity: .6;
}

/* Inline title edit */
.task-title-input {
    flex: 1;
    font-weight: 600;
    font-size: 0.875rem;
    color: var(--text-primary, #111827);
    border: none;
    border-bottom: 2px solid var(--primary, #7c3aed);
    background: transparent;
    outline: none;
    padding: 2px 0;
    width: 100%;
    font-family: inherit;
}

/* Card actions (show on hover) */
.task-actions {
    display: flex;
    gap: 4px;
    opacity: 0;
    transition: opacity .15s;
    flex-shrink: 0;
}
.task-card:hover .task-actions { opacity: 1; }

.task-action-btn {
    width: 26px;
    height: 26px;
    border: none;
    border-radius: 6px;
    background: transparent;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    color: var(--text-muted, #9ca3af);
    transition: background .15s, color .15s;
}
.task-action-btn:hover { background: var(--gray-200, #e5e7eb); color: var(--text-primary, #111); }
.task-action-btn.delete:hover { background: #fee2e2; color: #ef4444; }

/* Meta badges */
.task-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 0.5rem;
}
.task-badge {
    font-size: 0.68rem;
    padding: 2px 7px;
    border-radius: 6px;
    font-weight: 600;
    letter-spacing: .02em;
}
.task-badge.priority-high   { background: #fee2e2; color: #dc2626; }
.task-badge.priority-medium { background: #fef3c7; color: #d97706; }
.task-badge.priority-low    { background: #dbeafe; color: #2563eb; }
.task-badge.overdue         { background: #fee2e2; color: #dc2626; }

/* Progress bar */
.task-progress {
    margin-bottom: 0.5rem;
}
.progress-bar-wrap {
    height: 4px;
    background: var(--gray-200, #e5e7eb);
    border-radius: 4px;
    overflow: hidden;
}
.progress-bar-fill {
    height: 100%;
    border-radius: 4px;
    background: linear-gradient(90deg, #7c3aed, #a78bfa);
    transition: width .4s ease;
}
.progress-label {
    font-size: 0.68rem;
    color: var(--text-muted, #9ca3af);
    margin-top: 3px;
    text-align: right;
}

/* Footer */
.task-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 0.5rem;
    border-top: 1px solid var(--border-color, #f3f4f6);
    margin-top: 0.25rem;
}
.task-assignee {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.72rem;
    color: var(--text-muted, #9ca3af);
}
.task-assignee img {
    width: 20px; height: 20px;
    border-radius: 50%;
    object-fit: cover;
}
.task-deadline {
    font-size: 0.72rem;
    color: var(--text-muted, #9ca3af);
    display: flex;
    align-items: center;
    gap: 3px;
}
.task-deadline.overdue { color: #ef4444; }

/* ===== ADD TASK INLINE ===== */
.add-task-btn {
    width: 100%;
    padding: 0.625rem;
    background: transparent;
    border: 2px dashed var(--border-color, #d1d5db);
    border-radius: 10px;
    color: var(--text-muted, #9ca3af);
    cursor: pointer;
    transition: all .2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-size: 0.82rem;
    font-family: inherit;
    margin-top: 0.25rem;
}
.add-task-btn:hover {
    border-color: var(--primary, #7c3aed);
    color: var(--primary, #7c3aed);
    background: var(--primary-light, #ede9fe);
}

/* Inline add form */
.inline-add-form {
    background: var(--bg-card, #fff);
    border-radius: 12px;
    padding: 0.875rem;
    margin-bottom: 0.625rem;
    border: 2px solid var(--primary, #7c3aed);
    box-shadow: 0 4px 16px rgba(124,58,237,.12);
    display: none;
}
.inline-add-form.active { display: block; }

.inline-add-form input,
.inline-add-form textarea,
.inline-add-form select {
    width: 100%;
    border: 1px solid var(--border-color, #e5e7eb);
    border-radius: 8px;
    padding: 6px 10px;
    font-size: 0.82rem;
    font-family: inherit;
    background: var(--bg-card, #fff);
    color: var(--text-primary, #111);
    outline: none;
    transition: border-color .15s;
    box-sizing: border-box;
    margin-bottom: 6px;
}
.inline-add-form input:focus,
.inline-add-form textarea:focus,
.inline-add-form select:focus {
    border-color: var(--primary, #7c3aed);
}
.inline-add-form textarea { resize: vertical; min-height: 60px; }

.inline-form-row {
    display: flex;
    gap: 6px;
    margin-bottom: 6px;
}
.inline-form-row select { flex: 1; margin-bottom: 0; }

.inline-form-actions {
    display: flex;
    gap: 6px;
    margin-top: 8px;
}
.btn-inline-save {
    flex: 1;
    padding: 6px 12px;
    background: var(--primary, #7c3aed);
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 0.82rem;
    font-weight: 600;
    cursor: pointer;
    transition: background .15s;
    font-family: inherit;
}
.btn-inline-save:hover { background: #6d28d9; }
.btn-inline-cancel {
    padding: 6px 12px;
    background: transparent;
    color: var(--text-muted, #9ca3af);
    border: 1px solid var(--border-color, #e5e7eb);
    border-radius: 8px;
    font-size: 0.82rem;
    cursor: pointer;
    transition: all .15s;
    font-family: inherit;
}
.btn-inline-cancel:hover { background: var(--gray-100, #f3f4f6); color: var(--text-primary); }

/* ===== EDIT MODAL ===== */
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.45);
    z-index: 9000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    opacity: 0;
    pointer-events: none;
    transition: opacity .2s;
}
.modal-overlay.active {
    opacity: 1;
    pointer-events: all;
}
.modal-box {
    background: var(--bg-card, #fff);
    border-radius: 20px;
    width: 100%;
    max-width: 520px;
    box-shadow: 0 20px 60px rgba(0,0,0,.25);
    transform: translateY(20px) scale(.97);
    transition: transform .2s, opacity .2s;
    overflow: hidden;
}
.modal-overlay.active .modal-box {
    transform: translateY(0) scale(1);
}
.modal-header {
    padding: 1.25rem 1.5rem 1rem;
    border-bottom: 1px solid var(--border-color, #e5e7eb);
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.modal-title {
    font-weight: 700;
    font-size: 1rem;
    color: var(--text-primary, #111);
}
.modal-close {
    width: 32px; height: 32px;
    border: none;
    background: var(--gray-100, #f3f4f6);
    border-radius: 8px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-muted, #9ca3af);
    font-size: 1rem;
    transition: background .15s;
}
.modal-close:hover { background: #fee2e2; color: #ef4444; }

.modal-body {
    padding: 1.25rem 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 0.875rem;
    max-height: 65vh;
    overflow-y: auto;
}
.form-group label {
    display: block;
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--text-secondary, #6b7280);
    margin-bottom: 4px;
    text-transform: uppercase;
    letter-spacing: .04em;
}
.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    border: 1px solid var(--border-color, #e5e7eb);
    border-radius: 10px;
    padding: 8px 12px;
    font-size: 0.875rem;
    font-family: inherit;
    background: var(--bg-card, #fff);
    color: var(--text-primary, #111);
    outline: none;
    transition: border-color .15s, box-shadow .15s;
    box-sizing: border-box;
}
.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: var(--primary, #7c3aed);
    box-shadow: 0 0 0 3px rgba(124,58,237,.1);
}
.form-group textarea { resize: vertical; min-height: 80px; }
.form-row { display: flex; gap: 0.75rem; }
.form-row .form-group { flex: 1; }

/* Progress slider */
.progress-slider-wrap {
    display: flex;
    align-items: center;
    gap: 10px;
}
.progress-slider-wrap input[type=range] {
    flex: 1;
    padding: 0;
    border: none;
    box-shadow: none;
    accent-color: var(--primary, #7c3aed);
}
.progress-slider-val {
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--primary, #7c3aed);
    min-width: 36px;
    text-align: right;
}

.modal-footer {
    padding: 1rem 1.5rem;
    border-top: 1px solid var(--border-color, #e5e7eb);
    display: flex;
    gap: 0.75rem;
    justify-content: flex-end;
}
.btn-modal-save {
    padding: 8px 20px;
    background: var(--primary, #7c3aed);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: background .15s;
    font-family: inherit;
    display: flex;
    align-items: center;
    gap: 6px;
}
.btn-modal-save:hover { background: #6d28d9; }
.btn-modal-save:disabled { opacity: .6; cursor: not-allowed; }
.btn-modal-delete {
    padding: 8px 16px;
    background: #fee2e2;
    color: #dc2626;
    border: none;
    border-radius: 10px;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: background .15s;
    font-family: inherit;
}
.btn-modal-delete:hover { background: #fecaca; }
.btn-modal-cancel {
    padding: 8px 16px;
    background: transparent;
    color: var(--text-muted, #9ca3af);
    border: 1px solid var(--border-color, #e5e7eb);
    border-radius: 10px;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all .15s;
    font-family: inherit;
}
.btn-modal-cancel:hover { background: var(--gray-100, #f3f4f6); }

/* ===== TOAST ===== */
.toast-container {
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
    z-index: 99999;
    display: flex;
    flex-direction: column;
    gap: 8px;
    pointer-events: none;
}
.toast {
    padding: 10px 16px;
    border-radius: 10px;
    font-size: 0.85rem;
    font-weight: 500;
    color: #fff;
    box-shadow: 0 4px 16px rgba(0,0,0,.15);
    animation: slideInToast .25s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}
.toast.success { background: #10b981; }
.toast.error   { background: #ef4444; }
.toast.info    { background: #3b82f6; }
@keyframes slideInToast {
    from { transform: translateX(100%); opacity: 0; }
    to   { transform: translateX(0);   opacity: 1; }
}

/* ===== LOADING SPINNER ON CARD ===== */
.task-card.saving::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(255,255,255,.6);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ===== MOBILE ===== */
@media (max-width: 768px) {
    .kanban-container { padding: 0 0 1.5rem; }
    .kanban-column { flex: 0 0 85vw; }
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Header -->
<div class="kanban-header">
    <nav class="breadcrumb">
        <a href="<?php echo e(route('tasks.index')); ?>"><i class="fas fa-tasks"></i> Tasks</a>
        <?php if(isset($department)): ?>
            <span class="separator">/</span>
            <a href="<?php echo e(route('tasks.department', $department)); ?>"><?php echo e($department->name); ?></a>
        <?php elseif(isset($program)): ?>
            <span class="separator">/</span>
            <a href="<?php echo e(route('tasks.department', $program->department)); ?>"><?php echo e($program->department->name); ?></a>
        <?php endif; ?>
        <span class="separator">/</span>
        <span class="current"><?php echo e($title); ?></span>
    </nav>
</div>

<!-- Kanban Board -->
<div class="kanban-container" id="kanbanBoard">
    <?php
        $columns = [
            'todo'        => ['label' => 'To Do',       'color' => '#6B7280'],
            'in_progress' => ['label' => 'In Progress',  'color' => '#F59E0B'],
            'pending'     => ['label' => 'Pending',      'color' => '#8B5CF6'],
            'done'        => ['label' => 'Done',         'color' => '#10B981'],
        ];
    ?>

    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="kanban-column" data-status="<?php echo e($status); ?>">
        <div class="column-header <?php echo e($status); ?>">
            <div class="column-title">
                <span class="dot <?php echo e($status); ?>"></span>
                <?php echo e($col['label']); ?>

            </div>
            <span class="column-count" id="count-<?php echo e($status); ?>">
                <?php echo e(isset($tasks[$status]) ? $tasks[$status]->count() : 0); ?>

            </span>
        </div>

        <div class="column-body" id="col-<?php echo e($status); ?>">
            <?php if(isset($tasks[$status])): ?>
                <?php $__currentLoopData = $tasks[$status]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="task-card" data-id="<?php echo e($task->id); ?>" data-status="<?php echo e($task->status); ?>">
                    <div class="task-card-top">
                        <div class="task-title-text <?php echo e($task->status === 'done' ? 'done-text' : ''); ?>"
                             ondblclick="startInlineEdit(this, <?php echo e($task->id); ?>)"><?php echo e($task->title); ?></div>
                        <div class="task-actions">
                            <button class="task-action-btn" onclick="openEditModal(<?php echo e($task->id); ?>)" title="Edit">
                                <i class="fas fa-pen"></i>
                            </button>
                            <button class="task-action-btn delete" onclick="deleteTask(<?php echo e($task->id); ?>, this)" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="task-meta">
                        <span class="task-badge priority-<?php echo e($task->priority); ?>"><?php echo e($task->priority_label); ?></span>
                        <?php if($task->is_overdue): ?>
                            <span class="task-badge overdue"><i class="fas fa-exclamation-triangle"></i> Overdue</span>
                        <?php endif; ?>
                    </div>
                    <?php if($task->progress > 0): ?>
                    <div class="task-progress">
                        <div class="progress-bar-wrap">
                            <div class="progress-bar-fill" style="width:<?php echo e($task->progress); ?>%"></div>
                        </div>
                        <div class="progress-label"><?php echo e($task->progress); ?>%</div>
                    </div>
                    <?php endif; ?>
                    <div class="task-footer">
                        <div class="task-assignee">
                            <?php if($task->assignee): ?>
                                <img src="<?php echo e($task->assignee->avatar_url); ?>" alt="">
                                <span><?php echo e(Str::limit($task->assignee->name, 14)); ?></span>
                            <?php else: ?>
                                <i class="fas fa-user-slash"></i>
                                <span>Unassigned</span>
                            <?php endif; ?>
                        </div>
                        <?php if($task->deadline): ?>
                        <div class="task-deadline <?php echo e($task->is_overdue ? 'overdue' : ''); ?>">
                            <i class="fas fa-calendar-alt"></i>
                            <?php echo e($task->deadline->format('d M')); ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <!-- Inline Add Form (hidden by default) -->
            <div class="inline-add-form" id="add-form-<?php echo e($status); ?>">
                <input type="text" placeholder="Judul task..." id="add-title-<?php echo e($status); ?>" maxlength="255">
                <textarea placeholder="Deskripsi (opsional)..." id="add-desc-<?php echo e($status); ?>" rows="2"></textarea>
                <div class="inline-form-row">
                    <select id="add-priority-<?php echo e($status); ?>">
                        <option value="medium">🟡 Sedang</option>
                        <option value="high">🔴 Tinggi</option>
                        <option value="low">🔵 Rendah</option>
                    </select>
                    <select id="add-assignee-<?php echo e($status); ?>">
                        <option value="">Unassigned</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <input type="date" id="add-deadline-<?php echo e($status); ?>" placeholder="Deadline">
                <div class="inline-form-actions">
                    <button class="btn-inline-save" onclick="saveInlineAdd('<?php echo e($status); ?>')">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                    <button class="btn-inline-cancel" onclick="cancelInlineAdd('<?php echo e($status); ?>')">Batal</button>
                </div>
            </div>
        </div>

        <!-- Add Task Button -->
        <div style="padding: 0 0.75rem 0.75rem;">
            <button class="add-task-btn" id="add-btn-<?php echo e($status); ?>" onclick="showInlineAdd('<?php echo e($status); ?>')">
                <i class="fas fa-plus"></i> Tambah Task
            </button>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- ===== EDIT MODAL ===== -->
<div class="modal-overlay" id="editModal" onclick="closeModalOnBackdrop(event)">
    <div class="modal-box">
        <div class="modal-header">
            <span class="modal-title"><i class="fas fa-pen" style="color:var(--primary,#7c3aed);margin-right:6px"></i>Edit Task</span>
            <button class="modal-close" onclick="closeEditModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="modal-task-id">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" id="modal-title" placeholder="Judul task..." maxlength="255">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea id="modal-desc" placeholder="Deskripsi..."></textarea>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Status</label>
                    <select id="modal-status">
                        <option value="todo">To Do</option>
                        <option value="in_progress">In Progress</option>
                        <option value="pending">Pending</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Prioritas</label>
                    <select id="modal-priority">
                        <option value="low">🔵 Rendah</option>
                        <option value="medium">🟡 Sedang</option>
                        <option value="high">🔴 Tinggi</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Assignee</label>
                <select id="modal-assignee">
                    <option value="">Unassigned</option>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Deadline</label>
                <input type="date" id="modal-deadline">
            </div>
            <div class="form-group">
                <label>Progress: <span id="modal-progress-val">0%</span></label>
                <div class="progress-slider-wrap">
                    <input type="range" id="modal-progress" min="0" max="100" step="5" value="0"
                           oninput="document.getElementById('modal-progress-val').textContent = this.value + '%'">
                    <span class="progress-slider-val" id="modal-progress-display">0%</span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn-modal-delete" onclick="deleteTaskFromModal()"><i class="fas fa-trash"></i> Hapus</button>
            <button class="btn-modal-cancel" onclick="closeEditModal()">Batal</button>
            <button class="btn-modal-save" id="modal-save-btn" onclick="saveEditModal()">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container" id="toastContainer"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
// ============================================================
// CONFIG
// ============================================================
const CSRF = document.querySelector('meta[name="csrf-token"]').content;
const TASK_TYPE  = <?php echo json_encode($type, 15, 512) ?>;
const TASK_TYPE_ID = <?php echo json_encode($typeId, 15, 512) ?>;

// ============================================================
// TASK DATA CACHE (for modal)
// ============================================================
<?php
$taskCacheData = [];
foreach($tasks as $statusGroup) {
    foreach($statusGroup as $t) {
        $taskCacheData[$t->id] = [
            'id'             => $t->id,
            'title'          => $t->title,
            'description'    => $t->description,
            'status'         => $t->status,
            'priority'       => $t->priority,
            'priority_label' => $t->priority_label,
            'progress'       => $t->progress,
            'assigned_to'    => $t->assigned_to,
            'deadline'       => $t->deadline ? $t->deadline->format('Y-m-d') : null,
            'deadline_fmt'   => $t->deadline ? $t->deadline->format('d M Y') : null,
            'is_overdue'     => $t->is_overdue,
            'assignee_name'  => $t->assignee?->name ?? '',
            'assignee_avatar'=> $t->assignee?->avatar_url ?? '',
        ];
    }
}
?>
const taskCache = <?php echo json_encode($taskCacheData, 15, 512) ?>;

// ============================================================
// SORTABLE DRAG & DROP
// ============================================================
document.querySelectorAll('.column-body').forEach(col => {
    new Sortable(col, {
        group: 'kanban',
        animation: 200,
        ghostClass: 'ghost',
        dragClass: 'dragging',
        filter: '.inline-add-form, .add-task-btn, input, textarea, select, button',
        preventOnFilter: false,
        onEnd(evt) {
            const taskId  = evt.item.dataset.id;
            const newStatus = evt.to.id.replace('col-', '');
            const oldStatus = evt.from.id.replace('col-', '');
            if (newStatus === oldStatus && evt.oldIndex === evt.newIndex) return;

            evt.item.dataset.status = newStatus;
            updateColumnCounts();

            // Optimistic: update done-text
            const titleEl = evt.item.querySelector('.task-title-text');
            if (newStatus === 'done') titleEl?.classList.add('done-text');
            else titleEl?.classList.remove('done-text');

            apiPatch(`/tasks/${taskId}/status`, { status: newStatus })
                .then(d => {
                    if (d.success) {
                        if (taskCache[taskId]) taskCache[taskId].status = newStatus;
                        showToast('Status diupdate!', 'success');
                    }
                })
                .catch(() => showToast('Gagal update status', 'error'));
        }
    });
});

// ============================================================
// INLINE ADD TASK
// ============================================================
function showInlineAdd(status) {
    document.getElementById(`add-form-${status}`).classList.add('active');
    document.getElementById(`add-btn-${status}`).style.display = 'none';
    document.getElementById(`add-title-${status}`).focus();
}

function cancelInlineAdd(status) {
    const form = document.getElementById(`add-form-${status}`);
    form.classList.remove('active');
    form.querySelectorAll('input, textarea').forEach(el => el.value = '');
    form.querySelector('select').value = 'medium';
    document.getElementById(`add-btn-${status}`).style.display = '';
}

async function saveInlineAdd(status) {
    const title = document.getElementById(`add-title-${status}`).value.trim();
    if (!title) {
        document.getElementById(`add-title-${status}`).focus();
        showToast('Judul tidak boleh kosong!', 'error');
        return;
    }

    const payload = {
        title,
        description: document.getElementById(`add-desc-${status}`).value.trim() || null,
        priority:    document.getElementById(`add-priority-${status}`).value,
        assigned_to: document.getElementById(`add-assignee-${status}`).value || null,
        deadline:    document.getElementById(`add-deadline-${status}`).value || null,
        status,
        type:        TASK_TYPE,
        program_id:  TASK_TYPE === 'program'    ? TASK_TYPE_ID : null,
        department_id: TASK_TYPE === 'department' ? TASK_TYPE_ID : null,
    };

    try {
        const data = await apiPost('/tasks/inline', payload);
        if (data.success) {
            renderTaskCard(data.task, status);
            cancelInlineAdd(status);
            updateColumnCounts();
            showToast('Task ditambahkan!', 'success');
        }
    } catch(e) {
        showToast('Gagal menambah task', 'error');
    }
}

// Enter key on title input submits
document.querySelectorAll('[id^="add-title-"]').forEach(input => {
    input.addEventListener('keydown', e => {
        if (e.key === 'Enter') {
            const status = input.id.replace('add-title-', '');
            saveInlineAdd(status);
        }
        if (e.key === 'Escape') {
            const status = input.id.replace('add-title-', '');
            cancelInlineAdd(status);
        }
    });
});

// ============================================================
// INLINE TITLE EDIT (double-click)
// ============================================================
function startInlineEdit(el, taskId) {
    if (el.querySelector('input')) return; // already editing
    const oldTitle = el.textContent.trim();
    const input = document.createElement('input');
    input.className = 'task-title-input';
    input.value = oldTitle;
    el.textContent = '';
    el.appendChild(input);
    input.focus();
    input.select();

    const save = async () => {
        const newTitle = input.value.trim();
        if (!newTitle || newTitle === oldTitle) {
            el.textContent = oldTitle;
            return;
        }
        try {
            const data = await apiPatch(`/tasks/${taskId}/inline`, { title: newTitle });
            if (data.success) {
                el.textContent = data.task.title;
                if (taskCache[taskId]) taskCache[taskId].title = data.task.title;
                showToast('Judul diupdate!', 'success');
            } else {
                el.textContent = oldTitle;
            }
        } catch {
            el.textContent = oldTitle;
            showToast('Gagal update judul', 'error');
        }
    };

    input.addEventListener('blur', save);
    input.addEventListener('keydown', e => {
        if (e.key === 'Enter') { e.preventDefault(); input.blur(); }
        if (e.key === 'Escape') { el.textContent = oldTitle; }
    });
}

// ============================================================
// EDIT MODAL
// ============================================================
function openEditModal(taskId) {
    const t = taskCache[taskId];
    if (!t) return;

    document.getElementById('modal-task-id').value = taskId;
    document.getElementById('modal-title').value    = t.title || '';
    document.getElementById('modal-desc').value     = t.description || '';
    document.getElementById('modal-status').value   = t.status || 'todo';
    document.getElementById('modal-priority').value = t.priority || 'medium';
    document.getElementById('modal-assignee').value = t.assigned_to || '';
    document.getElementById('modal-deadline').value = t.deadline || '';
    const prog = t.progress || 0;
    document.getElementById('modal-progress').value = prog;
    document.getElementById('modal-progress-val').textContent = prog + '%';
    document.getElementById('modal-progress-display').textContent = prog + '%';

    document.getElementById('editModal').classList.add('active');
    document.getElementById('modal-title').focus();
}

function closeEditModal() {
    document.getElementById('editModal').classList.remove('active');
}

function closeModalOnBackdrop(e) {
    if (e.target === document.getElementById('editModal')) closeEditModal();
}

document.getElementById('modal-progress').addEventListener('input', function() {
    document.getElementById('modal-progress-display').textContent = this.value + '%';
});

async function saveEditModal() {
    const taskId = document.getElementById('modal-task-id').value;
    const btn = document.getElementById('modal-save-btn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';

    const payload = {
        title:       document.getElementById('modal-title').value.trim(),
        description: document.getElementById('modal-desc').value.trim() || null,
        status:      document.getElementById('modal-status').value,
        priority:    document.getElementById('modal-priority').value,
        assigned_to: document.getElementById('modal-assignee').value || null,
        deadline:    document.getElementById('modal-deadline').value || null,
        progress:    parseInt(document.getElementById('modal-progress').value),
    };

    if (!payload.title) {
        showToast('Judul tidak boleh kosong!', 'error');
        btn.disabled = false;
        btn.innerHTML = '<i class="fas fa-save"></i> Simpan';
        return;
    }

    try {
        const data = await apiPatch(`/tasks/${taskId}/inline`, payload);
        if (data.success) {
            taskCache[taskId] = { ...taskCache[taskId], ...data.task };
            updateCardDOM(taskId, data.task);
            closeEditModal();
            showToast('Task diupdate!', 'success');
        }
    } catch(e) {
        showToast('Gagal menyimpan', 'error');
    }

    btn.disabled = false;
    btn.innerHTML = '<i class="fas fa-save"></i> Simpan';
}

async function deleteTaskFromModal() {
    const taskId = document.getElementById('modal-task-id').value;
    if (!confirm('Hapus task ini?')) return;
    await deleteTask(taskId, null);
    closeEditModal();
}

// ============================================================
// DELETE TASK
// ============================================================
async function deleteTask(taskId, btnEl) {
    if (!confirm('Hapus task ini?')) return;
    const card = document.querySelector(`.task-card[data-id="${taskId}"]`);
    if (card) {
        card.style.transition = 'all .25s';
        card.style.opacity = '0';
        card.style.transform = 'scale(.9)';
    }
    try {
        const data = await apiDelete(`/tasks/${taskId}/inline`);
        if (data.success) {
            card?.remove();
            delete taskCache[taskId];
            updateColumnCounts();
            showToast(data.message || 'Task dihapus!', 'success');
        }
    } catch {
        if (card) { card.style.opacity = '1'; card.style.transform = ''; }
        showToast('Gagal menghapus task', 'error');
    }
}

// ============================================================
// DOM HELPERS
// ============================================================
function renderTaskCard(task, status) {
    taskCache[task.id] = task;

    const priorityLabels = { low: 'Rendah', medium: 'Sedang', high: 'Tinggi' };
    const priorityLabel  = task.priority_label || priorityLabels[task.priority] || task.priority;

    const deadlineFmt = task.deadline_fmt || (task.deadline ? task.deadline : '');
    const isOverdue   = task.is_overdue || false;

    const assigneeHtml = task.assignee_name
        ? `<img src="${task.assignee_avatar || ''}" alt=""><span>${task.assignee_name.substring(0,14)}</span>`
        : `<i class="fas fa-user-slash"></i><span>Unassigned</span>`;

    const deadlineHtml = deadlineFmt
        ? `<div class="task-deadline ${isOverdue ? 'overdue' : ''}"><i class="fas fa-calendar-alt"></i> ${deadlineFmt}</div>`
        : '';

    const card = document.createElement('div');
    card.className = 'task-card';
    card.dataset.id = task.id;
    card.dataset.status = status;
    card.style.opacity = '0';
    card.style.transform = 'translateY(-8px)';
    card.innerHTML = `
        <div class="task-card-top">
            <div class="task-title-text ${status === 'done' ? 'done-text' : ''}"
                 ondblclick="startInlineEdit(this, ${task.id})">${escHtml(task.title)}</div>
            <div class="task-actions">
                <button class="task-action-btn" onclick="openEditModal(${task.id})" title="Edit"><i class="fas fa-pen"></i></button>
                <button class="task-action-btn delete" onclick="deleteTask(${task.id}, this)" title="Hapus"><i class="fas fa-trash"></i></button>
            </div>
        </div>
        <div class="task-meta">
            <span class="task-badge priority-${task.priority}">${priorityLabel}</span>
            ${isOverdue ? '<span class="task-badge overdue"><i class="fas fa-exclamation-triangle"></i> Overdue</span>' : ''}
        </div>
        ${task.progress > 0 ? `
        <div class="task-progress">
            <div class="progress-bar-wrap"><div class="progress-bar-fill" style="width:${task.progress}%"></div></div>
            <div class="progress-label">${task.progress}%</div>
        </div>` : ''}
        <div class="task-footer">
            <div class="task-assignee">${assigneeHtml}</div>
            ${deadlineHtml}
        </div>`;

    // Insert before the inline-add-form
    const col = document.getElementById(`col-${status}`);
    const form = document.getElementById(`add-form-${status}`);
    col.insertBefore(card, form);

    // Animate in
    requestAnimationFrame(() => {
        card.style.transition = 'all .25s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
    });
}

function updateCardDOM(taskId, task) {
    const card = document.querySelector(`.task-card[data-id="${taskId}"]`);
    if (!card) return;

    const oldStatus = card.dataset.status;
    const newStatus = task.status;

    // Update title
    const titleEl = card.querySelector('.task-title-text');
    if (titleEl) {
        titleEl.textContent = task.title;
        titleEl.className = `task-title-text ${newStatus === 'done' ? 'done-text' : ''}`;
    }

    // Update priority badge
    const priorityLabels = { low: 'Rendah', medium: 'Sedang', high: 'Tinggi' };
    const meta = card.querySelector('.task-meta');
    if (meta) {
        meta.innerHTML = `<span class="task-badge priority-${task.priority}">${task.priority_label || priorityLabels[task.priority]}</span>
            ${task.is_overdue ? '<span class="task-badge overdue"><i class="fas fa-exclamation-triangle"></i> Overdue</span>' : ''}`;
    }

    // Update progress
    let progressDiv = card.querySelector('.task-progress');
    if (task.progress > 0) {
        if (!progressDiv) {
            progressDiv = document.createElement('div');
            progressDiv.className = 'task-progress';
            card.querySelector('.task-meta').after(progressDiv);
        }
        progressDiv.innerHTML = `
            <div class="progress-bar-wrap"><div class="progress-bar-fill" style="width:${task.progress}%"></div></div>
            <div class="progress-label">${task.progress}%</div>`;
    } else if (progressDiv) {
        progressDiv.remove();
    }

    // Update footer
    const footer = card.querySelector('.task-footer');
    if (footer) {
        const assigneeHtml = task.assignee_name
            ? `<img src="${task.assignee_avatar || ''}" alt=""><span>${task.assignee_name.substring(0,14)}</span>`
            : `<i class="fas fa-user-slash"></i><span>Unassigned</span>`;
        const deadlineHtml = task.deadline_fmt
            ? `<div class="task-deadline ${task.is_overdue ? 'overdue' : ''}"><i class="fas fa-calendar-alt"></i> ${task.deadline_fmt}</div>`
            : '';
        footer.innerHTML = `<div class="task-assignee">${assigneeHtml}</div>${deadlineHtml}`;
    }

    // Move card to correct column if status changed
    if (oldStatus !== newStatus) {
        card.dataset.status = newStatus;
        const targetCol = document.getElementById(`col-${newStatus}`);
        const form = document.getElementById(`add-form-${newStatus}`);
        if (targetCol && form) {
            card.style.opacity = '0';
            setTimeout(() => {
                targetCol.insertBefore(card, form);
                card.style.transition = 'opacity .25s';
                card.style.opacity = '1';
                updateColumnCounts();
            }, 200);
        }
    }
}

function updateColumnCounts() {
    document.querySelectorAll('.kanban-column').forEach(col => {
        const status = col.dataset.status;
        const count  = col.querySelectorAll('.task-card').length;
        document.getElementById(`count-${status}`).textContent = count;
    });
}

function escHtml(str) {
    return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

// ============================================================
// API HELPERS
// ============================================================
async function apiPost(url, body) {
    const res = await fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        body: JSON.stringify(body),
    });
    if (!res.ok) throw new Error(res.statusText);
    return res.json();
}

async function apiPatch(url, body) {
    const res = await fetch(url, {
        method: 'PATCH',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        body: JSON.stringify(body),
    });
    if (!res.ok) throw new Error(res.statusText);
    return res.json();
}

async function apiDelete(url) {
    const res = await fetch(url, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
    });
    if (!res.ok) throw new Error(res.statusText);
    return res.json();
}

// ============================================================
// TOAST
// ============================================================
function showToast(msg, type = 'info') {
    const icons = { success: 'check-circle', error: 'times-circle', info: 'info-circle' };
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `<i class="fas fa-${icons[type] || 'info-circle'}"></i> ${msg}`;
    document.getElementById('toastContainer').appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
}

// ============================================================
// KEYBOARD SHORTCUTS
// ============================================================
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeEditModal();
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/tasks/kanban.blade.php ENDPATH**/ ?>