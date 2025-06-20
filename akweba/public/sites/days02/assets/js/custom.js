// Custom JavaScript for the modern theme

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuButton = document.querySelector('[data-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    
    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Form validation
    const contactForm = document.querySelector('#contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const name = this.querySelector('[name="name"]').value;
            const email = this.querySelector('[name="email"]').value;
            const message = this.querySelector('[name="message"]').value;
            
            if (!name || !email || !message) {
                alert('Veuillez remplir tous les champs du formulaire.');
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Veuillez entrer une adresse email valide.');
                return;
            }
            
            // If validation passes, submit the form
            this.submit();
        });
    }

    // Product image lazy loading
    const productImages = document.querySelectorAll('.product-image');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });

        productImages.forEach(img => imageObserver.observe(img));
    }

    // Add to cart functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            
            // Here you would typically make an AJAX call to add the product to cart
            // For now, we'll just show a success message
            alert('Produit ajouté au panier !');
        });
    });

    // Animate elements on scroll
    const animateElements = document.querySelectorAll('.animate-fade-in');
    if ('IntersectionObserver' in window) {
        const animationObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100');
                    observer.unobserve(entry.target);
                }
            });
        });

        animateElements.forEach(element => {
            element.classList.add('opacity-0');
            animationObserver.observe(element);
        });
    }
}); 