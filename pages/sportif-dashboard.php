<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Espace - CoachPro</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="../pages/index.html" class="logo">
                <div class="logo-icon">CP</div>
                <span>CoachPro</span>
            </a>
            
            <nav class="nav">
                <ul class="nav-links">
                    <li><a href="sportif-dashboard.html" class="nav-link active">Tableau de bord</a></li>
                    <li><a href="coaches.html" class="nav-link">Trouver un Coach</a></li>
                    <li><a href="#" class="nav-link">Mes Réservations</a></li>
                    <li><a href="#" class="nav-link">Mon Profil</a></li>
                </ul>
                
                <div class="nav-actions">
                    <button class="btn btn-ghost" onclick="UserSession.logout()">Déconnexion</button>
                </div>
            </nav>
            
            <button class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Dashboard Content -->
    <section class="dashboard-section">
        <div class="container">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-content">
                    <h1>Bienvenue, <span id="userName">Sportif</span>! 👋</h1>
                    <p>Prêt pour votre prochaine séance d'entraînement ?</p>
                </div>
                <a href="coaches.html" class="btn btn-primary">Réserver une séance</a>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📅</div>
                    <div class="stat-details">
                        <h3>12</h3>
                        <p>Séances ce mois</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">⏱️</div>
                    <div class="stat-details">
                        <h3>24h</h3>
                        <p>Temps d'entraînement</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">🎯</div>
                    <div class="stat-details">
                        <h3>3</h3>
                        <p>Coachs différents</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-details">
                        <h3>4.8</h3>
                        <p>Note moyenne</p>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="dashboard-grid">
                <!-- Upcoming Sessions -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h2>Prochaines Séances</h2>
                        <a href="#" class="link">Voir tout</a>
                    </div>
                    <div class="sessions-list">
                        <div class="session-item">
                            <div class="session-date">
                                <div class="date-day">15</div>
                                <div class="date-month">DÉC</div>
                            </div>
                            <div class="session-details">
                                <h4>Football - Technique</h4>
                                <p>Coach Ahmed Benali</p>
                                <div class="session-time">⏰ 14:00 - 15:30</div>
                            </div>
                            <div class="session-actions">
                                <button class="btn-icon" title="Modifier">✏️</button>
                                <button class="btn-icon" title="Annuler">🗑️</button>
                            </div>
                        </div>
                        
                        <div class="session-item">
                            <div class="session-date">
                                <div class="date-day">18</div>
                                <div class="date-month">DÉC</div>
                            </div>
                            <div class="session-details">
                                <h4>Préparation Physique</h4>
                                <p>Coach Fatima Zahra</p>
                                <div class="session-time">⏰ 09:00 - 10:00</div>
                            </div>
                            <div class="session-actions">
                                <button class="btn-icon" title="Modifier">✏️</button>
                                <button class="btn-icon" title="Annuler">🗑️</button>
                            </div>
                        </div>
                        
                        <div class="session-item">
                            <div class="session-date">
                                <div class="date-day">20</div>
                                <div class="date-month">DÉC</div>
                            </div>
                            <div class="session-details">
                                <h4>Tennis - Match Play</h4>
                                <p>Coach Sara El Amrani</p>
                                <div class="session-time">⏰ 16:00 - 17:30</div>
                            </div>
                            <div class="session-actions">
                                <button class="btn-icon" title="Modifier">✏️</button>
                                <button class="btn-icon" title="Annuler">🗑️</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Favorite Coaches -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h2>Mes Coachs Favoris</h2>
                        <a href="coaches.html" class="link">Découvrir</a>
                    </div>
                    <div class="coaches-list">
                        <div class="coach-item">
                            <div class="coach-avatar">👤</div>
                            <div class="coach-info-dash">
                                <h4>Ahmed Benali</h4>
                                <p>Football</p>
                                <div class="coach-rating-dash">⭐ 4.9</div>
                            </div>
                            <button class="btn btn-sm btn-primary">Réserver</button>
                        </div>
                        
                        <div class="coach-item">
                            <div class="coach-avatar">👤</div>
                            <div class="coach-info-dash">
                                <h4>Sara El Amrani</h4>
                                <p>Tennis</p>
                                <div class="coach-rating-dash">⭐ 4.8</div>
                            </div>
                            <button class="btn btn-sm btn-primary">Réserver</button>
                        </div>
                        
                        <div class="coach-item">
                            <div class="coach-avatar">👤</div>
                            <div class="coach-info-dash">
                                <h4>Fatima Zahra</h4>
                                <p>Fitness</p>
                                <div class="coach-rating-dash">⭐ 4.7</div>
                            </div>
                            <button class="btn btn-sm btn-primary">Réserver</button>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h2>Activité Récente</h2>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon success">✓</div>
                            <div class="activity-details">
                                <h4>Séance complétée</h4>
                                <p>Football avec Ahmed Benali</p>
                                <span class="activity-time">Il y a 2 jours</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon info">⭐</div>
                            <div class="activity-details">
                                <h4>Avis laissé</h4>
                                <p>Note 5/5 pour Sara El Amrani</p>
                                <span class="activity-time">Il y a 3 jours</span>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon success">✓</div>
                            <div class="activity-details">
                                <h4>Réservation confirmée</h4>
                                <p>Tennis le 20 décembre</p>
                                <span class="activity-time">Il y a 5 jours</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="../js/utils.js"></script>
    <script src="../js/navigation.js"></script>
    <script src="../js/dashboard.js"></script>
</body>
</html>