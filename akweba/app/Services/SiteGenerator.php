<?php

namespace App\Services;

use App\Models\Business;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class SiteGenerator
{
    protected $business;
    protected $outputPath;

    public function __construct(Business $business)
    {
        $this->business = $business;
        $this->outputPath = public_path('sites/' . $business->slug);
    }

    public function generate()
    {
        // Créer le répertoire du site s'il n'existe pas
        if (!File::exists($this->outputPath)) {
            File::makeDirectory($this->outputPath, 0755, true);
        }

        // Générer les fichiers statiques
        $this->generateIndexPage();
        $this->generateAssets();
        $this->generateProductsPage();
        $this->generateContactPage();

        return [
            'url' => url('sites/' . $this->business->slug),
            'path' => $this->outputPath
        ];
    }

    protected function generateIndexPage()
    {
        $content = View::make('templates.' . $this->business->theme . '.index', [
            'business' => $this->business
        ])->render();

        File::put($this->outputPath . '/index.html', $content);
    }

    protected function generateProductsPage()
    {
        if ($this->business->has_ecommerce) {
            $content = View::make('templates.' . $this->business->theme . '.products', [
                'business' => $this->business,
                'products' => $this->business->products
            ])->render();

            File::put($this->outputPath . '/products.html', $content);
        }
    }

    protected function generateContactPage()
    {
        $content = View::make('templates.' . $this->business->theme . '.contact', [
            'business' => $this->business
        ])->render();

        File::put($this->outputPath . '/contact.html', $content);
    }

    protected function generateAssets()
    {
        // Copier les assets du thème
        $themePath = resource_path('views/templates/' . $this->business->theme . '/assets');
        $assetsPath = $this->outputPath . '/assets';

        if (File::exists($themePath)) {
            File::copyDirectory($themePath, $assetsPath);
        }

        // Créer le dossier css si besoin
        $cssPath = $assetsPath . '/css';
        if (!File::exists($cssPath)) {
            File::makeDirectory($cssPath, 0755, true);
        }

        // Créer tailwind.css minimal si absent
        $tailwindCss = $cssPath . '/tailwind.css';
        if (!File::exists($tailwindCss)) {
            File::put($tailwindCss, "/* tailwind.css minimal - à remplacer par la vraie version si besoin */\nbody { }\n");
        }

        // Créer custom.css minimal si absent
        $customCss = $cssPath . '/custom.css';
        if (!File::exists($customCss)) {
            File::put($customCss, "/* custom.css minimal - personnalisez ce fichier */\n");
        }
    }
} 