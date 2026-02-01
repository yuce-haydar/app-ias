<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $qrMenu->name }} - Ürün Yönetimi</title>
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

        /* Alert Styles */
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            border: 1px solid transparent;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeaa7;
            color: #856404;
        }

        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
        }

        .filters {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .filters-row {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-label {
            font-weight: 500;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        .filter-select {
            padding: 0.5rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.9rem;
            background: white;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            color: white;
            text-decoration: none;
        }

        .btn-success {
            background: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background: #229954;
        }

        .btn-warning {
            background: var(--warning-color);
            color: white;
        }

        .btn-warning:hover {
            background: #d68910;
        }

        .btn-danger {
            background: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-info {
            background: var(--info-color);
            color: white;
        }

        .btn-info:hover {
            background: #2980b9;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
        }

        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .item-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .item-card.recommended {
            border: 2px solid var(--primary-color);
        }

        .item-card.unavailable {
            opacity: 0.7;
            background: #f8f9fa;
        }

        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .item-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .item-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-color);
            background: var(--light-gray);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
        }

        .item-description {
            color: var(--dark-gray);
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .item-badges {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-recommended {
            background: var(--primary-color);
            color: white;
        }

        .badge-unavailable {
            background: var(--danger-color);
            color: white;
        }

        .badge-category {
            background: var(--info-color);
            color: white;
        }

        .badge-allergen {
            background: var(--warning-color);
            color: white;
        }

        .item-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.8rem;
            color: var(--dark-gray);
        }

        .item-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--dark-gray);
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 2000;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark-gray);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            background: white;
        }

        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-checkbox input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
        }

        .form-text {
            font-size: 11px;
            color: #6c757d;
            margin-top: 5px;
            display: block;
        }

        /* Image Optimizer Integration */
        .img-optimizer-container {
            position: relative;
        }

        .img-optimizer-progress {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0 0 6px 6px;
            padding: 10px 12px;
            font-size: 12px;
            color: #6c757d;
            display: none;
            z-index: 100;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .img-optimizer-progress.active {
            display: block;
            animation: slideDown 0.3s ease;
        }

        .img-optimizer-progress-bar {
            width: 100%;
            height: 6px;
            background: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
            margin: 6px 0;
        }

        .img-optimizer-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-color), var(--success-color));
            border-radius: 3px;
            transition: width 0.3s ease;
            width: 0%;
        }

        .img-optimizer-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 6px;
            font-size: 11px;
        }

        .img-optimizer-stats .success {
            color: var(--success-color);
            font-weight: 600;
        }

        .img-optimizer-stats .format {
            background: var(--primary-color);
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 500;
        }

        @keyframes slideDown {
            from { 
                opacity: 0; 
                transform: translateY(-10px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        /* Simple grid system for sizes */
        .row {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .col-1 {
            flex: 0 0 auto;
            width: 40px;
        }

        .col-5 {
            flex: 0 0 40%;
        }

        .col-6 {
            flex: 0 0 50%;
        }

        .size-item {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem;
            background: var(--light-gray);
        }

        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                gap: 1rem;
            }

            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .filters-row {
                flex-direction: column;
                align-items: stretch;
            }

            .items-grid {
                grid-template-columns: 1fr;
            }

            .item-actions {
                flex-direction: column;
            }

            .modal-content {
                margin: 1rem;
                width: calc(100% - 2rem);
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <div class="navbar-brand">
                <h1>{{ $qrMenu->name }}</h1>
                <span class="badge">Ürün Yönetimi</span>
            </div>
            <div class="navbar-actions">
                <a href="{{ route('qr-menu.dashboard', $qrMenu->url_slug) }}" class="nav-btn">
                    <i class="fas fa-arrow-left"></i>
                    Dashboard
                </a>
                <a href="{{ route('qr-menu.categories', $qrMenu->url_slug) }}" class="nav-btn">
                    <i class="fas fa-list"></i>
                    Kategoriler
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h2 class="page-title">Ürün Yönetimi</h2>
            <button class="btn btn-primary" onclick="openModal('createModal')">
                <i class="fas fa-plus"></i>
                Yeni Ürün Ekle
            </button>
        </div>

        <!-- Filters -->
        <div class="filters">
            <div class="filters-row">
                <div class="filter-item">
                    <label class="filter-label">Kategori</label>
                    <select class="filter-select" id="categoryFilter">
                        <option value="">Tüm Kategoriler</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">Durum</label>
                    <select class="filter-select" id="statusFilter">
                        <option value="">Tüm Durumlar</option>
                        <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Müsait</option>
                        <option value="unavailable" {{ request('status') == 'unavailable' ? 'selected' : '' }}>Müsait Değil</option>
                        <option value="recommended" {{ request('status') == 'recommended' ? 'selected' : '' }}>Önerilen</option>
                    </select>
                </div>
                <div class="filter-item">
                    <label class="filter-label">&nbsp;</label>
                    <button class="btn btn-info btn-sm" onclick="applyFilters()">
                        <i class="fas fa-filter"></i>
                        Filtrele
                    </button>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($items->count() > 0)
            <div class="items-grid">
                @foreach($items as $item)
                    <div class="item-card {{ $item->is_recommended ? 'recommended' : '' }} {{ !$item->is_available ? 'unavailable' : '' }}">
                        <div class="item-header">
                            <div>
                                <h3 class="item-title">{{ $item->name }}</h3>
                                @if($item->description)
                                    <p class="item-description">{!! $item->description !!}</p>
                                @endif
                            </div>
                            @if($item->has_sizes)
                                <div class="item-price">{{ $item->formatted_price_range }}</div>
                            @elseif($item->price)
                                <div class="item-price">{{ $item->formatted_price }}</div>
                            @endif
                        </div>

                        <div class="item-badges">
                            @if($item->is_recommended)
                                <span class="badge badge-recommended">
                                    <i class="fas fa-star"></i> Önerilen
                                </span>
                            @endif
                            @if(!$item->is_available)
                                <span class="badge badge-unavailable">
                                    <i class="fas fa-times"></i> Müsait Değil
                                </span>
                            @endif
                            <span class="badge badge-category">
                                <i class="fas fa-tag"></i> {{ $item->category->name }}
                            </span>
                        </div>

                        @if($item->preparation_time || $item->allergens || $item->ingredients)
                            <div class="item-meta">
                                @if($item->preparation_time)
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        {{ $item->preparation_time }}
                                    </div>
                                @endif
                                @if($item->allergens)
                                    <div class="meta-item">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        {{ count($item->allergens) }} Alerjen
                                    </div>
                                @endif
                                @if($item->ingredients)
                                    <div class="meta-item">
                                        <i class="fas fa-list"></i>
                                        {{ count($item->ingredients) }} İçerik
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="item-actions">
                            <button class="btn btn-warning btn-sm" onclick="editItem({{ $item->id }})">
                                <i class="fas fa-edit"></i>
                                Düzenle
                            </button>
                            <button class="btn btn-info btn-sm" onclick="toggleAvailability({{ $item->id }}, {{ $item->is_available ? 'false' : 'true' }})">
                                <i class="fas fa-{{ $item->is_available ? 'eye-slash' : 'eye' }}"></i>
                                {{ $item->is_available ? 'Gizle' : 'Göster' }}
                            </button>
                            <button class="btn btn-success btn-sm" onclick="toggleRecommended({{ $item->id }}, {{ $item->is_recommended ? 'false' : 'true' }})">
                                <i class="fas fa-star"></i>
                                {{ $item->is_recommended ? 'Önermeyi Durdur' : 'Öner' }}
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteItem({{ $item->id }}, '{{ $item->name }}')">
                                <i class="fas fa-trash"></i>
                                Sil
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-utensils"></i>
                <h3>Henüz ürün eklenmemiş</h3>
                <p>Menünüz için ürünler ekleyin ve müşterilerinizle paylaşın.</p>
                @if($categories->count() > 0)
                    <button class="btn btn-primary" onclick="openModal('createModal')">
                        <i class="fas fa-plus"></i>
                        İlk Ürünü Ekle
                    </button>
                @else
                    <p><strong>Önce kategori oluşturmanız gerekiyor.</strong></p>
                    <a href="{{ route('qr-menu.categories', $qrMenu->url_slug) }}" class="btn btn-primary">
                        <i class="fas fa-list"></i>
                        Kategori Oluştur
                    </a>
                @endif
            </div>
        @endif
    </div>

    <!-- Create Modal -->
    <div class="modal" id="createModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Yeni Ürün Ekle</h3>
                <button class="close-btn" onclick="closeModal('createModal')">&times;</button>
            </div>
            <form method="POST" action="{{ route('qr-menu.items.store', $qrMenu->url_slug) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="price_type" id="priceType" value="{{ old('price_type', 'single') }}">
                
                <!-- Hata Mesajları -->
                @if($errors->any() || session('error'))
                    <div class="alert alert-danger mb-3">
                        @if(session('error'))
                            <div class="mb-2"><strong>{{ session('error') }}</strong></div>
                        @endif
                        @if($errors->any())
                            <ul class="mb-0" style="padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
                
                <!-- Başarı Mesajları -->
                @if(session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select name="menu_category_id" class="form-select" required>
                        <option value="">Kategori Seçin</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('menu_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Ürün Adı</label>
                    <input type="text" name="name" class="form-input" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Açıklama</label>
                    <textarea name="description" class="form-input form-textarea" rows="3">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Fiyat Türü</label>
                    <div class="form-checkbox">
                        <input type="radio" name="price_type_radio" value="single" id="singlePrice" {{ old('price_type', 'single') == 'single' ? 'checked' : '' }} onchange="togglePriceType()">
                        <label for="singlePrice">Tek Fiyat</label>
                    </div>
                    <div class="form-checkbox">
                        <input type="radio" name="price_type_radio" value="multiple" id="multiplePrice" {{ old('price_type') == 'multiple' ? 'checked' : '' }} onchange="togglePriceType()">
                        <label for="multiplePrice">Boylar ile Farklı Fiyatlar</label>
                    </div>
                </div>
                <div class="form-group" id="singlePriceGroup">
                    <label class="form-label">Fiyat (₺)</label>
                    <input type="number" name="price" class="form-input" step="0.01" min="0" value="{{ old('price') }}">
                </div>
                <div class="form-group" id="sizesGroup" style="display: none;">
                    <label class="form-label">Boy Seçenekleri</label>
                    <div id="sizesContainer">
                        <div class="size-item mb-2">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="sizes[0][name]" class="form-input" placeholder="Boy adı (örn: Küçük, S)">
                                </div>
                                <div class="col-5">
                                    <input type="number" name="sizes[0][price]" class="form-input" step="0.01" min="0" placeholder="Fiyat">
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeSize(this)" style="display: none;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" onclick="addSize()">
                        <i class="fas fa-plus"></i> Boy Ekle
                    </button>
                    <small class="form-text">Farklı boylar için farklı fiyatlar belirleyebilirsiniz.</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Ana Görsel</label>
                    <input type="file" name="image" class="form-input" accept="image/*">
                    <small class="form-text">Önerilen boyut: 1200x800px. Maksimum 10MB.</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Galeri Görselleri (En fazla 5)</label>
                    <input type="file" name="gallery[]" class="form-input" accept="image/*" multiple>
                    <small class="form-text">Birden fazla görsel seçebilirsiniz. Her biri maksimum 10MB olmalıdır.</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Hazırlık Süresi</label>
                    <input type="text" name="preparation_time" class="form-input" placeholder="Örn: 15 dk" value="{{ old('preparation_time') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Alerjenler (virgül ile ayırın)</label>
                    <input type="text" name="allergens" class="form-input" placeholder="Örn: Gluten, Süt, Yumurta" value="{{ old('allergens') }}">
                </div>
                <div class="form-group">
                    <label class="form-label">İçerikler (virgül ile ayırın)</label>
                    <input type="text" name="ingredients" class="form-input" placeholder="Örn: Domates, Mozzarella, Fesleğen" value="{{ old('ingredients') }}">
                </div>
                <div class="form-group">
                    <div class="form-checkbox">
                        <input type="checkbox" name="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }}>
                        <label>Müsait</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-checkbox">
                        <input type="checkbox" name="is_recommended" value="1" {{ old('is_recommended') ? 'checked' : '' }}>
                        <label>Önerilen ürün</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Sıralama</label>
                    <input type="number" name="order" class="form-input" min="0" value="{{ old('order', 0) }}">
                    <small class="form-text">Ürünün kategorideki sıralaması (0 = en üstte)</small>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Ürünü Kaydet
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ürün Düzenle</h3>
                <button class="close-btn" onclick="closeModal('editModal')">&times;</button>
            </div>
            <form method="POST" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select name="menu_category_id" class="form-select" id="editCategory" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Ürün Adı</label>
                    <input type="text" name="name" class="form-input" id="editName" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Açıklama</label>
                    <textarea name="description" class="form-input form-textarea" rows="3" id="editDescription"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Fiyat Türü</label>
                    <div class="form-checkbox">
                        <input type="radio" name="price_type" value="single" id="editSinglePrice" checked onchange="toggleEditPriceType()">
                        <label for="editSinglePrice">Tek Fiyat</label>
                    </div>
                    <div class="form-checkbox">
                        <input type="radio" name="price_type" value="multiple" id="editMultiplePrice" onchange="toggleEditPriceType()">
                        <label for="editMultiplePrice">Boylar ile Farklı Fiyatlar</label>
                    </div>
                </div>
                <div class="form-group" id="editSinglePriceGroup">
                    <label class="form-label">Fiyat (₺)</label>
                    <input type="number" name="price" class="form-input" step="0.01" min="0" id="editPrice">
                </div>
                <div class="form-group" id="editSizesGroup" style="display: none;">
                    <label class="form-label">Boy Seçenekleri</label>
                    <div id="editSizesContainer">
                        <!-- Sizes will be populated here -->
                    </div>
                    <button type="button" class="btn btn-success btn-sm" onclick="addEditSize()">
                        <i class="fas fa-plus"></i> Boy Ekle
                    </button>
                    <small class="form-text">Farklı boylar için farklı fiyatlar belirleyebilirsiniz.</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Ana Görsel</label>
                    <input type="file" name="image" class="form-input" accept="image/*">
                    <small class="form-text">Yeni bir görsel yükleyebilirsiniz. Maksimum 10MB.</small>
                    <div id="currentImage" style="margin-top: 10px; display: none;">
                        <img id="currentImageDisplay" src="" alt="Mevcut görsel" style="max-width: 200px; max-height: 150px; border-radius: 8px;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Galeri Görselleri (En fazla 5)</label>
                    <input type="file" name="gallery[]" class="form-input" accept="image/*" multiple>
                    <small class="form-text">Yeni galeri görselleri yükleyebilirsiniz. Eskiler silinir.</small>
                    <div id="currentGallery" style="margin-top: 10px; display: none;">
                        <div id="currentGalleryDisplay" style="display: flex; gap: 10px; flex-wrap: wrap;"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Hazırlık Süresi</label>
                    <input type="text" name="preparation_time" class="form-input" id="editPreparationTime">
                </div>
                <div class="form-group">
                    <label class="form-label">Alerjenler (virgül ile ayırın)</label>
                    <input type="text" name="allergens" class="form-input" id="editAllergens">
                </div>
                <div class="form-group">
                    <label class="form-label">İçerikler (virgül ile ayırın)</label>
                    <input type="text" name="ingredients" class="form-input" id="editIngredients">
                </div>
                <div class="form-group">
                    <div class="form-checkbox">
                        <input type="checkbox" name="is_available" value="1" id="editAvailable">
                        <label>Müsait</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-checkbox">
                        <input type="checkbox" name="is_recommended" value="1" id="editRecommended">
                        <label>Önerilen ürün</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Değişiklikleri Kaydet
                </button>
            </form>
        </div>
    </div>

    <!-- Image Optimizer JS -->
    <script src="{{ asset('assets/js/image-optimizer.js') }}"></script>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('show');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
        }

        function applyFilters() {
            const category = document.getElementById('categoryFilter').value;
            const status = document.getElementById('statusFilter').value;
            
            let url = window.location.pathname + '?';
            if (category) url += 'category=' + category + '&';
            if (status) url += 'status=' + status + '&';
            
            window.location.href = url;
        }

        function editItem(itemId) {
            fetch(`/qr-menu/{{ $qrMenu->url_slug }}/yonetici/urunler/${itemId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editCategory').value = data.menu_category_id;
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editDescription').value = data.description || '';
                    document.getElementById('editPrice').value = data.price || '';
                    document.getElementById('editPreparationTime').value = data.preparation_time || '';
                    document.getElementById('editAllergens').value = data.allergens ? data.allergens.join(', ') : '';
                    document.getElementById('editIngredients').value = data.ingredients ? data.ingredients.join(', ') : '';
                    document.getElementById('editAvailable').checked = data.is_available;
                    document.getElementById('editRecommended').checked = data.is_recommended;
                    
                    // Size verilerini yükle
                    const editSizesContainer = document.getElementById('editSizesContainer');
                    editSizesContainer.innerHTML = '';
                    editSizeIndex = 0;
                    
                    if (data.sizes && data.sizes.length > 0) {
                        document.getElementById('editMultiplePrice').checked = true;
                        toggleEditPriceType();
                        
                        data.sizes.forEach((size, index) => {
                            const sizeElement = document.createElement('div');
                            sizeElement.className = 'size-item mb-2';
                            sizeElement.innerHTML = `
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="sizes[${index}][name]" class="form-input" value="${size.name}" placeholder="Boy adı">
                                    </div>
                                    <div class="col-5">
                                        <input type="number" name="sizes[${index}][price]" class="form-input" step="0.01" min="0" value="${size.price}" placeholder="Fiyat">
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="removeSize(this)" ${data.sizes.length === 1 ? 'style="display: none;"' : ''}>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            `;
                            editSizesContainer.appendChild(sizeElement);
                            editSizeIndex++;
                        });
                    } else {
                        document.getElementById('editSinglePrice').checked = true;
                        toggleEditPriceType();
                    }
                    
                    // Mevcut ana görsel
                    const currentImage = document.getElementById('currentImage');
                    const currentImageDisplay = document.getElementById('currentImageDisplay');
                    if (data.image_url) {
                        currentImageDisplay.src = data.image_url;
                        currentImage.style.display = 'block';
                    } else {
                        currentImage.style.display = 'none';
                    }
                    
                    // Mevcut galeri görselleri
                    const currentGallery = document.getElementById('currentGallery');
                    const currentGalleryDisplay = document.getElementById('currentGalleryDisplay');
                    if (data.gallery_urls && data.gallery_urls.length > 0) {
                        currentGalleryDisplay.innerHTML = data.gallery_urls.map(url => 
                            `<img src="${url}" alt="Galeri görseli" style="max-width: 100px; max-height: 80px; border-radius: 4px; object-fit: cover;">`
                        ).join('');
                        currentGallery.style.display = 'block';
                    } else {
                        currentGallery.style.display = 'none';
                    }
                    
                    document.getElementById('editForm').action = `/qr-menu/{{ $qrMenu->url_slug }}/yonetici/urunler/${itemId}`;
                    openModal('editModal');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ürün bilgileri alınamadı.');
                });
        }

        function toggleAvailability(itemId, isAvailable) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/qr-menu/{{ $qrMenu->url_slug }}/yonetici/urunler/${itemId}/toggle-availability`;
            form.innerHTML = `
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="is_available" value="${isAvailable}">
            `;
            document.body.appendChild(form);
            form.submit();
        }

        function toggleRecommended(itemId, isRecommended) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/qr-menu/{{ $qrMenu->url_slug }}/yonetici/urunler/${itemId}/toggle-recommended`;
            form.innerHTML = `
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="is_recommended" value="${isRecommended}">
            `;
            document.body.appendChild(form);
            form.submit();
        }

        function deleteItem(itemId, itemName) {
            if (confirm(`"${itemName}" ürünü silmek istediğinizden emin misiniz?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/qr-menu/{{ $qrMenu->url_slug }}/yonetici/urunler/${itemId}`;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }

        // Close modal when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('show');
                }
            });
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal.show').forEach(modal => {
                    modal.classList.remove('show');
                });
            }
        });

        // Size management functions
        let sizeIndex = 1;
        let editSizeIndex = 0;

        function togglePriceType() {
            const singlePrice = document.getElementById('singlePrice').checked;
            const singlePriceGroup = document.getElementById('singlePriceGroup');
            const sizesGroup = document.getElementById('sizesGroup');
            const priceTypeInput = document.getElementById('priceType');
            
            if (singlePrice) {
                singlePriceGroup.style.display = 'block';
                sizesGroup.style.display = 'none';
                priceTypeInput.value = 'single';
            } else {
                singlePriceGroup.style.display = 'none';
                sizesGroup.style.display = 'block';
                priceTypeInput.value = 'multiple';
            }
        }

        function toggleEditPriceType() {
            const singlePrice = document.getElementById('editSinglePrice').checked;
            const singlePriceGroup = document.getElementById('editSinglePriceGroup');
            const sizesGroup = document.getElementById('editSizesGroup');
            
            if (singlePrice) {
                singlePriceGroup.style.display = 'block';
                sizesGroup.style.display = 'none';
            } else {
                singlePriceGroup.style.display = 'none';
                sizesGroup.style.display = 'block';
            }
        }

        function addSize() {
            const container = document.getElementById('sizesContainer');
            const newSize = document.createElement('div');
            newSize.className = 'size-item mb-2';
            newSize.innerHTML = `
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="sizes[${sizeIndex}][name]" class="form-input" placeholder="Boy adı (örn: Orta, M)">
                    </div>
                    <div class="col-5">
                        <input type="number" name="sizes[${sizeIndex}][price]" class="form-input" step="0.01" min="0" placeholder="Fiyat">
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeSize(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(newSize);
            sizeIndex++;
            updateSizeButtons();
        }

        function addEditSize() {
            const container = document.getElementById('editSizesContainer');
            const newSize = document.createElement('div');
            newSize.className = 'size-item mb-2';
            newSize.innerHTML = `
                <div class="row">
                    <div class="col-6">
                        <input type="text" name="sizes[${editSizeIndex}][name]" class="form-input" placeholder="Boy adı (örn: Orta, M)">
                    </div>
                    <div class="col-5">
                        <input type="number" name="sizes[${editSizeIndex}][price]" class="form-input" step="0.01" min="0" placeholder="Fiyat">
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeSize(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(newSize);
            editSizeIndex++;
            updateEditSizeButtons();
        }

        function removeSize(button) {
            button.closest('.size-item').remove();
            updateSizeButtons();
            updateEditSizeButtons();
        }

        function updateSizeButtons() {
            const sizeItems = document.querySelectorAll('#sizesContainer .size-item');
            sizeItems.forEach((item, index) => {
                const deleteBtn = item.querySelector('.btn-danger');
                if (sizeItems.length > 1) {
                    deleteBtn.style.display = 'block';
                } else {
                    deleteBtn.style.display = 'none';
                }
            });
        }

        function updateEditSizeButtons() {
            const sizeItems = document.querySelectorAll('#editSizesContainer .size-item');
            sizeItems.forEach((item, index) => {
                const deleteBtn = item.querySelector('.btn-danger');
                if (sizeItems.length > 1) {
                    deleteBtn.style.display = 'block';
                } else {
                    deleteBtn.style.display = 'none';
                }
            });
        }

        // Image Optimizer başlatma
        document.addEventListener('DOMContentLoaded', function() {
            // Custom konfigürasyon ile image optimizer oluştur
            const qrMenuImageOptimizer = new ImageOptimizer({
                maxWidth: 1600,
                maxHeight: 1200,
                webpQuality: 0.85,
                jpegQuality: 0.88,
                maxSizeKB: 800,
                preferWebP: true,
                showProgress: true,
                showStats: true
            });

            // Tüm image input'lara attach et
            qrMenuImageOptimizer.attachToImageInputs('input[type="file"][accept*="image"]');
            
            console.log('QR Menü Image Optimizer başlatıldı!');
        });

        // Initialize price type state on page load
        document.addEventListener('DOMContentLoaded', function() {
            togglePriceType();
        });
    </script>
</body>
</html> 