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
                                    <p class="item-description">{{ $item->description }}</p>
                                @endif
                            </div>
                            @if($item->price)
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
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select name="menu_category_id" class="form-select" required>
                        <option value="">Kategori Seçin</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Ürün Adı</label>
                    <input type="text" name="name" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Açıklama</label>
                    <textarea name="description" class="form-input form-textarea" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Fiyat (₺)</label>
                    <input type="number" name="price" class="form-input" step="0.01" min="0">
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
                    <input type="text" name="preparation_time" class="form-input" placeholder="Örn: 15 dk">
                </div>
                <div class="form-group">
                    <label class="form-label">Alerjenler (virgül ile ayırın)</label>
                    <input type="text" name="allergens" class="form-input" placeholder="Örn: Gluten, Süt, Yumurta">
                </div>
                <div class="form-group">
                    <label class="form-label">İçerikler (virgül ile ayırın)</label>
                    <input type="text" name="ingredients" class="form-input" placeholder="Örn: Domates, Mozzarella, Fesleğen">
                </div>
                <div class="form-group">
                    <div class="form-checkbox">
                        <input type="checkbox" name="is_available" value="1" checked>
                        <label>Müsait</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-checkbox">
                        <input type="checkbox" name="is_recommended" value="1">
                        <label>Önerilen ürün</label>
                    </div>
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
                    <label class="form-label">Fiyat (₺)</label>
                    <input type="number" name="price" class="form-input" step="0.01" min="0" id="editPrice">
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
    </script>
</body>
</html> 