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
                        coachFields.querySelectorAll('input, select').forEach(field => {
                            field.setAttribute('required', 'required');
                        });
                    } else {
                        coachFields.classList.add('hidden');
                        coachFields.querySelectorAll('input, select').forEach(field => {
                            field.removeAttribute('required');
                        });
                    }
                }
            });
        });
    }
    
    // Photo URL Preview
    const photoUrlInput = document.getElementById('photoUrl');
    const photoPreview = document.getElementById('photoPreview');
    const previewImage = document.getElementById('previewImage');

    if (photoUrlInput && photoPreview && previewImage) {
        photoUrlInput.addEventListener('input', function() {
            const url = this.value.trim();
            
            if (url) {
                previewImage.src = url;
                
                previewImage.onerror = function() {
                    photoPreview.classList.add('hidden');
                };
                
                previewImage.onload = function() {
                    photoPreview.classList.remove('hidden');
                };
            } else {
                photoPreview.classList.add('hidden');
                previewImage.src = '';
            }
        });
    }
});

// Toggle password visibility
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    if (input) {
        input.type = input.type === 'password' ? 'text' : 'password';
    }
}

// Social login handlers
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-social').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const provider = btn.classList.contains('btn-google') ? 'Google' : 'Facebook';
            alert(`La connexion via ${provider} sera bientôt disponible`);
        });
    });
});