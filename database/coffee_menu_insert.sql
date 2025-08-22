-- Coffee Menu SQL Insert Script
-- Bu dosya QR menü sistemine kahve menüsü eklemek için kullanılır
-- Önce kategorileri ekle, sonra ürünleri ekle

-- =====================================================
-- 1. KATEGORİLERİ EKLE
-- =====================================================

-- Sıcak Kahveler Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Sıcak Kahveler', 'Sıcak kahve çeşitleri', '☕', 1, 1, NOW(), NOW());

-- Soğuk Kahveler Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Soğuk Kahveler', 'Soğuk kahve çeşitleri', '🧊', 2, 1, NOW(), NOW());

-- 3. Nesil Filtre Kahveler Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, '3. Nesil Filtre Kahveler', 'Filtre kahve çeşitleri', '☕', 3, 1, NOW(), NOW());

-- Sıcak Çikolata Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Sıcak Çikolata Çeşitleri', 'Sıcak çikolata çeşitleri', '🍫', 4, 1, NOW(), NOW());

-- Milkshake Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Milkshake Çeşitleri', 'Milkshake çeşitleri', '🥤', 5, 1, NOW(), NOW());

-- Frozen Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Frozen Çeşitleri', 'Frozen çeşitleri', '🍧', 6, 1, NOW(), NOW());

-- Extralar Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Extralar', 'Ekstra malzemeler', '➕', 7, 1, NOW(), NOW());

-- Meyve Kokteylleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Meyve Kokteylleri', 'Meyve kokteylleri', '🍹', 8, 1, NOW(), NOW());

-- Vitamin Bar Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Vitamin Bar', 'Sağlıklı içecekler', '🥤', 9, 1, NOW(), NOW());

-- Sıcak İçecekler Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Sıcak İçecekler', 'Sıcak içecek çeşitleri', '🫖', 10, 1, NOW(), NOW());

-- Soğuk İçecekler Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Soğuk İçecekler', 'Soğuk içecek çeşitleri', '🥤', 11, 1, NOW(), NOW());

-- Fast Food Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Fast Food Çeşitleri', 'Hızlı yemek çeşitleri', '🍔', 12, 1, NOW(), NOW());

-- Izgara Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Izgara Çeşitleri', 'Izgara yemek çeşitleri', '🔥', 13, 1, NOW(), NOW());

-- Meze Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Meze Çeşitleri', 'Meze çeşitleri', '🥗', 14, 1, NOW(), NOW());

-- Kahvaltı Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Kahvaltı Çeşitleri', 'Kahvaltı çeşitleri', '🍳', 15, 1, NOW(), NOW());

-- Kuru Pasta Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Kuru Pasta Çeşitleri', 'Kuru pasta çeşitleri', '🥨', 16, 1, NOW(), NOW());

-- Pasta ve Tatlı Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Pasta ve Tatlı Çeşitleri', 'Pasta ve tatlı çeşitleri', '🍰', 17, 1, NOW(), NOW());

-- Künefe Çeşitleri Kategorisi
INSERT INTO menu_categories (qr_menu_id, name, description, icon, `order`, is_active, created_at, updated_at) VALUES
(8, 'Künefe Çeşitleri', 'Künefe çeşitleri', '🧀', 18, 1, NOW(), NOW());

-- =====================================================
-- 2. ÜRÜNLERİ EKLE
-- =====================================================

