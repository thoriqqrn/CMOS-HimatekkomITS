<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php
        $appName = \App\Models\Setting::get('app_name', 'SAVANA');
        $themeColor = \App\Models\Setting::get('theme_color', 'purple');
        $themeColors = [
            'purple' => ['primary' => '#7C3AED', 'hover' => '#6D28D9', 'soft' => '#A78BFA', 'light' => '#EDE9FE'],
            'blue' => ['primary' => '#3B82F6', 'hover' => '#2563EB', 'soft' => '#60A5FA', 'light' => '#DBEAFE'],
            'green' => ['primary' => '#10B981', 'hover' => '#059669', 'soft' => '#34D399', 'light' => '#D1FAE5'],
            'red' => ['primary' => '#EF4444', 'hover' => '#DC2626', 'soft' => '#F87171', 'light' => '#FEE2E2'],
            'orange' => ['primary' => '#F59E0B', 'hover' => '#D97706', 'soft' => '#FBBF24', 'light' => '#FEF3C7'],
            'pink' => ['primary' => '#EC4899', 'hover' => '#DB2777', 'soft' => '#F472B6', 'light' => '#FCE7F3'],
            'indigo' => ['primary' => '#6366F1', 'hover' => '#4F46E5', 'soft' => '#818CF8', 'light' => '#E0E7FF'],
            'teal' => ['primary' => '#14B8A6', 'hover' => '#0D9488', 'soft' => '#2DD4BF', 'light' => '#CCFBF1'],
            'cyan' => ['primary' => '#06B6D4', 'hover' => '#0891B2', 'soft' => '#22D3EE', 'light' => '#CFFAFE'],
            'rose' => ['primary' => '#F43F5E', 'hover' => '#E11D48', 'soft' => '#FB7185', 'light' => '#FFE4E6'],
            'amber' => ['primary' => '#F59E0B', 'hover' => '#D97706', 'soft' => '#FBBF24', 'light' => '#FEF3C7'],
            'slate' => ['primary' => '#64748B', 'hover' => '#475569', 'soft' => '#94A3B8', 'light' => '#F1F5F9'],
        ];
        $colors = $themeColors[$themeColor] ?? $themeColors['purple'];
    ?>
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - <?php echo e($appName); ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🔗</text></svg>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    
    <!-- Dynamic Theme Colors -->
    <style>
        :root {
            --primary: <?php echo e($colors['primary']); ?>;
            --primary-hover: <?php echo e($colors['hover']); ?>;
            --primary-soft: <?php echo e($colors['soft']); ?>;
            --primary-light: <?php echo e($colors['light']); ?>;
            --shadow-purple: 0 4px 24px <?php echo e($colors['primary']); ?>26;
        }
    </style>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div class="app-wrapper">
        <!-- Sidebar Overlay (Mobile) -->
        <div class="sidebar-overlay"></div>
        
        <!-- Sidebar -->
        <?php echo $__env->make('layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="main-header">
                <div class="header-left">
                    <button type="button" class="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="page-title"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
                </div>
                <div class="header-right">
                    <button type="button" class="header-btn theme-toggle" title="Toggle Dark Mode">
                        <i class="fas fa-moon"></i>
                    </button>
                    
                    <!-- Notification Dropdown -->
                    <div class="dropdown notification-dropdown">
                        <button type="button" class="header-btn notification-toggle" onclick="toggleNotificationDropdown()" title="Notifikasi">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge" id="notificationBadge" style="display: none;">0</span>
                        </button>
                        <div class="dropdown-menu notification-menu" id="notificationDropdown">
                            <div class="dropdown-header">
                                <span><i class="fas fa-bell"></i> Notifikasi</span>
                                <button type="button" class="btn btn-sm btn-link" onclick="markAllNotificationsRead()">
                                    Tandai Dibaca
                                </button>
                            </div>
                            <div class="notification-list" id="notificationList">
                                <div class="notification-loading">
                                    <i class="fas fa-spinner fa-spin"></i> Memuat...
                                </div>
                            </div>
                            <div class="dropdown-footer">
                                <a href="<?php echo e(route('notifications.index')); ?>">Lihat Semua Notifikasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown user-dropdown">
                        <button type="button" class="header-btn dropdown-toggle" id="userDropdown" onclick="toggleUserDropdown()">
                            <img src="<?php echo e(auth()->user()->avatar_url); ?>" alt="Avatar" class="avatar-sm">
                            <span class="user-name-header"><?php echo e(auth()->user()->name); ?></span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" id="userDropdownMenu">
                            <div class="dropdown-header">
                                <img src="<?php echo e(auth()->user()->avatar_url); ?>" alt="" class="dropdown-avatar">
                                <div class="dropdown-user-info">
                                    <div class="dropdown-user-name"><?php echo e(auth()->user()->name); ?></div>
                                    <div class="dropdown-user-role"><?php echo e(auth()->user()->role_name); ?></div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="dropdown-item">
                                <i class="fas fa-user-edit"></i>
                                <span>Edit Profil</span>
                            </a>
                            <?php if(auth()->user()->isAdmin()): ?>
                            <a href="<?php echo e(route('settings.index')); ?>" class="dropdown-item">
                                <i class="fas fa-cog"></i>
                                <span>Pengaturan</span>
                            </a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div>
                            <form action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="page-content">
                <!-- Flash Messages -->
                <?php if(session('success')): ?>
                    <div class="alert alert-success animate-fadeIn">
                        <i class="fas fa-check-circle"></i>
                        <span><?php echo e(session('success')); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="alert alert-danger animate-fadeIn">
                        <i class="fas fa-exclamation-circle"></i>
                        <span><?php echo e(session('error')); ?></span>
                    </div>
                <?php endif; ?>

                <?php if(session('warning')): ?>
                    <div class="alert alert-warning animate-fadeIn">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span><?php echo e(session('warning')); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger animate-fadeIn">
                        <i class="fas fa-exclamation-circle"></i>
                        <div>
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0 mt-1">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom JS -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    <!-- Flash message to SweetAlert -->
    <?php if(session('swal')): ?>
        <script>
            Swal.fire({
                icon: '<?php echo e(session("swal.type", "success")); ?>',
                title: '<?php echo e(session("swal.title")); ?>',
                text: '<?php echo e(session("swal.text", "")); ?>',
                confirmButtonColor: '<?php echo e($colors["primary"] ?? "#7C3AED"); ?>'
            });
        </script>
    <?php endif; ?>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    <!-- Floating Chat -->
    <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('components.floating-chat', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
    
    <script>
    function toggleUserDropdown() {
        const menu = document.getElementById('userDropdownMenu');
        menu.classList.toggle('show');
        // Close notification dropdown
        document.getElementById('notificationDropdown')?.classList.remove('show');
    }
    
    function toggleNotificationDropdown() {
        const menu = document.getElementById('notificationDropdown');
        const isOpening = !menu.classList.contains('show');
        menu.classList.toggle('show');
        // Close user dropdown
        document.getElementById('userDropdownMenu')?.classList.remove('show');
        
        if (isOpening) {
            loadNotifications();
        }
    }
    
    function loadNotifications() {
        const list = document.getElementById('notificationList');
        list.innerHTML = '<div class="notification-loading"><i class="fas fa-spinner fa-spin"></i> Memuat...</div>';
        
        fetch('<?php echo e(route("notifications.recent")); ?>')
            .then(res => res.json())
            .then(data => {
                updateNotificationBadge(data.unread_count);
                
                if (data.notifications.length === 0) {
                    list.innerHTML = '<div class="notification-empty"><i class="fas fa-bell-slash"></i><p>Tidak ada notifikasi</p></div>';
                    return;
                }
                
                let html = '';
                data.notifications.forEach(n => {
                    const isUnread = !n.read_at;
                    const icon = getNotificationIcon(n.type);
                    const color = getNotificationColor(n.type);
                    const timeAgo = formatTimeAgo(n.created_at);
                    
                    html += `
                        <a href="#" class="notification-item ${isUnread ? 'unread' : ''}" onclick="markNotificationRead(${n.id}, event)">
                            <div class="notification-icon ${color}"><i class="${icon}"></i></div>
                            <div class="notification-content">
                                <div class="notification-title">${n.title}</div>
                                <div class="notification-message">${n.message || ''}</div>
                                <div class="notification-time">${timeAgo}</div>
                            </div>
                        </a>
                    `;
                });
                list.innerHTML = html;
            })
            .catch(() => {
                list.innerHTML = '<div class="notification-empty"><i class="fas fa-exclamation-triangle"></i><p>Gagal memuat</p></div>';
            });
    }
    
    function markNotificationRead(id, event) {
        event.preventDefault();
        fetch(`/notifications/${id}/read`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
        }).then(res => res.json()).then(data => {
            if (data.success) window.location.href = getNotificationLink(id);
        });
    }
    
    function markAllNotificationsRead() {
        fetch('<?php echo e(route("notifications.mark-all-read")); ?>', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
        }).then(res => res.json()).then(data => {
            if (data.success) {
                updateNotificationBadge(0);
                document.querySelectorAll('.notification-item.unread').forEach(el => el.classList.remove('unread'));
            }
        });
    }
    
    function updateNotificationBadge(count) {
        const badge = document.getElementById('notificationBadge');
        if (count > 0) {
            badge.textContent = count > 9 ? '9+' : count;
            badge.style.display = 'flex';
        } else {
            badge.style.display = 'none';
        }
    }
    
    function getNotificationIcon(type) {
        return { task_assigned: 'fas fa-tasks', deadline_reminder: 'fas fa-clock', evaluation_new: 'fas fa-star', announcement: 'fas fa-bullhorn' }[type] || 'fas fa-bell';
    }
    
    function getNotificationColor(type) {
        return { task_assigned: 'primary', deadline_reminder: 'warning', evaluation_new: 'success', announcement: 'info' }[type] || 'secondary';
    }
    
    function getNotificationLink(id) {
        return `/notifications/${id}/read`;
    }
    
    function formatTimeAgo(dateStr) {
        const date = new Date(dateStr);
        const now = new Date();
        const diff = Math.floor((now - date) / 1000);
        if (diff < 60) return 'Baru saja';
        if (diff < 3600) return Math.floor(diff / 60) + ' menit lalu';
        if (diff < 86400) return Math.floor(diff / 3600) + ' jam lalu';
        return Math.floor(diff / 86400) + ' hari lalu';
    }
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        const userDropdown = document.querySelector('.user-dropdown');
        const notifDropdown = document.querySelector('.notification-dropdown');
        const userMenu = document.getElementById('userDropdownMenu');
        const notifMenu = document.getElementById('notificationDropdown');
        
        if (userDropdown && userMenu && !userDropdown.contains(e.target)) userMenu.classList.remove('show');
        if (notifDropdown && notifMenu && !notifDropdown.contains(e.target)) notifMenu.classList.remove('show');
    });
    
    // Check for unread count on page load
    document.addEventListener('DOMContentLoaded', function() {
        fetch('<?php echo e(route("notifications.unread-count")); ?>')
            .then(res => res.json())
            .then(data => updateNotificationBadge(data.count))
            .catch(() => {});
    });
    </script>
</body>
</html>

<?php /**PATH /home/sentrasi/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>