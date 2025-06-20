<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - {{ $business->name }}</title>
    <link rel="stylesheet" href="assets/css/tailwind.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    <main>
        <h1>Contactez-nous</h1>
        <div>{{ $business->address }}</div>
        <div>{{ $business->postal_code }} {{ $business->city }}</div>
        <div>{{ $business->country }}</div>
        <div><a href="tel:{{ $business->phone }}">{{ $business->phone }}</a></div>
        <div><a href="mailto:{{ $business->email }}">{{ $business->email }}</a></div>
    </main>
</body>
</html> 