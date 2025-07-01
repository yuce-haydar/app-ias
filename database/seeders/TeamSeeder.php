<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teamMembers = [
            [
                'name' => 'Mehmet Yılmaz',
                'position' => 'Genel Müdür',
                'designation' => 'Yönetim',
                'bio' => 'Hatay İmar A.Ş.\'nin kuruluşundan bu yana görev yapan Mehmet Yılmaz, 20 yılı aşkın deneyimiyle şirketimizin vizyoner lideridir. İnşaat mühendisliği ve işletme yönetimi alanlarındaki uzmanlığıyla kurumumuzu başarıyla yönetmektedir.',
                'description' => 'Hatay İmar A.Ş.\'nin kuruluşundan bu yana görev yapan Mehmet Yılmaz, 20 yılı aşkın deneyimiyle şirketimizin vizyoner lideridir.',
                'email' => 'mehmet.yilmaz@hatayimar.com',
                'phone' => '+90 326 755 22 01',
                'image' => 'team/team01.jpg',
                'social_linkedin' => 'https://linkedin.com/in/mehmetyilmaz',
                'social_twitter' => 'https://twitter.com/mehmetyilmaz',
                'specialties' => ['Stratejik Planlama', 'Proje Yönetimi', 'İnşaat Mühendisliği', 'Kurumsal Yönetim'],
                'education' => ['ODTÜ İnşaat Mühendisliği', 'İTÜ İşletme Yüksek Lisans'],
                'experience_years' => 20,
                'status' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Ayşe Demir',
                'position' => 'Mali İşler Müdürü',
                'designation' => 'Mali İşler',
                'bio' => '15 yıllık finans deneyimiyle kurumumuzun mali işlerini yöneten Ayşe Demir, muhasebe ve finansal planlama konularında uzmanlaşmıştır. Şeffaf ve güvenilir mali yönetim anlayışıyla çalışmaktadır.',
                'description' => '15 yıllık finans deneyimiyle kurumumuzun mali işlerini yöneten Ayşe Demir, muhasebe ve finansal planlama konularında uzmanlaşmıştır.',
                'email' => 'ayse.demir@hatayimar.com',
                'phone' => '+90 326 755 22 02',
                'image' => 'team/team02.jpg',
                'social_linkedin' => 'https://linkedin.com/in/aysedemir',
                'specialties' => ['Finansal Planlama', 'Muhasebe', 'Bütçe Yönetimi', 'Risk Analizi'],
                'education' => ['Çukurova Üniversitesi İşletme'],
                'experience_years' => 15,
                'status' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Ali Kaya',
                'position' => 'Teknik İşler Müdürü',
                'designation' => 'Teknik İşler',
                'bio' => 'İnşaat ve altyapı projelerinde 18 yıllık deneyime sahip Ali Kaya, kurumumuzun teknik operasyonlarını yönetmektedir. Modern inşaat teknolojileri ve sürdürülebilir yapı sistemleri konularında uzmandır.',
                'description' => 'İnşaat ve altyapı projelerinde 18 yıllık deneyime sahip Ali Kaya, kurumumuzun teknik operasyonlarını yönetmektedir.',
                'email' => 'ali.kaya@hatayimar.com',
                'phone' => '+90 326 755 22 03',
                'image' => 'team/team03.jpg',
                'social_linkedin' => 'https://linkedin.com/in/alikaya',
                'specialties' => ['İnşaat Yönetimi', 'Proje Planlama', 'Kalite Kontrol', 'Teknik Çizim'],
                'education' => ['İTÜ İnşaat Mühendisliği'],
                'experience_years' => 18,
                'status' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Fatma Özcan',
                'position' => 'İnsan Kaynakları Müdürü',
                'designation' => 'İnsan Kaynakları',
                'bio' => 'Kurumsal gelişim ve insan kaynakları yönetiminde 12 yıllık deneyime sahip Fatma Özcan, çalışan memnuniyeti ve kurumsal kültürün geliştirilmesi konularında çalışmalar yürütmektedir.',
                'description' => 'Kurumsal gelişim ve insan kaynakları yönetiminde 12 yıllık deneyime sahip Fatma Özcan.',
                'email' => 'fatma.ozcan@hatayimar.com',
                'phone' => '+90 326 755 22 04',
                'image' => 'team/team04.jpg',
                'social_linkedin' => 'https://linkedin.com/in/fatmaozcan',
                'specialties' => ['İK Yönetimi', 'Eğitim Planlama', 'Performans Yönetimi', 'Kurumsal Gelişim'],
                'education' => ['Ankara Üniversitesi İnsan Kaynakları Yönetimi'],
                'experience_years' => 12,
                'status' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'Mustafa Arslan',
                'position' => 'Proje Müdürü',
                'designation' => 'Proje Yönetimi',
                'bio' => 'Büyük ölçekli inşaat projelerinde 15 yıllık deneyime sahip Mustafa Arslan, kurumumuzun devam eden projelerinin koordinasyonunu sağlamaktadır. Proje planlama ve uygulama süreçlerinde uzmanlaşmıştır.',
                'description' => 'Büyük ölçekli inşaat projelerinde 15 yıllık deneyime sahip Mustafa Arslan.',
                'email' => 'mustafa.arslan@hatayimar.com',
                'phone' => '+90 326 755 22 05',
                'image' => 'team/team05.jpg',
                'social_linkedin' => 'https://linkedin.com/in/mustafaarslan',
                'specialties' => ['Proje Koordinasyonu', 'Saha Yönetimi', 'Maliyet Kontrolü', 'Zaman Yönetimi'],
                'education' => ['ODTÜ İnşaat Mühendisliği'],
                'experience_years' => 15,
                'status' => true,
                'sort_order' => 5
            ],
            [
                'name' => 'Zeynep Şahin',
                'position' => 'Hukuk Müşaviri',
                'designation' => 'Hukuk İşleri',
                'bio' => 'İnşaat ve belediye hukuku konularında uzmanlaşmış Zeynep Şahin, 10 yıldır kurumumuzun hukuki işlerini yürütmektedir. İhale süreçleri ve sözleşme yönetimi konularında deneyimlidir.',
                'description' => 'İnşaat ve belediye hukuku konularında uzmanlaşmış Zeynep Şahin.',
                'email' => 'zeynep.sahin@hatayimar.com',
                'phone' => '+90 326 755 22 06',
                'image' => 'team/team06.jpg',
                'social_linkedin' => 'https://linkedin.com/in/zeynepsahin',
                'specialties' => ['İnşaat Hukuku', 'İhale Mevzuatı', 'Sözleşme Yönetimi', 'Hukuki Danışmanlık'],
                'education' => ['İstanbul Üniversitesi Hukuk Fakültesi'],
                'experience_years' => 10,
                'status' => true,
                'sort_order' => 6
            ],
            [
                'name' => 'Ahmet Çelik',
                'position' => 'Üretim Müdürü',
                'designation' => 'Üretim',
                'bio' => 'Parke taşı ve büz üretimi konularında 16 yıllık deneyime sahip Ahmet Çelik, üretim tesislerimizin yönetiminden sorumludur. Kalite kontrol ve verimlilik artırma çalışmalarını yürütmektedir.',
                'description' => 'Parke taşı ve büz üretimi konularında 16 yıllık deneyime sahip Ahmet Çelik.',
                'email' => 'ahmet.celik@hatayimar.com',
                'phone' => '+90 326 755 22 07',
                'image' => 'team/team07.jpg',
                'social_linkedin' => 'https://linkedin.com/in/ahmetcelik',
                'specialties' => ['Üretim Yönetimi', 'Kalite Kontrol', 'Verimlilik', 'Makine Bakım'],
                'education' => ['Gaziantep Üniversitesi Makine Mühendisliği'],
                'experience_years' => 16,
                'status' => true,
                'sort_order' => 7
            ],
            [
                'name' => 'Elif Yıldız',
                'position' => 'Pazarlama Müdürü',
                'designation' => 'Pazarlama',
                'bio' => 'Kurumsal iletişim ve pazarlama stratejileri konusunda 11 yıllık deneyime sahip Elif Yıldız, kurumumuzun tanıtım ve halkla ilişkiler faaliyetlerini koordine etmektedir.',
                'description' => 'Kurumsal iletişim ve pazarlama stratejileri konusunda 11 yıllık deneyime sahip Elif Yıldız.',
                'email' => 'elif.yildiz@hatayimar.com',
                'phone' => '+90 326 755 22 08',
                'image' => 'team/team08.jpg',
                'social_linkedin' => 'https://linkedin.com/in/elifyildiz',
                'social_twitter' => 'https://twitter.com/elifyildiz',
                'specialties' => ['Pazarlama Stratejisi', 'Kurumsal İletişim', 'Sosyal Medya', 'Etkinlik Yönetimi'],
                'education' => ['Boğaziçi Üniversitesi İletişim'],
                'experience_years' => 11,
                'status' => true,
                'sort_order' => 8
            ]
        ];

        foreach ($teamMembers as $member) {
            $member['slug'] = Str::slug($member['name']);
            TeamMember::create($member);
        }
    }
} 