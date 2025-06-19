@extends('layouts.app')

@section('content')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.process')
    @include('sections.form')
@endsection

@push('scripts')
<script>
    // Mobile Menu Toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
    
    // Form Steps Navigation
    const steps = document.querySelectorAll('.form-step');
    const stepIndicator = document.getElementById('step-indicator');
    const nextBtn = document.getElementById('next-btn');
    const prevBtn = document.getElementById('prev-btn');
    let currentStep = 1;
    
    // Step indicator texts
    const stepTexts = [
        "Étape 1/4 : Informations de base",
        "Étape 2/4 : Produits et services",
        "Étape 3/4 : Coordonnées",
        "Étape 4/4 : Personnalisation"
    ];
    
    // Initialize products and hours
    function initializeForm() {
        // Initialize products
        addProductItem();
        addProductItem();
        
        // Initialize hours
        const days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        const hoursContainer = document.getElementById('hours-container');
        
        days.forEach(day => {
            const hourElement = document.createElement('div');
            hourElement.innerHTML = `
                <label class="block text-sm font-medium text-gray-700 mb-1">${day}</label>
                <div class="flex items-center space-x-2">
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="8h-12h" data-day="${day.toLowerCase()}">
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="14h-18h" data-day="${day.toLowerCase()}">
                </div>
            `;
            hoursContainer.appendChild(hourElement);
        });
    }
    
    // Add a new product item
    function addProductItem() {
        const productsContainer = document.getElementById('products-container');
        const productId = Date.now();
        
        const productElement = document.createElement('div');
        productElement.classList.add('product-item', 'bg-blue-50', 'p-4', 'rounded-lg', 'border', 'border-blue-100');
        productElement.innerHTML = `
            <div class="flex justify-between items-start mb-2">
                <h4 class="font-medium">Nouveau produit/service</h4>
                <button class="text-gray-400 hover:text-red-500 delete-product" data-id="${productId}">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1">Nom du produit/service</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Ex: Café gourmand" data-id="${productId}">
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-500 mb-1">Prix (€)</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Ex: 12.50" data-id="${productId}">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-medium text-gray-500 mb-1">Description</label>
                    <textarea rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Description du produit/service" data-id="${productId}"></textarea>
                </div>
            </div>
        `;
        
        productsContainer.appendChild(productElement);
        
        // Add event listener to delete button
        const deleteBtn = productElement.querySelector('.delete-product');
        deleteBtn.addEventListener('click', () => {
            if (document.querySelectorAll('.product-item').length > 1) {
                productElement.remove();
            } else {
                alert('Vous devez avoir au moins un produit/service.');
            }
        });
    }
    
    // Update form step navigation
    function updateStepNavigation() {
        stepIndicator.textContent = stepTexts[currentStep - 1];
        
        if (currentStep === 1) {
            prevBtn.disabled = true;
            nextBtn.textContent = 'Suivant';
            nextBtn.innerHTML = 'Suivant <i class="fas fa-arrow-right ml-2"></i>';

        } else if (currentStep === 4) {
            prevBtn.disabled = false;
            nextBtn.textContent = 'Générer mon site';
            nextBtn.innerHTML = 'Générer mon site <i class="fas fa-rocket ml-2"></i>';
        } else {
            prevBtn.disabled = false;
            nextBtn.textContent = 'Suivant';
            nextBtn.innerHTML = 'Suivant <i class="fas fa-arrow-right ml-2"></i>';
        }
    }
    
    // Validate current step
    function validateStep(step) {
        if (step === 1) {
            const name = document.getElementById('business-name').value;
            const description = document.getElementById('business-description').value;
            
            if (!name || !description) {
                alert('Veuillez remplir tous les champs obligatoires.');
                return false;
            }
            
            // Update preview
            document.getElementById('preview-name').textContent = name;
            document.getElementById('preview-tagline').textContent = description.substring(0, 50) + '...';
            
            return true;
        }
        return true;
    }
    
    // Navigation between steps
    nextBtn.addEventListener('click', () => {
        if (currentStep === 4) {
            // Submit form
            document.getElementById('submit-form').click();
            return;
        }
        
        if (validateStep(currentStep)) {
            steps.forEach(step => step.classList.remove('active'));
            currentStep++;
            document.getElementById(`step${currentStep}`).classList.add('active');
            updateStepNavigation();
        }
    });
    
    prevBtn.addEventListener('click', () => {
        if (currentStep > 1) {
            steps.forEach(step => step.classList.remove('active'));
            currentStep--;
            document.getElementById(`step${currentStep}`).classList.add('active');
            updateStepNavigation();
        }
    });
    
    // Upload logo button
    document.getElementById('upload-logo').addEventListener('click', () => {
        document.getElementById('business-logo').click();
    });
    
    // Toggle e-commerce options
    document.querySelectorAll('input[name="ecommerce"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const ecommerceOptions = document.getElementById('ecommerce-options');
            if (this.value === 'yes') {
                ecommerceOptions.classList.remove('hidden');
            } else {
                ecommerceOptions.classList.add('hidden');
            }
        });
    });

    // File input change
    document.getElementById('business-logo').addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                // For preview purposes only
                const preview = document.getElementById('preview').querySelector('.bg-gray-300');
                preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-contain">`;
            }
            
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Handle form submission
    document.getElementById('submit-form').addEventListener('click', async function() {
        const terms = document.getElementById('terms').checked;
        
        if (!terms) {
            alert('Veuillez accepter les conditions d\'utilisation.');
            return;
        }

        // Collect data from step 1
        const businessName = document.getElementById('business-name').value;
        const businessType = document.getElementById('business-type').value;
        const businessDescription = document.getElementById('business-description').value;
        const businessWebsite = document.getElementById('business-website').value;

        // Collect data from step 3 (contact info)
        const businessEmail = document.getElementById('business-email').value;
        const businessPhone = document.getElementById('business-phone').value;
        const businessAddress = document.getElementById('business-address').value;
        const businessZip = document.getElementById('business-zip').value;
        const businessCity = document.getElementById('business-city').value;
        const businessCountry = document.getElementById('business-country').value;

        // Collect data from step 4 (design & ecommerce)
        const selectedTheme = document.querySelector('input[name="theme"]:checked').value;
        const hasEcommerce = document.querySelector('input[name="ecommerce"]:checked').value === 'yes';

        const formData = {
            name: businessName,
            description: businessDescription,
            business_type: businessType,
            website: businessWebsite,
            email: businessEmail,
            phone: businessPhone,
            address: businessAddress,
            postal_code: businessZip,
            city: businessCity,
            country: businessCountry,
            theme: selectedTheme,
            has_ecommerce: hasEcommerce
        };

        try {
            const response = await fetch('/api/businesses', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formData)
            });

            const data = await response.json();

            if (response.ok) {
                alert('Félicitations ! Votre site est en cours de création. Vous recevrez un email avec vos identifiants sous peu. (ID du commerce: ' + data.id + ')');
            } else {
                console.error('Erreur lors de la création du commerce:', data);
                alert('Une erreur est survenue lors de la création de votre site. Veuillez vérifier la console pour plus de détails.');
            }
        } catch (error) {
            console.error('Erreur réseau ou autre:', error);
            alert('Une erreur de connexion est survenue. Assurez-vous que le serveur Laravel est en marche.');
        }
    });
    
    // Add product button
    document.getElementById('add-product').addEventListener('click', addProductItem);
    
    // Initialize form when page loads
    document.addEventListener('DOMContentLoaded', initializeForm);
</script>
@endpush 