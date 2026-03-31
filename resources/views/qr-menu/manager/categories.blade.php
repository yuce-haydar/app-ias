<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $qrMenu->name }} - Kategori Yönetimi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #cf9f38;
            --secondary-color: #2c3e50;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
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

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .category-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .category-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .category-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .category-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .category-description {
            color: var(--dark-gray);
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .category-stats {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .stat-item {
            background: var(--light-gray);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            color: var(--dark-gray);
        }

        .category-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
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
            max-width: 500px;
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

            .categories-grid {
                grid-template-columns: 1fr;
            }

            .category-actions {
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
                <span class="badge">Kategori Yönetimi</span>
            </div>
            <div class="navbar-actions">
                <a href="{{ route('qr-menu.dashboard', $qrMenu->url_slug) }}" class="nav-btn">
                    <i class="fas fa-arrow-left"></i>
                    Dashboard
                </a>
                <a href="{{ route('qr-menu.show', $qrMenu->url_slug) }}" class="nav-btn" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    Menüyü Görüntüle
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h2 class="page-title">Kategori Yönetimi</h2>
            <button class="btn btn-primary" onclick="openModal('createModal')">
                <i class="fas fa-plus"></i>
                Yeni Kategori Ekle
            </button>
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

        @if($categories->count() > 0)
            <div class="categories-grid">
                @foreach($categoryRoots as $category)
                    @include('qr-menu.manager.partials.category-manager-node', [
                        'category' => $category,
                        'qrMenu' => $qrMenu,
                        'depth' => 0,
                    ])
                @endforeach

                @if(isset($orphanCategories) && $orphanCategories->isNotEmpty())
                    <div class="alert alert-warning" style="grid-column: 1 / -1;">
                        <strong>Üst kategorisi bulunamayan kayıtlar:</strong> Veritabanında parent_id tanımlı ama üst satır yok. Düzenleyerek bağlayın veya silin.
                    </div>
                    @foreach($orphanCategories as $category)
                        @include('qr-menu.manager.partials.category-manager-node', [
                            'category' => $category,
                            'qrMenu' => $qrMenu,
                            'depth' => 0,
                            'orphan' => true,
                        ])
                    @endforeach
                @endif
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-list"></i>
                <h3>Henüz kategori eklenmemiş</h3>
                <p>Menünüz için kategoriler oluşturun ve ürünlerinizi organize edin.</p>
                <button class="btn btn-primary" onclick="openModal('createModal')">
                    <i class="fas fa-plus"></i>
                    İlk Kategoriyi Ekle
                </button>
            </div>
        @endif
    </div>

    <!-- Create Modal -->
    <div class="modal" id="createModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Yeni Kategori Ekle</h3>
                <button class="close-btn" onclick="closeModal('createModal')">&times;</button>
            </div>
            <form method="POST" action="{{ route('qr-menu.categories.store', $qrMenu->url_slug) }}">
                @csrf
                
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
                    <label class="form-label">Ana Kategori</label>
                    <select name="parent_id" class="form-select">
                        <option value="">📂 Ana Kategori (Alt kategori değil)</option>
                        @foreach($categories->whereNull('parent_id') as $parentCategory)
                            <option value="{{ $parentCategory->id }}" {{ old('parent_id') == $parentCategory->id ? 'selected' : '' }}>{{ $parentCategory->name }} (Alt kategori olarak)</option>
                        @endforeach
                    </select>
                    <small style="color: #666; font-size: 0.85rem;">Alt kategori oluşturmak için bir ana kategori seçin</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori Adı</label>
                    <input type="text" name="name" class="form-input" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Açıklama</label>
                    <textarea name="description" class="form-input form-textarea" rows="3">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">İkon</label>
                    <select name="icon" class="form-select">
                        <option value="fas fa-utensils" {{ old('icon') == 'fas fa-utensils' ? 'selected' : '' }}>🍽️ Yemek</option>
                        <option value="fas fa-coffee" {{ old('icon') == 'fas fa-coffee' ? 'selected' : '' }}>☕ Kahve</option>
                        <option value="fas fa-glass-cheers" {{ old('icon') == 'fas fa-glass-cheers' ? 'selected' : '' }}>🍷 İçecek</option>
                        <option value="fas fa-birthday-cake" {{ old('icon') == 'fas fa-birthday-cake' ? 'selected' : '' }}>🎂 Tatlı</option>
                        <option value="fas fa-hamburger" {{ old('icon') == 'fas fa-hamburger' ? 'selected' : '' }}>🍔 Fast Food</option>
                        <option value="fas fa-pizza-slice" {{ old('icon') == 'fas fa-pizza-slice' ? 'selected' : '' }}>🍕 Pizza</option>
                        <option value="fas fa-ice-cream" {{ old('icon') == 'fas fa-ice-cream' ? 'selected' : '' }}>🍨 Dondurma</option>
                        <option value="fas fa-cookie-bite" {{ old('icon') == 'fas fa-cookie-bite' ? 'selected' : '' }}>🍪 Atıştırmalık</option>
                        <option value="fas fa-seedling" {{ old('icon') == 'fas fa-seedling' ? 'selected' : '' }}>🌱 Vegan</option>
                        <option value="fas fa-fish" {{ old('icon') == 'fas fa-fish' ? 'selected' : '' }}>🐟 Deniz Ürünleri</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Sıra</label>
                    <input type="number" name="order" class="form-input" value="{{ old('order', $categories->count() + 1) }}" min="1">
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Kategoriyi Kaydet
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Kategori Düzenle</h3>
                <button class="close-btn" onclick="closeModal('editModal')">&times;</button>
            </div>
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Ana Kategori</label>
                    <select name="parent_id" class="form-select" id="editParentId">
                        <option value="">📂 Ana Kategori (Alt kategori değil)</option>
                        @foreach($categories->whereNull('parent_id') as $parentCategory)
                            <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }} (Alt kategori olarak)</option>
                        @endforeach
                    </select>
                    <small style="color: #666; font-size: 0.85rem;">Alt kategori oluşturmak için bir ana kategori seçin</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori Adı</label>
                    <input type="text" name="name" class="form-input" id="editName" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Açıklama</label>
                    <textarea name="description" class="form-input form-textarea" rows="3" id="editDescription"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">İkon</label>
                    <select name="icon" class="form-select" id="editIcon">
                        <option value="fas fa-utensils">🍽️ Yemek</option>
                        <option value="fas fa-coffee">☕ Kahve</option>
                        <option value="fas fa-glass-cheers">🍷 İçecek</option>
                        <option value="fas fa-birthday-cake">🎂 Tatlı</option>
                        <option value="fas fa-hamburger">🍔 Fast Food</option>
                        <option value="fas fa-pizza-slice">🍕 Pizza</option>
                        <option value="fas fa-ice-cream">🍨 Dondurma</option>
                        <option value="fas fa-cookie-bite">🍪 Atıştırmalık</option>
                        <option value="fas fa-seedling">🌱 Vegan</option>
                        <option value="fas fa-fish">🐟 Deniz Ürünleri</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Sıra</label>
                    <input type="number" name="order" class="form-input" id="editOrder" min="1">
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Değişiklikleri Kaydet
                </button>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('show');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
        }

        function editCategory(categoryId) {
            // Fetch category data and populate edit form
            fetch(`/qr-menu/{{ $qrMenu->url_slug }}/yonetici/kategoriler/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editParentId').value = data.parent_id || '';
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editDescription').value = data.description || '';
                    document.getElementById('editIcon').value = data.icon || 'fas fa-utensils';
                    document.getElementById('editOrder').value = data.order;
                    document.getElementById('editForm').action = `/qr-menu/{{ $qrMenu->url_slug }}/yonetici/kategoriler/${categoryId}`;
                    openModal('editModal');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Kategori bilgileri alınamadı.');
                });
        }

        function deleteCategory(categoryId, categoryName) {
            if (confirm(`"${categoryName}" kategorisini silmek istediğinizden emin misiniz?\n\nAlt kategoriler, bu kategorideki tüm ürünler ve ürün görselleri de kalıcı olarak silinir.`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/qr-menu/{{ $qrMenu->url_slug }}/yonetici/kategoriler/${categoryId}`;
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
    </script>
</body>
</html> 