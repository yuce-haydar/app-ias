<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Projects tablosundaki görsel yollarını güncelle
        $projects = DB::table('projects')->get();
        foreach ($projects as $project) {
            $image = $project->image;
            $gallery = json_decode($project->gallery, true) ?? [];
            
            // Ana görsel yolunu güncelle
            if ($image && str_starts_with($image, 'assets/images/projeler/')) {
                $newImage = str_replace('assets/images/projeler/', 'projeler/', $image);
                DB::table('projects')->where('id', $project->id)->update(['image' => $newImage]);
            }
            
            // Galeri yollarını güncelle
            if (!empty($gallery)) {
                $newGallery = [];
                foreach ($gallery as $img) {
                    if (str_starts_with($img, 'assets/images/projeler/')) {
                        $newGallery[] = str_replace('assets/images/projeler/', 'projeler/', $img);
                    } else {
                        $newGallery[] = $img;
                    }
                }
                DB::table('projects')->where('id', $project->id)->update(['gallery' => json_encode($newGallery)]);
            }
        }
        
        // Facilities tablosundaki görsel yollarını güncelle
        $facilities = DB::table('facilities')->get();
        foreach ($facilities as $facility) {
            $image = $facility->image;
            $gallery = json_decode($facility->gallery, true) ?? [];
            
            // Ana görsel yolunu güncelle
            if ($image) {
                if (str_starts_with($image, 'assets/images/projeler/')) {
                    $newImage = str_replace('assets/images/projeler/', 'tesisler/', $image);
                    DB::table('facilities')->where('id', $facility->id)->update(['image' => $newImage]);
                } elseif (str_starts_with($image, 'assets/images/imageshatay/')) {
                    $newImage = str_replace('assets/images/imageshatay/', 'tesisler/', $image);
                    DB::table('facilities')->where('id', $facility->id)->update(['image' => $newImage]);
                }
            }
            
            // Galeri yollarını güncelle
            if (!empty($gallery)) {
                $newGallery = [];
                foreach ($gallery as $img) {
                    if (str_starts_with($img, 'assets/images/')) {
                        $newGallery[] = str_replace(['assets/images/projeler/', 'assets/images/imageshatay/'], ['tesisler/', 'tesisler/'], $img);
                    } else {
                        $newGallery[] = $img;
                    }
                }
                DB::table('facilities')->where('id', $facility->id)->update(['gallery' => json_encode($newGallery)]);
            }
        }
        
        // Services tablosundaki görsel yollarını güncelle
        $services = DB::table('services')->get();
        foreach ($services as $service) {
            $image = $service->image;
            $gallery = json_decode($service->gallery, true) ?? [];
            
            // Ana görsel yolunu güncelle
            if ($image && str_starts_with($image, 'assets/images/service/')) {
                $newImage = str_replace('assets/images/service/', 'services/', $image);
                DB::table('services')->where('id', $service->id)->update(['image' => $newImage]);
            }
            
            // Galeri yollarını güncelle  
            if (!empty($gallery)) {
                $newGallery = [];
                foreach ($gallery as $img) {
                    if (str_starts_with($img, 'assets/images/service/')) {
                        $newGallery[] = str_replace('assets/images/service/', 'services/', $img);
                    } else {
                        $newGallery[] = $img;
                    }
                }
                DB::table('services')->where('id', $service->id)->update(['gallery' => json_encode($newGallery)]);
            }
        }
        
        // Team Members tablosundaki görsel yollarını güncelle
        $teamMembers = DB::table('team_members')->get();
        foreach ($teamMembers as $member) {
            $image = $member->image;
            
            if ($image && str_starts_with($image, 'assets/images/team/')) {
                $newImage = str_replace('assets/images/team/', 'team/', $image);
                DB::table('team_members')->where('id', $member->id)->update(['image' => $newImage]);
            }
        }
        
        // News tablosundaki görsel yollarını güncelle
        $news = DB::table('news')->get();
        foreach ($news as $article) {
            $image = $article->featured_image;
            $gallery = json_decode($article->gallery, true) ?? [];
            
            // Ana görsel yolunu güncelle
            if ($image && str_starts_with($image, 'assets/images/')) {
                $newImage = str_replace(['assets/images/projeler/', 'assets/images/news/'], ['news/', 'news/'], $image);
                DB::table('news')->where('id', $article->id)->update(['featured_image' => $newImage]);
            }
            
            // Galeri yollarını güncelle
            if (!empty($gallery)) {
                $newGallery = [];
                foreach ($gallery as $img) {
                    if (str_starts_with($img, 'assets/images/')) {
                        $newGallery[] = str_replace(['assets/images/projeler/', 'assets/images/news/'], ['news/', 'news/'], $img);
                    } else {
                        $newGallery[] = $img;
                    }
                }
                DB::table('news')->where('id', $article->id)->update(['gallery' => json_encode($newGallery)]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Geri dönüş için ters işlemleri yapabiliriz ama genelde gerek yok
    }
}; 