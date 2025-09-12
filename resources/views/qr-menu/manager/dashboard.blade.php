<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $qrMenu->name }} - Yönetim Paneli</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #cf9f38;
            --secondary-color: #2c3e50;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --info-color: #3498db;
            --light-gray: #f8f9fa;
            --border-color: #e9ecef;
            --dark-gray: #6c757d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light-gray);
            color: #333;
            line-height: 1.6;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-brand h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary-color);
        }

        .navbar-brand .badge {
            background: var(--primary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.75rem 0;
            }

            .navbar-content {
                padding: 0 0.75rem;
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .navbar-brand {
                flex: 1;
                min-width: 200px;
            }

            .navbar-brand h1 {
                font-size: 1.2rem;
            }

            .navbar-brand .badge {
                font-size: 0.7rem;
                padding: 0.2rem 0.6rem;
            }

            .navbar-actions {
                gap: 0.5rem;
                flex-wrap: wrap;
            }

            .nav-btn {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
                min-width: auto;
            }

            .nav-btn i {
                margin-right: 0.3rem;
            }
        }

        @media (max-width: 480px) {
            .navbar-content {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }

            .navbar-brand {
                justify-content: center;
                margin-bottom: 0.5rem;
            }

            .navbar-brand h1 {
                font-size: 1.1rem;
            }

            .navbar-actions {
                justify-content: center;
                width: 100%;
            }

            .nav-btn {
                flex: 1;
                justify-content: center;
                max-width: 120px;
                font-size: 0.75rem;
            }
        }

        .nav-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background: var(--secondary-color);
            color: white;
            text-decoration: none;
        }

        .nav-btn.danger {
            background: var(--danger-color);
        }

        .nav-btn.danger:hover {
            background: #c0392b;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--dark-gray);
            font-size: 1.1rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-color);
        }

        .stat-card.success::before {
            background: var(--success-color);
        }

        .stat-card.warning::before {
            background: var(--warning-color);
        }

        .stat-card.danger::before {
            background: var(--danger-color);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-title {
            font-size: 0.9rem;
            color: var(--dark-gray);
            font-weight: 500;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            background: var(--primary-color);
        }

        .stat-icon.success {
            background: var(--success-color);
        }

        .stat-icon.warning {
            background: var(--warning-color);
        }

        .stat-icon.danger {
            background: var(--danger-color);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .stat-change {
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .stat-change.positive {
            color: var(--success-color);
        }

        .stat-change.negative {
            color: var(--danger-color);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .action-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .action-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
        }

        .action-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .action-description {
            color: var(--dark-gray);
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .action-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background: var(--secondary-color);
            color: white;
            text-decoration: none;
        }

        .recent-section {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .recent-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .recent-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .recent-list {
            list-style: none;
        }

        .recent-item {
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .recent-item:last-child {
            border-bottom: none;
        }

        .recent-item-icon {
            width: 40px;
            height: 40px;
            background: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-gray);
        }

        .recent-item-content {
            flex: 1;
        }

        .recent-item-title {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.25rem;
        }

        .recent-item-meta {
            font-size: 0.8rem;
            color: var(--dark-gray);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--dark-gray);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                gap: 1rem;
            }

            .navbar-actions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .stat-value {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <div class="navbar-brand">
                <h1>{{ $qrMenu->name }}</h1>
                <span class="badge">Yönetim Paneli</span>
            </div>
            <div class="navbar-actions">
                <a href="{{ route('qr-menu.show', $qrMenu->url_slug) }}" class="nav-btn" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    Menüyü Görüntüle
                </a>
                                        <a href="{{ route('qr-menu.settings', $qrMenu->url_slug) }}" class="nav-btn">
                    <i class="fas fa-cog"></i>
                    Ayarlar
                </a>
                <form method="POST" action="{{ route('qr-menu.logout', $qrMenu->url_slug) }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-btn danger">
                        <i class="fas fa-sign-out-alt"></i>
                        Çıkış Yap
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h2 class="page-title">Dashboard</h2>
            <p class="page-subtitle">{{ $qrMenu->name }} menü yönetimine hoş geldiniz</p>
        </div>

        <!-- İstatistikler -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-title">Toplam Kategori</span>
                    <div class="stat-icon">
                        <i class="fas fa-list"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $stats['categories'] }}</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    Aktif kategoriler
                </div>
            </div>

            <div class="stat-card success">
                <div class="stat-header">
                    <span class="stat-title">Toplam Ürün</span>
                    <div class="stat-icon success">
                        <i class="fas fa-utensils"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $stats['items'] }}</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    Menüdeki ürünler
                </div>
            </div>

            <div class="stat-card warning">
                <div class="stat-header">
                    <span class="stat-title">Önerilen Ürünler</span>
                    <div class="stat-icon warning">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $stats['recommended'] }}</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    Öne çıkan ürünler
                </div>
            </div>

            <div class="stat-card danger">
                <div class="stat-header">
                    <span class="stat-title">Stokta Yok</span>
                    <div class="stat-icon danger">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $stats['out_of_stock'] }}</div>
                <div class="stat-change negative">
                    <i class="fas fa-arrow-down"></i>
                    Müsait olmayan ürünler
                </div>
            </div>
        </div>

        <!-- Hızlı İşlemler -->
        <div class="actions-grid">
            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-list"></i>
                </div>
                <h3 class="action-title">Kategori Yönetimi</h3>
                <p class="action-description">Menü kategorilerinizi oluşturun, düzenleyin ve organize edin.</p>
                <a href="{{ route('qr-menu.categories', $qrMenu->url_slug) }}" class="action-btn">
                    <i class="fas fa-arrow-right"></i>
                    Kategorileri Yönet
                </a>
            </div>

            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3 class="action-title">Ürün Yönetimi</h3>
                <p class="action-description">Menü ürünlerinizi ekleyin, güncelleyin ve fiyatlandırın.</p>
                <a href="{{ route('qr-menu.items', $qrMenu->url_slug) }}" class="action-btn">
                    <i class="fas fa-arrow-right"></i>
                    Ürünleri Yönet
                </a>
            </div>

            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="action-title">Kullanıcı Yönetimi</h3>
                <p class="action-description">Ekip üyelerinizi yönetin ve yetkilendirin.</p>
                <a href="{{ route('qr-menu.users', $qrMenu->url_slug) }}" class="action-btn">
                    <i class="fas fa-arrow-right"></i>
                    Kullanıcıları Yönet
                </a>
            </div>

            <div class="action-card">
                <div class="action-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <h3 class="action-title">Menü Ayarları</h3>
                <p class="action-description">Menü tasarımını ve genel ayarları düzenleyin.</p>
                                        <a href="{{ route('qr-menu.settings', $qrMenu->url_slug) }}" class="action-btn">
                    <i class="fas fa-arrow-right"></i>
                    Ayarları Düzenle
                </a>
            </div>
        </div>

        <!-- Son Aktiviteler -->
        <div class="recent-section">
            <div class="recent-header">
                <h3 class="recent-title">Son Aktiviteler</h3>
            </div>
            
            @if($recentItems->count() > 0)
                <ul class="recent-list">
                    @foreach($recentItems as $item)
                        <li class="recent-item">
                            <div class="recent-item-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <div class="recent-item-content">
                                <div class="recent-item-title">{{ $item->name }}</div>
                                <div class="recent-item-meta">
                                    {{ $item->category->name }} - {{ $item->updated_at->diffForHumans() }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="empty-state">
                    <i class="fas fa-clock"></i>
                    <h4>Henüz aktivite yok</h4>
                    <p>Menünüzü düzenlemeye başladığınızda aktiviteler burada görünecek.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html> 