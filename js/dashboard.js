// Dashboard Page Scripts
document.addEventListener('DOMContentLoaded', () => {
    // Check if user is logged in
    if (!UserSession.isLoggedIn()) {
        window.location.href = 'login.html';
        return;
    }
    
    // Load user data
    loadUserData();
    
    // Setup event listeners
    setupDashboard();
});

// Load user data
function loadUserData() {
    const user = UserSession.getUser();
    
    if (user) {
        // Update welcome message
        const userName = document.getElementById('userName');
        if (userName) {
            userName.textContent = user.prenom || user.nom || 'Sportif';
        }
    }
}

// Setup dashboard functionality
function setupDashboard() {
    // Session action buttons
    document.querySelectorAll('.session-item .btn-icon').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const action = btn.getAttribute('title');
            
            if (action === 'Modifier') {
                handleEditSession();
            } else if (action === 'Annuler') {
                handleCancelSession();
            }
        });
    });
    
    // Coach booking buttons
    document.querySelectorAll('.coach-item .btn-primary').forEach(btn => {
        btn.addEventListener('click', () => {
            const coachName = btn.closest('.coach-item').querySelector('h4').textContent;
            bookCoachFromDashboard(coachName);
        });
    });
}

// Handle edit session
function handleEditSession() {
    Alert.info(
        'Modifier la séance',
        'Sélectionnez un nouveau créneau pour votre séance',
        () => {
            // In real app, open calendar modal
            Toast.info('Calendrier', 'Fonctionnalité à venir');
        }
    );
}

// Handle cancel session
function handleCancelSession() {
    Alert.confirm(
        'Annuler la séance',
        'Êtes-vous sûr de vouloir annuler cette séance ? Cette action est irréversible.',
        () => {
            // Simulate cancellation
            Toast.success('Séance annulée', 'Votre réservation a été annulée avec succès');
            
            // In real app, make API call to cancel
            setTimeout(() => {
                // Reload dashboard data
                location.reload();
            }, 1500);
        }
    );
}

// Book coach from dashboard
function bookCoachFromDashboard(coachName) {
    Alert.success(
        'Réserver une séance',
        `Vous allez réserver une séance avec ${coachName}`,
        () => {
            // Redirect to booking
            window.location.href = 'coaches.html';
        }
    );
}

// Refresh dashboard data
function refreshDashboard() {
    Toast.info('Actualisation', 'Mise à jour des données...');
    
    // Simulate API call
    setTimeout(() => {
        Toast.success('Actualisé', 'Vos données ont été mises à jour');
        loadUserData();
    }, 1000);
}