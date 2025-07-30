@extends('layouts.app')

@section('title', 'Sayfa Bulunamadı - 404')

@section('content')
<style>
.error-container {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.error-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
    opacity: 0.3;
}

.error-content {
    text-align: center;
    color: white;
    z-index: 2;
    position: relative;
    padding: 3rem;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    max-width: 600px;
    margin: 0 auto;
}

.error-code {
    font-size: 8rem;
    font-weight: 900;
    line-height: 1;
    background: linear-gradient(45deg, #ffffff, #f8f9fa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    animation: glow 2s ease-in-out infinite alternate;
}

@keyframes glow {
    from {
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    }
    to {
        text-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 40px rgba(255, 255, 255, 0.6);
    }
}

.error-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: #ffffff;
}

.error-message {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.6;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-home {
    background: linear-gradient(45deg, #ff6b6b, #ee5a52);
    color: white;
    padding: 12px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 4px 15px rgba(238, 90, 82, 0.4);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-home:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(238, 90, 82, 0.6);
    color: white;
}

.btn-back {
    background: transparent;
    color: white;
    padding: 12px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.3);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-back:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-2px);
    color: white;
}

.floating-shapes {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
}

.shape {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.shape:nth-child(1) {
    width: 80px;
    height: 80px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape:nth-child(2) {
    width: 120px;
    height: 120px;
    top: 60%;
    right: 10%;
    animation-delay: 2s;
}

.shape:nth-child(3) {
    width: 60px;
    height: 60px;
    bottom: 20%;
    left: 20%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.3;
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
        opacity: 0.6;
    }
}

@media (max-width: 768px) {
    .error-code {
        font-size: 6rem;
    }
    
    .error-title {
        font-size: 2rem;
    }
    
    .error-content {
        padding: 2rem;
        margin: 1rem;
    }
    
    .error-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<div class="error-container">
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <div class="error-content">
        <div class="error-code">404</div>
        <h1 class="error-title">Sayfa Bulunamadı</h1>
        <p class="error-message">
            Üzgünüz, aradığınız sayfa mevcut değil. Sayfa taşınmış, silinmiş veya yanlış bir adres girmiş olabilirsiniz.
        </p>
        
        <div class="error-actions">
            <a href="{{ route('home') }}" class="btn-home">
                <i class="fas fa-home"></i>
                Ana Sayfaya Dön
            </a>
            <button onclick="history.back()" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Geri Git
            </button>
        </div>
    </div>
</div>

<script>
// Sayfa yüklendiğinde animasyon başlat
document.addEventListener('DOMContentLoaded', function() {
    // Console'da şakacı mesaj
    console.log('🎭 404 sayfasındasın! Kaybolmuş gibisin...');
    
    // Sayfa başlığını değiştir
    let titleCount = 0;
    setInterval(() => {
        const titles = ['404 - Kayıp!', '404 - Bulunamadı', '404 - Hatay İmar'];
        document.title = titles[titleCount % titles.length];
        titleCount++;
    }, 2000);
});

// Konami code easter egg
let konamiCode = [];
const konamiSequence = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];

document.addEventListener('keydown', function(e) {
    konamiCode.push(e.keyCode);
    
    if (konamiCode.length > konamiSequence.length) {
        konamiCode.shift();
    }
    
    if (konamiCode.length === konamiSequence.length && 
        konamiCode.every((code, index) => code === konamiSequence[index])) {
        
        // Easter egg: Sayfa renklerini değiştir
        document.querySelector('.error-container').style.background = 
            'linear-gradient(135deg, #ff6b6b 0%, #feca57 100%)';
        
        alert('🎉 Easter egg bulundu! Konami Code işe yaradı!');
    }
});
</script>
@endsection 