<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BusinessController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/businesses', [BusinessController::class, 'index']);

// Route pour la création de commerce
Route::post('/api/businesses', [BusinessController::class, 'store']);

// Route de test pour visualiser le template moderne
Route::get('/preview/modern', function () {
    // Données de test pour le template
    $business = (object)[
        'name' => 'Mon Entreprise',
        'description' => 'Une description de test pour mon entreprise',
        'address' => '123 Rue de Test, 75000 Paris',
        'phone' => '01 23 45 67 89',
        'email' => 'contact@monentreprise.com',
        'has_ecommerce' => true,
        'products' => [
            (object)[
                'name' => 'Produit 1',
                'description' => 'Description du produit 1',
                'price' => 99.99,
                'image' => 'https://via.placeholder.com/300'
            ],
            (object)[
                'name' => 'Produit 2',
                'description' => 'Description du produit 2',
                'price' => 149.99,
                'image' => 'https://via.placeholder.com/300'
            ]
        ]
    ];
    
    return view('templates.modern.index', ['business' => $business]);
});