<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $business->name }}</title>
    <link rel="stylesheet" href="/assets/css/tailwind.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-blue-600">{{ $business->name }}</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600">Accueil</a>
                    @if($business->has_ecommerce)
                        <a href="/products.html" class="text-gray-600 hover:text-blue-600">Produits</a>
                    @endif
                    <a href="/contact.html" class="text-gray-600 hover:text-blue-600">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold text-white mb-4">{{ $business->name }}</h1>
            <p class="text-xl text-blue-100 mb-8">{{ $business->description }}</p>
            @if($business->has_ecommerce)
                <a href="/products.html" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition">
                    Voir nos produits
                </a>
            @endif
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">À propos de nous</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    {{ $business->description }}
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Contactez-nous</h2>
                <p class="text-lg text-gray-600">
                    {{ $business->address }}<br>
                    {{ $business->postal_code }} {{ $business->city }}<br>
                    {{ $business->country }}
                </p>
                <p class="mt-4">
                    <a href="tel:{{ $business->phone }}" class="text-blue-600 hover:text-blue-800">
                        {{ $business->phone }}
                    </a><br>
                    <a href="mailto:{{ $business->email }}" class="text-blue-600 hover:text-blue-800">
                        {{ $business->email }}
                    </a>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} {{ $business->name }}. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html> 