// Coach Dashboard JavaScript
document.addEventListener('DOMContentLoaded', () => {
    // Check if user is logged in
    if (!UserSession.isLoggedIn()) {
        window.location.href = 'login.html';
        return;
    }
    
    // Check if user is a coach
    const user = UserSession.getUser();
    if (user && user.role !== 'coach') {
        Alert.warning(
            'Accès refusé',
            'Cette page est réservée aux coachs',
            () => {
                window.location.href = 'sportif-dashboard.html';
            }
        );
        return;
    }
    
    // Load coach data
    loadCoachData();
    
    // Initialize dashboard
    initializeDashboard();
});

// Load coach data
function loadCoachData() {
    const user = UserSession.getUser();
    
    if (user) {
        // Update coach name
        const coachName = document.getElementById('coachName');
        if (coachName) {
            coachName.textContent = user.prenom || user.nom || 'Coach';
        }
    }
}

// Initialize dashboard functionality
function initializeDashboard() {
    // Animate stats on load
    animateStats();
    
    // Setup progress bars animation
    animateProgressBars();
}

// Accept request
function acceptRequest(requestId) {
    Alert.confirm(
        'Accepter la demande',
        'Voulez-vous accepter cette demande de réservation ?',
        async () => {
            // Show loading
            Toast.info('Traitement', 'Acceptation en cours...');
            
            try {
                // Simulate API call
                await processRequest(requestId, 'accept');
                
                // Show success
                Alert.success(
                    'Demande acceptée !',
                    'Le sportif a été notifié de votre acceptation',
                    () => {
                        // Remove request from list or reload
                        removeRequestFromList(requestId);
                    }
                );
            } catch (error) {
                Alert.error(
                    'Erreur',
                    error.message || 'Une erreur est survenue'
                );
            }
        }
    );
}

// Reject request
function rejectRequest(requestId) {
    Alert.confirm(
        'Refuser la demande',
        'Êtes-vous sûr de vouloir refuser cette demande ? Cette action est définitive.',
        async () => {
            // Show loading
            Toast.info('Traitement', 'Refus en cours...');
            
            try {
                // Simulate API call
                await processRequest(requestId, 'reject');
                
                // Show success
                Toast.success(
                    'Demande refusée',
                    'Le sportif a été notifié'
                );
                
                // Remove request from list
                removeRequestFromList(requestId);
            } catch (error) {
                Alert.error(
                    'Erreur',
                    error.message || 'Une erreur est survenue'
                );
            }
        }
    );
}

// Simulate API call to process request
async function processRequest(requestId, action) {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log(`Request ${requestId} ${action}ed`);
            resolve({ success: true });
        }, 1000);
    });
}

// Remove request from list with animation
function removeRequestFromList(requestId) {
    const requestItems = document.querySelectorAll('.request-item');
    requestItems[requestId - 1]?.classList.add('removing');
    
    setTimeout(() => {
        requestItems[requestId - 1]?.remove();
        
        // Update badge count
        const badge = document.querySelector('.badge-primary');
        if (badge) {
            const currentCount = parseInt(badge.textContent);
            const newCount = currentCount - 1;
            badge.textContent = `${newCount} nouvelle${newCount > 1 ? 's' : ''}`;
        }
        
        // Update pending stats
        const pendingStat = document.querySelector('.stat-primary h3');
        if (pendingStat) {
            const currentCount = parseInt(pendingStat.textContent);
            pendingStat.textContent = currentCount - 1;
        }
    }, 300);
}

// Animate stats on load
function animateStats() {
    const statNumbers = document.querySelectorAll('.stat-details h3');
    
    statNumbers.forEach(stat => {
        const finalValue = parseFloat(stat.textContent);
        let currentValue = 0;
        const increment = finalValue / 30;
        
        const animation = setInterval(() => {
            currentValue += increment;
            if (currentValue >= finalValue) {
                stat.textContent = finalValue;
                clearInterval(animation);
            } else {
                stat.textContent = Math.floor(currentValue);
            }
        }, 30);
    });
}

// Animate progress bars
function animateProgressBars() {
    const progressBars = document.querySelectorAll('.progress-bar');
    
    progressBars.forEach(bar => {
        const finalWidth = bar.style.width;
        bar.style.width = '0%';
        
        setTimeout(() => {
            bar.style.width = finalWidth;
        }, 300);
    });
}

// Manage availabilities (placeholder)
document.querySelector('.welcome-banner .btn-primary')?.addEventListener('click', (e) => {
    e.preventDefault();
    Alert.info(
        'Gérer les disponibilités',
        'Fonctionnalité de gestion des disponibilités à venir',
        () => {
            // Redirect to availability management page
            // window.location.href = 'manage-availability.html';
        }
    );
});

// Start session
document.querySelectorAll('.session-actions-bottom .btn-primary').forEach(btn => {
    btn.addEventListener('click', () => {
        Alert.success(
            'Démarrer la séance',
            'Bonne séance avec votre sportif !',
            () => {
                // Redirect to session tracking page
                Toast.info('Session', 'Redirection vers le suivi de séance...');
            }
        );
    });
});

// View session details
document.querySelectorAll('.session-actions-bottom .btn-outline').forEach(btn => {
    btn.addEventListener('click', () => {
        Alert.info(
            'Détails de la séance',
            'Affichage des détails complets de la séance'
        );
    });
});

// Add CSS for removing animation
const style = document.createElement('style');
style.textContent = `
    .request-item.removing {
        opacity: 0;
        transform: translateX(-20px);
        transition: all 0.3s ease;
    }
`;
document.head.appendChild(style);