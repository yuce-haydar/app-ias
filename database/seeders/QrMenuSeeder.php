<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Facility, QrMenu, MenuCategory, MenuItem, QrMenuUser};
use Illuminate\Support\Facades\Hash;

class QrMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // İlk tesisi bul
        $facility = Facility::first();
        
        if (!$facility) {
            $this->command->info('Test için tesis bulunamadı. Önce tesis oluşturun.');
            return;
        }

        // QR menü oluştur
        $qrMenu = QrMenu::create([
            'facility_id' => $facility->id,
            'name' => 'Demo Restaurant Menü',
            'url_slug' => 'demo-restaurant',
            'description' => 'Demo restoran için dijital menü',
            'theme_colors' => [
                'primary' => '#cf9f38',
                'secondary' => '#2c3e50',
                'background' => '#ffffff',
                'text' => '#333333'
            ],
            'is_active' => true
        ]);

        // QR kod oluştur
        $qrMenu->generateQrCode();

        // Manager kullanıcı oluştur
        QrMenuUser::create([
            'qr_menu_id' => $qrMenu->id,
            'name' => 'Restaurant Manager',
            'email' => 'manager@demo-restaurant.com',
            'password' => Hash::make('password123'),
            'role' => 'owner',
            'is_active' => true
        ]);

        // Kategoriler oluştur
        $categories = [
            [
                'name' => 'Ana Yemekler',
                'description' => 'Günün ana yemekleri',
                'icon' => 'fas fa-utensils',
                'order' => 1
            ],
            [
                'name' => 'İçecekler',
                'description' => 'Sıcak ve soğuk içecekler',
                'icon' => 'fas fa-coffee',
                'order' => 2
            ],
            [
                'name' => 'Tatlılar',
                'description' => 'Ev yapımı tatlılar',
                'icon' => 'fas fa-birthday-cake',
                'order' => 3
            ]
        ];

        foreach ($categories as $categoryData) {
            $category = MenuCategory::create([
                'qr_menu_id' => $qrMenu->id,
                'name' => $categoryData['name'],
                'description' => $categoryData['description'],
                'icon' => $categoryData['icon'],
                'order' => $categoryData['order'],
                'is_active' => true
            ]);

            // Her kategori için örnek ürünler
            $this->createItemsForCategory($category);
        }
    }

    private function createItemsForCategory(MenuCategory $category)
    {
        $items = [];

        switch ($category->name) {
            case 'Ana Yemekler':
                $items = [
                    [
                        'name' => 'Izgara Tavuk',
                        'description' => 'Baharatlarla marine edilmiş taze tavuk göğsü, ızgara sebze garnitürü ile',
                        'price' => 85.00,
                        'allergens' => ['Gluten'],
                        'ingredients' => ['Tavuk', 'Biber', 'Patlıcan', 'Kabak'],
                        'preparation_time' => '20-25 dakika',
                        'is_recommended' => true,
                        'order' => 1
                    ],
                    [
                        'name' => 'Köfte',
                        'description' => 'Ev yapımı köfte, patates kızartması ve salata ile',
                        'price' => 75.00,
                        'allergens' => ['Gluten'],
                        'ingredients' => ['Dana eti', 'Soğan', 'Ekmek', 'Yumurta'],
                        'preparation_time' => '15-20 dakika',
                        'order' => 2
                    ],
                    [
                        'name' => 'Balık Izgara',
                        'description' => 'Günün taze balığı, limon ve zeytinyağı ile',
                        'price' => 120.00,
                        'allergens' => ['Balık'],
                        'ingredients' => ['Levrek', 'Limon', 'Zeytinyağı', 'Tuz'],
                        'preparation_time' => '25-30 dakika',
                        'is_recommended' => true,
                        'order' => 3
                    ]
                ];
                break;

            case 'İçecekler':
                $items = [
                    [
                        'name' => 'Türk Kahvesi',
                        'description' => 'Geleneksel Türk kahvesi, lokum ile',
                        'price' => 15.00,
                        'preparation_time' => '5-10 dakika',
                        'order' => 1
                    ],
                    [
                        'name' => 'Çay',
                        'description' => 'Demli Türk çayı',
                        'price' => 8.00,
                        'preparation_time' => '3-5 dakika',
                        'order' => 2
                    ],
                    [
                        'name' => 'Taze Sıkılmış Portakal Suyu',
                        'description' => 'Günlük taze portakal suyu',
                        'price' => 25.00,
                        'ingredients' => ['Portakal'],
                        'preparation_time' => '2-3 dakika',
                        'is_recommended' => true,
                        'order' => 3
                    ]
                ];
                break;

            case 'Tatlılar':
                $items = [
                    [
                        'name' => 'Baklava',
                        'description' => 'Ev yapımı baklava, fıstık ile',
                        'price' => 45.00,
                        'allergens' => ['Gluten', 'Fındık'],
                        'ingredients' => ['Yufka', 'Fıstık', 'Şeker', 'Tereyağı'],
                        'preparation_time' => 'Hazır',
                        'is_recommended' => true,
                        'order' => 1
                    ],
                    [
                        'name' => 'Sütlaç',
                        'description' => 'Geleneksel sütlaç, tarçın ile',
                        'price' => 25.00,
                        'allergens' => ['Süt'],
                        'ingredients' => ['Süt', 'Pirinç', 'Şeker', 'Tarçın'],
                        'preparation_time' => 'Hazır',
                        'order' => 2
                    ],
                    [
                        'name' => 'Künefe',
                        'description' => 'Sıcak künefe, kaymak ile',
                        'price' => 55.00,
                        'allergens' => ['Gluten', 'Süt'],
                        'ingredients' => ['Tel kadayıf', 'Peynir', 'Şerbet', 'Kaymak'],
                        'preparation_time' => '10-15 dakika',
                        'order' => 3
                    ]
                ];
                break;
        }

        foreach ($items as $index => $itemData) {
            MenuItem::create([
                'menu_category_id' => $category->id,
                'name' => $itemData['name'],
                'description' => $itemData['description'],
                'price' => $itemData['price'] ?? null,
                'allergens' => $itemData['allergens'] ?? null,
                'ingredients' => $itemData['ingredients'] ?? null,
                'preparation_time' => $itemData['preparation_time'] ?? null,
                'is_available' => true,
                'is_recommended' => $itemData['is_recommended'] ?? false,
                'order' => $itemData['order'],
                'is_active' => true
            ]);
        }
    }
}
