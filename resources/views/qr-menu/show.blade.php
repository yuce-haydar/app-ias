<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <title>{{ $qrMenu->name }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: {{ $qrMenu->theme_colors['primary'] ?? '#cf9f38' }};
            --secondary-color: {{ $qrMenu->theme_colors['secondary'] ?? '#2c3e50' }};
            --background-color: {{ $qrMenu->theme_colors['background'] ?? '#ffffff' }};
            --text-color: {{ $qrMenu->theme_colors['text'] ?? '#333333' }};
            --light-gray: #f8f9fa;
            --border-color: #e9ecef;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        /* MOBILE STICKY FORCE */
        .mobile-sticky-force {
            position: -webkit-sticky !important;
            position: sticky !important;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            max-width: 100%;
        }

        html {
            overflow-x: hidden !important;
            width: 100% !important;
            max-width: 100vw !important;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden !important;
            width: 100% !important;
            max-width: 100vw !important;
            position: relative;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            background-size: 400% 400%;
            animation: gradientShift 8s ease-in-out infinite;
            color: white;
            padding: 1.5rem 0.5rem;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            background-repeat: no-repeat;
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 100vw;
            box-sizing: border-box;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: shimmer 3s infinite;
            z-index: 1;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .header.has-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.4);
            z-index: 1;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
            width: 100%;
        }

        .header-logo {
            height: 80px;
            width: auto;
            border-radius: 12px;
            filter: drop-shadow(0 4px 16px rgba(0,0,0,0.3));
            box-shadow: 0 0 30px rgba(255,255,255,0.3);
            transition: all 0.3s ease;
            animation: logoGlow 2s ease-in-out infinite alternate;
        }

        .header-logo:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px rgba(255,255,255,0.5);
        }

        @keyframes logoGlow {
            from { box-shadow: 0 0 20px rgba(255,255,255,0.2); }
            to { box-shadow: 0 0 30px rgba(255,255,255,0.4); }
        }

        .header h1 {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 0;
            line-height: 1.2;
            text-align: left;
            flex: 1;
        }

        .header p {
            opacity: 0.9;
            font-size: 1rem;
            text-align: left;
            margin: 0;
        }

        /* Search Box Styles */
        .search-container {
            margin: 1.5rem auto;
            max-width: 500px;
            padding: 0 1rem;
        }

        .search-box {
            position: relative;
            display: flex;
            align-items: center;
            background: white;
            border: 2px solid var(--border-color);
            border-radius: 25px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .search-box:hover,
        .search-box:focus-within {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .search-icon {
            color: var(--primary-color);
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        #searchInput {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            color: var(--text-color);
            font-size: 1rem;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }

        #searchInput::placeholder {
            color: #999;
        }

        .search-clear {
            background: var(--light-gray);
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
            cursor: pointer;
            margin-left: 0.5rem;
            transition: all 0.3s ease;
        }

        .search-clear:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        /* Search Results */
        .search-results {
            display: none;
            background: white;
            border-radius: 15px;
            margin: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .search-results.active {
            display: block;
        }

        .search-results-header {
            padding: 1rem 1.5rem;
            background: var(--light-gray);
            border-bottom: 1px solid var(--border-color);
        }

        .search-results-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin: 0;
        }

        .search-results-count {
            color: var(--primary-color);
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        .no-results {
            text-align: center;
            padding: 3rem 1rem;
            color: #666;
        }

        .no-results i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
            opacity: 0.5;
        }

        .search-highlight {
            background: rgba(207, 159, 56, 0.3);
            padding: 0.1rem 0.2rem;
            border-radius: 3px;
            font-weight: 600;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 0.5rem;
            width: 100%;
            box-sizing: border-box;
            overflow: visible !important;
            position: relative;
            height: auto;
        }

        /* Categories Navigation */
        .categories-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 0.75rem 0.5rem;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 75px;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            margin: 0;
            height: 70px;
            min-height: 70px;
            max-height: 70px;
            overflow: hidden;
            width: 100%;
            max-width: 100vw;
            box-sizing: border-box;
        }

        .categories-scroll {
            display: flex;
            gap: 0.75rem;
            overflow-x: auto;
            flex: 1;
            scrollbar-width: none;
            -ms-overflow-style: none;
            padding: 0 0.25rem;
            width: calc(100% - 0.5rem);
            box-sizing: border-box;
        }

        .search-toggle-btn {
            background: linear-gradient(135deg, var(--primary-color), #e6b800);
            color: white;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(207, 159, 56, 0.3);
            margin-left: 1rem;
            flex-shrink: 0;
        }

        .search-toggle-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(207, 159, 56, 0.4);
        }

        .search-toggle-btn.active {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        /* Search animations */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        .categories-scroll::-webkit-scrollbar {
            display: none;
        }

        .category-btn {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-color);
            padding: 0.75rem 1.25rem;
            border-radius: 30px;
            text-decoration: none;
            white-space: nowrap;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-width: fit-content;
            font-size: 0.9rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .category-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .category-btn:hover::before {
            left: 100%;
        }

        .category-btn:hover {
            background: linear-gradient(135deg, var(--primary-color), #e6b800);
            color: white;
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 6px 20px rgba(207, 159, 56, 0.2);
        }

        .category-btn.active {
            background: linear-gradient(135deg, var(--primary-color), #e6b800);
            color: white;
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(207, 159, 56, 0.4);
            animation: none; /* Aktif durumda animasyonu durdur */
        }

        .category-btn i {
            transition: transform 0.3s ease;
        }

        .category-btn:hover i {
            transform: rotateY(360deg);
        }

        /* Floating Category Menu */
        .floating-menu-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: 50%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            cursor: pointer;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .floating-menu-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(0,0,0,0.4);
        }

        .floating-menu-btn.active {
            background: var(--secondary-color);
            transform: rotate(45deg);
        }

        /* Side Menu */
        .side-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .side-menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .side-menu {
            position: fixed;
            top: 0;
            right: -350px;
            width: 320px;
            height: 100%;
            background: white;
            z-index: 1001;
            transition: all 0.3s ease;
            overflow-y: auto;
            box-shadow: -5px 0 20px rgba(0,0,0,0.3);
        }

        .side-menu.active {
            right: 0;
        }

        .side-menu-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        .side-menu-header h3 {
            margin: 0;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .side-menu-categories {
            padding: 1rem 0;
        }

        .side-menu-category {
            display: block;
            padding: 1rem 1.5rem;
            color: var(--text-color);
            text-decoration: none;
            border-bottom: 1px solid var(--border-color);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .side-menu-category:hover {
            background: var(--light-gray);
            color: var(--primary-color);
            transform: translateX(5px);
        }

        .side-menu-category-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .side-menu-category-count {
            background: var(--primary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .side-menu-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .side-menu-close:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.1);
        }

        /* Recommended Section */
        .recommended-section {
            background: var(--light-gray);
            padding: 2rem 0;
            margin: 1.5rem 0;
        }

        .recommended-title {
            text-align: center;
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            padding: 0 1rem;
        }

        .recommended-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
            padding: 0 1rem;
        }

        /* Category Section */
        .category-section {
            margin: 1.5rem 0;
            padding: 0;
        }

        .category-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1rem;
            padding: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Items Grid */
        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            padding: 0;
            margin: 0;
            width: 100%;
            box-sizing: border-box;
        }

        /* Item Card */
        .item-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 0;
            box-shadow: 
                0 8px 32px rgba(0,0,0,0.08),
                0 4px 16px rgba(0,0,0,0.04),
                inset 0 1px 0 rgba(255,255,255,0.6);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            border: 1px solid rgba(255,255,255,0.2);
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
        }

        .item-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, 
                transparent, 
                rgba(207, 159, 56, 0.1), 
                transparent);
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
            z-index: 1;
        }

        .item-card:hover {
            transform: translateY(-8px) rotateX(2deg) rotateY(2deg);
            box-shadow: 
                0 25px 50px rgba(207, 159, 56, 0.2),
                0 15px 35px rgba(0,0,0,0.1),
                0 5px 15px rgba(0,0,0,0.08),
                inset 0 1px 0 rgba(255,255,255,0.8);
            cursor: pointer;
        }

        .item-card:hover::before {
            opacity: 1;
            transform: rotate(45deg);
        }

        .item-card:active {
            transform: translateY(-4px) rotateX(1deg) rotateY(1deg);
        }

        /* Item Image */
        .item-image {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            margin: 0.75rem;
            margin-bottom: 1rem;
            height: 180px; /* Küçültülmüş yükseklik */
            background: var(--light-gray);
            cursor: pointer;
            width: calc(100% - 1.5rem);
            box-sizing: border-box;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .item-card:hover .item-image img {
            transform: scale(1.05);
        }

        .gallery-indicator {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Item Header */
        .item-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 0 0.75rem 1rem 0.75rem;
            gap: 1rem;
            width: calc(100% - 1.5rem);
            box-sizing: border-box;
        }

        .item-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .item-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-color);
            background: var(--light-gray);
            padding: 0.25rem 0.5rem;
            border-radius: 12px;
            white-space: nowrap;
        }

        .item-price-btn {
            font-size: 0.9rem;
            font-weight: 600;
            color: white;
            background: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            white-space: nowrap;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .item-price-btn:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .item-description {
            color: var(--text-color);
            margin-bottom: 1rem;
            line-height: 1.5;
            font-size: 0.9rem;
        }

        /* Item Meta */
        .item-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 0 0.75rem 1rem 0.75rem;
            width: calc(100% - 1.5rem);
            box-sizing: border-box;
        }

        .meta-tag {
            background: var(--primary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .meta-tag.time {
            background: var(--secondary-color);
        }

        .meta-tag.allergen {
            background: var(--danger-color);
        }

        /* Recommended Badge */
        .recommended-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 6px 14px;
            border-radius: 25px;
            font-size: 0.75rem;
            font-weight: 700;
            z-index: 10;
            animation: pulse 2s infinite;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Scroll Reveal Animations */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-reveal-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .scroll-reveal-left.revealed {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-reveal-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .scroll-reveal-right.revealed {
            opacity: 1;
            transform: translateX(0);
        }

        .stagger-item {
            transition-delay: calc(var(--index) * 0.1s);
        }

        /* Fullscreen Image Modal */
        .fullscreen-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(10px);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }

        .fullscreen-image {
            max-width: 95%;
            max-height: 95%;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 10px 50px rgba(0,0,0,0.5);
            animation: scaleIn 0.3s ease;
        }

        .fullscreen-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 2001;
            background: rgba(0,0,0,0.5);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .fullscreen-close:hover {
            background: rgba(255,255,255,0.2);
            transform: scale(1.1);
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { 
                opacity: 0;
                transform: scale(0.8);
            }
            to { 
                opacity: 1;
                transform: scale(1);
            }
        }

        .item-card.recommended {
            border: 2px solid var(--primary-color);
        }

        /* Empty Message */
        .empty-message {
            text-align: center;
            padding: 3rem 1rem;
            color: #666;
        }

        .empty-message i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        /* Size options artık modal'da kullanılmıyor, ana sayfada fiyatlar gösteriliyor */
        
        /* Size item stilleri ana sayfada */
        .size-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.2rem 0.2rem;
            background: var(--light-gray);
            border-radius: 8px;
            margin-bottom: 0;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .size-item:hover {
            border-color: var(--primary-color);
            background: rgba(207, 159, 56, 0.1);
        }

        .size-item .size-name {
            font-weight: 500;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        .size-item .size-price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1rem;
        }

        /* Fiyat stilleri artık ana sayfada kullanılıyor */

        /* Footer */
        .footer {
            background: var(--secondary-color);
            color: white;
            text-align: center;
            padding: 2rem 1rem;
            margin-top: 3rem;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, 
                rgba(0,0,0,0.7), 
                rgba(44, 62, 80, 0.8),
                rgba(207, 159, 56, 0.3));
            backdrop-filter: blur(20px);
            justify-content: center;
            align-items: center;
            padding: 1rem;
            animation: modalBackdropIn 0.4s ease;
        }

        @keyframes modalBackdropIn {
            from {
                opacity: 0;
                backdrop-filter: blur(0px);
            }
            to {
                opacity: 1;
                backdrop-filter: blur(20px);
            }
        }

        /* Mobilde modal padding'i azalt */
        @media (max-width: 768px) {
            .modal {
                padding: 0.5rem;
            }
        }

        .modal-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 0;
            border-radius: 25px;
            max-width: 90%;
            max-height: 90%;
            overflow-y: auto;
            position: relative;
            box-shadow: 
                0 25px 60px rgba(0,0,0,0.3),
                0 15px 40px rgba(0,0,0,0.2),
                inset 0 1px 0 rgba(255,255,255,0.8);
            animation: modalSlideIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(255,255,255,0.3);
            pointer-events: all;
            touch-action: pan-y;
        }

        /* Mobilde modal biraz küçült */
        @media (max-width: 768px) {
            .modal-content {
               
                border-radius: 10px;
                margin: 2.5%;
                width: 95vw;
               
            }
        }

        @keyframes modalSlideIn {
            0% {
                opacity: 0;
                transform: scale(0.7) translateY(50px) rotateX(10deg);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.02) translateY(-10px) rotateX(5deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0) rotateX(0deg);
            }
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 28px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            z-index: 10;
            background: rgba(0,0,0,0.5);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close:hover {
            background: rgba(0,0,0,0.8);
        }

        .modal-body {
            display: flex;
            flex-direction: column;
        }

        .modal-image-container {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            border-radius: 15px 15px 0 0;
            padding: 0;
            box-sizing: border-box;
            cursor: pointer;
        }

        /* Mobilde resim tam ekran */
        @media (max-width: 768px) {
            .modal-image-container {
                width: 100%;
                height: 60vh; /* Daha yüksek */
                margin-left: 0;
                border-radius: 15px 15px 0 0;
                padding: 0;
            }
        }

        .modal-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .modal-info {
            padding: 1.5rem;
            touch-action: pan-y;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .modal-section {
            margin: 1rem 0;
            padding: 1rem;
            background: var(--light-gray);
            border-radius: 10px;
            border-left: 4px solid var(--primary-color);
        }

        .modal-section h4 {
            color: var(--primary-color);
            font-size: 1rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .preparation-time {
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 500;
            display: inline-block;
        }

        .ingredients-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .ingredient-tag {
            background: var(--secondary-color);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.9rem;
        }

        .allergens-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .allergen-tag {
            background: var(--danger-color);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Mobilde modal info padding'i azalt */
        @media (max-width: 768px) {
            .modal-info {
                padding: 1rem;
            }
        }

        .modal-info h3 {
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
            font-size: 1.4rem;
        }

        .modal-info p {
            color: var(--text-color);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        /* Modal meta tags */
        .modal-info .meta-tag {
            background: var(--primary-color);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            margin: 0.25rem;
        }

        .modal-info .meta-tag.time {
            background: var(--secondary-color);
        }

        .modal-info .meta-tag.allergen {
            background: var(--danger-color);
        }

        .modal-gallery {
            display: flex;
            gap: 0.5rem;
            padding: 1rem;
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
            background: var(--light-gray);
            border-radius: 8px;
            margin: 1rem 0;
        }

        /* Mobilde modal gallery padding'i azalt */
        @media (max-width: 768px) {
            .modal-gallery {
                padding: 0.75rem;
                gap: 0.5rem;
                margin: 0.75rem 0;
            }
            
            .modal-gallery img {
                width: 60px;
                height: 60px;
            }
        }

        .modal-gallery::-webkit-scrollbar {
            display: none;
        }

        .modal-gallery img {
            width: 70px;
            height: 70px; /* Biraz daha büyük */
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            flex-shrink: 0;
            background: var(--light-gray);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .modal-gallery img:hover {
            border-color: var(--primary-color);
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .modal-gallery img.active {
            border-color: var(--primary-color);
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0,0,0,0.2);
        }

        /* Galeri resim hover ve active stilleri yukarıda tanımlandı */

        /* Mobile Responsive */
        @media (max-width: 768px) {
            * {
                max-width: 100%;
                box-sizing: border-box;
            }

            html {
                overflow-x: hidden !important;
                height: 100%;
            }

            body {
                padding: 0;
                margin: 0;
                overflow-x: hidden !important;
                overflow-y: auto !important;
                height: auto;
                min-height: 100vh;
                position: relative;
            }

            .container {
                padding: 0 0.25rem;
                max-width: 100vw;
                width: 100vw;
                margin: 0;
                margin-top: 149px; /* Header (89px) + Categories (60px) = 149px */
                position: relative;
                overflow: visible !important;
            }

            .header {
                padding: 1rem 0.25rem;
                position: -webkit-sticky !important;
                position: sticky !important;
                top: 0 !important;
                overflow: hidden;
                margin: 0;
                z-index: 101 !important;
                width: 100vw;
                max-width: 100vw;
                box-sizing: border-box;
                left: 0;
                right: 0;
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
            }

            .header h1 {
                font-size: 1.3rem;
                text-align: left;
                margin: 0;
                flex: 1;
            }

            .header-top {
                gap: 0.75rem;
                margin-bottom: 0.5rem;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                padding: 0;
            }

            .header-logo {
                height: 50px;
            }

            .categories-nav {
                position: fixed !important;
                top: 89px !important; /* Header tam altında: padding(16) + logo(50) + padding(16) + gap(7) */
                left: 0 !important;
                right: 0 !important;
                padding: 0.5rem 0.25rem;
                margin: 0;
                width: 100vw !important;
                max-width: 100vw !important;
                z-index: 1000 !important;
                height: 60px;
                min-height: 60px;
                max-height: 60px;
                overflow: visible !important;
                box-sizing: border-box;
                background: rgba(255, 255, 255, 0.98) !important;
                backdrop-filter: blur(15px) !important;
                border-bottom: 1px solid var(--border-color);
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }

            .categories-scroll {
                padding: 0;
                gap: 0.5rem;
                overflow-x: auto;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            .categories-scroll::-webkit-scrollbar {
                display: none;
            }

            .category-btn {
                padding: 0.5rem 0.75rem;
                font-size: 0.8rem;
                white-space: nowrap;
                flex-shrink: 0;
                min-width: fit-content;
            }

            .category-section {
                margin: 1rem 0;
                padding: 0;
                width: 100%;
            }

            .category-title {
                padding: 0;
                margin-bottom: 0.75rem;
                font-size: 1.3rem;
            }

            .items-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
                padding: 0;
                width: 100%;
                margin: 0;
            }

            .item-card {
                margin: 0;
                width: 100%;
                max-width: 100%;
            }

            .item-image {
                margin: 0.75rem;
                height: 160px;
            }

            .search-container {
                padding: 0 0.25rem;
                margin: 1rem 0;
            }

            .floating-menu-btn {
                bottom: 15px;
                right: 15px;
                width: 55px;
                height: 55px;
                font-size: 1.3rem;
            }

            .side-menu {
                width: 280px;
                right: -300px;
            }

            .side-menu-category {
                padding: 0.8rem 1rem;
            }

            .recommended-section {
                padding: 1.5rem 0;
                margin: 1rem 0;
            }

            .recommended-title {
                font-size: 1.3rem;
                margin-bottom: 1rem;
                padding: 0 0.5rem;
            }

            .recommended-grid,
            .items-grid {
                grid-template-columns: 1fr;
                gap: 0.8rem;
                padding: 0 0.5rem;
            }

            .item-card {
                padding: 0;
            }

            .item-image {
                height: 260px; /* Mobilde de daha büyük */
                padding: 10px;
            }

            .item-name {
                font-size: 1rem;
            }

            .item-description {
                font-size: 0.85rem;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .item-price {
                font-size: 1rem;
            }

            .modal-content {
                max-width: 95%;
                max-height: 95%;
                margin: 0.5rem;
            }

            .modal-image-container {
                height: 50vh; /* Mobilde ekran yüksekliğinin yarısı */
            }

            .modal-info h3 {
                font-size: 1.2rem;
            }

            /* Modal gallery img boyutu yukarıda tanımlandı */

            .close {
                top: 5px;
                right: 10px;
                width: 35px;
                height: 35px;
                font-size: 20px;
            }

            .meta-tag {
                font-size: 0.7rem;
                padding: 0.2rem 0.5rem;
            }

            .category-title {
                font-size: 1.4rem;
                padding: 0 0.5rem;
            }
        }

        /* Very Small Mobile */
        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.2rem;
            }

            .category-btn {
                padding: 0.5rem 0.75rem;
                font-size: 0.8rem;
            }

            .floating-menu-btn {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
                bottom: 10px;
                right: 10px;
            }

            .side-menu {
                width: 260px;
                right: -280px;
            }

            .item-image {
                height: 180px; /* Çok küçük ekranlarda da daha büyük */
            }

            .modal-image-container {
                height: 50vh; /* Çok küçük ekranlarda da ekran yüksekliğinin yarısı */
            }

            /* Modal gallery img boyutu yukarıda tanımlandı */

            .category-title {
                font-size: 1.2rem;
            }
        }

        /* Desktop görünümde kategoriler nav'i göster */
        @media (min-width: 769px) {
            .categories-nav {
                display: block !important;
            }

            .floating-menu-btn {
                display: none; /* Desktop'ta floating button gizle */
            }

            .category-section {
                margin: 2rem 0;
            }

            .category-title {
                font-size: 1.6rem;
                font-weight: 600;
                color: var(--secondary-color);
                margin-bottom: 1.5rem;
                padding: 0 1rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
        }

        /* Mobilde desktop categories gizle */
        @media (max-width: 768px) {
            
        }

        /* Touch Improvements */
        @media (hover: none) {
            .item-card:hover {
                transform: none;
            }
            
            .item-card:active {
                transform: scale(0.98);
            }
            
            .category-btn:hover {
                transform: none;
            }
            
            .category-btn:active {
                transform: scale(0.95);
            }
        }

        /* High DPI Displays */
        @media (-webkit-min-device-pixel-ratio: 2) {
            .item-image img {
                image-rendering: -webkit-optimize-contrast;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header {{ $qrMenu->header_background ? 'has-background' : '' }}" 
         @if($qrMenu->header_background_url)
         style="background-image: url('{{ $qrMenu->header_background_url }}');"
         @endif>
        <div class="header-content">
            <!-- Logo ve Başlık -->
            <div class="header-top">
                <img src="{{ $qrMenu->logo_url }}" alt="{{ $qrMenu->name }} Logo" class="header-logo">
                <h1>{{ $qrMenu->name }}</h1>
            </div>
            
            @if($qrMenu->description)
                <p>{!! $qrMenu->description !!}</p>
            @endif
        </div>
    </div>

    <!-- Categories Navigation -->
    @if($categories->count() > 1 || $categories->pluck('children')->flatten()->count() > 0)
    <div class="categories-nav mobile-sticky-force">
        <div class="categories-scroll">
            @foreach($categories as $category)
                <a href="#category-{{ $category->id }}" class="category-btn">
                    @if($category->icon)
                        <i class="{{ $category->icon }}"></i>
                    @endif
                    {{ $category->name }}
                    @if($category->children->count() > 0)
                        <span style="opacity: 0.7; font-size: 0.8rem;">({{ $category->children->count() }})</span>
                    @endif
                </a>
                
                {{-- Alt kategoriler --}}
                @foreach($category->children as $subCategory)
                    <a href="#category-{{ $subCategory->id }}" class="category-btn" style="margin-left: 10px; opacity: 0.9; font-size: 0.85rem; background: rgba(255,255,255,0.1);">
                        @if($subCategory->icon)
                            <i class="{{ $subCategory->icon }}"></i>
                        @endif
                        {{ $subCategory->name }}
                </a>
                @endforeach
            @endforeach
        </div>
        <button class="search-toggle-btn" id="searchToggleBtn" onclick="toggleSearch()">
            <i class="fas fa-search"></i>
        </button>
    </div>
    @endif

    <!-- Collapsible Search Box -->
    <div class="search-container" id="searchContainer" style="display: none;">
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" id="searchInput" placeholder="Ürün ara..." autocomplete="off">
            <button class="search-clear" id="searchClear" style="display: none;">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Search Results -->
    <div class="search-results" id="searchResults">
        <div class="search-results-header">
            <h2 class="search-results-title">Arama Sonuçları</h2>
            <div class="search-results-count" id="searchResultsCount"></div>
        </div>
        <div class="items-grid" id="searchResultsGrid">
            <!-- Search results will be populated here -->
        </div>
        <div class="no-results" id="noResults" style="display: none;">
            <i class="fas fa-search"></i>
            <h3>Sonuç bulunamadı</h3>
            <p>Aradığınız ürün bulunamadı. Lütfen farklı kelimeler deneyin.</p>
        </div>
    </div>

    <div class="container" id="mainContent">
        <!-- Recommended Items -->
        @if($recommendedItems->count() > 0)
        <div class="recommended-section">
            <h2 class="recommended-title">
                <i class="fas fa-star"></i> Önerilen Ürünler
            </h2>
            <div class="recommended-grid">
                @foreach($recommendedItems as $item)
                    <div class="item-card recommended" onclick="flipCard(this, {{ $item->id }})">
                        <div class="card-inner">
                            <!-- Card Front -->
                            <div class="card-front">
                                <div class="recommended-badge">ÖNERİLEN</div>
                                
                                <div class="item-image">
                            <img src="{{ $item->main_image_url ?? asset('assets/images/demo.png') }}" alt="{{ $item->name }}" loading="lazy">
                            @if($item->gallery_urls && count($item->gallery_urls) > 1)
                                <div class="gallery-indicator">
                                    <i class="fas fa-images"></i>
                                    {{ count($item->gallery_urls) }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="item-header">
                            <div>
                                <h3 class="item-name">{{ $item->name }}</h3>
                                @if($item->description)
                                    <p class="item-description">{!! $item->description !!}</p>
                                @endif
                            </div>
                            @if($item->has_sizes)
                                <div class="item-price">
                                    @foreach($item->sizes as $size)
                                        <div class="size-item">
                                            <span class="size-name">{{ $size['name'] }}</span>
                                            <span class="size-price">{{ $size['price'] }}₺</span>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif($item->price)
                                <div class="item-price">{{ $item->formatted_price }}</div>
                            @endif
                        </div>
                        
                        @if($item->preparation_time || $item->allergens)
                        <div class="item-meta">
                            @if($item->preparation_time)
                                <span class="meta-tag time">
                                    <i class="fas fa-clock"></i> {{ $item->preparation_time }}
                                </span>
                            @endif
                            @if($item->allergens)
                                @foreach($item->allergens as $allergen)
                                    <span class="meta-tag allergen">{{ $allergen }}</span>
                                @endforeach
                            @endif
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Categories and Items -->
        @foreach($categories as $category)
        <div class="category-section" id="category-{{ $category->id }}">
            <h2 class="category-title">
                @if($category->icon)
                    <i class="{{ $category->icon }}"></i>
                @endif
                {{ $category->name }}
                @if($category->children->count() > 0)
                    <small style="opacity: 0.7; font-size: 0.7rem; margin-left: 10px;">({{ $category->children->count() }} alt kategori)</small>
                @endif
            </h2>
            
            @if($category->menuItems->count() > 0)
                <div class="items-grid">
                    @foreach($category->menuItems as $item)
                        <div class="item-card {{ $item->is_recommended ? 'recommended' : '' }}" onclick="openItemModal({{ $item->id }})">
                            @if($item->is_recommended)
                                <div class="recommended-badge">ÖNERİLEN</div>
                            @endif
                            
                            <div class="item-image">
                                <img src="{{ $item->main_image_url ?? asset('assets/images/demo.png') }}" alt="{{ $item->name }}" loading="lazy">
                                @if($item->gallery_urls && count($item->gallery_urls) > 1)
                                    <div class="gallery-indicator">
                                        <i class="fas fa-images"></i>
                                        {{ count($item->gallery_urls) }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="item-header">
                                <div>
                                    <h3 class="item-name">{{ $item->name }}</h3>
                                    @if($item->description)
                                        <p class="item-description">{!! $item->description !!}</p>
                                    @endif
                                </div>
                                @if($item->has_sizes)
                                    <div class="item-price">
                                        @foreach($item->sizes as $size)
                                            <div class="size-item">
                                                <span class="size-name">{{ $size['name'] }}</span>
                                                <span class="size-price">{{ $size['price'] }}₺</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @elseif($item->price)
                                    <div class="item-price">{{ $item->formatted_price }}</div>
                                @endif
                            </div>
                            
                            @if($item->preparation_time || $item->allergens || $item->ingredients)
                            <div class="item-meta">
                                @if($item->preparation_time)
                                    <span class="meta-tag time">
                                        <i class="fas fa-clock"></i> {{ $item->preparation_time }}
                                    </span>
                                @endif
                                @if($item->allergens)
                                    @foreach($item->allergens as $allergen)
                                        <span class="meta-tag allergen">
                                            <i class="fas fa-exclamation-triangle"></i> {{ $allergen }}
                                        </span>
                                    @endforeach
                                @endif
                                @if($item->ingredients && count($item->ingredients) <= 3)
                                    @foreach($item->ingredients as $ingredient)
                                        <span class="meta-tag">{{ $ingredient }}</span>
                                    @endforeach
                                @endif
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Alt kategoriler --}}
            @foreach($category->children as $subCategory)
                <div class="category-section" id="category-{{ $subCategory->id }}" style="margin-left: 20px; margin-top: 2rem;">
                    <h3 class="category-title" style="font-size: 1.4rem; padding-left: 20px; border-left: 4px solid var(--primary-color);">
                        @if($subCategory->icon)
                            <i class="{{ $subCategory->icon }}"></i>
                        @endif
                        {{ $subCategory->name }}
                        <small style="opacity: 0.6; font-size: 0.7rem; margin-left: 10px;">{{ $category->name }} altında</small>
                    </h3>
                    
                    @if($subCategory->menuItems->count() > 0)
                        <div class="items-grid">
                            @foreach($subCategory->menuItems as $item)
                        <div class="item-card {{ $item->is_recommended ? 'recommended' : '' }}" onclick="openItemModal({{ $item->id }})">
                            @if($item->is_recommended)
                                <div class="recommended-badge">ÖNERİLEN</div>
                            @endif
                            
                            <div class="item-image">
                                <img src="{{ $item->main_image_url ?? asset('assets/images/demo.png') }}" alt="{{ $item->name }}" loading="lazy">
                                @if($item->gallery_urls && count($item->gallery_urls) > 1)
                                    <div class="gallery-indicator">
                                        <i class="fas fa-images"></i>
                                        {{ count($item->gallery_urls) }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="item-header">
                                <div>
                                    <h3 class="item-name">{{ $item->name }}</h3>
                                    @if($item->description)
                                        <p class="item-description">{!! $item->description !!}</p>
                                    @endif
                                </div>
                                @if($item->has_sizes)
                                    <div class="item-price">
                                        @foreach($item->sizes as $size)
                                            <div class="size-item">
                                                <span class="size-name">{{ $size['name'] }}</span>
                                                <span class="size-price">{{ $size['price'] }}₺</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @elseif($item->price)
                                    <div class="item-price">{{ $item->formatted_price }}</div>
                                @endif
                            </div>
                            
                            @if($item->preparation_time || $item->allergens || $item->ingredients)
                            <div class="item-meta">
                                @if($item->preparation_time)
                                    <span class="meta-tag time">
                                        <i class="fas fa-clock"></i> {{ $item->preparation_time }}
                                    </span>
                                @endif
                                @if($item->allergens)
                                    @foreach($item->allergens as $allergen)
                                        <span class="meta-tag allergen">
                                            <i class="fas fa-exclamation-triangle"></i> {{ $allergen }}
                                        </span>
                                    @endforeach
                                @endif
                                @if($item->ingredients && count($item->ingredients) <= 3)
                                    @foreach($item->ingredients as $ingredient)
                                        <span class="meta-tag">{{ $ingredient }}</span>
                                    @endforeach
                                @endif
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                        <div class="empty-message">
                            <i class="fas fa-utensils"></i>
                            <p>Bu alt kategoride henüz ürün bulunmuyor.</p>
                        </div>
                    @endif
                </div>
            @endforeach

            {{-- Ana kategoride ürün yoksa ve alt kategori varsa mesaj --}}
            @if($category->menuItems->count() == 0 && $category->children->count() > 0)
                <div style="text-align: center; padding: 1rem; opacity: 0.7; font-style: italic;">
                    Bu kategorinin ürünleri alt kategorilerde bulunur ⬇️
                </div>
            @elseif($category->menuItems->count() == 0 && $category->children->count() == 0)
                <div class="empty-message">
                    <i class="fas fa-utensils"></i>
                    <p>Bu kategoride henüz ürün bulunmuyor.</p>
                </div>
            @endif
        </div>
        @endforeach

        @if($categories->count() == 0)
        <div class="empty-message">
            <i class="fas fa-utensils"></i>
            <h3>Menü Hazırlanıyor</h3>
            <p>Şu anda menümüz güncelleniyor. Lütfen daha sonra tekrar kontrol edin.</p>
        </div>
        @endif
    </div>

    <!-- Floating Category Menu Button -->
    <button class="floating-menu-btn" onclick="toggleSideMenu()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Side Menu Overlay -->
    <div class="side-menu-overlay" id="sideMenuOverlay" onclick="closeSideMenu()"></div>

    <!-- Side Menu -->
    <div class="side-menu" id="sideMenu">
        <div class="side-menu-header">
            <button class="side-menu-close" onclick="closeSideMenu()">
                <i class="fas fa-times"></i>
            </button>
            <h3>
                <i class="fas fa-utensils"></i>
                Kategoriler
            </h3>
        </div>
        <div class="side-menu-categories">
            @foreach($categories as $category)
                <a href="#category-{{ $category->id }}" class="side-menu-category" onclick="scrollToCategory('category-{{ $category->id }}')">
                    <div class="side-menu-category-info">
                        @if($category->icon)
                            <i class="{{ $category->icon }}"></i>
                        @endif
                        <span>{{ $category->name }}</span>
                        @if($category->children->count() > 0)
                            <small style="opacity: 0.7; margin-left: 5px;">({{ $category->children->count() }} alt)</small>
                        @endif
                    </div>
                    <span class="side-menu-category-count">{{ $category->menuItems->count() }}</span>
                </a>
                
                {{-- Alt kategoriler --}}
                @foreach($category->children as $subCategory)
                    <a href="#category-{{ $subCategory->id }}" class="side-menu-category" onclick="scrollToCategory('category-{{ $subCategory->id }}')" style="padding-left: 3rem; background: rgba(0,0,0,0.05); border-left: 3px solid var(--primary-color);">
                        <div class="side-menu-category-info">
                            @if($subCategory->icon)
                                <i class="{{ $subCategory->icon }}" style="opacity: 0.8;"></i>
                            @endif
                            <span style="font-size: 0.9rem;">{{ $subCategory->name }}</span>
                        </div>
                        <span class="side-menu-category-count">{{ $subCategory->menuItems->count() }}</span>
                    </a>
                @endforeach
            @endforeach
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 {{ $qrMenu->name }} - Dijital Menü</p>
        <p><small>Hatay İmar Sanayi A.Ş. tarafından desteklenmektedir.</small></p>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-body">
                <div class="modal-image-container" onclick="openFullscreen(document.getElementById('modalImage').src)">
                    <img id="modalImage" src="" alt="Ürün Görseli">
                </div>
                <div class="modal-info">
                    <h3 id="modalTitle"></h3>
                    <p id="modalDescription"></p>
                    
                    <!-- Hazırlanma Süresi -->
                    <div class="modal-section" id="preparationTimeSection" style="display: none;">
                        <h4><i class="fas fa-clock"></i> Hazırlanma Süresi</h4>
                        <span id="modalPreparationTime" class="preparation-time"></span>
                    </div>
                    
                    <!-- İçerikler -->
                    <div class="modal-section" id="ingredientsSection" style="display: none;">
                        <h4><i class="fas fa-list"></i> İçerikler</h4>
                        <div id="modalIngredients" class="ingredients-list"></div>
                    </div>
                    
                    <!-- Alerjenler -->
                    <div class="modal-section" id="allergensSection" style="display: none;">
                        <h4><i class="fas fa-exclamation-triangle"></i> Alerjenler</h4>
                        <div id="modalAllergens" class="allergens-list"></div>
                    </div>
                    
                    <div class="modal-gallery" id="modalGallery">
                        <!-- Gallery thumbnails will be populated here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fullscreen Image Modal -->
    <div id="fullscreenModal" class="fullscreen-modal">
        <span class="fullscreen-close" onclick="closeFullscreen()">&times;</span>
        <img id="fullscreenImage" class="fullscreen-image" src="" alt="Tam Ekran Görsel">
    </div>

    <script>
        // Menu items data (ana kategoriler + alt kategoriler)
        const menuItems = {
            @foreach(collect($recommendedItems)->merge($categories->pluck('menuItems')->flatten())->merge($categories->pluck('children')->flatten()->pluck('menuItems')->flatten()) as $item)
                {{ $item->id }}: {
                    name: '{{ addslashes($item->name) }}',
                    description: '{{ addslashes($item->description) }}',
                    price: '{{ $item->formatted_price }}',
                    has_sizes: {{ $item->has_sizes ? 'true' : 'false' }},
                    sizes: @json($item->formatted_sizes),
                    price_range: '{{ $item->formatted_price_range }}',
                    image_url: '{{ $item->image_url }}',
                    main_image_url: '{{ $item->main_image_url }}',
                    gallery_urls: @json($item->gallery_urls ?? []),
                    preparation_time: '{{ $item->preparation_time }}',
                    allergens: @json($item->allergens ?? []),
                    ingredients: @json($item->ingredients ?? []),
                    category_name: '{{ $item->category->name ?? '' }}',
                    parent_category_name: '{{ $item->category->parent->name ?? '' }}'
                },
            @endforeach
        };

        // Open item modal
        function openItemModal(itemId) {
            const item = menuItems[itemId];
            if (!item) return;

            // Set modal content
            document.getElementById('modalTitle').textContent = item.name;
            document.getElementById('modalDescription').textContent = item.description;
            
            // Fiyat bilgileri artık ana sayfada gösteriliyor, modal'da göstermiyoruz
            
            // Set main image
            const modalImage = document.getElementById('modalImage');
            modalImage.src = item.main_image_url || '{{ asset('assets/images/demo.png') }}';
            modalImage.style.display = 'block';

            // Set preparation time
            const preparationTimeSection = document.getElementById('preparationTimeSection');
            const modalPreparationTime = document.getElementById('modalPreparationTime');
            if (item.preparation_time) {
                modalPreparationTime.textContent = item.preparation_time;
                preparationTimeSection.style.display = 'block';
            } else {
                preparationTimeSection.style.display = 'none';
            }

            // Set ingredients
            const ingredientsSection = document.getElementById('ingredientsSection');
            const modalIngredients = document.getElementById('modalIngredients');
            if (item.ingredients && item.ingredients.length > 0) {
                let ingredientsHTML = '';
                item.ingredients.forEach(ingredient => {
                    ingredientsHTML += `<span class="ingredient-tag">${ingredient}</span>`;
                });
                modalIngredients.innerHTML = ingredientsHTML;
                ingredientsSection.style.display = 'block';
            } else {
                ingredientsSection.style.display = 'none';
            }

            // Set allergens
            const allergensSection = document.getElementById('allergensSection');
            const modalAllergens = document.getElementById('modalAllergens');
            if (item.allergens && item.allergens.length > 0) {
                let allergensHTML = '';
                item.allergens.forEach(allergen => {
                    allergensHTML += `<span class="allergen-tag">${allergen}</span>`;
                });
                modalAllergens.innerHTML = allergensHTML;
                allergensSection.style.display = 'block';
            } else {
                allergensSection.style.display = 'none';
            }

            // Set gallery
            const modalGallery = document.getElementById('modalGallery');
            console.log('Gallery URLs:', item.gallery_urls); // Debug için
            
            if (item.gallery_urls && item.gallery_urls.length > 0) {
                let galleryHTML = '';
                item.gallery_urls.forEach((url, index) => {
                    // Galeri resmi yoksa demo resim kullan
                    const galleryImageUrl = url || '{{ asset('assets/images/demo.png') }}';
                    galleryHTML += `<img src="${galleryImageUrl}" alt="Galeri ${index + 1}" ${index === 0 ? 'class="active"' : ''} onclick="changeModalImage('${galleryImageUrl}', this)">`;
                });
                modalGallery.innerHTML = galleryHTML;
                modalGallery.style.display = 'flex';
                console.log('Gallery HTML:', galleryHTML); // Debug için
            } else {
                modalGallery.style.display = 'none';
                console.log('No gallery images'); // Debug için
            }

            // Show modal
            document.getElementById('imageModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.width = '100%';
        }

        // Change modal image
        function changeModalImage(imageUrl, thumbnail) {
            document.getElementById('modalImage').src = imageUrl;
            
            // Update active thumbnail
            document.querySelectorAll('.modal-gallery img').forEach(img => img.classList.remove('active'));
            thumbnail.classList.add('active');
        }

        // Close modal
        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            document.body.style.position = 'static';
            document.body.style.width = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Prevent modal close when clicking inside modal content
        document.querySelector('.modal-content').addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // Prevent modal close on touch/scroll events inside modal
        document.querySelector('.modal-content').addEventListener('touchstart', function(e) {
            e.stopPropagation();
        });

        document.querySelector('.modal-content').addEventListener('touchmove', function(e) {
            e.stopPropagation();
        });

        document.querySelector('.modal-content').addEventListener('touchend', function(e) {
            e.stopPropagation();
        });

        // Fullscreen image functions
        function openFullscreen(imageSrc) {
            const fullscreenModal = document.getElementById('fullscreenModal');
            const fullscreenImage = document.getElementById('fullscreenImage');
            
            fullscreenImage.src = imageSrc;
            fullscreenModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeFullscreen() {
            const fullscreenModal = document.getElementById('fullscreenModal');
            fullscreenModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close fullscreen when clicking outside
        document.getElementById('fullscreenModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeFullscreen();
            }
        });

        // Escape key to close fullscreen
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeFullscreen();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Touch handling for mobile
        let touchStartY = 0;
        let touchEndY = 0;

        document.getElementById('imageModal').addEventListener('touchstart', function(e) {
            touchStartY = e.changedTouches[0].screenY;
        });

        document.getElementById('imageModal').addEventListener('touchend', function(e) {
            touchEndY = e.changedTouches[0].screenY;
            if (touchStartY - touchEndY > 50) {
                // Swipe up - do nothing
            } else if (touchEndY - touchStartY > 50) {
                // Swipe down - close modal
                closeModal();
            }
        });

        // Smooth scroll for category navigation
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    // Header ve categories nav yüksekliğini hesapla
                    const header = document.querySelector('.header');
                    const categoriesNav = document.querySelector('.categories-nav');
                    const headerHeight = header ? header.offsetHeight : 80;
                    const categoriesHeight = categoriesNav ? categoriesNav.offsetHeight : 60;
                    const totalOffset = headerHeight + categoriesHeight + 10;
                    
                    const elementPosition = targetElement.offsetTop;
                    const offsetPosition = elementPosition - totalOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                }

                // Manuel aktif durumu ayarla
                const categoryId = targetId.replace('#', '');
                lastActiveCategory = categoryId;
                
                // Update active button
                document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Auto-update active category on scroll - REAL TIME
        let lastActiveCategory = '';
        
        function updateActiveCategory() {
            const categories = document.querySelectorAll('.category-section');
            const buttons = document.querySelectorAll('.category-btn');
            
            // Header ve categories nav yüksekliğini hesapla
            const header = document.querySelector('.header');
            const categoriesNav = document.querySelector('.categories-nav');
            const headerHeight = header ? header.offsetHeight : 80;
            const categoriesHeight = categoriesNav ? categoriesNav.offsetHeight : 60;
            const offset = headerHeight + categoriesHeight + 20; // 20px buffer
            
            let current = '';
            
            // Hangi kategori şu anda görünür alanda en üstte
            categories.forEach(category => {
                const rect = category.getBoundingClientRect();
                
                // Kategori viewport'un üst kısmında görünüyorsa
                if (rect.top <= offset && rect.bottom > offset) {
                    current = category.getAttribute('id');
                }
            });
            
            // Eğer hiçbir kategori bulunamadıysa, en yakın olanı bul
            if (!current) {
                let closestCategory = null;
                let closestDistance = Infinity;
                
                categories.forEach(category => {
                    const rect = category.getBoundingClientRect();
                    const distance = Math.abs(rect.top - offset);
                    
                    if (distance < closestDistance) {
                        closestDistance = distance;
                        closestCategory = category;
                    }
                });
                
                if (closestCategory) {
                    current = closestCategory.getAttribute('id');
                }
            }
            
            // Her zaman güncelle (throttle kaldırıldı)
            if (current && current !== lastActiveCategory) {
                lastActiveCategory = current;
                
                buttons.forEach(btn => {
                    btn.classList.remove('active');
                    if (btn.getAttribute('href') === `#${current}`) {
                        btn.classList.add('active');
                        
                        // Aktif buton gizli alandaysa scroll yap
                        scrollActiveButtonIntoView(btn);
                    }
                });
                
                console.log('Active category:', current); // Debug için
            }
        }

        // Aktif butonun görünür alanda olmasını sağla
        function scrollActiveButtonIntoView(activeButton) {
            const categoriesScroll = document.querySelector('.categories-scroll');
            if (!categoriesScroll || !activeButton) return;
            
            const containerRect = categoriesScroll.getBoundingClientRect();
            const buttonRect = activeButton.getBoundingClientRect();
            
            // Buton container'ın dışındaysa scroll yap
            if (buttonRect.left < containerRect.left) {
                // Sol tarafta gizli
                categoriesScroll.scrollLeft -= (containerRect.left - buttonRect.left + 20);
            } else if (buttonRect.right > containerRect.right) {
                // Sağ tarafta gizli
                categoriesScroll.scrollLeft += (buttonRect.right - containerRect.right + 20);
            }
        }

        // Scroll event - throttle kaldırıldı, anlık güncelleme
        window.addEventListener('scroll', updateActiveCategory);

        // Prevent zoom on double tap and pinch
        let lastTouchEnd = 0;
        document.addEventListener('touchend', function(event) {
            const now = (new Date()).getTime();
            if (now - lastTouchEnd <= 300) {
                event.preventDefault();
            }
            lastTouchEnd = now;
        }, false);

        // Prevent pinch to zoom
        document.addEventListener('gesturestart', function(e) {
            e.preventDefault();
        });

        document.addEventListener('gesturechange', function(e) {
            e.preventDefault();
        });

        document.addEventListener('gestureend', function(e) {
            e.preventDefault();
        });

        // Prevent zoom with wheel + ctrl
        document.addEventListener('wheel', function(e) {
            if (e.ctrlKey) {
                e.preventDefault();
            }
        }, { passive: false });

        // Scroll to category
        function scrollToCategory(categoryId) {
            const targetElement = document.getElementById(categoryId);
            if (targetElement) {
                const offset = window.innerWidth <= 768 ? 150 : 200;
                const elementPosition = targetElement.offsetTop;
                const offsetPosition = elementPosition - offset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth"
                });

                // Update active button in navbar
                document.querySelectorAll('.category-btn').forEach(btn => btn.classList.remove('active'));
                const targetBtn = document.querySelector(`a[href="#${categoryId}"]`);
                if (targetBtn) {
                    targetBtn.classList.add('active');
                }

                // Close side menu after scroll
                setTimeout(() => {
                    closeSideMenu();
                }, 300);
            }
        }

        // Auto-hide floating button when side menu is open
        function updateFloatingButton() {
            const floatingBtn = document.querySelector('.floating-menu-btn');
            const sideMenu = document.getElementById('sideMenu');
            
            if (sideMenu.classList.contains('active')) {
                floatingBtn.classList.add('active');
            } else {
                floatingBtn.classList.remove('active');
            }
        }

        // Search functionality
        let searchTimeout;
        const searchInput = document.getElementById('searchInput');
        const searchClear = document.getElementById('searchClear');
        const searchResults = document.getElementById('searchResults');
        const searchResultsGrid = document.getElementById('searchResultsGrid');
        const searchResultsCount = document.getElementById('searchResultsCount');
        const noResults = document.getElementById('noResults');
        const mainContent = document.getElementById('mainContent');

        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            if (query.length === 0) {
                clearSearch();
                return;
            }

            // Show clear button
            searchClear.style.display = 'flex';

            // Debounce search
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });

        searchClear.addEventListener('click', function() {
            clearSearch();
        });

        function clearSearch() {
            searchInput.value = '';
            searchClear.style.display = 'none';
            searchResults.classList.remove('active');
            mainContent.style.display = 'block';
        }

        function performSearch(query) {
            const results = [];
            const queryLower = query.toLowerCase();

            // Search through all menu items (ana kategoriler + alt kategoriler)
            Object.keys(menuItems).forEach(itemId => {
                const item = menuItems[itemId];
                const nameMatch = item.name.toLowerCase().includes(queryLower);
                const descMatch = item.description.toLowerCase().includes(queryLower);
                const categoryMatch = item.category_name.toLowerCase().includes(queryLower);
                const parentCategoryMatch = item.parent_category_name && item.parent_category_name.toLowerCase().includes(queryLower);
                const ingredientsMatch = item.ingredients && item.ingredients.some(ing => 
                    ing.toLowerCase().includes(queryLower)
                );

                if (nameMatch || descMatch || categoryMatch || parentCategoryMatch || ingredientsMatch) {
                    results.push({
                        id: itemId,
                        ...item,
                        relevance: calculateRelevance(item, queryLower)
                    });
                }
            });

            // Sort by relevance
            results.sort((a, b) => b.relevance - a.relevance);

            displaySearchResults(results, query);
        }

        function calculateRelevance(item, query) {
            let score = 0;
            const nameLower = item.name.toLowerCase();
            const descLower = item.description.toLowerCase();
            const categoryLower = item.category_name.toLowerCase();
            const parentCategoryLower = item.parent_category_name ? item.parent_category_name.toLowerCase() : '';

            // Exact name match gets highest score
            if (nameLower === query) score += 100;
            else if (nameLower.startsWith(query)) score += 50;
            else if (nameLower.includes(query)) score += 25;

            // Description matches
            if (descLower.includes(query)) score += 10;

            // Category matches (alt kategori eşleşmeleri daha yüksek skor)
            if (categoryLower === query) score += 30;
            else if (categoryLower.includes(query)) score += 15;

            // Parent category matches
            if (parentCategoryLower === query) score += 20;
            else if (parentCategoryLower.includes(query)) score += 10;

            // Ingredients matches
            if (item.ingredients) {
                item.ingredients.forEach(ing => {
                    if (ing.toLowerCase().includes(query)) score += 5;
                });
            }

            return score;
        }

        function displaySearchResults(results, query) {
            // Show search results, hide main content
            searchResults.classList.add('active');
            mainContent.style.display = 'none';

            // Update results count
            searchResultsCount.textContent = `${results.length} sonuç bulundu`;

            if (results.length === 0) {
                searchResultsGrid.style.display = 'none';
                noResults.style.display = 'block';
                return;
            }

            // Hide no results, show grid
            noResults.style.display = 'none';
            searchResultsGrid.style.display = 'grid';

            // Generate results HTML
            let resultsHTML = '';
            results.forEach(item => {
                const highlightedName = highlightText(item.name, query);
                const highlightedDesc = highlightText(item.description, query);

                resultsHTML += `
                    <div class="item-card ${item.is_recommended ? 'recommended' : ''}" onclick="openItemModal(${item.id})">
                        ${item.is_recommended ? '<div class="recommended-badge">ÖNERİLEN</div>' : ''}
                        
                        <div class="item-image">
                            <img src="${item.main_image_url || '{{ asset('assets/images/demo.png') }}'}" alt="${item.name}" loading="lazy">
                            ${item.gallery_urls && item.gallery_urls.length > 1 ? `
                                <div class="gallery-indicator">
                                    <i class="fas fa-images"></i>
                                    ${item.gallery_urls.length}
                                </div>
                            ` : ''}
                        </div>
                        
                        <div class="item-header">
                            <div>
                                <h3 class="item-name">${highlightedName}</h3>
                                ${item.description ? `<p class="item-description">${highlightedDesc}</p>` : ''}
                            </div>
                            ${item.has_sizes ? `<div class="item-price">${item.sizes.map(size => `<div class="size-item"><span class="size-name">${size.name}</span><span class="size-price">${size.price}₺</span></div>`).join('')}</div>` : (item.price ? `<div class="item-price">${item.price}</div>` : '')}
                        </div>
                        
                        ${item.preparation_time || item.allergens || item.ingredients ? `
                            <div class="item-meta">
                                ${item.preparation_time ? `
                                    <span class="meta-tag time">
                                        <i class="fas fa-clock"></i> ${item.preparation_time}
                                    </span>
                                ` : ''}
                                ${item.allergens ? item.allergens.map(allergen => `
                                    <span class="meta-tag allergen">
                                        <i class="fas fa-exclamation-triangle"></i> ${allergen}
                                    </span>
                                `).join('') : ''}
                                ${item.ingredients && item.ingredients.length <= 3 ? item.ingredients.map(ingredient => 
                                    `<span class="meta-tag">${highlightText(ingredient, query)}</span>`
                                ).join('') : ''}
                            </div>
                        ` : ''}
                    </div>
                `;
            });

            searchResultsGrid.innerHTML = resultsHTML;
        }

        function highlightText(text, query) {
            if (!text || !query) return text;
            
            const regex = new RegExp(`(${query})`, 'gi');
            return text.replace(regex, '<span class="search-highlight">$1</span>');
        }

        // Update floating button on side menu toggle
        function toggleSideMenu() {
            const sideMenuOverlay = document.getElementById('sideMenuOverlay');
            const sideMenu = document.getElementById('sideMenu');
            
            if (sideMenuOverlay.classList.contains('active')) {
                sideMenuOverlay.classList.remove('active');
                sideMenu.classList.remove('active');
            } else {
                sideMenuOverlay.classList.add('active');
                sideMenu.classList.add('active');
            }
            updateFloatingButton();
        }

        // Close side menu
        // Normal click handler - open modal
        function openItemModal(itemId) {
            const item = menuItems[itemId];
            if (!item) return;

            // Set modal content
            document.getElementById('modalTitle').textContent = item.name;
            document.getElementById('modalDescription').textContent = item.description;
            
            // Set main image
            const modalImage = document.getElementById('modalImage');
            modalImage.src = item.main_image_url || '{{ asset('assets/images/demo.png') }}';
            modalImage.style.display = 'block';

            // Set preparation time
            const preparationTimeSection = document.getElementById('preparationTimeSection');
            const modalPreparationTime = document.getElementById('modalPreparationTime');
            if (item.preparation_time) {
                modalPreparationTime.textContent = item.preparation_time;
                preparationTimeSection.style.display = 'block';
            } else {
                preparationTimeSection.style.display = 'none';
            }

            // Set ingredients
            const ingredientsSection = document.getElementById('ingredientsSection');
            const modalIngredients = document.getElementById('modalIngredients');
            if (item.ingredients && item.ingredients.length > 0) {
                let ingredientsHTML = '';
                item.ingredients.forEach(ingredient => {
                    ingredientsHTML += `<span class="ingredient-tag">${ingredient}</span>`;
                });
                modalIngredients.innerHTML = ingredientsHTML;
                ingredientsSection.style.display = 'block';
            } else {
                ingredientsSection.style.display = 'none';
            }

            // Set allergens
            const allergensSection = document.getElementById('allergensSection');
            const modalAllergens = document.getElementById('modalAllergens');
            if (item.allergens && item.allergens.length > 0) {
                let allergensHTML = '';
                item.allergens.forEach(allergen => {
                    allergensHTML += `<span class="allergen-tag">${allergen}</span>`;
                });
                modalAllergens.innerHTML = allergensHTML;
                allergensSection.style.display = 'block';
            } else {
                allergensSection.style.display = 'none';
            }

            // Handle gallery
            const modalGallery = document.getElementById('modalGallery');
            if (item.gallery_urls && item.gallery_urls.length > 1) {
                let galleryHTML = '';
                item.gallery_urls.forEach((imageUrl, index) => {
                    const activeClass = index === 0 ? 'active' : '';
                    galleryHTML += `<img src="${imageUrl}" alt="Galeri Resmi ${index + 1}" class="${activeClass}" onclick="changeModalImage('${imageUrl}', this)">`;
                });
                modalGallery.innerHTML = galleryHTML;
                modalGallery.style.display = 'flex';
            } else {
                modalGallery.style.display = 'none';
            }

            // Show modal
            document.getElementById('imageModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        // Toggle search functionality
        function toggleSearch() {
            const searchContainer = document.getElementById('searchContainer');
            const searchToggleBtn = document.getElementById('searchToggleBtn');
            const searchInput = document.getElementById('searchInput');
            
            if (searchContainer.style.display === 'none' || searchContainer.style.display === '') {
                searchContainer.style.display = 'block';
                searchContainer.style.animation = 'slideDown 0.3s ease';
                searchToggleBtn.classList.add('active');
                searchToggleBtn.innerHTML = '<i class="fas fa-times"></i>';
                setTimeout(() => searchInput.focus(), 300);
            } else {
                searchContainer.style.animation = 'slideUp 0.3s ease';
                setTimeout(() => {
                    searchContainer.style.display = 'none';
                    clearSearch();
                }, 300);
                searchToggleBtn.classList.remove('active');
                searchToggleBtn.innerHTML = '<i class="fas fa-search"></i>';
            }
        }

        function closeSideMenu() {
            const sideMenuOverlay = document.getElementById('sideMenuOverlay');
            const sideMenu = document.getElementById('sideMenu');
            sideMenuOverlay.classList.remove('active');
            sideMenu.classList.remove('active');
            updateFloatingButton();
        }

        // Scroll Reveal Functionality
        function initScrollReveal() {
            const revealElements = document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right');
            
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            revealElements.forEach(element => {
                revealObserver.observe(element);
            });
        }

        // Initialize scroll reveal when page loads
        window.addEventListener('DOMContentLoaded', function() {
            // Add reveal classes to elements
            document.querySelectorAll('.category-section').forEach((section, index) => {
                section.classList.add(index % 2 === 0 ? 'scroll-reveal-left' : 'scroll-reveal-right');
            });

            document.querySelectorAll('.item-card').forEach((card, index) => {
                card.classList.add('scroll-reveal');
                card.style.setProperty('--index', index % 6);
                card.classList.add('stagger-item');
            });

            document.querySelectorAll('.category-title').forEach(title => {
                title.classList.add('scroll-reveal');
            });

            // Initialize the scroll reveal
            initScrollReveal();
            
            // İlk kategoriyi aktif yap
            setTimeout(() => {
                updateActiveCategory();
            }, 100);
        });
    </script>
</body>
</html> 