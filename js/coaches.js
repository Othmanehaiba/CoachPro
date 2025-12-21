// Setup filters when page loads
document.addEventListener('DOMContentLoaded', () => {
    setupFilters();
    setupSearch();
    setupSort();
});

// Setup filters
function setupFilters() {
    const disciplineFilter = document.getElementById('disciplineFilter');
    const experienceFilter = document.getElementById('experienceFilter');
    const priceFilter = document.getElementById('priceFilter');
    
    if (disciplineFilter) disciplineFilter.addEventListener('change', applyFilters);
    if (experienceFilter) experienceFilter.addEventListener('change', applyFilters);
    if (priceFilter) priceFilter.addEventListener('change', applyFilters);
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
    if (sortBy) sortBy.addEventListener('change', applyFilters);
}

// Apply all filters
function applyFilters() {
    const grid = document.getElementById('coachesGrid');
    if (!grid) return;
    
    const cards = Array.from(grid.getElementsByClassName('coach-card'));
    let visibleCount = 0;
    
    // Get filter values
    const searchTerm = document.getElementById('searchInput')?.value.toLowerCase() || '';
    const disciplineValue = document.getElementById('disciplineFilter')?.value.toLowerCase() || '';
    const experienceValue = document.getElementById('experienceFilter')?.value || '';
    const priceValue = document.getElementById('priceFilter')?.value || '';
    
    // Filter cards
    cards.forEach(card => {
        let show = true;
        
        // Search filter
        if (searchTerm) {
            const nom = card.dataset.nom?.toLowerCase() || '';
            const prenom = card.dataset.prenom?.toLowerCase() || '';
            const discipline = card.dataset.discipline?.toLowerCase() || '';
            const bio = card.dataset.bio?.toLowerCase() || '';
            
            if (!nom.includes(searchTerm) && 
                !prenom.includes(searchTerm) && 
                !discipline.includes(searchTerm) && 
                !bio.includes(searchTerm)) {
                show = false;
            }
        }
        
        // Discipline filter
        if (disciplineValue && show) {
            const cardDiscipline = card.dataset.discipline?.toLowerCase() || '';
            if (cardDiscipline !== disciplineValue) {
                show = false;
            }
        }
        
        // Experience filter
        if (experienceValue && show) {
            const experience = parseInt(card.dataset.experience) || 0;
            const [min, max] = experienceValue.includes('+') ? 
                [parseInt(experienceValue), Infinity] : 
                experienceValue.split('-').map(n => parseInt(n));
            
            if (experience < min || experience > max) {
                show = false;
            }
        }
        
        // Price filter
        if (priceValue && show) {
            const tarif = parseFloat(card.dataset.tarif) || 0;
            const [min, max] = priceValue.includes('+') ? 
                [parseInt(priceValue), Infinity] : 
                priceValue.split('-').map(n => parseInt(n));
            
            if (tarif < min || tarif > max) {
                show = false;
            }
        }
        
        // Show or hide card
        card.style.display = show ? '' : 'none';
        if (show) visibleCount++;
    });
    
    // Sort visible cards
    sortCards(cards.filter(card => card.style.display !== 'none'));
    
    // Update results count
    updateResultsCount(visibleCount);
    
    // Show empty state if needed
    showEmptyState(visibleCount === 0);
}

// Sort cards
function sortCards(visibleCards) {
    const sortBy = document.getElementById('sortBy')?.value;
    if (!sortBy || sortBy === 'recommended') return;
    
    const grid = document.getElementById('coachesGrid');
    
    visibleCards.sort((a, b) => {
        switch(sortBy) {
            case 'rating':
                return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
            case 'experience':
                return parseInt(b.dataset.experience) - parseInt(a.dataset.experience);
            case 'price-low':
                return parseFloat(a.dataset.tarif) - parseFloat(b.dataset.tarif);
            case 'price-high':
                return parseFloat(b.dataset.tarif) - parseFloat(a.dataset.tarif);
            default:
                return 0;
        }
    });
    
    // Re-append cards in sorted order
    visibleCards.forEach(card => grid.appendChild(card));
}

// Update results count
function updateResultsCount(count) {
    const resultsCount = document.getElementById('resultsCount');
    if (resultsCount) {
        resultsCount.textContent = count;
    }
}

// Show empty state
function showEmptyState(show) {
    const grid = document.getElementById('coachesGrid');
    if (!grid) return;
    
    let emptyState = grid.querySelector('.empty-state');
    
    if (show && !emptyState) {
        emptyState = document.createElement('div');
        emptyState.className = 'empty-state';
        emptyState.innerHTML = `
            <div class="empty-state-icon">🔍</div>
            <h3>Aucun coach trouvé</h3>
            <p>Essayez de modifier vos critères de recherche</p>
            <button class="btn btn-primary" onclick="resetFilters()">Réinitialiser les filtres</button>
        `;
        grid.appendChild(emptyState);
    } else if (!show && emptyState) {
        emptyState.remove();
    }
}

// Reset all filters
function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('disciplineFilter').value = '';
    document.getElementById('experienceFilter').value = '';
    document.getElementById('priceFilter').value = '';
    document.getElementById('sortBy').value = 'recommended';
    
    applyFilters();
}