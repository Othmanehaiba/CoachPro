// Profile Page JavaScript
document.addEventListener('DOMContentLoaded', () => {
    // Check if user is logged in
    if (!UserSession.isLoggedIn()) {
        window.location.href = 'login.html';
        return;
    }
    
    // Load user profile data
    loadUserProfile();
    
    // Initialize forms
    initializeForms();
    
    // Initialize sport tags
    initializeSportTags();
});

// Load user profile data
function loadUserProfile() {
    const user = UserSession.getUser();
    
    if (user) {
        // Update profile name
        const profileName = document.getElementById('profileName');
        if (profileName) {
            profileName.textContent = `${user.prenom || ''} ${user.nom || ''}`.trim();
        }
        
        // Update profile role
        const profileRole = document.getElementById('profileRole');
        if (profileRole) {
            profileRole.textContent = user.role === 'coach' ? 'Coach Professionnel' : 'Sportif Amateur';
        }
        
        // Update form fields
        if (user.nom) document.getElementById('nom').value = user.nom;
        if (user.prenom) document.getElementById('prenom').value = user.prenom;
        if (user.email) document.getElementById('email').value = user.email;
    }
}

// Initialize forms
function initializeForms() {
    // Personal Info Form
    const personalInfoForm = document.getElementById('personalInfoForm');
    if (personalInfoForm) {
        personalInfoForm.addEventListener('submit', handlePersonalInfoSubmit);
    }
    
    // Change Password Form
    const changePasswordForm = document.getElementById('changePasswordForm');
    if (changePasswordForm) {
        changePasswordForm.addEventListener('submit', handlePasswordChange);
    }
    
    // Setup real-time validation for all forms
    const forms = document.querySelectorAll('form[data-validate]');
    forms.forEach(form => {
        Validator.setupRealtimeValidation(form);
    });
}

// Toggle edit mode
function toggleEditMode() {
    const isEditMode = document.body.classList.toggle('edit-mode');
    const editBtn = document.getElementById('editBtnText');
    
    if (isEditMode) {
        editBtn.textContent = '❌ Annuler';
        enableFormEditing();
    } else {
        editBtn.textContent = '✏️ Modifier';
        disableFormEditing();
    }
}

// Enable form editing
function enableFormEditing() {
    const inputs = document.querySelectorAll('#personalInfoForm input, #personalInfoForm select, #personalInfoForm textarea');
    inputs.forEach(input => {
        if (input.type !== 'checkbox' && input.type !== 'file') {
            input.disabled = false;
        }
    });
    
    const preferencesInputs = document.querySelectorAll('#preferencesForm input, #preferencesForm select, #preferencesForm textarea');
    preferencesInputs.forEach(input => {
        input.disabled = false;
    });
}

// Disable form editing
function disableFormEditing() {
    const inputs = document.querySelectorAll('#personalInfoForm input, #personalInfoForm select, #personalInfoForm textarea');
    inputs.forEach(input => {
        if (input.type !== 'checkbox' && input.type !== 'file') {
            input.disabled = true;
        }
    });
    
    const preferencesInputs = document.querySelectorAll('#preferencesForm input, #preferencesForm select, #preferencesForm textarea');
    preferencesInputs.forEach(input => {
        input.disabled = true;
    });
    
    // Reload original data
    loadUserProfile();
}

// Cancel edit
function cancelEdit() {
    toggleEditMode();
}

// Handle personal info form submission
async function handlePersonalInfoSubmit(e) {
    e.preventDefault();
    
    if (!Validator.validateForm(e.target)) {
        return;
    }
    
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());
    
    try {
        // Show loading
        Toast.info('Enregistrement', 'Mise à jour en cours...');
        
        // Simulate API call
        await updateProfile(data);
        
        // Update session
        const user = UserSession.getUser();
        UserSession.login({
            ...user,
            nom: data.nom,
            prenom: data.prenom,
            email: data.email
        });
        
        // Show success
        Alert.success(
            'Profil mis à jour !',
            'Vos informations ont été enregistrées avec succès',
            () => {
                toggleEditMode();
                loadUserProfile();
            }
        );
        
        // Add animation
        document.querySelector('.profile-card').classList.add('saving');
        setTimeout(() => {
            document.querySelector('.profile-card').classList.remove('saving');
        }, 400);
        
    } catch (error) {
        Alert.error(
            'Erreur',
            error.message || 'Impossible de mettre à jour le profil'
        );
    }
}

// Simulate profile update API call
async function updateProfile(data) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log('Profile updated:', data);
            resolve({ success: true });
        }, 1000);
    });
}

// Initialize sport tags
function initializeSportTags() {
    const sportTags = document.querySelectorAll('.sport-tag');
    
    sportTags.forEach(tag => {
        tag.addEventListener('click', () => {
            if (!document.body.classList.contains('edit-mode')) {
                return;
            }
            tag.classList.toggle('active');
        });
    });
}

// Avatar upload handlers
function triggerFileUpload() {
    document.getElementById('avatarInput').click();
}