-- Sıcak Kahveler (Kategori ID: 1)
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(1, 'Espresso', 'Klasik espresso', NULL, '[{"name":"Küçük","price":55},{"name":"Orta","price":70},{"name":"Büyük","price":80}]', 1, 1, 1, 1, NOW(), NOW()),
(1, 'Latte', 'Sütlü kahve', NULL, '[{"name":"Küçük","price":75},{"name":"Orta","price":85},{"name":"Büyük","price":95}]', 1, 1, 2, 1, NOW(), NOW()),
(1, 'Americano', 'Sıcak su ile seyreltilmiş espresso', NULL, '[{"name":"Küçük","price":70},{"name":"Orta","price":80},{"name":"Büyük","price":90}]', 1, 1, 3, 1, NOW(), NOW()),
(1, 'Cortado', 'Espresso ve süt', NULL, '[{"name":"Küçük","price":70},{"name":"Orta","price":80},{"name":"Büyük","price":90}]', 1, 0, 4, 1, NOW(), NOW()),
(1, 'Cappuccino', 'Espresso, sıcak süt ve süt köpüğü', NULL, '[{"name":"Küçük","price":75},{"name":"Orta","price":85},{"name":"Büyük","price":95}]', 1, 1, 5, 1, NOW(), NOW()),
(1, 'Caramel Macchiato', 'Süt, vanilya şurubu ve espresso', NULL, '[{"name":"Küçük","price":80},{"name":"Orta","price":90},{"name":"Büyük","price":100}]', 1, 1, 6, 1, NOW(), NOW()),
(1, 'Mocha', 'Espresso, sıcak süt ve çikolata', NULL, '[{"name":"Küçük","price":80},{"name":"Orta","price":90},{"name":"Büyük","price":100}]', 1, 1, 7, 1, NOW(), NOW()),
(1, 'Flat White', 'Espresso ve sıcak süt', NULL, '[{"name":"Küçük","price":75},{"name":"Orta","price":85},{"name":"Büyük","price":95}]', 1, 0, 8, 1, NOW(), NOW());

-- Soğuk Kahveler (Kategori ID: 2)
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(2, 'Latte', 'Soğuk sütlü kahve', NULL, '[{"name":"Küçük","price":80},{"name":"Orta","price":90},{"name":"Büyük","price":100}]', 1, 1, 1, 1, NOW(), NOW()),
(2, 'Mocha', 'Soğuk çikolatalı kahve', NULL, '[{"name":"Küçük","price":85},{"name":"Orta","price":95},{"name":"Büyük","price":105}]', 1, 1, 2, 1, NOW(), NOW()),
(2, 'Americano', 'Soğuk americano', NULL, '[{"name":"Küçük","price":75},{"name":"Orta","price":85},{"name":"Büyük","price":95}]', 1, 0, 3, 1, NOW(), NOW()),
(2, 'Caramel Macchiato', 'Soğuk karamelli kahve', NULL, '[{"name":"Küçük","price":85},{"name":"Orta","price":95},{"name":"Büyük","price":105}]', 1, 1, 4, 1, NOW(), NOW()),
(2, 'Cappuccino', 'Soğuk cappuccino', NULL, '[{"name":"Küçük","price":80},{"name":"Orta","price":90},{"name":"Büyük","price":100}]', 1, 0, 5, 1, NOW(), NOW()),
(2, 'Flat White', 'Soğuk flat white', NULL, '[{"name":"Küçük","price":80},{"name":"Orta","price":90},{"name":"Büyük","price":100}]', 1, 0, 6, 1, NOW(), NOW());

-- 3. Nesil Filtre Kahveler (Kategori ID: 3)
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(3, 'Filtre Kahve', 'Klasik filtre kahve', NULL, '[{"name":"Küçük","price":55},{"name":"Orta","price":65},{"name":"Büyük","price":75}]', 1, 1, 1, 1, NOW(), NOW()),
(3, 'Chemex', 'Chemex ile hazırlanan filtre kahve', NULL, '[{"name":"Küçük","price":65},{"name":"Orta","price":75},{"name":"Büyük","price":85}]', 1, 1, 2, 1, NOW(), NOW()),
(3, 'V60', 'V60 ile hazırlanan filtre kahve', NULL, '[{"name":"Küçük","price":65},{"name":"Orta","price":75},{"name":"Büyük","price":85}]', 1, 1, 3, 1, NOW(), NOW());

