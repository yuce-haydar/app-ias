<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Hatay İmar</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #cf9f38;
            --dark-color: #343a40;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: var(--dark-color);
            transition: all 0.3s;
            z-index: 1000;
            overflow-y: auto;
        }
        
        .sidebar-header {
           
            background: rgba(0,0,0,0.2);
            text-align: center;
        }
        
        .sidebar-header img {
            height: 80px;
        }
        
        .sidebar-menu {
          
        }
        
        .sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--primary-color);
        }
        
        .sidebar-menu i {
            width: 20px;
            margin-right: 10px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }
        
        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 15px 20px;
        }
        
        .content {
            padding: 30px;
        }
        
        /* Cards */
        .card {
            border: none;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        
        .card-header {
            background: white;
            border-bottom: 2px solid #f8f9fa;
            padding: 20px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -var(--sidebar-width);
            }
            
            .sidebar.active {
                margin-left: 0;
            }
            
            .main-content {
                margin-left: 0;
            }
        }
        
        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            transition: transform 0.3s;
            position: relative;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .stat-card.primary .icon { background: rgba(40, 167, 69, 0.1); color: var(--primary-color); }
        .stat-card.info .icon { background: rgba(23, 162, 184, 0.1); color: #17a2b8; }
        .stat-card.warning .icon { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
        .stat-card.danger .icon { background: rgba(220, 53, 69, 0.1); color: #dc3545; }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
<a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center" style="display: flex !important; align-items: center !important; background-color: #fff;">
                                <img alt="HBB Logo" src="{{ url('assets/images/logo/combined-logo.png') }}" style="width:175px; display: block; background-color: #fff">
            </a>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                
                <li class="menu-header text-muted px-3 mt-3 mb-2">
                    <small>İÇERİK YÖNETİMİ</small>
                </li>
                
                <li>
                    <a href="{{ route('admin.facilities.index') }}" class="{{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
                        <i class="fas fa-building"></i> Tesisler
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <i class="fas fa-project-diagram"></i> Projeler
                    </a>
                </li>
                
              
                
                <li>
                    <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i> Haberler
                    </a>
                </li>
                 <li>
                    <a href="{{ route('admin.announcements.index') }}" class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                        <i class="fas fa-bullhorn"></i> Duyurular
                    </a>
                </li>
                 <li>
                    <a href="{{ route('admin.team-members.index') }}" class="{{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Yönetim Kurulu
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.tenders.index') }}" class="{{ request()->routeIs('admin.tenders.*') ? 'active' : '' }}">
                        <i class="fas fa-gavel"></i> İhaleler
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.job-postings.index') }}" class="{{ request()->routeIs('admin.job-postings.*') ? 'active' : '' }}">
                        <i class="fas fa-briefcase"></i> İş İlanları
                    </a>
                </li>
                
               
                
                <li>
                    <a href="{{ route('admin.faqs.index') }}" class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                        <i class="fas fa-question-circle"></i> SSS
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.information-services.index') }}" class="{{ request()->routeIs('admin.information-services.*') ? 'active' : '' }}">
                        <i class="fas fa-info-circle"></i> Bilgi Toplumu Hizmetleri
                    </a>
                </li>
                
                <li class="menu-header text-muted px-3 mt-3 mb-2">
                    <small>BAŞVURULAR</small>
                </li>
                
                <li>
                    <a href="{{ route('admin.contact-submissions.index') }}" class="{{ request()->routeIs('admin.contact-submissions.*') ? 'active' : '' }}">
                        <i class="fas fa-envelope"></i> İletişim Formları
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.tender-applications.index') }}" class="{{ request()->routeIs('admin.tender-applications.*') ? 'active' : '' }}">
                        <i class="fas fa-file-contract"></i> İhale Başvuruları
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.job-applications.index') }}" class="{{ request()->routeIs('admin.job-applications.*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i> İş Başvuruları
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.general-job-applications.index') }}" class="{{ request()->routeIs('admin.general-job-applications.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i> Genel Başvurular
                    </a>
                </li>
                
                <li class="menu-header text-muted px-3 mt-3 mb-2">
                    <small>SİTE YÖNETİMİ</small>
                </li>
                
                <li>
                    <a href="{{ route('admin.homepage.index') }}" class="{{ request()->routeIs('admin.homepage.*') ? 'active' : '' }}">
                        <i class="fas fa-home"></i> Anasayfa Yönetimi
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.about-page.index') }}" class="{{ request()->routeIs('admin.about-page.*') ? 'active' : '' }}">
                        <i class="fas fa-info-circle"></i> Hakkımızda Sayfası
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.contact-settings.edit') }}" class="{{ request()->routeIs('admin.contact-settings.*') ? 'active' : '' }}">
                        <i class="fas fa-phone"></i> İletişim Ayarları
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('admin.site-settings.index') }}" class="{{ request()->routeIs('admin.site-settings.*') ? 'active' : '' }}">
                        <i class="fas fa-paint-brush"></i> Header/Footer
                    </a>
                </li>
                
                <li class="menu-header text-muted px-3 mt-3 mb-2">
                    <small>SİSTEM</small>
                </li>
                
              
                <li>
                    <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i> Ayarlar
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="d-flex justify-content-between align-items-center w-100">
                <button class="btn btn-link d-md-none" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <h4 class="mb-0">@yield('page-title', 'Admin Panel')</h4>
                
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('home') }}" target="_blank">
                                <i class="fas fa-globe"></i> Siteyi Görüntüle
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i> Çıkış Yap
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Content -->
        <div class="content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Image Optimizer -->
    <script src="{{ asset('assets/js/image-optimizer.js') }}"></script>
    
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // DataTable Default Settings
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/tr.json'
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html> 