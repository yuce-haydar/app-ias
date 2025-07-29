<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $qrMenu->name }} - Kullanıcı Yönetimi</title>
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

        .users-table {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background: var(--light-gray);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--secondary-color);
            border-bottom: 1px solid var(--border-color);
        }

        .table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .table tr:hover {
            background: var(--light-gray);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-details h4 {
            margin: 0;
            color: var(--secondary-color);
            font-weight: 600;
        }

        .user-details p {
            margin: 0;
            color: var(--dark-gray);
            font-size: 0.9rem;
        }

        .role-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .role-owner {
            background: var(--primary-color);
            color: white;
        }

        .role-manager {
            background: var(--info-color);
            color: white;
        }

        .role-staff {
            background: var(--success-color);
            color: white;
        }

        .status-active {
            color: var(--success-color);
        }

        .status-inactive {
            color: var(--danger-color);
        }

        .actions-buttons {
            display: flex;
            gap: 0.5rem;
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

        .is-invalid {
            border-color: var(--danger-color) !important;
        }

        .invalid-feedback {
            display: block;
            color: var(--danger-color);
            font-size: 0.875rem;
            margin-top: 0.25rem;
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

            .table {
                font-size: 0.9rem;
            }

            .actions-buttons {
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
                <span class="badge">Kullanıcı Yönetimi</span>
            </div>
            <div class="navbar-actions">
                <a href="{{ route('qr-menu.dashboard', $qrMenu->url_slug) }}" class="nav-btn">
                    <i class="fas fa-arrow-left"></i>
                    Dashboard
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h2 class="page-title">Kullanıcı Yönetimi</h2>
            <button class="btn btn-primary" onclick="openModal('createModal')">
                <i class="fas fa-plus"></i>
                Yeni Kullanıcı Ekle
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

        @if($users->count() > 0)
            <div class="users-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kullanıcı</th>
                            <th>Telefon</th>
                            <th>Rol</th>
                            <th>Durum</th>
                            <th>Kayıt Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div class="user-details">
                                            <h4>{{ $user->name }}</h4>
                                            <p>{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $user->phone ?: '-' }}
                                </td>
                                <td>
                                    <span class="role-badge role-{{ $user->role }}">
                                        @if($user->role == 'owner')
                                            <i class="fas fa-crown"></i> Sahip
                                        @elseif($user->role == 'manager')
                                            <i class="fas fa-user-tie"></i> Yönetici
                                        @else
                                            <i class="fas fa-user"></i> Personel
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <span class="status-active">
                                        <i class="fas fa-circle"></i> Aktif
                                    </span>
                                </td>
                                <td>
                                    {{ $user->created_at->format('d.m.Y') }}
                                </td>
                                <td>
                                    <div class="actions-buttons">
                                        @if($user->role != 'owner')
                                            <button class="btn btn-warning btn-sm" onclick="editUser({{ $user->id }})">
                                                <i class="fas fa-edit"></i>
                                                Düzenle
                                            </button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')">
                                                <i class="fas fa-trash"></i>
                                                Sil
                                            </button>
                                        @else
                                            <span class="badge role-owner">Sahip</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-users"></i>
                <h3>Henüz kullanıcı eklenmemiş</h3>
                <p>Ekip üyelerinizi ekleyin ve menü yönetimini paylaşın.</p>
                <button class="btn btn-primary" onclick="openModal('createModal')">
                    <i class="fas fa-plus"></i>
                    İlk Kullanıcıyı Ekle
                </button>
            </div>
        @endif
    </div>

    <!-- Create Modal -->
    <div class="modal" id="createModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Yeni Kullanıcı Ekle</h3>
                <button class="close-btn" onclick="closeModal('createModal')">&times;</button>
            </div>
            <form method="POST" action="{{ route('qr-menu.users.store', $qrMenu->url_slug) }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Ad Soyad</label>
                    <input type="text" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">E-posta</label>
                    <input type="email" name="email" class="form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Telefon</label>
                    <input type="text" name="phone" class="form-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Rol</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Yönetici</option>
                        <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Personel</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Şifre</label>
                    <input type="password" name="password" class="form-input @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Şifre Tekrar</label>
                    <input type="password" name="password_confirmation" class="form-input" required>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Kullanıcıyı Kaydet
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Kullanıcı Düzenle</h3>
                <button class="close-btn" onclick="closeModal('editModal')">&times;</button>
            </div>
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Ad Soyad</label>
                    <input type="text" name="name" class="form-input" id="editName" required>
                </div>
                <div class="form-group">
                    <label class="form-label">E-posta</label>
                    <input type="email" name="email" class="form-input" id="editEmail" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Telefon</label>
                    <input type="text" name="phone" class="form-input" id="editPhone">
                </div>
                <div class="form-group">
                    <label class="form-label">Rol</label>
                    <select name="role" class="form-select" id="editRole" required>
                        <option value="manager">Yönetici</option>
                        <option value="staff">Personel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Yeni Şifre (boş bırakılırsa değişmez)</label>
                    <input type="password" name="password" class="form-input">
                </div>
                <div class="form-group">
                    <label class="form-label">Şifre Tekrar</label>
                    <input type="password" name="password_confirmation" class="form-input">
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

        function editUser(userId) {
            fetch(`/qr-menu/{{ $qrMenu->url_slug }}/yonetici/kullanicilar/${userId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editEmail').value = data.email;
                    document.getElementById('editPhone').value = data.phone || '';
                    document.getElementById('editRole').value = data.role;
                    document.getElementById('editForm').action = `/qr-menu/{{ $qrMenu->url_slug }}/yonetici/kullanicilar/${userId}`;
                    openModal('editModal');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Kullanıcı bilgileri alınamadı.');
                });
        }

        function deleteUser(userId, userName) {
            if (confirm(`"${userName}" kullanıcısını silmek istediğinizden emin misiniz?\n\nBu işlem geri alınamaz.`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/qr-menu/{{ $qrMenu->url_slug }}/yonetici/kullanicilar/${userId}`;
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