-- Sıcak Çikolata Çeşitleri (Kategori ID: 4)
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(4, 'Klasik Sıcak Çikolata', 'Klasik sıcak çikolata', NULL, '[{"name":"Küçük","price":65},{"name":"Orta","price":75},{"name":"Büyük","price":85}]', 1, 1, 1, 1, NOW(), NOW()),
(4, 'Beyaz Sıcak Çikolata', 'Beyaz çikolata ile hazırlanan sıcak çikolata', NULL, '[{"name":"Küçük","price":65},{"name":"Orta","price":75},{"name":"Büyük","price":85}]', 1, 0, 2, 1, NOW(), NOW()),
(4, 'Çilekli Sıcak Çikolata', 'Çilek aromalı sıcak çikolata', NULL, '[{"name":"Küçük","price":70},{"name":"Orta","price":80},{"name":"Büyük","price":90}]', 1, 1, 3, 1, NOW(), NOW());

-- Milkshake Çeşitleri (Kategori ID: 5)
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(5, 'Muzlu Milkshake', 'Muzlu milkshake', NULL, '[{"name":"Küçük","price":120},{"name":"Orta","price":135},{"name":"Büyük","price":150}]', 1, 1, 1, 1, NOW(), NOW()),
(5, 'Çilekli Milkshake', 'Çilekli milkshake', NULL, '[{"name":"Küçük","price":120},{"name":"Orta","price":135},{"name":"Büyük","price":150}]', 1, 1, 2, 1, NOW(), NOW()),
(5, 'Kavunlu Milkshake', 'Kavunlu milkshake', NULL, '[{"name":"Küçük","price":120},{"name":"Orta","price":135},{"name":"Büyük","price":150}]', 1, 0, 3, 1, NOW(), NOW()),
(5, 'Lotuslu Milkshake', 'Lotus bisküvili milkshake', NULL, '[{"name":"Küçük","price":135},{"name":"Orta","price":150},{"name":"Büyük","price":165}]', 1, 1, 4, 1, NOW(), NOW()),
(5, 'Çikolatalı Milkshake', 'Çikolatalı milkshake', NULL, '[{"name":"Küçük","price":120},{"name":"Orta","price":135},{"name":"Büyük","price":150}]', 1, 1, 5, 1, NOW(), NOW()),
(5, 'Orman Meyveli Milkshake', 'Orman meyveli milkshake', NULL, '[{"name":"Küçük","price":135},{"name":"Orta","price":150},{"name":"Büyük","price":165}]', 1, 1, 6, 1, NOW(), NOW()),
(5, 'Oreolu Milkshake', 'Oreo bisküvili milkshake', NULL, '[{"name":"Küçük","price":135},{"name":"Orta","price":150},{"name":"Büyük","price":165}]', 1, 1, 7, 1, NOW(), NOW());

-- Frozen Çeşitleri (Kategori ID: 6)
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(6, 'Çilekli Frozen', 'Çilekli frozen', NULL, '[{"name":"Küçük","price":125},{"name":"Orta","price":135},{"name":"Büyük","price":145}]', 1, 1, 1, 1, NOW(), NOW()),
(6, 'Orman Meyveli Frozen', 'Orman meyveli frozen', NULL, '[{"name":"Küçük","price":130},{"name":"Orta","price":140},{"name":"Büyük","price":150}]', 1, 1, 2, 1, NOW(), NOW()),
(6, 'Mango Frozen', 'Mango frozen', NULL, '[{"name":"Küçük","price":130},{"name":"Orta","price":140},{"name":"Büyük","price":150}]', 1, 0, 3, 1, NOW(), NOW()),
(6, 'Ananas Frozen', 'Ananas frozen', NULL, '[{"name":"Küçük","price":130},{"name":"Orta","price":140},{"name":"Büyük","price":150}]', 1, 0, 4, 1, NOW(), NOW()),
(6, 'Special Frozen', 'Özel frozen karışımı', NULL, '[{"name":"Küçük","price":135},{"name":"Orta","price":145},{"name":"Büyük","price":160}]', 1, 1, 5, 1, NOW(), NOW());

