# Laravel Hosting Deploy Rehberi

> **Güvenli ve Profesyonel Laravel Kurulumu**  
> Public klasörü ana dizine almadan, güvenlik odaklı kurulum

## 📁 Hedef Yapı

```
/home/kullanici/
├── laravel-project/          # Ana Laravel klasörü (GÜVENLİ - web'den erişilemez)
│   ├── app/
│   ├── config/
│   ├── database/
│   ├── storage/
│   ├── vendor/
│   ├── .env                  # Kritik dosyalar güvenli
│   └── public/              # Bu klasörün içeriği aşağıya kopyalanır
└── public_html/             # Sadece public klasörünün içeriği (web'den erişilebilir)
    ├── index.php           # Path'leri düzeltilmiş
    ├── assets/
    ├── storage -> ../laravel-project/storage/app/public/
    └── .htaccess
```

## 🚀 Kurulum Adımları

### 1. Public_html'i Temizle

```bash
# Public_html klasörüne git
cd ~/public_html/

# Mevcut içeriği kontrol et
ls -la

# Hepsini sil (.htaccess dahil)
rm -rf *
rm -rf .*

# Kontrol et (sadece . ve .. kalmalı)
ls -la
```

### 2. GitHub'tan Projeyi Çek

```bash
# Ana dizine git (public_html'in DIŞINDA)
cd ~

# Projeyi çek
git clone https://github.com/kullanici/repo-adi.git laravel-project

# Proje klasörüne git
cd laravel-project
```

### 3. Composer Install

```bash
# Production bağımlılıklarını kur
composer install --no-dev --optimize-autoloader

# Eğer composer yoksa:
# curl -sS https://getcomposer.org/installer | php
# mv composer.phar /usr/local/bin/composer
```

### 4. Public Klasörünü Kopyala

```bash
# Public klasörünün içeriğini public_html'e kopyala
cp -r public/* ~/public_html/

# Kontrol et
ls -la ~/public_html/
```

### 5. Index.php Path Düzeltmesi

```bash
# Index.php'yi düzenle
nano ~/public_html/index.php
```

**Değiştirilecek satırlar:**
```php
// Eski:
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Yeni:
require __DIR__.'/../laravel-project/vendor/autoload.php';
$app = require_once __DIR__.'/../laravel-project/bootstrap/app.php';
```

### 6. Environment Ayarları (.env)

```bash
# Laravel klasörüne git
cd ~/laravel-project

# .env dosyasını oluştur
cp .env.example .env

# .env'yi düzenle
nano .env
```

**Örnek .env ayarları:**
```env
APP_NAME=Laravel
APP_ENV=production
APP_KEY=  # php artisan key:generate ile oluşturacağız
APP_DEBUG=false
APP_URL=https://siteniz.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=veritabani_adi
DB_USERNAME=kullanici_adi
DB_PASSWORD=sifre

FILESYSTEM_DISK=public
```

### 7. Uygulama Anahtarı Oluştur

```bash
# APP_KEY oluştur
php artisan key:generate
```

### 8. .htaccess Dosyası Oluştur

```bash
# Public_html'e git
cd ~/public_html

# .htaccess oluştur
cat > .htaccess << 'EOF'
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
EOF

# İzin ver
chmod 644 .htaccess
```

### 9. Storage Link Kurulumu

```bash
# Public_html'de storage symlink oluştur
cd ~/public_html
ln -s ../laravel-project/storage/app/public storage

# Kontrol et
ls -la | grep storage
```

### 10. Dosya İzinleri

```bash
# Laravel klasöründe izinleri ayarla
cd ~/laravel-project
chmod -R 755 storage bootstrap/cache

# Eğer gerekirse:
# chmod -R 777 storage bootstrap/cache  (geçici)
```

### 11. Database Kurulumu

```bash
# Migration'ları çalıştır
php artisan migrate --force

# Seeder'ları çalıştır (demo data için)
php artisan db:seed --force
```

### 12. Cache Optimizasyonu

```bash
# Production için cache'leri optimize et
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Eğer hata alırsan cache'leri temizle:
# php artisan config:clear
# php artisan route:clear  
# php artisan view:clear
```

## ✅ Test ve Doğrulama

### Site Testi
- **Ana sayfa:** `https://siteniz.com`
- **Alt sayfa:** `https://siteniz.com/hakkimizda`
- **Admin panel:** `https://siteniz.com/admin/login`

### Storage Testi
```bash
# Storage link çalışıyor mu?
ls -la ~/public_html/storage

# Test resmi
https://siteniz.com/storage/test-image.jpg
```

### Güvenlik Kontrolü
```bash
# Bu URL'ler 403/404 vermeli (ERİŞİLEMEZ olmalı):
# https://siteniz.com/../laravel-project/.env
# https://siteniz.com/../laravel-project/config/
```

## 🔧 Sorun Giderme

### 1. 404 Hatası (Alt sayfalar)
- `.htaccess` dosyasının varlığını kontrol et
- `RewriteEngine On` çalışıyor mu?

### 2. Storage 403 Hatası
```bash
chmod -R 755 ~/laravel-project/storage/app/public/
```

### 3. Database Bağlantı Hatası
- `.env` dosyasındaki DB bilgilerini kontrol et
- `php artisan config:clear` çalıştır

### 4. 500 Internal Server Error
```bash
# Log dosyalarını kontrol et
tail -f ~/laravel-project/storage/logs/laravel.log

# İzinleri kontrol et
chmod -R 755 ~/laravel-project/storage
```

## 🎯 Avantajlar

✅ **Güvenlik:** app/, config/, .env web'den erişilemez  
✅ **Temiz URL'ler:** `/public/` gereksiz  
✅ **Normal storage link:** Standart Laravel yapısı  
✅ **Kolay güncelleme:** `git pull` ile güncelleme  
✅ **Laravel yapısı:** Framework yapısı bozulmaz  

## 📝 Notlar

- **Güncelleme:** `cd ~/laravel-project && git pull && composer install --no-dev`
- **Yeni migration:** `php artisan migrate --force`
- **Cache temizleme:** `php artisan optimize:clear`

---

> **Önemli:** Bu yöntem, Laravel projelerinin hosting'de en güvenli ve profesyonel kurulum şeklidir. 