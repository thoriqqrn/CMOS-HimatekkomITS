<?php $__env->startSection('title', 'Pengumuman'); ?>
<?php $__env->startSection('page-title', 'Pengumuman'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.post-card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    margin-bottom: 16px;
    overflow: hidden;
}
.post-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px;
    border-bottom: 1px solid var(--border-color);
}
.post-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    object-fit: cover;
}
.post-user-name {
    font-weight: 600;
    color: var(--text-primary);
}
.post-time {
    font-size: 0.8rem;
    color: var(--text-muted);
}
.post-content {
    padding: 16px;
    font-size: 1rem;
    line-height: 1.6;
    white-space: pre-wrap;
}
.post-poll {
    padding: 0 16px 16px;
}
.poll-question {
    font-weight: 600;
    margin-bottom: 12px;
}
.poll-option {
    background: var(--gray-100);
    border-radius: 8px;
    padding: 12px 16px;
    margin-bottom: 8px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.2s;
}
.poll-option:hover:not(.voted) {
    background: var(--primary-light);
}
.poll-option.voted {
    cursor: default;
}
.poll-option .poll-bar {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    background: var(--primary-light);
    transition: width 0.5s ease;
    z-index: 0;
}
.poll-option .poll-text {
    position: relative;
    z-index: 1;
    display: flex;
    justify-content: space-between;
}
.poll-option.selected .poll-bar {
    background: var(--primary);
    opacity: 0.2;
}
.poll-option.selected {
    border: 2px solid var(--primary);
}
.poll-meta {
    font-size: 0.8rem;
    color: var(--text-muted);
    margin-top: 8px;
}
.post-actions {
    display: flex;
    border-top: 1px solid var(--border-color);
    padding: 8px 16px;
    gap: 8px;
}
.action-btn {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px;
    border: none;
    background: transparent;
    color: var(--text-muted);
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s;
    font-size: 0.875rem;
}
.action-btn:hover {
    background: var(--gray-100);
    color: var(--primary);
}
.action-btn.active {
    color: var(--primary);
}
.reactions-bar {
    display: flex;
    gap: 4px;
    padding: 8px 16px;
    flex-wrap: wrap;
}
.reaction-btn {
    padding: 4px 10px;
    border: 1px solid var(--border-color);
    border-radius: 20px;
    background: var(--bg-card);
    cursor: pointer;
    font-size: 1rem;
    transition: all 0.2s;
}
.reaction-btn:hover {
    transform: scale(1.1);
    border-color: var(--primary);
}
.reaction-btn.active {
    background: var(--primary-light);
    border-color: var(--primary);
}
.reaction-summary {
    display: flex;
    gap: 8px;
    padding: 8px 16px;
    font-size: 0.8rem;
    color: var(--text-muted);
}
.comments-section {
    border-top: 1px solid var(--border-color);
    padding: 16px;
    display: none;
}
.comments-section.show {
    display: block;
}
.comment-item {
    display: flex;
    gap: 12px;
    margin-bottom: 12px;
}
.comment-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
}
.comment-content {
    flex: 1;
    background: var(--gray-100);
    padding: 10px 14px;
    border-radius: 12px;
}
.comment-name {
    font-weight: 600;
    font-size: 0.875rem;
}
.comment-text {
    font-size: 0.875rem;
    margin-top: 2px;
}
.comment-time {
    font-size: 0.7rem;
    color: var(--text-muted);
    margin-top: 4px;
}
.comment-form {
    display: flex;
    gap: 8px;
    margin-top: 12px;
}
.comment-form input {
    flex: 1;
    padding: 10px 14px;
    border: 1px solid var(--border-color);
    border-radius: 20px;
    background: var(--gray-50);
    font-size: 0.875rem;
}
.create-post {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 16px;
    margin-bottom: 24px;
}
.create-post textarea {
    width: 100%;
    border: none;
    background: transparent;
    resize: none;
    font-size: 1rem;
    line-height: 1.5;
    min-height: 80px;
}
.create-post textarea:focus {
    outline: none;
}
.poll-creator {
    background: var(--gray-50);
    border-radius: 12px;
    padding: 16px;
    margin-top: 12px;
    display: none;
}
.poll-creator.show {
    display: block;
}
.poll-option-input {
    display: flex;
    gap: 8px;
    margin-bottom: 8px;
}
.poll-option-input input {
    flex: 1;
    padding: 10px 14px;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 0.875rem;
}
.delete-btn {
    position: absolute;
    top: 16px;
    right: 16px;
    background: none;
    border: none;
    color: var(--text-muted);
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 4px;
}
.delete-btn:hover {
    background: var(--danger-light);
    color: var(--danger);
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- Create Post -->
<div class="create-post animate-fadeIn">
    <form action="<?php echo e(route('announcements.store')); ?>" method="POST" id="createPostForm">
        <?php echo csrf_field(); ?>
        <div class="d-flex gap-3">
            <img src="<?php echo e(auth()->user()->avatar_url); ?>" alt="" class="post-avatar">
            <div class="flex-1">
                <textarea name="content" placeholder="Apa yang ingin kamu umumkan?" required></textarea>
                
                <div class="poll-creator" id="pollCreator">
                    <input type="hidden" name="has_poll" id="hasPollInput" value="0">
                    <div class="form-group mb-3">
                        <input type="text" name="poll_question" class="form-control" placeholder="Pertanyaan polling...">
                    </div>
                    <div id="pollOptionsContainer">
                        <div class="poll-option-input">
                            <input type="text" name="poll_options[]" placeholder="Opsi 1">
                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="poll-option-input">
                            <input type="text" name="poll_options[]" placeholder="Opsi 2">
                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addPollOption()">
                        <i class="fas fa-plus"></i> Tambah Opsi
                    </button>
                    <div class="form-group mt-3">
                        <select name="poll_duration" class="form-control form-select">
                            <option value="24">1 Hari</option>
                            <option value="72">3 Hari</option>
                            <option value="168">7 Hari</option>
                        </select>
                    </div>
                </div>
                
                <div class="d-flex justify-between align-center mt-3">
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="togglePollCreator()">
                            <i class="fas fa-poll"></i> Poll
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Posting
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Feed -->
<?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<div class="post-card animate-fadeIn" style="position: relative;">
    <?php if($post->user_id === auth()->id() || auth()->user()->isAdmin()): ?>
    <form action="<?php echo e(route('announcements.destroy', $post)); ?>" method="POST" class="delete-btn" onsubmit="return confirm('Hapus pengumuman ini?')">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit"><i class="fas fa-trash"></i></button>
    </form>
    <?php endif; ?>
    
    <div class="post-header">
        <img src="<?php echo e($post->user->avatar_url); ?>" alt="" class="post-avatar">
        <div>
            <div class="post-user-name"><?php echo e($post->user->name); ?></div>
            <div class="post-time"><?php echo e($post->created_at->diffForHumans()); ?></div>
        </div>
    </div>
    
    <div class="post-content"><?php echo e($post->content); ?></div>
    
    <?php if($post->has_poll): ?>
    <div class="post-poll">
        <div class="poll-question">📊 <?php echo e($post->poll_question); ?></div>
        <?php
            $hasVoted = $post->hasUserVoted(auth()->id());
            $userVoteId = $post->getUserVoteOptionId(auth()->id());
        ?>
        <?php $__currentLoopData = $post->pollOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="poll-option <?php echo e($hasVoted ? 'voted' : ''); ?> <?php echo e($userVoteId === $option->id ? 'selected' : ''); ?>" 
             data-option-id="<?php echo e($option->id); ?>" 
             data-post-id="<?php echo e($post->id); ?>"
             onclick="votePoll(this)">
            <div class="poll-bar" style="width: <?php echo e($hasVoted ? $option->percentage : 0); ?>%;"></div>
            <div class="poll-text">
                <span><?php echo e($option->option_text); ?></span>
                <?php if($hasVoted): ?>
                <span><?php echo e($option->percentage); ?>%</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="poll-meta">
            <?php echo e($post->total_votes); ?> votes
            <?php if($post->poll_ends_at): ?>
            • <?php echo e($post->isPollActive() ? 'Berakhir ' . $post->poll_ends_at->diffForHumans() : 'Sudah berakhir'); ?>

            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Reactions Summary -->
    <?php if($post->reactions->count() > 0): ?>
    <div class="reaction-summary">
        <?php $reactionCounts = $post->reaction_counts; ?>
        <?php $__currentLoopData = $reactionCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $emoji = match($type) {
                    'like' => '👍',
                    'love' => '❤️',
                    'haha' => '😂',
                    'wow' => '😮',
                    'sad' => '😢',
                    'angry' => '😡',
                    default => '👍'
                };
            ?>
            <span><?php echo e($emoji); ?> <?php echo e($count); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    
    <!-- Reactions Bar -->
    <div class="reactions-bar" id="reactions-<?php echo e($post->id); ?>" style="display: none;">
        <?php $userReaction = $post->getUserReaction(auth()->id()); ?>
        <button class="reaction-btn <?php echo e($userReaction === 'like' ? 'active' : ''); ?>" onclick="react(<?php echo e($post->id); ?>, 'like')">👍</button>
        <button class="reaction-btn <?php echo e($userReaction === 'love' ? 'active' : ''); ?>" onclick="react(<?php echo e($post->id); ?>, 'love')">❤️</button>
        <button class="reaction-btn <?php echo e($userReaction === 'haha' ? 'active' : ''); ?>" onclick="react(<?php echo e($post->id); ?>, 'haha')">😂</button>
        <button class="reaction-btn <?php echo e($userReaction === 'wow' ? 'active' : ''); ?>" onclick="react(<?php echo e($post->id); ?>, 'wow')">😮</button>
        <button class="reaction-btn <?php echo e($userReaction === 'sad' ? 'active' : ''); ?>" onclick="react(<?php echo e($post->id); ?>, 'sad')">😢</button>
        <button class="reaction-btn <?php echo e($userReaction === 'angry' ? 'active' : ''); ?>" onclick="react(<?php echo e($post->id); ?>, 'angry')">😡</button>
    </div>
    
    <div class="post-actions">
        <button class="action-btn" onclick="toggleReactions(<?php echo e($post->id); ?>)">
            <i class="far fa-thumbs-up"></i> Reaksi
        </button>
        <button class="action-btn" onclick="toggleComments(<?php echo e($post->id); ?>)">
            <i class="far fa-comment"></i> Komentar (<?php echo e($post->comments->count()); ?>)
        </button>
    </div>
    
    <!-- Comments Section -->
    <div class="comments-section" id="comments-<?php echo e($post->id); ?>">
        <?php $__currentLoopData = $post->comments->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="comment-item">
            <img src="<?php echo e($comment->user->avatar_url); ?>" alt="" class="comment-avatar">
            <div class="comment-content">
                <div class="comment-name"><?php echo e($comment->user->name); ?></div>
                <div class="comment-text"><?php echo e($comment->content); ?></div>
                <div class="comment-time"><?php echo e($comment->created_at->diffForHumans()); ?></div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <form action="<?php echo e(route('announcements.comment', $post)); ?>" method="POST" class="comment-form">
            <?php echo csrf_field(); ?>
            <input type="text" name="content" placeholder="Tulis komentar..." required>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="card">
    <div class="card-body text-center py-5">
        <i class="fas fa-bullhorn text-muted" style="font-size: 4rem;"></i>
        <h5 class="mt-3">Belum ada pengumuman</h5>
        <p class="text-muted">Jadilah yang pertama membuat pengumuman!</p>
    </div>
</div>
<?php endif; ?>

<?php echo e($announcements->links()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function togglePollCreator() {
    const creator = document.getElementById('pollCreator');
    const input = document.getElementById('hasPollInput');
    creator.classList.toggle('show');
    input.value = creator.classList.contains('show') ? '1' : '0';
}

function addPollOption() {
    const container = document.getElementById('pollOptionsContainer');
    const count = container.children.length + 1;
    if (count > 6) return alert('Maksimal 6 opsi');
    
    const div = document.createElement('div');
    div.className = 'poll-option-input';
    div.innerHTML = `
        <input type="text" name="poll_options[]" placeholder="Opsi ${count}">
        <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
    `;
    container.appendChild(div);
}

function toggleReactions(postId) {
    document.getElementById('reactions-' + postId).style.display = 
        document.getElementById('reactions-' + postId).style.display === 'none' ? 'flex' : 'none';
}

function toggleComments(postId) {
    document.getElementById('comments-' + postId).classList.toggle('show');
}

function react(postId, type) {
    fetch(`/announcements/${postId}/react`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ type })
    })
    .then(r => r.json())
    .then(() => location.reload());
}

function votePoll(element) {
    if (element.classList.contains('voted')) return;
    
    const postId = element.dataset.postId;
    const optionId = element.dataset.optionId;
    
    fetch(`/announcements/${postId}/vote`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ option_id: optionId })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.error);
        }
    });
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/sentrasi/public_html/resources/views/announcements/index.blade.php ENDPATH**/ ?>