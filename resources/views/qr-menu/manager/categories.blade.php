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
                {{-- Ana kategoriler --}}
                @foreach($categories->whereNull('parent_id')->sortBy('order') as $category)
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="{{ $category->icon ?: 'fas fa-utensils' }}"></i>
                        </div>
                        <h3 class="category-title">
                            📂 {{ $category->name }}
                            @if($category->children->count() > 0)
                                <small style="color: #cf9f38; font-size: 0.8rem;">({{ $category->children->count() }} alt kategori)</small>
                            @endif
                        </h3>
                        @if($category->description)
                            <p class="category-description">{!! $category->description !!}</p>
                        @endif
                        <div class="category-stats">
                            <div class="stat-item">
                                <i class="fas fa-utensils"></i>
                                {{ $category->menuItems->count() }} Ürün
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-sort-numeric-up"></i>
                                Sıra: {{ $category->order }}
                            </div>
                        </div>
                        <div class="category-actions">
                            <button class="btn btn-warning btn-sm" onclick="editCategory({{ $category->id }})">
                                <i class="fas fa-edit"></i>
                                Düzenle
                            </button>
                            <a href="{{ route('qr-menu.items', $qrMenu->url_slug) }}?category={{ $category->id }}" class="btn btn-success btn-sm">
                                <i class="fas fa-eye"></i>
                                Ürünleri Gör
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="deleteCategory({{ $category->id }}, '{{ $category->name }}')">
                                <i class="fas fa-trash"></i>
                                Sil
                            </button>
                        </div>
                    </div>

                    {{-- Bu ana kategorinin alt kategorileri --}}
                    @foreach($category->children->sortBy('order') as $subCategory)
                        <div class="category-card" style="margin-left: 20px; border-left: 4px solid var(--primary-color); opacity: 0.9; transform: scale(0.95);">
                            <div class="category-icon" style="background: var(--secondary-color);">
                                <i class="{{ $subCategory->icon ?: 'fas fa-folder' }}"></i>
                            </div>
                            <h3 class="category-title" style="font-size: 1.1rem;">
                                📁 {{ $subCategory->name }}
                                <small style="color: #666; font-size: 0.7rem; display: block;">{{ $category->name }} altında</small>
                            </h3>
                            @if($subCategory->description)
                                <p class="category-description">{!! $subCategory->description !!}</p>
                            @endif
                            <div class="category-stats">
                                <div class="stat-item">
                                    <i class="fas fa-utensils"></i>
                                    {{ $subCategory->menuItems->count() }} Ürün
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-sort-numeric-up"></i>
                                    Sıra: {{ $subCategory->order }}
                                </div>
                            </div>
                            <div class="category-actions">
                                <button class="btn btn-warning btn-sm" onclick="editCategory({{ $subCategory->id }})">
                                    <i class="fas fa-edit"></i>
                                    Düzenle
                                </button>
                                <a href="{{ route('qr-menu.items', $qrMenu->url_slug) }}?category={{ $subCategory->id }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-eye"></i>
                                    Ürünleri Gör
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="deleteCategory({{ $subCategory->id }}, '{{ $subCategory->name }}')">
                                    <i class="fas fa-trash"></i>
                                    Sil
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endforeach
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
                <div class="form-group">
                    <label class="form-label">Ana Kategori</label>
                    <select name="parent_id" class="form-select">
                        <option value="">📂 Ana Kategori (Alt kategori değil)</option>
                        @foreach($categories->whereNull('parent_id') as $parentCategory)
                            <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }} (Alt kategori olarak)</option>
                        @endforeach
                    </select>
                    <small style="color: #666; font-size: 0.85rem;">Alt kategori oluşturmak için bir ana kategori seçin</small>
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori Adı</label>
                    <input type="text" name="name" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Açıklama</label>
                    <textarea name="description" class="form-input form-textarea" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">İkon</label>
                    <select name="icon" class="form-select">
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
                    <input type="number" name="order" class="form-input" value="{{ $categories->count() + 1 }}" min="1">
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
            if (confirm(`"${categoryName}" kategorisini silmek istediğinizden emin misiniz?\n\nBu kategoriye ait tüm ürünler de silinecektir.`)) {
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