-- Extralar (Kategori ID: 7) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(7, 'Espresso', 'Ekstra espresso shot', 25, NULL, 1, 0, 1, 1, NOW(), NOW()),
(7, 'Süt', 'Ekstra süt', 15, NULL, 1, 0, 2, 1, NOW(), NOW()),
(7, 'Aroma', 'Ekstra aroma', 20, NULL, 1, 0, 3, 1, NOW(), NOW()),
(7, 'Krema', 'Ekstra krema', 25, NULL, 1, 0, 4, 1, NOW(), NOW());

-- Meyve Kokteylleri (Kategori ID: 8)
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(8, 'Red Berry', 'Kırmızı meyve kokteyli', NULL, '[{"name":"Küçük","price":120},{"name":"Orta","price":130},{"name":"Büyük","price":140}]', 1, 1, 1, 1, NOW(), NOW()),
(8, 'Green Lime', 'Yeşil limon kokteyli', NULL, '[{"name":"Küçük","price":120},{"name":"Orta","price":130},{"name":"Büyük","price":140}]', 1, 0, 2, 1, NOW(), NOW()),
(8, 'Melonkil', 'Kavun ve kivi kokteyli', NULL, '[{"name":"Küçük","price":120},{"name":"Orta","price":130},{"name":"Büyük","price":140}]', 1, 1, 3, 1, NOW(), NOW());

-- Vitamin Bar (Kategori ID: 9) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(9, 'Portakal Suyu', 'Taze portakal suyu', 75, NULL, 1, 1, 1, 1, NOW(), NOW()),
(9, 'Elma Suyu', 'Taze elma suyu', 75, NULL, 1, 0, 2, 1, NOW(), NOW()),
(9, 'Havuç Suyu', 'Taze havuç suyu', 75, NULL, 1, 0, 3, 1, NOW(), NOW()),
(9, 'Taze Karışık Meyve Suyu', 'Karışık meyve suyu', 85, NULL, 1, 1, 4, 1, NOW(), NOW()),
(9, 'Limonata', 'Taze limonata', 65, NULL, 1, 1, 5, 1, NOW(), NOW()),
(9, 'Karadut', 'Karadut suyu', 75, NULL, 1, 0, 6, 1, NOW(), NOW());

-- Sıcak İçecekler (Kategori ID: 10) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(10, 'Çay (Bardak)', 'Klasik çay', 10, NULL, 1, 1, 1, 1, NOW(), NOW()),
(10, 'Türk Kahvesi (Fincan)', 'Klasik Türk kahvesi', 45, NULL, 1, 1, 2, 1, NOW(), NOW()),
(10, 'Türk Kahvesi (Süvari)', 'Süvari Türk kahvesi', 35, NULL, 1, 0, 3, 1, NOW(), NOW()),
(10, 'Türk Kahvesi (Büyük Süvari)', 'Büyük süvari Türk kahvesi', 50, NULL, 1, 0, 4, 1, NOW(), NOW()),
(10, 'Çifte Kavrulmuş Türk Kahvesi (Fincan)', 'Çifte kavrulmuş Türk kahvesi', 50, NULL, 1, 1, 5, 1, NOW(), NOW()),
(10, 'Çifte Kavrulmuş Türk Kahvesi (Süvari)', 'Çifte kavrulmuş süvari Türk kahvesi', 40, NULL, 1, 0, 6, 1, NOW(), NOW()),
(10, 'Çifte Kavrulmuş Türk Kahvesi (Büyük Süvari)', 'Çifte kavrulmuş büyük süvari Türk kahvesi', 55, NULL, 1, 0, 7, 1, NOW(), NOW()),
(10, 'Bitki Çayları', 'Çeşitli bitki çayları', 50, NULL, 1, 0, 8, 1, NOW(), NOW()),
(10, 'Sahlep', 'Klasik sahlep', 55, NULL, 1, 1, 9, 1, NOW(), NOW());

