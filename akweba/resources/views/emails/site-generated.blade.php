 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Votre site est prêt !</title>
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
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
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
        <h1>Félicitations !</h1>
        <p>Votre site est maintenant en ligne</p>
    </div>

    <p>Bonjour,</p>

    <p>Nous sommes ravis de vous informer que votre site web a été généré avec succès. Vous pouvez dès maintenant le visiter à l'adresse suivante :</p>

    <p style="text-align: center;">
        <a href="{{ $siteUrl }}" class="button">Visiter mon site</a>
    </p>

    <p>Votre site comprend :</p>
    <ul>
        <li>Une page d'accueil présentant votre entreprise</li>
        @if($business->has_ecommerce)
            <li>Une page produits pour présenter vos articles</li>
        @endif
        <li>Une page de contact avec un formulaire</li>
    </ul>

    <p>Si vous souhaitez apporter des modifications à votre site, n'hésitez pas à nous contacter.</p>

    <div class="footer">
        <p>© {{ date('Y') }} {{ $business->name }}. Tous droits réservés.</p>
    </div>
</body>
</html> 