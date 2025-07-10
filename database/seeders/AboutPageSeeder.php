<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutPageSetting;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        AboutPageSetting::create([
            'main_title' => 'Şehrimize Değer Katmak İçin Çalışıyoruz',
            'main_description_1' => 'Hatay İmar olarak Kaliteli Hizmeti, Özverili Çalışmayı, Değer Katmayı temel prensip edinip, var gücümüzle çalışmaktayız. Şehrimizin gelişimi ve kalkınması için sürekli olarak yeni projeler geliştirmekte ve hizmet kalitemizi artırmaktayız.',
            'main_description_2' => 'Hatay Büyükşehir Belediyesi\'nin bir kuruluşu olarak, şehrimizin sosyal, kültürel ve ekonomik gelişimine katkıda bulunmayı misyon edinmiş bulunuyoruz.',
            'features' => [
                'Kaliteli hizmet anlayışı ile çalışma',
                'Şehrimize değer katacak projeler geliştirme',
                'Özverili ve profesyonel yaklaşım sergileme',
                'Sürdürülebilir kalkınma ilkelerine bağlılık'
            ],
            'mission_text' => 'Hatay İmar olarak, şehrimizin sosyal, kültürel ve ekonomik gelişimine katkıda bulunmak, kaliteli hizmet sunarak vatandaşlarımızın yaşam kalitesini artırmak ve sürdürülebilir kalkınma ilkelerine uygun projeler geliştirmektir.

Özverili çalışma anlayışımızla, şehrimize değer katacak tesisler inşa etmek ve işletmek, üretim faaliyetlerimizle yerel ekonomiye katkı sağlamaktır.',
            'vision_text' => 'Hatay\'ın tarihi ve kültürel mirasını koruyarak, modern yaşam standartlarını şehrimize kazandıran, örnek bir belediye kuruluşu olmaktır.

Teknolojik gelişmeleri takip ederek, çevre dostu ve sürdürülebilir projelerle Hatay\'ı geleceğe taşıyan, bölgede lider konumda bir kuruluş olmayı hedefliyoruz.',
        ]);
    }
}
