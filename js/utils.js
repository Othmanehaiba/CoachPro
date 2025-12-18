// Validation Utilities
const Validator = {
    // Regex patterns
    patterns: {
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        phone: /^(\+212|0)[5-7]\d{8}$/,
        // password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
        name: /^[a-zA-Z\s'-]{2,50}$/,
        url: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/
    },

    // Validation messages
    messages: {
        required: 'Ce champ est requis',
        email: 'Veuillez entrer une adresse email valide',
        phone: 'Veuillez entrer un numéro de téléphone valide (ex: 0612345678)',
        // password: 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial',
        name: 'Veuillez entrer un nom valide (2-50 caractères)',
        confirmPassword: 'Les mots de passe ne correspondent pas',
        minLength: 'Ce champ doit contenir au moins {min} caractères',
        maxLength: 'Ce champ ne peut pas dépasser {max} caractères',
        url: 'Veuillez entrer une URL valide'
    },

    // Validate single field
    validateField(input) {
        const value = input.value.trim();
        const type = input.getAttribute('data-validate');
        const required = input.hasAttribute('required');
        
        // Check if required
        if (required && !value) {
            return { valid: false, message: this.messages.required };
        }
        
        // If not required and empty, it's valid
        if (!required && !value) {
            return { valid: true };
        }
        
        // Validate based on type
        if (type && this.patterns[type]) {
            if (!this.patterns[type].test(value)) {
                return { valid: false, message: this.messages[type] };
            }
        }
        
        // Check min length
        const minLength = input.getAttribute('minlength');
        if (minLength && value.length < parseInt(minLength)) {
            return { 
                valid: false, 
                message: this.messages.minLength.replace('{min}', minLength) 
            };
        }
        
        // Check max length
        const maxLength = input.getAttribute('maxlength');
        if (maxLength && value.length > parseInt(maxLength)) {
            return { 
                valid: false, 
                message: this.messages.maxLength.replace('{max}', maxLength) 
            };
        }
        
        // Confirm password validation
        if (input.getAttribute('data-confirm')) {
            const originalInput = document.getElementById(input.getAttribute('data-confirm'));
            if (value !== originalInput.value) {
                return { valid: false, message: this.messages.confirmPassword };
            }
        }
        
        return { valid: true };
    },

    // Show error message
    showError(input, message) {
        input.classList.add('error');
        const errorDiv = input.parentElement.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.textContent = message;
            errorDiv.classList.add('active');
        }
    },

    // Hide error message
    hideError(input) {
        input.classList.remove('error');
        const errorDiv = input.parentElement.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.classList.remove('active');
        }
    },

    // Validate entire form
    validateForm(form) {
        let isValid = true;
        const inputs = form.querySelectorAll('input[data-validate], textarea[data-validate], select[required]');
        
        inputs.forEach(input => {
            const result = this.validateField(input);
            if (!result.valid) {
                this.showError(input, result.message);
                isValid = false;
            } else {
                this.hideError(input);
            }
        });
        
        return isValid;
    },

    // Setup real-time validation
    setupRealtimeValidation(form) {
        const inputs = form.querySelectorAll('input[data-validate], textarea[data-validate]');
        
        inputs.forEach(input => {
            // Validate on blur
            input.addEventListener('blur', () => {
                const result = this.validateField(input);
                if (!result.valid) {
                    this.showError(input, result.message);
                } else {
                    this.hideError(input);
                }
            });
            
            // Clear error on input
            input.addEventListener('input', () => {
                if (input.classList.contains('error')) {
                    this.hideError(input);
                }
            });
        });
    }
};

// Modal Management
const Modal = {
    open(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    },

    close(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    },

    closeAll() {
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            modal.classList.remove('active');
        });
        document.body.style.overflow = '';
    }
};

