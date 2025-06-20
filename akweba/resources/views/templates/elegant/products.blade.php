<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits - {{ $business->name }}</title>
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    <main>
        <h1>Nos produits</h1>
        @if(isset($products) && count($products) > 0)
            <ul>
                @foreach($products as $product)
                    <li>{{ $product->name }} - {{ $product->price }} €</li>
                @endforeach
            </ul>
        @else
            <p>Aucun produit pour le moment.</p>
        @endif
    </main>
</body>
</html> 