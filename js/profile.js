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

// Load user profile data from session
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
    
    // Display preview
    const reader = new FileReader();
    reader.onload = (e) => {
        const avatarImage = document.getElementById('avatarImage');
        const avatarPlaceholder = document.querySelector('.avatar-placeholder');
        
        avatarImage.src = e.target.result;
        avatarImage.style.display = 'block';
        avatarPlaceholder.style.display = 'none';
        
        Toast.success('Photo mise à jour', 'Votre photo de profil a été modifiée');
        
        // PHP will handle the actual upload when form is submitted
    };
    
    reader.readAsDataURL(file);
}

// Open change password modal
function openChangePasswordModal() {
    Modal.open('changePasswordModal');
}