function handleAvatarUpload(event) {
    const file = event.target.files[0];
    
    if (!file) return;
    
    // Validate file type
    if (!file.type.startsWith('image/')) {
        Alert.error('Erreur', 'Veuillez sélectionner une image');
        return;
    }
    
    // Validate file size (max 5MB)
    if (file.size > 5 * 1024 * 1024) {
        Alert.error('Erreur', 'L\'image ne doit pas dépasser 5 Mo');
        return;
    }
    
    // Read and display image
    const reader = new FileReader();
    reader.onload = (e) => {
        const avatarImage = document.getElementById('avatarImage');
        const avatarPlaceholder = document.querySelector('.avatar-placeholder');
        
        avatarImage.src = e.target.result;
        avatarImage.style.display = 'block';
        avatarPlaceholder.style.display = 'none';
        
        Toast.success('Photo mise à jour', 'Votre photo de profil a été modifiée');
        
        // In production, upload to server here
        uploadAvatar(file);
    };
    
    reader.readAsDataURL(file);
}

// Simulate avatar upload
async function uploadAvatar(file) {
    // Simulate API upload
    console.log('Uploading avatar:', file.name);
}

// Open change password modal
function openChangePasswordModal() {
    Modal.open('changePasswordModal');
}

// Handle password change
async function handlePasswordChange(e) {
    e.preventDefault();
    
    if (!Validator.validateForm(e.target)) {
        return;
    }
    
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());
    
    // Check if new passwords match
    if (data.newPassword !== data.confirmNewPassword) {
        Alert.error('Erreur', 'Les mots de passe ne correspondent pas');
        return;
    }
    
    try {
        // Show loading
        Toast.info('Modification', 'Changement en cours...');
        
        // Simulate API call
        await changePassword(data);
        
        // Close modal
        Modal.close('changePasswordModal');
        
        // Reset form
        e.target.reset();
        
        // Show success
        Alert.success(
            'Mot de passe modifié !',
            'Votre mot de passe a été changé avec succès'
        );
        
    } catch (error) {
        Alert.error(
            'Erreur',
            error.message || 'Impossible de changer le mot de passe'
        );
    }
}

// Simulate password change API call
async function changePassword(data) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // Simulate validation
            if (data.currentPassword !== 'password123') {
                reject(new Error('Mot de passe actuel incorrect'));
                return;
            }
            console.log('Password changed');
            resolve({ success: true });
        }, 1000);
    });
}

// View active sessions
function viewActiveSessions() {
    Alert.info(
        'Sessions actives',
        'Cette fonctionnalité permet de voir et gérer tous les appareils connectés à votre compte.',
        () => {
            // In production, show sessions modal
            console.log('View active sessions');
        }
    );
}

// Download user data
function downloadData() {
    Alert.confirm(
        'Télécharger mes données',
        'Vous allez recevoir un email avec toutes vos données personnelles au format JSON',
        async () => {
            Toast.info('Préparation', 'Génération de vos données...');
            
            // Simulate data export
            setTimeout(() => {
                Alert.success(
                    'Email envoyé !',
                    'Vous recevrez vos données dans quelques minutes'
                );
            }, 2000);
        }
    );
}

// Delete account
function deleteAccount() {
    Alert.confirm(
        '⚠️ Supprimer mon compte',
        'Cette action est irréversible. Toutes vos données seront définitivement supprimées. Êtes-vous absolument certain ?',
        () => {
            // Second confirmation
            Alert.confirm(
                '⚠️ Dernière confirmation',
                'Tapez "SUPPRIMER" pour confirmer la suppression de votre compte',
                async () => {
                    Toast.info('Suppression', 'Suppression en cours...');
                    
                    // Simulate account deletion
                    setTimeout(() => {
                        Alert.success(
                            'Compte supprimé',
                            'Votre compte a été supprimé. Nous espérons vous revoir bientôt.',
                            () => {
                                UserSession.logout();
                            }
                        );
                    }, 2000);
                }
            );
        }
    );
}

// 2FA Toggle
const twoFAToggle = document.getElementById('2faToggle');
if (twoFAToggle) {
    twoFAToggle.addEventListener('change', (e) => {
        if (e.target.checked) {
            Alert.info(
                'Authentification à deux facteurs',
                'Pour activer la 2FA, vous recevrez un code de vérification par email',
                () => {
                    Toast.success('2FA activée', 'Votre compte est maintenant plus sécurisé');
                }
            );
        } else {
            Alert.confirm(
                'Désactiver la 2FA',
                'Êtes-vous sûr de vouloir désactiver l\'authentification à deux facteurs ?',
                () => {
                    Toast.info('2FA désactivée', 'L\'authentification à deux facteurs a été désactivée');
                },
                () => {
                    // Cancel - revert toggle
                    e.target.checked = true;
                }
            );
        }
    });
}

// Notification toggles
const notificationToggles = document.querySelectorAll('#notificationsForm .switch input');
notificationToggles.forEach(toggle => {
    toggle.addEventListener('change', (e) => {
        const label = e.target.closest('.notification-item').querySelector('h4').textContent;
        const status = e.target.checked ? 'activées' : 'désactivées';
        Toast.info('Notifications', `${label} ${status}`);
    });
});