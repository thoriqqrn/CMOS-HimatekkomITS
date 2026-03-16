<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <!-- Sidebar Header -->
    <?php
        $appName = \App\Models\Setting::get('app_name', 'CMOS');
    ?>
    <div class="sidebar-header">
        <div class="sidebar-logo">🔗</div>
        <span class="sidebar-brand"><?php echo e($appName); ?></span>
    </div>
    
    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav">
        <!-- Main Menu -->
        <div class="nav-section">
            <div class="nav-section-title">Menu Utama</div>
            
            <a href="<?php echo e(route('dashboard')); ?>" class="nav-item <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="<?php echo e(route('announcements.index')); ?>" class="nav-item <?php echo e(request()->routeIs('announcements.*') ? 'active' : ''); ?>">
                <i class="fas fa-bullhorn"></i>
                <span>Pengumuman</span>
            </a>
            
            <a href="<?php echo e(route('information-boards.index')); ?>" class="nav-item <?php echo e(request()->routeIs('information-boards.*') ? 'active' : ''); ?>">
                <i class="fas fa-newspaper"></i>
                <span>Papan Informasi</span>
            </a>
        </div>
        
        <!-- Management (Admin, BPH) -->
        <?php if(auth()->user()->hasRole(['admin', 'bph'])): ?>
        <div class="nav-section">
            <div class="nav-section-title">Manajemen</div>
            
            <?php if(auth()->user()->isAdmin()): ?>
            <a href="<?php echo e(route('users.index')); ?>" class="nav-item <?php echo e(request()->routeIs('users.index') || request()->routeIs('users.show') || request()->routeIs('users.create') || request()->routeIs('users.edit') ? 'active' : ''); ?>">
                <i class="fas fa-users"></i>
                <span>Data User</span>
            </a>
            <a href="<?php echo e(route('users.import')); ?>" class="nav-item <?php echo e(request()->routeIs('users.import*') ? 'active' : ''); ?>">
                <i class="fas fa-file-csv"></i>
                <span>Import User CSV</span>
            </a>
            <?php endif; ?>
            
            <a href="<?php echo e(route('departments.index')); ?>" class="nav-item <?php echo e(request()->routeIs('departments.*') ? 'active' : ''); ?>">
                <i class="fas fa-building"></i>
                <span>Departemen</span>
            </a>
            
            <a href="<?php echo e(route('cabinets.index')); ?>" class="nav-item <?php echo e(request()->routeIs('cabinets.*') ? 'active' : ''); ?>">
                <i class="fas fa-landmark"></i>
                <span>Kabinet</span>
            </a>
        </div>
        <?php endif; ?>
        
        <!-- Programs -->
        <div class="nav-section">
            <div class="nav-section-title">Program Kerja</div>
            
            <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
            <a href="<?php echo e(route('programs.index')); ?>" class="nav-item <?php echo e(request()->routeIs('programs.index') || request()->routeIs('programs.show') || request()->routeIs('programs.create') || request()->routeIs('programs.edit') ? 'active' : ''); ?>">
                <i class="fas fa-project-diagram"></i>
                <span>Daftar Proker</span>
            </a>
            <?php endif; ?>
            
            <a href="<?php echo e(route('programs.my')); ?>" class="nav-item <?php echo e(request()->routeIs('programs.my') ? 'active' : ''); ?>">
                <i class="fas fa-folder-open"></i>
                <span>Proker Saya</span>
            </a>
            
            <a href="<?php echo e(route('tasks.index')); ?>" class="nav-item <?php echo e(request()->routeIs('tasks.*') ? 'active' : ''); ?>">
                <i class="fas fa-tasks"></i>
                <span>Task Saya</span>
            </a>
        </div>
        
        <!-- Timeline & Calendar -->
        <div class="nav-section">
            <div class="nav-section-title">Kalender</div>
            
            <a href="<?php echo e(route('timelines.calendar')); ?>" class="nav-item <?php echo e(request()->routeIs('timelines.calendar') ? 'active' : ''); ?>">
                <i class="fas fa-calendar-alt"></i>
                <span>Kalender</span>
            </a>
            
            <a href="<?php echo e(route('timelines.index')); ?>" class="nav-item <?php echo e(request()->routeIs('timelines.index') ? 'active' : ''); ?>">
                <i class="fas fa-list"></i>
                <span>Daftar Timeline</span>
            </a>
            
            <?php if(auth()->user()->hasRole(['admin', 'bph'])): ?>
            <a href="<?php echo e(route('timelines.global')); ?>" class="nav-item <?php echo e(request()->routeIs('timelines.global') ? 'active' : ''); ?>">
                <i class="fas fa-globe"></i>
                <span>Timeline Global</span>
            </a>
            <?php endif; ?>
        </div>
        
        <!-- Akses -->
        <div class="nav-section">
            <div class="nav-section-title">Akses</div>
            
            <a href="<?php echo e(route('drives.index')); ?>" class="nav-item <?php echo e(request()->routeIs('drives.*') ? 'active' : ''); ?>">
                <i class="fab fa-google-drive"></i>
                <span>Google Drive</span>
            </a>
            
            <a href="<?php echo e(route('links.index')); ?>" class="nav-item <?php echo e(request()->routeIs('links.*') ? 'active' : ''); ?>">
                <i class="fas fa-external-link-alt"></i>
                <span>Kumpulan Link</span>
            </a>
        </div>
        
        <!-- Evaluation (Admin, BPH, Kabinet) -->
        <?php if(auth()->user()->hasRole(['admin', 'bph', 'kabinet'])): ?>
        <div class="nav-section">
            <div class="nav-section-title">Penilaian</div>
            
            <a href="<?php echo e(route('evaluations.index')); ?>" class="nav-item <?php echo e(request()->routeIs('evaluations.*') ? 'active' : ''); ?>">
                <i class="fas fa-star"></i>
                <span>Evaluasi Staff</span>
            </a>
            
            <?php if(auth()->user()->hasRole(['admin', 'bph'])): ?>
            <a href="<?php echo e(route('reports.index')); ?>" class="nav-item <?php echo e(request()->routeIs('reports.*') ? 'active' : ''); ?>">
                <i class="fas fa-chart-bar"></i>
                <span>Laporan</span>
            </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        
        <?php if(auth()->user()->isStaff()): ?>
        <div class="nav-section">
            <div class="nav-section-title">Penilaian</div>
            
            <a href="<?php echo e(route('evaluations.my')); ?>" class="nav-item <?php echo e(request()->routeIs('evaluations.my') ? 'active' : ''); ?>">
                <i class="fas fa-star"></i>
                <span>Nilai Saya</span>
            </a>
        </div>
        <?php endif; ?>
        
        <!-- Settings (Admin Only) -->
        <?php if(auth()->user()->isAdmin()): ?>
        <div class="nav-section">
            <div class="nav-section-title">Pengaturan</div>
            
            <a href="<?php echo e(route('settings.index')); ?>" class="nav-item <?php echo e(request()->routeIs('settings.*') ? 'active' : ''); ?>">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </a>
        </div>
        <?php endif; ?>
    </nav>
    
    <!-- Sidebar Footer -->
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <img src="<?php echo e(auth()->user()->avatar_url); ?>" alt="Avatar" class="sidebar-user-avatar">
            <div class="sidebar-user-info">
                <div class="sidebar-user-name"><?php echo e(auth()->user()->name); ?></div>
                <div class="sidebar-user-role"><?php echo e(auth()->user()->role_name); ?></div>
            </div>
        </div>
        <form action="<?php echo e(route('logout')); ?>" method="POST" class="mt-2">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-secondary w-100">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
<?php /**PATH /home/sentrasi/public_html/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>