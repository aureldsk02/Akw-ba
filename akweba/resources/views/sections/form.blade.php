<section id="form-section" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold">Créez votre site</h2>
            <p class="mt-4 text-xl text-gray-600">Remplissez ce formulaire pour générer votre boutique en ligne</p>
            <div class="w-24 h-1 bg-accent mx-auto mt-4"></div>
        </div>
        
        <!-- Multi-step form -->
        <div class="w-full max-w-5xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Form Progress -->
            <div class="bg-gray-50 px-8 py-6 flex justify-between items-center">
                <div>
                    <div id="step-indicator" class="text-lg font-medium text-gray-600">Étape 1/4 : Informations de base</div>
                </div>
                <div class="flex space-x-2">
                    <button id="prev-btn" class="bg-white text-primary px-4 py-2 rounded-md text-sm font-medium border border-primary hover:bg-blue-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <i class="fas fa-arrow-left mr-2"></i>Précédent
                    </button>
                    <button id="next-btn" class="bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-600">
                        Suivant <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
            
            <!-- Form Steps -->
            <div id="form-container" class="p-8">
                <!-- Step 1: Basic Info -->
                <div class="form-step active" id="step1">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Informations sur votre commerce</h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom du commerce *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Ex: Boutique Chic, Café de la Gare" id="business-name">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Secteur d'activité *</label>
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" id="business-type">
                                <option value="" disabled selected>Sélectionnez un secteur</option>
                                <option value="restaurant">Restauration - Café</option>
                                <option value="boutique">Boutique - Prêt-à-porter</option>
                                <option value="beaute">Beauté - Coiffure</option>
                                <option value="alimentaire">Alimentaire - Épicerie</option>
                                <option value="artisanat">Artisanat - Création</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description du commerce *</label>
                            <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Mission, histoire et vision de votre entreprise..." id="business-description"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Site web actuel (si applicable)</label>
                            <input type="url" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="https://www.votresite.com" id="business-website">
                        </div>
                    </div>
                </div>
                
                <!-- Step 2: Products/Services -->
                <div class="form-step" id="step2">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Vos produits et services</h3>
                    
                    <div id="products-container" class="space-y-4">
                        <!-- Product items will be added here dynamically -->
                    </div>
                    
                    <button id="add-product" class="mt-6 flex items-center text-primary font-medium">
                        <i class="fas fa-plus-circle mr-2"></i> Ajouter un produit/service
                    </button>
                </div>
                
                <!-- Step 3: Contact Info -->
                <div class="form-step" id="step3">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Coordonnées de contact</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="contact@votredomaine.com" id="business-email">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone *</label>
                            <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="06 12 34 56 78" id="business-phone">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Adresse complète *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Numéro et rue" id="business-address">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Code postal *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Code postal" id="business-zip">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Ville *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Ville" id="business-city">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pays *</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Pays" id="business-country">
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <h4 class="font-medium text-gray-700 mb-3">Horaires d'ouverture</h4>
                        <div id="hours-container" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Hours will be added here dynamically -->
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="font-medium text-gray-700 mb-3">Réseaux sociaux</h4>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                                <input type="url" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="https://facebook.com/votrepage" id="social-facebook">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                                <input type="url" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="https://instagram.com/votrecompte" id="social-instagram">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                                <input type="url" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="https://linkedin.com/company/votreentreprise" id="social-linkedin">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 4: Design & Submit -->
                <div class="form-step" id="step4">
                    <h3 class="text-xl font-bold text-gray-800 mb-6">Personnalisation et finalisation</h3>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <h4 class="font-medium text-gray-700 mb-3">Choisissez votre style</h4>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <input type="radio" name="theme" id="theme1" value="classic" class="hidden peer">
                                    <label for="theme1" class="block cursor-pointer">
                                        <div class="bg-gray-200 border-2 border-gray-300 p-1 rounded-lg peer-checked:border-primary peer-checked:ring-2 peer-checked:ring-blue-200">
                                            <div class="h-32 rounded-md bg-white"></div>
                                        </div>
                                        <div class="mt-2 text-center text-sm font-medium">Classique</div>
                                    </label>
                                </div>
                                
                                <div>
                                    <input type="radio" name="theme" id="theme2" value="modern" class="hidden peer" checked>
                                    <label for="theme2" class="block cursor-pointer">
                                        <div class="bg-gray-200 border-2 border-gray-300 p-1 rounded-lg peer-checked:border-primary peer-checked:ring-2 peer-checked:ring-blue-200">
                                            <div class="h-32 rounded-md bg-primary"></div>
                                        </div>
                                        <div class="mt-2 text-center text-sm font-medium">Moderne</div>
                                    </label>
                                </div>
                                
                                <div>
                                    <input type="radio" name="theme" id="theme3" value="elegant" class="hidden peer">
                                    <label for="theme3" class="block cursor-pointer">
                                        <div class="bg-gray-200 border-2 border-gray-300 p-1 rounded-lg peer-checked:border-primary peer-checked:ring-2 peer-checked:ring-blue-200">
                                            <div class="h-32 rounded-md bg-gray-800"></div>
                                        </div>
                                        <div class="mt-2 text-center text-sm font-medium">Élégant</div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <h4 class="font-medium text-gray-700 mb-3">Vente en ligne</h4>
                                <div class="mb-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Souhaitez-vous vendre en ligne ?</label>
                                    <div class="flex items-center space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="ecommerce" value="yes" class="text-primary focus:ring-primary">
                                            <span class="ml-2">Oui</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="ecommerce" value="no" checked class="text-primary focus:ring-primary">
                                            <span class="ml-2">Non</span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div id="ecommerce-options" class="hidden space-y-4 mb-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Modes de paiement acceptés</label>
                                        <div class="space-y-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" class="text-primary focus:ring-primary">
                                                <span class="ml-2">Carte bancaire</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" class="text-primary focus:ring-primary">
                                                <span class="ml-2">PayPal</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" class="text-primary focus:ring-primary">
                                                <span class="ml-2">Virement bancaire</span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Options de livraison</label>
                                        <div class="space-y-2">
                                            <label class="flex items-center">
                                                <input type="checkbox" class="text-primary focus:ring-primary">
                                                <span class="ml-2">Livraison nationale</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" class="text-primary focus:ring-primary">
                                                <span class="ml-2">Livraison internationale</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox" class="text-primary focus:ring-primary">
                                                <span class="ml-2">Retrait en magasin</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <h4 class="font-medium text-gray-700 mb-3">Logo de votre commerce</h4>
                                <div class="flex items-center">
                                    <div class="mr-4 w-16 h-16 rounded-lg bg-gray-200 border-2 border-dashed flex items-center justify-center">
                                        <i class="fas fa-camera text-gray-400"></i>
                                    </div>
                                    <div>
                                        <input type="file" id="business-logo" class="hidden">
                                        <button id="upload-logo" class="bg-white text-primary px-4 py-2 rounded-md text-sm font-medium border border-primary hover:bg-blue-50">
                                            Télécharger un logo
                                        </button>
                                        <p class="mt-1 text-sm text-gray-500">PNG, JPG - Max 2MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-gray-700 mb-3">Aperçu de votre site</h4>
                            <div id="preview" class="preview-container p-6">
                                <div class="text-center">
                                    <div class="h-16 w-16 bg-gray-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                                        <i class="fas fa-store text-gray-500"></i>
                                    </div>
                                    <h3 id="preview-name" class="text-xl font-bold text-gray-800">Votre Nom de Commerce</h3>
                                    <p id="preview-tagline" class="text-gray-600 mt-2">Votre accroche ici</p>
                                </div>
                                
                                <div class="mt-8 grid grid-cols-2 gap-4">
                                    <div class="bg-white rounded-lg shadow-sm p-4">
                                        <div class="bg-gray-200 border-2 border-dashed rounded-md w-full h-32 mb-3"></div>
                                        <div class="font-medium">Produit 1</div>
                                        <div class="text-sm text-gray-600">Description courte</div>
                                    </div>
                                    <div class="bg-white rounded-lg shadow-sm p-4">
                                        <div class="bg-gray-200 border-2 border-dashed rounded-md w-full h-32 mb-3"></div>
                                        <div class="font-medium">Produit 2</div>
                                        <div class="text-sm text-gray-600">Description courte</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <input type="checkbox" id="terms" class="w-5 h-5 text-primary rounded border-gray-300 focus:ring-primary">
                                    <label for="terms" class="ml-3 text-sm text-gray-700">
                                        J'accepte les <a href="#" class="text-primary hover:underline">conditions d'utilisation</a>
                                    </label>
                                </div>
                                
                                <button id="submit-form" class="mt-6 w-full bg-primary text-white py-3 rounded-lg hover:bg-blue-600 transition font-medium flex items-center justify-center">
                                    Générer mon site 
                                    <i class="fas fa-rocket ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 