/**
 * Advanced Image Optimizer - WebP Compression with Quality Preservation
 * Kalite korunarak WebP formatına dönüştürme ve boyut optimizasyonu
 */

class ImageOptimizer {
    constructor(options = {}) {
        this.config = {
            // Maksimum boyutlar
            maxWidth: options.maxWidth || 1920,
            maxHeight: options.maxHeight || 1080,
            
            // Kalite ayarları (0.1 - 1.0)
            webpQuality: options.webpQuality || 0.85,
            jpegQuality: options.jpegQuality || 0.88,
            
            // Boyut limitleri
            maxSizeKB: options.maxSizeKB || 800, // 800KB
            minQuality: options.minQuality || 0.65,
            
            // Format ayarları
            preferWebP: options.preferWebP !== false,
            fallbackFormat: options.fallbackFormat || 'image/jpeg',
            
            // UI ayarları
            showProgress: options.showProgress !== false,
            showStats: options.showStats !== false
        };
        
        this.webpSupported = this.checkWebPSupport();
        this.initializeCSS();
    }

    /**
     * WebP desteği kontrolü
     */
    checkWebPSupport() {
        const canvas = document.createElement('canvas');
        canvas.width = 1;
        canvas.height = 1;
        return canvas.toDataURL('image/webp').indexOf('image/webp') === 5;
    }

    /**
     * CSS stilleri ekle
     */
    initializeCSS() {
        if (document.getElementById('image-optimizer-styles')) return;
        
        const style = document.createElement('style');
        style.id = 'image-optimizer-styles';
        style.textContent = `
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
                border-radius: 0 0 4px 4px;
                padding: 8px 12px;
                font-size: 11px;
                color: #6c757d;
                display: none;
                z-index: 10;
            }
            
            .img-optimizer-progress.active {
                display: block;
                animation: fadeIn 0.3s ease;
            }
            
            .img-optimizer-progress-bar {
                width: 100%;
                height: 4px;
                background: #e9ecef;
                border-radius: 2px;
                overflow: hidden;
                margin: 4px 0;
            }
            
            .img-optimizer-progress-fill {
                height: 100%;
                background: linear-gradient(90deg, #007bff, #28a745);
                border-radius: 2px;
                transition: width 0.3s ease;
                width: 0%;
            }
            
            .img-optimizer-stats {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 4px;
                font-size: 10px;
            }
            
            .img-optimizer-stats .success {
                color: #28a745;
                font-weight: 500;
            }
            
            .img-optimizer-stats .format {
                background: #007bff;
                color: white;
                padding: 1px 4px;
                border-radius: 2px;
                font-size: 9px;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-5px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .img-preview-container {
                margin-top: 10px;
                padding: 10px;
                border: 1px dashed #dee2e6;
                border-radius: 4px;
                background: #f8f9fa;
                display: none;
            }
            
            .img-preview-container.active {
                display: block;
            }
            
            .img-preview {
                max-width: 200px;
                max-height: 150px;
                border-radius: 4px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }
        `;
        document.head.appendChild(style);
    }

    /**
     * Ana optimizasyon fonksiyonu
     */
    async optimizeImage(file, callback, progressContainer = null) {
        if (!file || !file.type.startsWith('image/')) {
            callback(file);
            return;
        }

        try {
            // Progress başlat
            if (!progressContainer) {
                progressContainer = this.createProgressContainer();
            }
            this.updateProgress(progressContainer, 10, 'Resim yükleniyor...');

            // Resmi yükle
            const img = await this.loadImage(file);
            this.updateProgress(progressContainer, 30, 'Boyutlar hesaplanıyor...');

            // Optimum boyutları hesapla
            const dimensions = this.calculateOptimalDimensions(img.width, img.height);
            this.updateProgress(progressContainer, 50, 'Resim işleniyor...');

            // Canvas'a çiz ve optimize et
            const canvas = this.createCanvas(dimensions.width, dimensions.height);
            const ctx = canvas.getContext('2d');
            
            // Kaliteli resim çizimi
            this.drawHighQualityImage(ctx, img, dimensions.width, dimensions.height);
            this.updateProgress(progressContainer, 70, 'Format dönüştürülüyor...');

            // En iyi formatı belirle ve dönüştür
            const optimizedBlob = await this.getBestQualityBlob(canvas, file.name);
            this.updateProgress(progressContainer, 90, 'Tamamlanıyor...');

            // Sonuç dosyası oluştur
            const optimizedFile = new File([optimizedBlob], this.getOptimizedFileName(file.name, optimizedBlob.type), {
                type: optimizedBlob.type,
                lastModified: Date.now()
            });

            this.updateProgress(progressContainer, 100, 'Tamamlandı!');
            
            // İstatistikleri göster
            if (this.config.showStats) {
                this.showOptimizationStats(progressContainer, file, optimizedFile);
            }

            // Progress'i kapat
            setTimeout(() => {
                progressContainer.classList.remove('active');
            }, 3000);

            callback(optimizedFile);

        } catch (error) {
            console.error('Image optimization error:', error);
            callback(file); // Hata durumunda orijinal dosyayı döndür
        }
    }

