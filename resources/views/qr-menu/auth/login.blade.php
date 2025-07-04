<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $qrMenu->name }} - Yönetici Girişi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #cf9f38;
            --secondary-color: #2c3e50;
            --danger-color: #e74c3c;
            --success-color: #27ae60;
            --light-gray: #f8f9fa;
            --border-color: #e9ecef;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .logo-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 2rem;
        }

        .logo-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .logo-subtitle {
            color: #666;
            font-size: 0.9rem;
        }

        .form-title {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            padding-left: 3rem;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--light-gray);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 3px rgba(207, 159, 56, 0.1);
        }

        .form-icon {
            position: absolute;
            left: 1rem;
            top: 2.2rem;
            color: #666;
            font-size: 1.1rem;
        }

        .form-input.is-invalid {
            border-color: var(--danger-color);
        }

        .invalid-feedback {
            color: var(--danger-color);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .remember-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .remember-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .remember-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
        }

        .remember-checkbox label {
            font-size: 0.9rem;
            color: var(--secondary-color);
            cursor: pointer;
        }

        .login-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .btn-loading {
            display: none;
            margin-right: 0.5rem;
        }

        .login-btn.loading .btn-loading {
            display: inline-block;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .alert-danger {
            background: #ffeaea;
            color: var(--danger-color);
            border: 1px solid #ffcdd2;
        }

        .alert-success {
            background: #eaffea;
            color: var(--success-color);
            border: 1px solid #c8e6c9;
        }

        .back-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
        }

        .back-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .back-link a:hover {
            color: var(--secondary-color);
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }

            .logo-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-section">
            <div class="logo-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <h1 class="logo-title">{{ $qrMenu->name }}</h1>
            <p class="logo-subtitle">Dijital Menü Yönetim Sistemi</p>
        </div>

        <h2 class="form-title">Yönetici Girişi</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('qr-menu.login.submit', $qrMenu->url_slug) }}" id="loginForm">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">E-posta Adresi</label>
                <div class="form-input-group">
                    <i class="fas fa-envelope form-icon"></i>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}"
                           placeholder="ornek@email.com"
                           required 
                           autocomplete="email">
                </div>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Şifre</label>
                <div class="form-input-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="••••••••"
                           required 
                           autocomplete="current-password">
                </div>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="remember-section">
                <div class="remember-checkbox">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Beni hatırla</label>
                </div>
            </div>

            <button type="submit" class="login-btn" id="loginButton">
                <i class="fas fa-spinner btn-loading"></i>
                <i class="fas fa-sign-in-alt"></i>
                Giriş Yap
            </button>
        </form>

        <div class="back-link">
            <a href="{{ route('qr-menu.show', $qrMenu->url_slug) }}">
                <i class="fas fa-arrow-left"></i>
                Menüye Geri Dön
            </a>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            const button = document.getElementById('loginButton');
            button.classList.add('loading');
            button.disabled = true;
            
            // Geri dönüş için timeout
            setTimeout(() => {
                button.classList.remove('loading');
                button.disabled = false;
            }, 10000);
        });

        // Enter key ile form submit
        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('loginForm').submit();
            }
        });

        // Auto-focus on first input
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.getElementById('email');
            if (emailInput && !emailInput.value) {
                emailInput.focus();
            }
        });
    </script>
</body>
</html> 