// Alert Management (SweetAlert-like)
const Alert = {
    show(options) {
        const {
            type = 'info',
            title = '',
            message = '',
            confirmText = 'OK',
            cancelText = 'Annuler',
            showCancel = false,
            onConfirm = () => {},
            onCancel = () => {}
        } = options;

        // Remove existing alerts
        document.querySelectorAll('.alert-overlay').forEach(el => el.remove());

        // Create alert HTML
        const alertHTML = `
            <div class="alert-overlay active" id="customAlert">
                <div class="alert alert-${type}">
                    <div class="alert-icon">
                        ${this.getIcon(type)}
                    </div>
                    <h3>${title}</h3>
                    <p>${message}</p>
                    <div class="alert-actions">
                        ${showCancel ? `<button class="btn btn-ghost" onclick="Alert.cancel()">${cancelText}</button>` : ''}
                        <button class="btn btn-primary" onclick="Alert.confirm()">${confirmText}</button>
                    </div>
                </div>
            </div>
        `;

        document.body.insertAdjacentHTML('beforeend', alertHTML);

        // Store callbacks
        this.onConfirmCallback = onConfirm;
        this.onCancelCallback = onCancel;

        // Close on overlay click
        const overlay = document.getElementById('customAlert');
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                this.close();
            }
        });
    },

    getIcon(type) {
        const icons = {
            success: '✓',
            error: '✕',
            warning: '⚠',
            info: 'ℹ'
        };
        return icons[type] || icons.info;
    },

    confirm() {
        if (this.onConfirmCallback) {
            this.onConfirmCallback();
        }
        this.close();
    },

    cancel() {
        if (this.onCancelCallback) {
            this.onCancelCallback();
        }
        this.close();
    },

    close() {
        const alert = document.getElementById('customAlert');
        if (alert) {
            alert.classList.remove('active');
            setTimeout(() => alert.remove(), 300);
        }
    },

    // Quick methods
    success(title, message, onConfirm) {
        this.show({ type: 'success', title, message, onConfirm });
    },

    error(title, message, onConfirm) {
        this.show({ type: 'error', title, message, onConfirm });
    },

    warning(title, message, onConfirm) {
        this.show({ type: 'warning', title, message, onConfirm });
    },

    info(title, message, onConfirm) {
        this.show({ type: 'info', title, message, onConfirm });
    },

    confirm(title, message, onConfirm, onCancel) {
        this.show({
            type: 'warning',
            title,
            message,
            showCancel: true,
            confirmText: 'Confirmer',
            onConfirm,
            onCancel
        });
    }
};

// Toast Notifications
const Toast = {
    container: null,

    init() {
        if (!this.container) {
            this.container = document.createElement('div');
            this.container.className = 'toast-container';
            document.body.appendChild(this.container);
        }
    },

    show(options) {
        this.init();

        const {
            type = 'info',
            title = '',
            message = '',
            duration = 3000
        } = options;

        const toastId = 'toast-' + Date.now();
        
        const toastHTML = `
            <div class="toast toast-${type}" id="${toastId}">
                <div class="toast-icon">
                    ${this.getIcon(type)}
                </div>
                <div class="toast-content">
                    ${title ? `<div class="toast-title">${title}</div>` : ''}
                    ${message ? `<p class="toast-message">${message}</p>` : ''}
                </div>
                <button class="toast-close" onclick="Toast.close('${toastId}')">×</button>
            </div>
        `;

        this.container.insertAdjacentHTML('beforeend', toastHTML);
        
        const toast = document.getElementById(toastId);
        setTimeout(() => toast.classList.add('active'), 10);

        if (duration > 0) {
            setTimeout(() => this.close(toastId), duration);
        }
    },

    getIcon(type) {
        const icons = {
            success: '✓',
            error: '✕',
            warning: '⚠',
            info: 'ℹ'
        };
        return icons[type] || icons.info;
    },

    close(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.classList.remove('active');
            setTimeout(() => toast.remove(), 300);
        }
    },

    success(title, message, duration) {
        this.show({ type: 'success', title, message, duration });
    },

    error(title, message, duration) {
        this.show({ type: 'error', title, message, duration });
    },

    warning(title, message, duration) {
        this.show({ type: 'warning', title, message, duration });
    },

    info(title, message, duration) {
        this.show({ type: 'info', title, message, duration });
    }
};

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Setup modal close buttons
    document.querySelectorAll('.modal-close, [data-modal-close]').forEach(btn => {
        btn.addEventListener('click', () => {
            const modal = btn.closest('.modal-overlay');
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    // Close modals on overlay click
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) {
                overlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    // Setup form validation
    document.querySelectorAll('form[data-validate]').forEach(form => {
        Validator.setupRealtimeValidation(form);
        
        // FIXED: Only prevent submission if validation fails
        form.addEventListener('submit', (e) => {
            if (!Validator.validateForm(form)) {
                e.preventDefault(); // Only prevent if invalid
                console.log('Form validation failed');
            } else {
                console.log('Form is valid - submitting to PHP');
                // Form will submit naturally to registerHandling.php
            }
        });
    });
});