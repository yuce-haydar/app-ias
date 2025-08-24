<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $qrMenu->name }} - Ayarlar</title>
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

        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }

        .settings-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .settings-card-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .settings-card-icon {
            font-size: 1.5rem;
        }

        .settings-card-title {
            font-size: 1.3rem;
            font-weight: 600;
        }

        .settings-card-body {
            padding: 2rem;
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

        .color-input {
            width: 60px;
            height: 40px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
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

        .qr-preview {
            text-align: center;
            padding: 1rem;
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .qr-code {
            max-width: 200px;
            height: auto;
            margin: 0 auto;
        }

        .qr-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .url-preview {
            background: var(--light-gray);
            padding: 1rem;
            border-radius: 8px;
            font-family: monospace;
            word-break: break-all;
            margin-bottom: 1rem;
        }

        .color-preview {
            width: 100%;
            height: 60px;
            border-radius: 8px;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .form-help {
            display: block;
            margin-top: 0.5rem;
            color: var(--dark-gray);
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .current-image {
            margin-top: 10px;
            display: flex;
            align-items: center;
            padding: 10px;
            background: var(--light-gray);
            border-radius: 8px;
        }

        .current-image img {
            border: 2px solid var(--border-color);
        }

        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                gap: 1rem;
            }

            .settings-grid {
                grid-template-columns: 1fr;
            }

            .qr-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <div class="navbar-brand">
                <h1>{{ $qrMenu->name }}</h1>
                <span class="badge">Ayarlar</span>
            </div>
            <div class="navbar-actions">
                <a href="{{ route('qr-menu.dashboard', $qrMenu->url_slug) }}" class="nav-btn">
                    <i class="fas fa-arrow-left"></i>
                    Dashboard
                </a>
                <a href="{{ $qrMenu->qr_url }}" class="nav-btn" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    Menüyü Görüntüle
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h2 class="page-title">Menü Ayarları</h2>
            <p class="page-subtitle">Menünüzün genel ayarlarını buradan yönetebilirsiniz</p>
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

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <strong>Hatalar:</strong>
                <ul style="margin: 0.5rem 0 0 1rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="settings-grid">
            <!-- Genel Ayarlar -->
            <div class="settings-card">
                <div class="settings-card-header">
                    <i class="fas fa-cog settings-card-icon"></i>
                    <h3 class="settings-card-title">Genel Ayarlar</h3>
                </div>
                <div class="settings-card-body">
                    <form method="POST" action="{{ route('qr-menu.settings.update', $qrMenu->url_slug) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Menü Adı</label>
                            <input type="text" name="name" class="form-input" value="{{ $qrMenu->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Açıklama</label>
                            <textarea name="description" class="form-input form-textarea" rows="3">{{ $qrMenu->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">URL Slug</label>
                            <input type="text" name="url_slug" class="form-input" value="{{ $qrMenu->url_slug }}" required>
                            <div class="url-preview">
                                {{ url('/qr-menu') }}/{{ $qrMenu->url_slug }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Ayarları Kaydet
                        </button>
                    </form>
                </div>
            </div>

            <!-- Tema Ayarları -->
            <div class="settings-card">
                <div class="settings-card-header">
                    <i class="fas fa-palette settings-card-icon"></i>
                    <h3 class="settings-card-title">Tema Ayarları</h3>
                </div>
                <div class="settings-card-body">
                    <form method="POST" action="{{ route('qr-menu.settings.update', $qrMenu->url_slug) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Ana Renk</label>
                            <input type="color" name="primary_color" class="color-input" value="{{ $qrMenu->theme_colors['primary'] ?? '#cf9f38' }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">İkinci Renk</label>
                            <input type="color" name="secondary_color" class="color-input" value="{{ $qrMenu->theme_colors['secondary'] ?? '#2c3e50' }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Arka Plan Rengi</label>
                            <input type="color" name="background_color" class="color-input" value="{{ $qrMenu->theme_colors['background'] ?? '#ffffff' }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Metin Rengi</label>
                            <input type="color" name="text_color" class="color-input" value="{{ $qrMenu->theme_colors['text'] ?? '#333333' }}">
                        </div>
                        <div class="color-preview" style="background: linear-gradient(135deg, {{ $qrMenu->theme_colors['primary'] ?? '#cf9f38' }}, {{ $qrMenu->theme_colors['secondary'] ?? '#2c3e50' }});">
                            Tema Önizleme
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Tema Kaydet
                        </button>
                    </form>
                </div>
            </div>

            <!-- Logo ve Header Ayarları -->
            <div class="settings-card">
                <div class="settings-card-header">
                    <i class="fas fa-image settings-card-icon"></i>
                    <h3 class="settings-card-title">Logo ve Header Ayarları</h3>
                </div>
                <div class="settings-card-body">
                    <form method="POST" action="{{ route('qr-menu.settings.update', $qrMenu->url_slug) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Logo Upload -->
                        <div class="form-group">
                            <label class="form-label">Menü Logosu</label>
                            <input type="file" name="logo" class="form-input" accept="image/*">
                            @if($qrMenu->logo)
                                <div class="current-image">
                                    <img src="{{ $qrMenu->logo_url }}" alt="Mevcut Logo" style="max-height: 100px; border-radius: 8px; margin-top: 10px;">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteImage('logo')" style="margin-left: 10px;">
                                        <i class="fas fa-trash"></i> Logoyu Sil
                                    </button>
                                </div>
                            @else
                                <div style="margin-top: 10px; padding: 10px; background: #f8f9fa; border-radius: 8px;">
                                    <strong>Mevcut:</strong> Varsayılan logo (hh.png)
                                    <img src="{{ asset('assets/images/hh.png') }}" alt="Varsayılan Logo" style="height: 50px; margin-left: 10px;">
                                </div>
                            @endif
                            <small class="form-help">Logo tesis isminin yanında görünecek. Önerilen boyut: 200x80px</small>
                        </div>

                        <!-- Header Background -->
                        <div class="form-group">
                            <label class="form-label">Header Arka Plan Resmi</label>
                            <input type="file" name="header_background" class="form-input" accept="image/*">
                            @if($qrMenu->header_background)
                                <div class="current-image">
                                    <img src="{{ $qrMenu->header_background_url }}" alt="Mevcut Header Background" style="max-height: 100px; width: 300px; object-fit: cover; border-radius: 8px; margin-top: 10px;">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteImage('header_background')" style="margin-left: 10px;">
                                        <i class="fas fa-trash"></i> Arka Planı Sil
                                    </button>
                                </div>
                            @else
                                <div style="margin-top: 10px; padding: 10px; background: linear-gradient(135deg, #cf9f38, #2c3e50); color: white; border-radius: 8px; text-align: center;">
                                    <strong>Mevcut:</strong> Varsayılan gradient arka plan
                                </div>
                            @endif
                            <small class="form-help">Header'ın arka planında görünecek. Eğer yüklenmezse renkli gradient kullanılır. Önerilen boyut: 1200x300px</small>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Logo ve Header Ayarlarını Kaydet
                        </button>
                    </form>
                </div>
            </div>

            <!-- QR Kod Görüntüleme -->
            <div class="settings-card">
                <div class="settings-card-header">
                    <i class="fas fa-qrcode settings-card-icon"></i>
                    <h3 class="settings-card-title">QR Kod</h3>
                </div>
                <div class="settings-card-body">
                    <div class="qr-preview">
                        @if($qrMenu->qr_code_path && file_exists(public_path($qrMenu->qr_code_path)))
                            <img src="{{ asset($qrMenu->qr_code_path) }}" alt="QR Kod" class="qr-code">
                        @else
                            <i class="fas fa-qrcode" style="font-size: 3rem; color: var(--primary-color);"></i>
                            <p>QR Kod bulunamadı</p>
                        @endif
                    </div>
                    <div class="qr-actions">
                        @if($qrMenu->qr_code_path)
                            <a href="{{ route('qr-menu.download-qr', $qrMenu->url_slug) }}" class="btn btn-info">
                                <i class="fas fa-download"></i>
                                QR Kod İndir
                            </a>
                        @endif
                    </div>
                    <p style="color: var(--dark-gray); margin-top: 1rem; text-align: center; font-size: 0.9rem;">
                        QR kod müşterileriniz tarafından menüyü görüntülemek için kullanılır.
                    </p>
                </div>
            </div>

            <!-- Menü Durumu -->
            <div class="settings-card">
                <div class="settings-card-header">
                    <i class="fas fa-toggle-on settings-card-icon"></i>
                    <h3 class="settings-card-title">Menü Durumu</h3>
                </div>
                <div class="settings-card-body">
                    <form method="POST" action="{{ route('qr-menu.settings.update', $qrMenu->url_slug) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Menü Durumu</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ $qrMenu->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ $qrMenu->status == 'inactive' ? 'selected' : '' }}>Pasif</option>
                                <option value="maintenance" {{ $qrMenu->status == 'maintenance' ? 'selected' : '' }}>Bakım Modu</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            Durumu Kaydet
                        </button>
                    </form>
                    <div class="form-group">
                        <label class="form-label">Menü URL'si</label>
                        <div class="url-preview">
                            <a href="{{ route('qr-menu.show', $qrMenu->url_slug) }}" target="_blank">
                                {{ route('qr-menu.show', $qrMenu->url_slug) }}
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Yönetim Paneli</label>
                        <div class="url-preview">
                            <a href="{{ route('qr-menu.dashboard', $qrMenu->url_slug) }}">
                                {{ route('qr-menu.dashboard', $qrMenu->url_slug) }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        // Color preview update
        document.querySelectorAll('input[type="color"]').forEach(input => {
            input.addEventListener('change', function() {
                updateColorPreview();
            });
        });

        function updateColorPreview() {
            const primary = document.querySelector('input[name="primary_color"]').value;
            const secondary = document.querySelector('input[name="secondary_color"]').value;
            const preview = document.querySelector('.color-preview');
            preview.style.background = `linear-gradient(135deg, ${primary}, ${secondary})`;
        }

        // Delete image function
        function deleteImage(field) {
            if (confirm('Bu resmi silmek istediğinizden emin misiniz?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route("qr-menu.settings.update", $qrMenu->url_slug) }}';
                form.innerHTML = `
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="delete_${field}" value="1">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html> 