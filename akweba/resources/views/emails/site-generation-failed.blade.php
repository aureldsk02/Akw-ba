<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Erreur lors de la génération de votre site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: #dc2626;
        }
        .error-details {
            background-color: #fee2e2;
            border: 1px solid #fecaca;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Une erreur est survenue</h1>
        <p>Lors de la génération de votre site</p>
    </div>

    <p>Bonjour,</p>

    <p>Nous regrettons de vous informer qu'une erreur est survenue lors de la génération de votre site web. Notre équipe technique a été notifiée et travaille à résoudre ce problème.</p>

    <div class="error-details">
        <p><strong>Détails de l'erreur :</strong></p>
        <p>{{ $error }}</p>
    </div>

    <p>Nous vous contacterons dès que le problème sera résolu. Si vous avez des questions, n'hésitez pas à nous contacter.</p>

    <p>Nous vous prions de nous excuser pour ce désagrément.</p>

    <div class="footer">
        <p>© {{ date('Y') }} {{ $business->name }}. Tous droits réservés.</p>
    </div>
</body>
</html> 