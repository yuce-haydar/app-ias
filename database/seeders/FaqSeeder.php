<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            // Genel Bilgiler
            [
                'question' => 'Hatay İmar A.Ş. nedir ve hangi hizmetleri sunmaktadır?',
                'answer' => 'Hatay İmar A.Ş., Hatay Büyükşehir Belediyesi\'ne bağlı bir kuruluş olarak, şehrimizin altyapı ve üstyapı projelerini gerçekleştiren, sosyal tesisler işleten ve üretim faaliyetlerinde bulunan bir belediye şirketidir. Parke taşı üretimi, büz üretimi, sosyal tesis işletmeciliği ve inşaat hizmetleri sunmaktayız.',
                'category' => 'Genel Bilgiler',
                'status' => true,
                'sort_order' => 1
            ],
            [
                'question' => 'Hatay İmar A.Ş. ne zaman kurulmuştur?',
                'answer' => 'Hatay İmar A.Ş., Hatay Büyükşehir Belediyesi tarafından şehrimizin kalkınmasına katkı sağlamak amacıyla kurulmuş bir belediye şirketidir. 15 yılı aşkın deneyimimizle hizmet vermekteyiz.',
                'category' => 'Genel Bilgiler',
                'status' => true,
                'sort_order' => 2
            ],
            [
                'question' => 'Hatay İmar A.Ş.\'ye nasıl ulaşabilirim?',
                'answer' => 'Merkez ofisimiz Haraparası Mahallesi, Antakya adresinde bulunmaktadır. Bize +90 326 755 22 22 numaralı telefondan veya info@hatayimar.com e-posta adresinden ulaşabilirsiniz.',
                'category' => 'Genel Bilgiler',
                'status' => true,
                'sort_order' => 3
            ],

            // Hizmetler
            [
                'question' => 'Sosyal tesislerinizde hangi etkinlikler düzenlenebilir?',
                'answer' => 'Habib-i Neccar Sosyal Tesisimizde düğün, nişan, sünnet, mezuniyet törenleri, kurumsal toplantılar ve özel organizasyonlar düzenlenebilmektedir. Tesisimiz 500 kişilik kapalı salon kapasitesine sahiptir.',
                'category' => 'Hizmetler',
                'status' => true,
                'sort_order' => 4
            ],
            [
                'question' => 'Parke taşı üretiminiz hangi standartlara uygundur?',
                'answer' => 'Parke taşı üretimimiz TSE standartlarına uygun olarak gerçekleştirilmektedir. Farklı renk ve boyut seçenekleriyle, yüksek dayanıklılık ve kalite garantisi sunuyoruz.',
                'category' => 'Hizmetler',
                'status' => true,
                'sort_order' => 5
            ],
            [
                'question' => 'Büz (beton boru) üretiminizde hangi çap seçenekleri mevcuttur?',
                'answer' => 'Büz üretimimizde 30 cm\'den 200 cm\'ye kadar çeşitli çap seçenekleri bulunmaktadır. Altyapı projelerinin ihtiyaçlarına göre özel üretim de yapılabilmektedir.',
                'category' => 'Hizmetler',
                'status' => true,
                'sort_order' => 6
            ],
            [
                'question' => 'Katlı otoparkınızın kapasitesi ve çalışma saatleri nedir?',
                'answer' => 'Katlı otoparkımız 200 araç kapasitesine sahiptir ve 7/24 hizmet vermektedir. Güvenlik kameralı sistemimiz ve görevli personelimizle güvenli park hizmeti sunuyoruz.',
                'category' => 'Hizmetler',
                'status' => true,
                'sort_order' => 7
            ],

            // Projeler
            [
                'question' => 'Hangi tür projeler gerçekleştiriyorsunuz?',
                'answer' => 'Spor tesisleri (yarı olimpik havuzlar, halı sahalar), sosyal tesisler (taziye evleri, kreşler), altyapı projeleri (yol, kaldırım), üstyapı projeleri (kamu binaları) ve kentsel dönüşüm projeleri gerçekleştiriyoruz.',
                'category' => 'Projeler',
                'status' => true,
                'sort_order' => 8
            ],
            [
                'question' => 'Projelerinizin tamamlanma süreleri ne kadardır?',
                'answer' => 'Proje tamamlanma süreleri, projenin büyüklüğü ve kapsamına göre değişmektedir. Küçük ölçekli projeler 3-6 ay, orta ölçekli projeler 6-12 ay, büyük ölçekli projeler ise 12-24 ay arasında tamamlanmaktadır.',
                'category' => 'Projeler',
                'status' => true,
                'sort_order' => 9
            ],
            [
                'question' => 'Devam eden projeleriniz hakkında bilgi alabilir miyim?',
                'answer' => 'Devam eden projelerimiz hakkında detaylı bilgiye web sitemizin "Projeler" bölümünden ulaşabilirsiniz. Ayrıca sosyal medya hesaplarımızdan da proje gelişmelerini takip edebilirsiniz.',
                'category' => 'Projeler',
                'status' => true,
                'sort_order' => 10
            ],

            // İhale ve Satın Alma
            [
                'question' => 'İhale ilanlarınızı nereden takip edebilirim?',
                'answer' => 'İhale ilanlarımız web sitemizin "İhale Bilgileri" bölümünde ve EKAP (Elektronik Kamu Alımları Platformu) üzerinden yayınlanmaktadır. Ayrıca yerel gazetelerde de ilan edilmektedir.',
                'category' => 'İhale ve Satın Alma',
                'status' => true,
                'sort_order' => 11
            ],
            [
                'question' => 'İhalelere katılım şartları nelerdir?',
                'answer' => 'İhalelere katılım şartları her ihale için özel olarak belirlenmekte ve ihale dokümanlarında detaylı olarak açıklanmaktadır. Genel olarak mali yeterlik, iş deneyimi ve teknik yeterlik belgeleri istenmektedir.',
                'category' => 'İhale ve Satın Alma',
                'status' => true,
                'sort_order' => 12
            ],
            [
                'question' => 'Tedarikçi olarak nasıl çalışabilirim?',
                'answer' => 'Tedarikçi olmak için satınalma@hatayimar.com adresine firma bilgilerinizi ve faaliyet alanlarınızı içeren başvurunuzu iletebilirsiniz. Uygun alımlar için sizinle iletişime geçilecektir.',
                'category' => 'İhale ve Satın Alma',
                'status' => true,
                'sort_order' => 13
            ],

            // İnsan Kaynakları
            [
                'question' => 'İş başvurusu nasıl yapabilirim?',
                'answer' => 'İş başvurularınızı web sitemizin "İnsan Kaynakları" bölümünden online olarak veya ik@hatayimar.com adresine CV\'nizi göndererek yapabilirsiniz.',
                'category' => 'İnsan Kaynakları',
                'status' => true,
                'sort_order' => 14
            ],
            [
                'question' => 'Staj imkanlarınız var mı?',
                'answer' => 'Üniversite öğrencilerine yönelik staj programlarımız bulunmaktadır. Staj başvuruları her yıl Mart-Nisan aylarında alınmaktadır. Detaylı bilgi için İnsan Kaynakları birimimizle iletişime geçebilirsiniz.',
                'category' => 'İnsan Kaynakları',
                'status' => true,
                'sort_order' => 15
            ],
            [
                'question' => 'Çalışanlarınıza sağladığınız haklar nelerdir?',
                'answer' => 'Çalışanlarımıza yasal hakların yanı sıra, yemek kartı, servis, özel sağlık sigortası, performans primi ve eğitim imkanları sağlamaktayız.',
                'category' => 'İnsan Kaynakları',
                'status' => true,
                'sort_order' => 16
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
} 