-- Soğuk İçecekler (Kategori ID: 11) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(11, 'Su 0,5 L', '0,5 litre su', 8, NULL, 1, 1, 1, 1, NOW(), NOW()),
(11, 'Su 1,5 L', '1,5 litre su', 15, NULL, 1, 0, 2, 1, NOW(), NOW()),
(11, 'Sade Soda', 'Sade soda', 20, NULL, 1, 0, 3, 1, NOW(), NOW()),
(11, 'Meyveli Soda', 'Meyveli soda', 25, NULL, 1, 1, 4, 1, NOW(), NOW()),
(11, 'Sarıyer Kola', 'Sarıyer kola', 35, NULL, 1, 1, 5, 1, NOW(), NOW()),
(11, 'Sarıyer Gazoz', 'Sarıyer gazoz', 35, NULL, 1, 0, 6, 1, NOW(), NOW()),
(11, 'Ayran', 'Taze ayran', 20, NULL, 1, 0, 7, 1, NOW(), NOW()),
(11, 'Meyve Suları (Çeşitli)', 'Çeşitli meyve suları', 35, NULL, 1, 1, 8, 1, NOW(), NOW()),
(11, 'Taze Limon Soda', 'Taze limon soda', 35, NULL, 1, 1, 9, 1, NOW(), NOW());

-- Fast Food Çeşitleri (Kategori ID: 12) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(12, 'Kaşarlı Tost', 'Kaşarlı tost', 120, NULL, 1, 1, 1, 1, NOW(), NOW()),
(12, 'Sucuklu Tost', 'Sucuklu tost', 130, NULL, 1, 1, 2, 1, NOW(), NOW()),
(12, 'Karışık Tost', 'Karışık tost', 140, NULL, 1, 1, 3, 1, NOW(), NOW()),
(12, 'Tavuk Burger', 'Tavuk burger', 140, NULL, 1, 1, 4, 1, NOW(), NOW()),
(12, 'Hamburger Menü', 'Hamburger menü', 200, NULL, 1, 1, 5, 1, NOW(), NOW()),
(12, 'Patates Cipsi', 'Patates cipsi', 120, NULL, 1, 0, 6, 1, NOW(), NOW());

-- Izgara Çeşitleri (Kategori ID: 13) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(13, 'Köfte', 'Izgara köfte', 220, NULL, 1, 1, 1, 1, NOW(), NOW()),
(13, 'Tavuk Şiş', 'Izgara tavuk şiş', 220, NULL, 1, 1, 2, 1, NOW(), NOW()),
(13, 'Karışık Şiş', 'Karışık ızgara şiş', 300, NULL, 1, 1, 3, 1, NOW(), NOW());

-- Meze Çeşitleri (Kategori ID: 14) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(14, 'Babagannuş', 'Patlıcan ezmesi', 140, NULL, 1, 1, 1, 1, NOW(), NOW()),
(14, 'Humus', 'Nohut ezmesi', 120, NULL, 1, 0, 2, 1, NOW(), NOW()),
(14, 'Cevizli Biber', 'Cevizli biber ezmesi', 120, NULL, 1, 0, 3, 1, NOW(), NOW()),
(14, 'Zeytin', 'Çeşitli zeytinler', 100, NULL, 1, 0, 4, 1, NOW(), NOW());

