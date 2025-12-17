// Auth Page Scripts
document.addEventListener('DOMContentLoaded', () => {
    // Role selection for registration
    const roleButtons = document.querySelectorAll('.role-btn');
    const roleInput = document.getElementById('role');
    const coachFields = document.getElementById('coachFields');
    
    if (roleButtons.length > 0) {
        roleButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                roleButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                button.classList.add('active');
                
                // Update hidden role input
                const role = button.getAttribute('data-role');
                if (roleInput) {
                    roleInput.value = role;
                }
                
                // Show/hide coach specific fields
                if (coachFields) {
                    if (role === 'coach') {
                        coachFields.classList.remove('hidden');
                        // Make coach fields required
                        coachFields.querySelectorAll('input, select').forEach(field => {
                            field.setAttribute('required', 'required');
                        });
                    } else {
                        coachFields.classList.add('hidden');
                        // Remove required from coach fields
                        coachFields.querySelectorAll('input, select').forEach(field => {
                            field.removeAttribute('required');
                        });
                    }
                }
            });
        });
    }
    
    // Login Form Handler
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Validate form
            if (!Validator.validateForm(loginForm)) {
                return;
            }
            
            // Get form data
            const formData = {
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                remember: document.querySelector('input[name="remember"]')?.checked || false
            };
            
            // Show loading state
            const submitBtn = loginForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Connexion...';
            
            // Simulate API call (replace with actual API call)
            try {
                await simulateLogin(formData);
                
                // Show success message
                Alert.success(
                    'Connexion réussie !',
                    'Vous allez être redirigé vers votre espace',
                    () => {
                        // Redirect based on user role (this would come from API response)
                        const role = 'sportif'; // This should come from API
                        if (role === 'coach') {
                            window.location.href = 'coach-dashboard.html';
                        } else {
                            window.location.href = 'sportif-dashboard.html';
                        }
                    }
                );
            } catch (error) {
                // Show error message
                Alert.error(
                    'Erreur de connexion',
                    error.message || 'Email ou mot de passe incorrect'
                );
                
                // Reset button
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });
    }
    
    // Register Form Handler
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Validate form
            if (!Validator.validateForm(registerForm)) {
                return;
            }
            
            // Get form data
            const formData = new FormData(registerForm);
            const data = Object.fromEntries(formData.entries());
            
            // Check terms acceptance
            if (!data.terms) {
                Alert.warning(
                    'Conditions non acceptées',
                    'Veuillez accepter les conditions d\'utilisation pour continuer'
                );
                return;
            }
            
            // Show loading state
            const submitBtn = registerForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Création du compte...';
            
            // Simulate API call (replace with actual API call)
            try {
                await simulateRegister(data);
                
                // Show success message
                Alert.success(
                    'Compte créé avec succès !',
                    'Vous allez être redirigé vers votre espace',
                    () => {
                        // Redirect based on user role
                        if (data.role === 'coach') {
                            window.location.href = 'coach-dashboard.php';
                        } else {
                            window.location.href = 'sportif-dashboard.php';
                        }
                    }
                );
            } catch (error) {
                // Show error message
                Alert.error(
                    'Erreur d\'inscription',
                    error.message || 'Une erreur est survenue lors de la création du compte'
                );
                
                // Reset button
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });
    }
});

// Toggle password visibility
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    if (input) {
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    }
}

// Simulate login API call (replace with actual API)
async function simulateLogin(credentials) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // Simulate successful login
            if (credentials.email && credentials.password) {
                const user = {
                    id: 1,
                    nom: 'Utilisateur',
                    prenom: 'Test',
                    email: credentials.email,
                    role: 'sportif', // This would come from API
                    photo: null
                };
                
                // Store user session
                UserSession.login(user);
                
                resolve(user);
            } else {
                reject(new Error('Email ou mot de passe incorrect'));
            }
        }, 1500);
    });
}

// Simulate register API call (replace with actual API)
async function simulateRegister(data) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // Simulate validation
            if (!data.email || !data.password) {
                reject(new Error('Veuillez remplir tous les champs requis'));
                return;
            }
            
            // Simulate successful registration
            const user = {
                id: Date.now(),
                nom: data.nom,
                prenom: data.prenom,
                email: data.email,
                role: data.role,
                photo: null,
                discipline: data.discipline || null,
                experience: data.experience || null
            };
            
            // Store user session
            UserSession.login(user);
            
            resolve(user);
        }, 1500);
    });
}

// Social login handlers (implement with actual OAuth)
document.querySelectorAll('.btn-social').forEach(btn => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        const provider = btn.classList.contains('btn-google') ? 'Google' : 'Facebook';
        
        Toast.info(
            'Fonctionnalité à venir',
            `La connexion via ${provider} sera bientôt disponible`
        );
    });
});