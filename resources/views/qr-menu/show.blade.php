<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem 1rem;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
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
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .header-logo {
            height: 60px;
            width: auto;
            border-radius: 8px;
            filter: drop-shadow(0 2px 8px rgba(0,0,0,0.2));
        }

        .header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .header p {
            opacity: 0.9;
            font-size: 1rem;
        }

        /* Search Box Styles */
        .search-container {
            margin-top: 1rem;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-box {
            position: relative;
            display: flex;
            align-items: center;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.2);
            border-radius: 25px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .search-box:hover,
        .search-box:focus-within {
            background: rgba(255,255,255,0.25);
            border-color: rgba(255,255,255,0.4);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .search-icon {
            color: rgba(255,255,255,0.8);
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        #searchInput {
            flex: 1;
            background: transparent;
            border: none;
            outline: none;
            color: white;
            font-size: 1rem;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }

        #searchInput::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .search-clear {
            background: rgba(255,255,255,0.2);
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            margin-left: 0.5rem;
            transition: all 0.3s ease;
        }

        .search-clear:hover {
            background: rgba(255,255,255,0.3);
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
        }

        /* Categories Navigation */
        .categories-nav {
            background: white;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 75px;
            z-index: 99;
        }

        .categories-scroll {
            display: flex;
            gap: 0.75rem;
            overflow-x: auto;
            padding: 0 1rem;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .categories-scroll::-webkit-scrollbar {
            display: none;
        }

        .category-btn {
            background: var(--light-gray);
            border: 2px solid transparent;
            color: var(--text-color);
            padding: 0.75rem 1.25rem;
            border-radius: 25px;
            text-decoration: none;
            white-space: nowrap;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-width: fit-content;
            font-size: 0.9rem;
        }

        .category-btn:hover,
        .category-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
            transform: translateY(-2px);
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

        /* Items Grid */
        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
            padding: 0 1rem;
        }

        /* Item Card */
        .item-card {
            background: white;
            border-radius: 15px;
            padding: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid var(--border-color);
            position: relative;
        }

        .item-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            cursor: pointer;
        }

        .item-card:active {
            transform: translateY(-1px);
        }

        /* Item Image */
        .item-image {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 1rem;
            height: 180px;
            background: var(--light-gray);
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
            margin-bottom: 1rem;
            gap: 1rem;
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
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            white-space: nowrap;
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
            margin-top: 1rem;
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
            top: -5px;
            right: -5px;
            background: var(--danger-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 600;
            z-index: 10;
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
            background-color: rgba(0,0,0,0.8);
            backdrop-filter: blur(10px);
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .modal-content {
            background: white;
            padding: 0;
            border-radius: 15px;
            max-width: 90%;
            max-height: 90%;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            animation: modalOpen 0.3s ease;
        }

        @keyframes modalOpen {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
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
            height: 300px; /* Sabit yükseklik */
            overflow: hidden;
            border-radius: 15px 15px 0 0;
        }

        .modal-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .modal-info {
            padding: 1.5rem;
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

        .modal-gallery {
            display: flex;
            gap: 0.5rem;
            padding: 0 1.5rem 1.5rem;
            overflow-x: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .modal-gallery::-webkit-scrollbar {
            display: none;
        }

        .modal-gallery img {
            width: 60px;
            height: 60px; /* Sabit yükseklik */
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            flex-shrink: 0;
        }

        .modal-gallery img:hover {
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

        .modal-gallery img.active {
            border-color: var(--primary-color);
            transform: scale(1.1);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .header {
                padding: 1rem 0.5rem;
                position: relative; /* Sticky kaldır */
            }

            .header h1 {
                font-size: 1.4rem;
            }

            .header-top {
                flex-direction: column;
                gap: 0.5rem;
                margin-bottom: 0.5rem;
            }

            .header-logo {
                height: 50px;
            }

            .categories-nav {
                position: relative;
                top: 0;
                padding: 0.75rem 0;
            }

            .categories-scroll {
                padding: 0 0.5rem;
                gap: 0.5rem;
            }

            .category-btn {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
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
                padding: 0.8rem;
            }

            .item-image {
                height: 160px;
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
                height: 250px; /* Mobilde daha düşük */
            }

            .modal-info {
                padding: 1rem;
            }

            .modal-info h3 {
                font-size: 1.2rem;
            }

            .modal-gallery {
                padding: 0 1rem 1rem;
                gap: 0.3rem;
            }

            .modal-gallery img {
                width: 50px;
                height: 50px;
            }

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
                height: 140px;
            }

            .modal-image-container {
                height: 200px; /* Çok küçük ekranlarda daha düşük */
            }

            .modal-gallery img {
                width: 45px;
                height: 45px;
            }

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
            
            <!-- Search Box -->
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="searchInput" placeholder="Ürün ara..." autocomplete="off">
                    <button class="search-clear" id="searchClear" style="display: none;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Navigation -->
    @if($categories->count() > 1 || $categories->pluck('children')->flatten()->count() > 0)
    <div class="categories-nav">
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
    </div>
    @endif

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
                    <div class="item-card recommended" onclick="openItemModal({{ $item->id }})">
                        <div class="recommended-badge">ÖNERİLEN</div>
                        
                        @if($item->main_image_url)
                            <div class="item-image">
                                <img src="{{ $item->main_image_url }}" alt="{{ $item->name }}" loading="lazy">
                                @if($item->gallery_urls && count($item->gallery_urls) > 1)
                                    <div class="gallery-indicator">
                                        <i class="fas fa-images"></i>
                                        {{ count($item->gallery_urls) }}
                                    </div>
                                @endif
                            </div>
                        @endif
                        
                        <div class="item-header">
                            <div>
                                <h3 class="item-name">{{ $item->name }}</h3>
                                @if($item->description)
                                    <p class="item-description">{!! $item->description !!}</p>
                                @endif
                            </div>
                            @if($item->price)
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
                            
                            @if($item->main_image_url)
                                <div class="item-image">
                                    <img src="{{ $item->main_image_url }}" alt="{{ $item->name }}" loading="lazy">
                                    @if($item->gallery_urls && count($item->gallery_urls) > 1)
                                        <div class="gallery-indicator">
                                            <i class="fas fa-images"></i>
                                            {{ count($item->gallery_urls) }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                            
                            <div class="item-header">
                                <div>
                                    <h3 class="item-name">{{ $item->name }}</h3>
                                    @if($item->description)
                                        <p class="item-description">{!! $item->description !!}</p>
                                    @endif
                                </div>
                                @if($item->price)
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
                            
                            @if($item->main_image_url)
                                <div class="item-image">
                                    <img src="{{ $item->main_image_url }}" alt="{{ $item->name }}" loading="lazy">
                                    @if($item->gallery_urls && count($item->gallery_urls) > 1)
                                        <div class="gallery-indicator">
                                            <i class="fas fa-images"></i>
                                            {{ count($item->gallery_urls) }}
                                        </div>
                                    @endif
                                </div>
                            @endif
                            
                            <div class="item-header">
                                <div>
                                    <h3 class="item-name">{{ $item->name }}</h3>
                                    @if($item->description)
                                        <p class="item-description">{!! $item->description !!}</p>
                                    @endif
                                </div>
                                @if($item->price)
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
                <div class="modal-image-container">
                    <img id="modalImage" src="" alt="Ürün Görseli">
                </div>
                <div class="modal-info">
                    <h3 id="modalTitle"></h3>
                    <p id="modalDescription"></p>
                    <div id="modalPrice"></div>
                    <div id="modalMeta"></div>
                </div>
            </div>
            <div class="modal-gallery" id="modalGallery">
                <!-- Gallery thumbnails will be populated here -->
            </div>
        </div>
    </div>

    <script>
        // Menu items data (ana kategoriler + alt kategoriler)
        const menuItems = {
            @foreach(collect($recommendedItems)->merge($categories->pluck('menuItems')->flatten())->merge($categories->pluck('children')->flatten()->pluck('menuItems')->flatten()) as $item)
                {{ $item->id }}: {
                    name: '{{ addslashes($item->name) }}',
                    description: '{{ addslashes($item->description) }}',
                    price: '{{ $item->formatted_price }}',
                    image_url: '{{ $item->image_url }}',
                    main_image_url: '{{ $item->main_image_url }}',
                    gallery_urls: @json($item->gallery_urls),
                    preparation_time: '{{ $item->preparation_time }}',
                    allergens: @json($item->allergens),
                    ingredients: @json($item->ingredients),
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
            document.getElementById('modalPrice').innerHTML = item.price ? `<strong>${item.price}</strong>` : '';
            
            // Set main image
            const modalImage = document.getElementById('modalImage');
            if (item.main_image_url) {
                modalImage.src = item.main_image_url;
                modalImage.style.display = 'block';
            } else {
                modalImage.style.display = 'none';
            }

            // Set meta information
            let metaHTML = '';
            if (item.preparation_time) {
                metaHTML += `<span class="meta-tag time"><i class="fas fa-clock"></i> ${item.preparation_time}</span>`;
            }
            if (item.allergens && item.allergens.length > 0) {
                item.allergens.forEach(allergen => {
                    metaHTML += `<span class="meta-tag allergen"><i class="fas fa-exclamation-triangle"></i> ${allergen}</span>`;
                });
            }
            if (item.ingredients && item.ingredients.length > 0) {
                item.ingredients.forEach(ingredient => {
                    metaHTML += `<span class="meta-tag">${ingredient}</span>`;
                });
            }
            document.getElementById('modalMeta').innerHTML = metaHTML;

            // Set gallery
            const modalGallery = document.getElementById('modalGallery');
            if (item.gallery_urls && item.gallery_urls.length > 1) {
                let galleryHTML = '';
                item.gallery_urls.forEach((url, index) => {
                    galleryHTML += `<img src="${url}" alt="Galeri ${index + 1}" ${index === 0 ? 'class="active"' : ''} onclick="changeModalImage('${url}', this)">`;
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
        }

        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
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
                    const offset = window.innerWidth <= 768 ? 50 : 200;
                    const elementPosition = targetElement.offsetTop;
                    const offsetPosition = elementPosition - offset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                }

                // Update active button
                document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Auto-update active category on scroll
        window.addEventListener('scroll', function() {
            const categories = document.querySelectorAll('.category-section');
            const buttons = document.querySelectorAll('.category-btn');
            
            let current = '';
            categories.forEach(category => {
                const rect = category.getBoundingClientRect();
                if (rect.top <= 250) {
                    current = category.getAttribute('id');
                }
            });

            buttons.forEach(btn => {
                btn.classList.remove('active');
                if (btn.getAttribute('href') === `#${current}`) {
                    btn.classList.add('active');
                }
            });
        });

        // Prevent zoom on double tap
        let lastTouchEnd = 0;
        document.addEventListener('touchend', function(event) {
            const now = (new Date()).getTime();
            if (now - lastTouchEnd <= 300) {
                event.preventDefault();
            }
            lastTouchEnd = now;
        }, false);

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
                        
                        ${item.main_image_url ? `
                            <div class="item-image">
                                <img src="${item.main_image_url}" alt="${item.name}" loading="lazy">
                                ${item.gallery_urls && item.gallery_urls.length > 1 ? `
                                    <div class="gallery-indicator">
                                        <i class="fas fa-images"></i>
                                        ${item.gallery_urls.length}
                                    </div>
                                ` : ''}
                            </div>
                        ` : ''}
                        
                        <div class="item-header">
                            <div>
                                <h3 class="item-name">${highlightedName}</h3>
                                ${item.description ? `<p class="item-description">${highlightedDesc}</p>` : ''}
                            </div>
                            ${item.price ? `<div class="item-price">${item.price}</div>` : ''}
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
        function closeSideMenu() {
            const sideMenuOverlay = document.getElementById('sideMenuOverlay');
            const sideMenu = document.getElementById('sideMenu');
            sideMenuOverlay.classList.remove('active');
            sideMenu.classList.remove('active');
            updateFloatingButton();
        }
    </script>
</body>
</html> 