// Sample coach data
const coachesData = [
    {
        id: 1,
        nom: "Ahmed",
        prenom: "Benali",
        discipline: "Football",
        experience: 8,
        tarif: 350,
        rating: 4.9,
        reviews: 127,
        photo: null,
        bio: "Ancien joueur professionnel avec 15 ans d'expérience. Spécialisé dans la technique et la tactique.",
        certifications: ["UEFA B", "Préparateur Physique"],
        verified: true
    },
    {
        id: 2,
        nom: "Sara",
        prenom: "El Amrani",
        discipline: "Tennis",
        experience: 6,
        tarif: 400,
        rating: 4.8,
        reviews: 89,
        photo: null,
        bio: "Coach diplômée FFT, spécialisée dans le tennis de compétition et la préparation mentale.",
        certifications: ["FFT Niveau 2"],
        verified: true
    },
    {
        id: 3,
        nom: "Karim",
        prenom: "Alaoui",
        discipline: "Natation",
        experience: 10,
        tarif: 300,
        rating: 4.9,
        reviews: 156,
        photo: null,
        bio: "Ancien nageur olympique. Formation technique pour tous niveaux, du débutant au confirmé.",
        certifications: ["Maître Nageur"],
        verified: true
    },
    {
        id: 4,
        nom: "Fatima",
        prenom: "Zahra",
        discipline: "Préparation Physique",
        experience: 5,
        tarif: 280,
        rating: 4.7,
        reviews: 94,
        photo: null,
        bio: "Coach certifiée en musculation et conditionnement physique. Programmes personnalisés.",
        certifications: ["NSCA-CPT"],
        verified: true
    },
    {
        id: 5,
        nom: "Youssef",
        prenom: "Tazi",
        discipline: "Sports de Combat",
        experience: 12,
        tarif: 450,
        rating: 4.9,
        reviews: 203,
        photo: null,
        bio: "Champion national de boxe. Enseigne la boxe, le kickboxing et la self-défense.",
        certifications: ["Ceinture Noire Karaté", "Coach Boxe"],
        verified: true
    },
    {
        id: 6,
        nom: "Meryem",
        prenom: "Idrissi",
        discipline: "Athlétisme",
        experience: 7,
        tarif: 320,
        rating: 4.8,
        reviews: 112,
        photo: null,
        bio: "Spécialisée en course de fond et demi-fond. Préparation physique et mentale.",
        certifications: ["Entraîneur d'Athlétisme"],
        verified: true
    }
];

// Initialize page
document.addEventListener('DOMContentLoaded', () => {
    renderCoaches(coachesData);
    setupFilters();
    setupSearch();
    setupSort();
});

// Render coaches grid
function renderCoaches(coaches) {
    const grid = document.getElementById('coachesGrid');
    const resultsCount = document.getElementById('resultsCount');
    
    if (!grid) return;
    
    // Update results count
    if (resultsCount) {
        resultsCount.textContent = coaches.length;
    }
    
    // Clear grid
    grid.innerHTML = '';
    
    // Check if no results
    if (coaches.length === 0) {
        grid.innerHTML = `
            <div class="empty-state">
                <div class="empty-state-icon">🔍</div>
                <h3>Aucun coach trouvé</h3>
                <p>Essayez de modifier vos critères de recherche</p>
                <button class="btn btn-primary" onclick="resetFilters()">Réinitialiser les filtres</button>
            </div>
        `;
        return;
    }
    
    // Render coach cards
    coaches.forEach(coach => {
        const card = createCoachCard(coach);
        grid.appendChild(card);
    });
}

