<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Veritabanından projeleri çek
        $projects = Project::orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($project) {
                // Durum değerlerini Türkçeleştir
                $statusMap = [
                    'completed' => 'Tamamlandı',
                    'ongoing' => 'Devam Ediyor',
                    'planned' => 'Planlanan'
                ];
                
                $project->display_status = $statusMap[$project->status] ?? $project->status;
                
                // Image path'i düzelt
                $project->image_url = \App\Helpers\ImageHelper::getImageUrl($project->image);
                
                // Area bilgisini ekle (eğer features içinde varsa)
                if ($project->features && is_array($project->features)) {
                    foreach ($project->features as $feature) {
                        if (str_contains(strtolower($feature), 'm²') || str_contains(strtolower($feature), 'alan')) {
                            $project->area = $feature;
                            break;
                        }
                    }
                }
                
                return $project;
            });

        return view('projects.index', compact('projects'));
    }

    public function details($id)
    {
        // Veritabanından projeyi çek
        $project = Project::findOrFail($id);
        
        // Durum değerlerini Türkçeleştir
        $statusMap = [
            'completed' => 'Tamamlandı',
            'ongoing' => 'Devam Ediyor',
            'planned' => 'Planlanan'
        ];
        
        $project->display_status = $statusMap[$project->status] ?? $project->status;
        
        // Image path'i düzelt
        $project->image_url = \App\Helpers\ImageHelper::getImageUrl($project->image);
        
        // Gallery path'lerini düzelt
        if ($project->gallery && is_array($project->gallery)) {
            $project->gallery_urls = \App\Helpers\ImageHelper::getGalleryUrls($project->gallery);
        }
        
        // Timeline'ı features'tan al
        $project->timeline = [];
        if ($project->features && is_array($project->features)) {
            foreach ($project->features as $feature) {
                if (str_contains($feature, ':') && (str_contains(strtolower($feature), 'tarih') || str_contains($feature, '2024') || str_contains($feature, '2023'))) {
                    $project->timeline[] = $feature;
                }
            }
        }
        
        // Capacity bilgisini al
        if ($project->technical_specs && is_array($project->technical_specs)) {
            foreach ($project->technical_specs as $spec) {
                if (str_contains(strtolower($spec), 'kapasite') || str_contains(strtolower($spec), 'kişi')) {
                    $project->capacity = $spec;
                    break;
                }
            }
        }
        
        // Area bilgisini al
        if ($project->features && is_array($project->features)) {
            foreach ($project->features as $feature) {
                if (str_contains(strtolower($feature), 'm²') || str_contains(strtolower($feature), 'alan')) {
                    $project->area = $feature;
                    break;
                }
            }
        }
        
        // Kategoriyi belirle
        $categoryMap = [
            'Spor Tesisi' => 'Spor ve Rekreasyon',
            'Sosyal Tesis' => 'Sosyal ve Kültürel',
            'Eğitim Tesisi' => 'Eğitim',
            'Sağlık Tesisi' => 'Sağlık',
            'Ticaret Merkezi' => 'Ticaret ve Ekonomi',
            'Çok Amaçlı' => 'Çok Amaçlı Tesisler'
        ];
        
        $project->category = $categoryMap[$project->project_type] ?? $project->project_type;
        
        // View count'u artır
        $project->incrementViewCount();
        
        // İlgili projeleri getir (aynı türden + rastgele 3 tane)
        $relatedProjects = Project::where('id', '!=', $id)
            ->where('project_type', $project->project_type)
            ->inRandomOrder()
            ->take(3)
            ->get()
            ->map(function($relatedProject) {
                $relatedProject->image_url = \App\Helpers\ImageHelper::getImageUrl($relatedProject->image);
                return $relatedProject;
            });
        
        // Eğer aynı türden 3 tane yoksa, diğerlerinden al
        if ($relatedProjects->count() < 3) {
            $additionalProjects = Project::where('id', '!=', $id)
                ->whereNotIn('id', $relatedProjects->pluck('id')->toArray())
                ->inRandomOrder()
                ->take(3 - $relatedProjects->count())
                ->get()
                ->map(function($additionalProject) {
                    $additionalProject->image_url = \App\Helpers\ImageHelper::getImageUrl($additionalProject->image);
                    return $additionalProject;
                });
            
            $relatedProjects = $relatedProjects->merge($additionalProjects);
        }
        
        return view('projects.details', compact('project', 'relatedProjects'));
    }
} 