-- Kahvaltı Çeşitleri (Kategori ID: 15) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(15, 'Serpme Kahvaltı (Haşlanmış Yumurta)', 'Serpme kahvaltı haşlanmış yumurta ile', 340, NULL, 1, 1, 1, 1, NOW(), NOW()),
(15, 'Serpme Kahvaltı (Sade Omlet)', 'Serpme kahvaltı sade omlet ile', 360, NULL, 1, 1, 2, 1, NOW(), NOW()),
(15, 'Serpme Kahvaltı (Sucuklu Omlet)', 'Serpme kahvaltı sucuklu omlet ile', 380, NULL, 1, 1, 3, 1, NOW(), NOW()),
(15, 'Tabağlı Kahvaltı (Haşlanmış Yumurta)', 'Tabağlı kahvaltı haşlanmış yumurta ile', 230, NULL, 1, 0, 4, 1, NOW(), NOW()),
(15, 'Tabağlı Kahvaltı (Sade Omlet)', 'Tabağlı kahvaltı sade omlet ile', 250, NULL, 1, 0, 5, 1, NOW(), NOW()),
(15, 'Tabağlı Kahvaltı (Sucuklu Omlet)', 'Tabağlı kahvaltı sucuklu omlet ile', 270, NULL, 1, 0, 6, 1, NOW(), NOW());

-- Kuru Pasta Çeşitleri (Kategori ID: 16) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(16, 'Şekerli Pastacık (5 Adet)', 'Şekerli pastacık 5 adet', 120, NULL, 1, 0, 1, 1, NOW(), NOW()),
(16, 'Tuzlu Pastacık (6 Adet)', 'Tuzlu pastacık 6 adet', 140, NULL, 1, 0, 2, 1, NOW(), NOW());

-- Pasta ve Tatlı Çeşitleri (Kategori ID: 17) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(17, 'Çikolatalı Pasta', 'Çikolatalı pasta', 130, NULL, 1, 1, 1, 1, NOW(), NOW()),
(17, 'Meyveli Pasta', 'Meyveli pasta', 130, NULL, 1, 1, 2, 1, NOW(), NOW()),
(17, 'Frambuazlı Pasta', 'Frambuazlı pasta', 130, NULL, 1, 0, 3, 1, NOW(), NOW()),
(17, 'Malaga', 'Malaga pasta', 130, NULL, 1, 0, 4, 1, NOW(), NOW()),
(17, 'Tiramisu', 'Tiramisu', 130, NULL, 1, 1, 5, 1, NOW(), NOW()),
(17, 'Profiterol', 'Profiterol', 130, NULL, 1, 1, 6, 1, NOW(), NOW()),
(17, 'Supangle', 'Supangle', 130, NULL, 1, 0, 7, 1, NOW(), NOW());

-- Künefe Çeşitleri (Kategori ID: 18) - Tek fiyat
INSERT INTO menu_items (menu_category_id, name, description, price, sizes, is_available, is_recommended, `order`, is_active, created_at, updated_at) VALUES
(18, 'Künefe (Sade)', 'Sade künefe', 120, NULL, 1, 1, 1, 1, NOW(), NOW()),
(18, 'Künefe (Üstü Fıstıklı)', 'Üstü fıstıklı künefe', 150, NULL, 1, 1, 2, 1, NOW(), NOW()),
(18, 'Künefe (Dondurmalı)', 'Dondurmalı künefe', 160, NULL, 1, 1, 3, 1, NOW(), NOW());

-- =====================================================
-- NOTLAR:
-- =====================================================
-- 1. qr_menu_id = 1 olarak ayarlandı, gerekirse değiştirin
-- 2. Sizes kolonu JSON formatında boy ve fiyat bilgilerini içerir
-- 3. Tek fiyatlı ürünlerde sizes = NULL, price = fiyat
-- 4. Çoklu boyutlu ürünlerde price = NULL, sizes = JSON array
-- 5. Resimler boş bırakıldı, sonradan eklenebilir
-- 6. Tüm ürünler aktif ve mevcut olarak ayarlandı
-- 7. Önerilen ürünler is_recommended = 1 olarak işaretlendi
