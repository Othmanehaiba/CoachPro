// Contact Page JavaScript
document.addEventListener('DOMContentLoaded', () => {
    // Initialize contact form
    initializeContactForm();
    
    // Initialize FAQ accordion
    initializeFAQ();
});

// Contact Form Handler
function initializeContactForm() {
    const contactForm = document.getElementById('contactForm');
    
    if (!contactForm) return;
    
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Validate form
        if (!Validator.validateForm(contactForm)) {
            return;
        }
        
        // Get form data
        const formData = new FormData(contactForm);
        const data = Object.fromEntries(formData.entries());
        
        // Show loading state
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Envoi en cours...';
        
        try {
            // Simulate API call (replace with actual API endpoint)
            await sendContactMessage(data);
            
            // Show success message
            Alert.success(
                'Message envoyé !',
                'Nous avons bien reçu votre message. Notre équipe vous répondra dans les plus brefs délais.',
                () => {
                    // Reset form
                    contactForm.reset();
                }
            );
        } catch (error) {
            // Show error message
            Alert.error(
                'Erreur d\'envoi',
                error.message || 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.'
            );
        } finally {
            // Reset button
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    });
}

// Simulate sending contact message (replace with actual API)
async function sendContactMessage(data) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // Simulate validation
            if (!data.nom || !data.email || !data.message) {
                reject(new Error('Veuillez remplir tous les champs requis'));
                return;
            }
            
            // Simulate successful submission
            console.log('Contact form data:', data);
            resolve({ success: true });
        }, 1500);
    });
}

// FAQ Accordion
function initializeFAQ() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            // Close other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
        });
    });
}

// Social link click handlers
document.querySelectorAll('.social-link-large').forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const platform = link.classList.contains('facebook') ? 'Facebook' :
                        link.classList.contains('instagram') ? 'Instagram' :
                        link.classList.contains('linkedin') ? 'LinkedIn' : 'Twitter';
        
        Toast.info(
            'Réseaux sociaux',
            `Vous allez être redirigé vers notre page ${platform}`
        );
        
        // In real app, redirect to actual social media page
        // window.location.href = 'https://...';
    });
});

// Map link handler
const mapButton = document.querySelector('.map-placeholder .btn');
if (mapButton) {
    mapButton.addEventListener('click', (e) => {
        e.preventDefault();
        Toast.info(
            'Google Maps',
            'Ouverture de notre localisation sur Google Maps...'
        );
        // In real app:
        // window.open('https://maps.google.com/?q=...', '_blank');
    });
}