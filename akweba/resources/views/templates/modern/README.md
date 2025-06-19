# Thème Moderne pour Akweba

Ce thème moderne est conçu pour créer des sites web professionnels et élégants pour les entreprises. Il utilise Tailwind CSS pour le style et inclut des fonctionnalités modernes comme le chargement paresseux des images et les animations au défilement.

## Structure des fichiers

```
modern/
├── assets/
│   ├── css/
│   │   └── custom.css
│   └── js/
│       └── custom.js
├── index.blade.php
├── products.blade.php
├── contact.blade.php
├── tailwind.config.js
└── README.md
```

## Fonctionnalités

- Design responsive
- Animations fluides
- Formulaire de contact avec validation
- Support pour les produits et le commerce électronique
- Chargement paresseux des images
- Menu mobile
- Défilement fluide
- Styles personnalisés avec Tailwind CSS

## Installation

1. Assurez-vous que les dépendances Tailwind sont installées :
```bash
npm install -D tailwindcss @tailwindcss/forms @tailwindcss/typography @tailwindcss/aspect-ratio
```

2. Compilez les assets :
```bash
npm run dev
```

## Utilisation

Le thème est conçu pour être utilisé avec le service `SiteGenerator`. Il génère automatiquement les pages suivantes :

- Page d'accueil (`index.blade.php`)
- Page des produits (`products.blade.php`) - si le commerce électronique est activé
- Page de contact (`contact.blade.php`)

## Personnalisation

### Couleurs

Les couleurs peuvent être personnalisées dans le fichier `tailwind.config.js`. Le thème utilise deux couleurs principales :

- `primary` : Couleur principale du site
- `secondary` : Couleur secondaire pour les accents

### Polices

Le thème utilise deux polices principales :

- `Inter` pour le texte général
- `Poppins` pour les titres

Ces polices peuvent être modifiées dans le fichier `tailwind.config.js`.

### Animations

Le thème inclut plusieurs animations personnalisées :

- `fade-in` : Animation de fondu à l'entrée
- `slide-up` : Animation de glissement vers le haut

Ces animations peuvent être modifiées dans le fichier `tailwind.config.js`.

## Support

Pour toute question ou problème, veuillez créer une issue dans le dépôt GitHub du projet. 