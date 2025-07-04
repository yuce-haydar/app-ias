<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformationService;

class InformationServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Mersis No',
                'value' => '0070032758800011',
                'order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Firma Ünvanı',
                'value' => 'HATAY İMAR SANAYİ A.Ş.',
                'order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Ticaret Sicil Memurluğu',
                'value' => 'ANTAKYA TİCARET VE SANAYİ ODASI',
                'order' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Ticaret Sicil Numarası',
                'value' => '4861',
                'order' => 4,
                'is_active' => true
            ],
            [
                'title' => 'Taahhüt Edilen Sermaye Miktarı',
                'value' => '1.500.000.000,00',
                'order' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Vergi Dairesi',
                'value' => 'ŞÜKRÜ KANATLI',
                'order' => 6,
                'is_active' => true
            ],
            [
                'title' => 'Vergi Numarası',
                'value' => '700327588',
                'order' => 7,
                'is_active' => true
            ],
            [
                'title' => 'Adres',
                'value' => 'HARAPARASI MAH. 2.KÜÇÜK SANAYİ CAD. KATLI OTOPARK SİTESİ NO:2 K-2 ANTAKYA / HATAY',
                'order' => 8,
                'is_active' => true
            ],
            [
                'title' => 'Telefon',
                'value' => '326 213 23 26',
                'order' => 9,
                'is_active' => true
            ],
            [
                'title' => 'Firma Tescil Tarihi',
                'value' => '26/09/1990',
                'order' => 10,
                'is_active' => true
            ],
            [
                'title' => 'Web Adresi',
                'value' => '<a href="https://www.hatayimar.com.tr" target="_blank">www.hatayimar.com.tr</a>',
                'order' => 11,
                'is_active' => true
            ],
            [
                'title' => 'E-posta',
                'value' => '<a href="mailto:info@hatayimar.com.tr">info@hatayimar.com.tr</a>',
                'order' => 12,
                'is_active' => true
            ]
        ];

        foreach ($services as $service) {
            InformationService::create($service);
        }
    }
}
