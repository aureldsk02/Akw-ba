<?php

namespace App\Services;

use App\Models\Business;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use GuzzleHttp\Client;

class SiteGenerator
{
    protected $business;
    protected $outputPath;
    protected $httpClient;

    public function __construct(Business $business)
    {
        $this->business = $business;
        $this->outputPath = public_path('sites/' . $business->slug);
        $this->httpClient = new Client();
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

    public function generateWithAI()
    {
        // Créer le répertoire du site s'il n'existe pas
        if (!File::exists($this->outputPath)) {
            File::makeDirectory($this->outputPath, 0755, true);
        }

        // Construire le prompt à partir des données business et produits
        $prompt = $this->buildPrompt();

        // Appeler l'API IA pour générer le contenu HTML
        $htmlContent = $this->callAI($prompt);

        if ($htmlContent) {
            // Sauvegarder le contenu généré dans index.html
            File::put($this->outputPath . '/index.html', $htmlContent);

            // Copier les assets du thème
            $this->generateAssets();

            return [
                'url' => url('sites/' . $this->business->slug),
                'path' => $this->outputPath
            ];
        }

        throw new \Exception('Erreur lors de la génération du site avec l\'IA.');
    }

    protected function buildPrompt()
    {
        $businessData = [
            'name' => $this->business->name,
            'description' => $this->business->description,
            'business_type' => $this->business->business_type,
            'theme' => $this->business->theme,
            'has_ecommerce' => $this->business->has_ecommerce,
            'products' => []
        ];

        foreach ($this->business->products as $product) {
            $businessData['products'][] = [
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'image_path' => $product->image_path,
                'stock' => $product->stock,
                'sku' => $product->sku
            ];
        }

        $prompt = "Génère un site web HTML complet pour une boutique en ligne avec les informations suivantes :\n";
        $prompt .= "Nom de la boutique : " . $businessData['name'] . "\n";
        $prompt .= "Description : " . $businessData['description'] . "\n";
        $prompt .= "Type de boutique : " . $businessData['business_type'] . "\n";
        $prompt .= "Thème choisi : " . $businessData['theme'] . "\n";
        $prompt .= "Boutique e-commerce : " . ($businessData['has_ecommerce'] ? 'Oui' : 'Non') . "\n";
        $prompt .= "Produits :\n";

        foreach ($businessData['products'] as $prod) {
            $prompt .= "- Nom : " . $prod['name'] . ", Description : " . $prod['description'] . ", Prix : " . $prod['price'] . " EUR, Stock : " . $prod['stock'] . ", SKU : " . $prod['sku'] . "\n";
        }

        $prompt .= "Génère le code HTML complet du site avec une page d'accueil, une page produits (si e-commerce), et une page contact.";

        return $prompt;
    }

    protected function callAI($prompt)
    {
        $apiKey = env('OPENAI_API_KEY');
        if (!$apiKey) {
            throw new \Exception('Clé API OpenAI non configurée.');
        }

        $response = $this->httpClient->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-4',
                'messages' => [
                    ['role' => 'system', 'content' => 'Tu es un assistant qui génère du code HTML pour un site e-commerce.'],
                    ['role' => 'user', 'content' => $prompt]
                ],
                'max_tokens' => 3000,
                'temperature' => 0.7,
            ],
        ]);

        $body = json_decode($response->getBody(), true);

        if (isset($body['choices'][0]['message']['content'])) {
            return $body['choices'][0]['message']['content'];
        }

        return null;
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
