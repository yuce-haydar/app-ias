<!DOCTYPE html>
<html>
<head>
    <title>Logo Test</title>
</head>
<body>
    <h1>Logo Test Sayfası</h1>
    
    <h2>Logo 1 - Direkt Path</h2>
    <img src="/assets/images/logo/logo.png" alt="Logo 1" style="height: 50px; border: 2px solid red;">
    
    <h2>Logo 2 - URL Helper</h2>
    <img src="{{ url('assets/images/logo/logo.png') }}" alt="Logo 2" style="height: 50px; border: 2px solid blue;">
    
    <h2>Logo 3 - Asset Helper</h2>
    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo 3" style="height: 50px; border: 2px solid green;">
    
    <h2>Logo 4 - Logo-2</h2>
    <img src="{{ url('assets/images/logo/logo-2.png') }}" alt="Logo 4" style="height: 50px; border: 2px solid orange;">
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('img');
            images.forEach((img, index) => {
                img.onload = function() {
                    console.log(`Logo ${index + 1} yüklendi:`, this.src);
                };
                img.onerror = function() {
                    console.error(`Logo ${index + 1} yüklenemedi:`, this.src);
                };
            });
        });
    </script>
</body>
</html> 