    /**
     * Resim yükleme
     */
    loadImage(file) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            const url = URL.createObjectURL(file);
            
            img.onload = () => {
                URL.revokeObjectURL(url);
                resolve(img);
            };
            
            img.onerror = () => {
                URL.revokeObjectURL(url);
                reject(new Error('Resim yüklenemedi'));
            };
            
            img.src = url;
        });
    }

    /**
     * Optimum boyutları hesapla
     */
    calculateOptimalDimensions(width, height) {
        let newWidth = width;
        let newHeight = height;

        // Çok küçük resimleri büyütme
        if (newWidth < 300 && newHeight < 300) {
            return { width: newWidth, height: newHeight };
        }

        // Orantıyı koru
        const aspectRatio = width / height;

        if (newWidth > this.config.maxWidth) {
            newWidth = this.config.maxWidth;
            newHeight = newWidth / aspectRatio;
        }

        if (newHeight > this.config.maxHeight) {
            newHeight = this.config.maxHeight;
            newWidth = newHeight * aspectRatio;
        }

        return {
            width: Math.round(newWidth),
            height: Math.round(newHeight)
        };
    }

    /**
     * Canvas oluştur
     */
    createCanvas(width, height) {
        const canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        return canvas;
    }

    /**
     * Yüksek kaliteli resim çizimi
     */
    drawHighQualityImage(ctx, img, width, height) {
        // Kalite ayarları
        ctx.imageSmoothingEnabled = true;
        ctx.imageSmoothingQuality = 'high';
        
        // Arka plan beyaz yap (transparency için)
        ctx.fillStyle = '#FFFFFF';
        ctx.fillRect(0, 0, width, height);
        
        // Resmi çiz
        ctx.drawImage(img, 0, 0, width, height);
    }

    /**
     * En iyi kalitede blob oluştur
     */
    async getBestQualityBlob(canvas, originalName) {
        const isWebP = this.webpSupported && this.config.preferWebP;
        const targetFormat = isWebP ? 'image/webp' : this.config.fallbackFormat;
        const baseQuality = isWebP ? this.config.webpQuality : this.config.jpegQuality;
        
        let quality = baseQuality;
        let blob = await this.canvasToBlob(canvas, targetFormat, quality);
        
        // Boyut kontrolü ve kalite ayarlaması
        let attempts = 0;
        const maxAttempts = 5;
        
        while (blob.size > this.config.maxSizeKB * 1024 && 
               quality > this.config.minQuality && 
               attempts < maxAttempts) {
            
            quality -= 0.05;
            blob = await this.canvasToBlob(canvas, targetFormat, quality);
            attempts++;
        }

        return blob;
    }

    /**
     * Canvas'tan blob oluştur
     */
    canvasToBlob(canvas, type, quality) {
        return new Promise((resolve) => {
            canvas.toBlob(resolve, type, quality);
        });
    }

    /**
     * Optimize edilmiş dosya adı oluştur
     */
    getOptimizedFileName(originalName, mimeType) {
        const nameWithoutExt = originalName.replace(/\.[^/.]+$/, "");
        const extension = mimeType === 'image/webp' ? '.webp' : '.jpg';
        return nameWithoutExt + '_optimized' + extension;
    }

    /**
     * Progress container oluştur
     */
    createProgressContainer(inputId = null) {
        const container = document.createElement('div');
        container.className = 'img-optimizer-progress';
        if (inputId) {
            container.id = 'img-optimizer-progress-' + inputId;
        }
        container.innerHTML = `
            <div class="img-optimizer-progress-bar">
                <div class="img-optimizer-progress-fill"></div>
            </div>
            <div class="progress-text">Hazırlanıyor...</div>
            <div class="img-optimizer-stats"></div>
        `;
        return container;
    }

    /**
     * Progress güncelle
     */
    updateProgress(container, percentage, text) {
        if (!this.config.showProgress) return;
        
        const fill = container.querySelector('.img-optimizer-progress-fill');
        const textEl = container.querySelector('.progress-text');
        
        if (fill) fill.style.width = percentage + '%';
        if (textEl) textEl.textContent = text;
        
        if (!container.classList.contains('active')) {
            container.classList.add('active');
        }
    }

    /**
     * Optimizasyon istatistiklerini göster
     */
    showOptimizationStats(container, originalFile, optimizedFile) {
        const stats = container.querySelector('.img-optimizer-stats');
        if (!stats) return;

        const originalSize = originalFile.size;
        const optimizedSize = optimizedFile.size;
        const savings = originalSize - optimizedSize;
        const percentage = Math.round((savings / originalSize) * 100);
        
        const formatBadge = optimizedFile.type.includes('webp') ? 'WebP' : 'JPEG';
        
        stats.innerHTML = `
            <span class="success">
                <i class="fas fa-check-circle"></i>
                ${percentage > 0 ? `%${percentage} küçültüldü` : 'Optimize edildi'}
            </span>
            <span>
                ${this.formatFileSize(originalSize)} → ${this.formatFileSize(optimizedSize)}
            </span>
            <span class="format">${formatBadge}</span>
        `;
    }

    /**
     * Dosya boyutunu formatla
     */
    formatFileSize(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
    }

    /**
     * Input'lara otomatik ekleme
     */
    attachToImageInputs(selector = 'input[type="file"][accept*="image"]') {
        const inputs = document.querySelectorAll(selector);
        inputs.forEach(input => this.attachToInput(input));
    }

    /**
     * Tekil input'a ekleme
     */
    attachToInput(input) {
        if (input.dataset.optimizerAttached) return;
        
        // Container oluştur
        let container = input.parentNode;
        if (!container.classList.contains('img-optimizer-container')) {
            const wrapper = document.createElement('div');
            wrapper.className = 'img-optimizer-container';
            input.parentNode.insertBefore(wrapper, input);
            wrapper.appendChild(input);
            container = wrapper;
        }

        // Progress container'ı ekle
        const inputId = input.id || 'input-' + Date.now();
        const progressContainer = this.createProgressContainer(inputId);
        container.appendChild(progressContainer);

        // Event listener ekle
        input.addEventListener('change', (e) => {
            // Sonsuz döngüyü önle
            if (input.dataset.optimizationInProgress === 'true') {
                return;
            }
            
            const files = Array.from(e.target.files);
            if (files.length === 0) return;

            // Optimizasyon flag'ini set et
            input.dataset.optimizationInProgress = 'true';

            const optimizedFiles = [];
            let processedCount = 0;

            files.forEach((file, index) => {
                this.optimizeImage(file, (optimizedFile) => {
                    optimizedFiles[index] = optimizedFile;
                    processedCount++;

                    if (processedCount === files.length) {
                        this.updateInputFiles(input, optimizedFiles);
                        // Optimizasyon tamamlandıktan sonra flag'i kaldır
                        setTimeout(() => {
                            input.dataset.optimizationInProgress = 'false';
                        }, 100);
                    }
                }, progressContainer);
            });
        });

        input.dataset.optimizerAttached = 'true';
    }

    /**
     * Input dosyalarını güncelle
     */
    updateInputFiles(input, files) {
        const dt = new DataTransfer();
        files.forEach(file => dt.items.add(file));
        input.files = dt.files;
        
        // Change event'ini tetikleme - sonsuz döngüye sebep olur
        // Dosyalar zaten optimize edildi ve input'a eklendi
    }
}

// Global instance oluştur
window.ImageOptimizer = ImageOptimizer;
window.imageOptimizer = new ImageOptimizer({
    maxWidth: 1920,
    maxHeight: 1080,
    webpQuality: 0.85,
    jpegQuality: 0.88,
    maxSizeKB: 800,
    preferWebP: true,
    showProgress: true,
    showStats: true
});

// Sayfa yüklendiğinde otomatik başlat
document.addEventListener('DOMContentLoaded', function() {
    window.imageOptimizer.attachToImageInputs();
    
    // Dinamik content için observer
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === 1) {
                    const imageInputs = node.querySelectorAll('input[type="file"][accept*="image"]');
                    imageInputs.forEach(input => {
                        window.imageOptimizer.attachToInput(input);
                    });
                }
            });
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
}); 