// Create coach card element
function createCoachCard(coach) {
    const card = document.createElement('div');
    card.className = 'coach-card';
    card.onclick = () => viewCoachProfile(coach.id);
    
    card.innerHTML = `
        <div class="coach-image">
            ${coach.photo ? 
                `<img src="${coach.photo}" alt="${coach.prenom} ${coach.nom}">` : 
                `<div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 4rem; color: white;">👤</div>`
            }
            ${coach.verified ? '<div class="coach-badge">✓ Vérifié</div>' : ''}
            <div class="coach-rating">
                ⭐ ${coach.rating} (${coach.reviews})
            </div>
        </div>
        <div class="coach-content">
            <div class="coach-header">
                <h3 class="coach-name">${coach.prenom} ${coach.nom}</h3>
                <div class="coach-discipline">
                    <span>🏆</span> ${coach.discipline}
                </div>
            </div>
            <p class="coach-bio">${coach.bio}</p>
            <div class="coach-info">
                <div class="info-item">
                    <span class="info-icon">📅</span>
                    <span>${coach.experience} ans d'exp.</span>
                </div>
                <div class="info-item">
                    <span class="info-icon">🎓</span>
                    <span>${coach.certifications.length} certification${coach.certifications.length > 1 ? 's' : ''}</span>
                </div>
            </div>
            <div class="coach-footer">
                <div class="coach-price">
                    ${coach.tarif} DH
                    <div class="price-label">/séance</div>
                </div>
                <button class="btn btn-primary" onclick="event.stopPropagation(); bookCoach(${coach.id})">
                    Réserver
                </button>
            </div>
        </div>
    `;
    
    return card;
}

// Setup filters
function setupFilters() {
    const disciplineFilter = document.getElementById('disciplineFilter');
    const experienceFilter = document.getElementById('experienceFilter');
    const priceFilter = document.getElementById('priceFilter');
    
    [disciplineFilter, experienceFilter, priceFilter].forEach(filter => {
        if (filter) {
            filter.addEventListener('change', applyFilters);
        }
    });
}

// Setup search
function setupSearch() {
    const searchInput = document.getElementById('searchInput');
    
    if (searchInput) {
        let timeout;
        searchInput.addEventListener('input', () => {
            clearTimeout(timeout);
            timeout = setTimeout(applyFilters, 300);
        });
    }
}

// Setup sort
function setupSort() {
    const sortBy = document.getElementById('sortBy');
    
    if (sortBy) {
        sortBy.addEventListener('change', applyFilters);
    }
}

// Apply all filters
function applyFilters() {
    let filtered = [...coachesData];
    
    // Search filter
    const searchTerm = document.getElementById('searchInput')?.value.toLowerCase();
    if (searchTerm) {
        filtered = filtered.filter(coach => 
            `${coach.prenom} ${coach.nom}`.toLowerCase().includes(searchTerm) ||
            coach.discipline.toLowerCase().includes(searchTerm) ||
            coach.bio.toLowerCase().includes(searchTerm)
        );
    }
    
    // Discipline filter
    const discipline = document.getElementById('disciplineFilter')?.value;
    if (discipline) {
        filtered = filtered.filter(coach => 
            coach.discipline.toLowerCase() === discipline.toLowerCase()
        );
    }
    
    // Experience filter
    const experience = document.getElementById('experienceFilter')?.value;
    if (experience) {
        const [min, max] = experience.includes('+') ? 
            [parseInt(experience), Infinity] : 
            experience.split('-').map(n => parseInt(n));
        
        filtered = filtered.filter(coach => 
            coach.experience >= min && coach.experience <= max
        );
    }
    
    // Price filter
    const price = document.getElementById('priceFilter')?.value;
    if (price) {
        const [min, max] = price.includes('+') ? 
            [parseInt(price), Infinity] : 
            price.split('-').map(n => parseInt(n));
        
        filtered = filtered.filter(coach => 
            coach.tarif >= min && coach.tarif <= max
        );
    }
    
    // Sort
    const sortBy = document.getElementById('sortBy')?.value;
    if (sortBy) {
        switch(sortBy) {
            case 'rating':
                filtered.sort((a, b) => b.rating - a.rating);
                break;
            case 'experience':
                filtered.sort((a, b) => b.experience - a.experience);
                break;
            case 'price-low':
                filtered.sort((a, b) => a.tarif - b.tarif);
                break;
            case 'price-high':
                filtered.sort((a, b) => b.tarif - a.tarif);
                break;
            default:
                // Recommended (default order)
                break;
        }
    }
    
    renderCoaches(filtered);
}

// Reset all filters
function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('disciplineFilter').value = '';
    document.getElementById('experienceFilter').value = '';
    document.getElementById('priceFilter').value = '';
    document.getElementById('sortBy').value = 'recommended';
    
    renderCoaches(coachesData);
}

// View coach profile
function viewCoachProfile(coachId) {
    // In a real app, this would navigate to a detailed profile page
    const coach = coachesData.find(c => c.id === coachId);
    if (coach) {
        Alert.info(
            `Profil de ${coach.prenom} ${coach.nom}`,
            `Coach de ${coach.discipline} avec ${coach.experience} ans d'expérience. Note: ${coach.rating}/5 (${coach.reviews} avis)`
        );
    }
}

// Book a coach
function bookCoach(coachId) {
    const coach = coachesData.find(c => c.id === coachId);
    
    if (!UserSession.isLoggedIn()) {
        Alert.warning(
            'Connexion requise',
            'Vous devez être connecté pour réserver une séance',
            () => {
                window.location.href = 'login.html';
            }
        );
        return;
    }
    
    if (coach) {
        Alert.success(
            'Réservation',
            `Vous allez réserver une séance avec ${coach.prenom} ${coach.nom}`,
            () => {
                // Redirect to booking page
                window.location.href = `booking.html?coach=${coachId}`;
            }
        );
    }
}