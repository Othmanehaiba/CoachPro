<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Coach - CoachPro</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/coach-dashboard.css">
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
                    <li><a href="coach-dashboard.html" class="nav-link active">Tableau de bord</a></li>
                    <li><a href="#" class="nav-link">Mes Disponibilités</a></li>
                    <li><a href="#" class="nav-link">Mes Séances</a></li>
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
            <div class="welcome-banner coach-banner">
                <div class="welcome-content">
                    <h1>Bienvenue Coach <span id="coachName">Ahmed</span>! 💪</h1>
                    <p>Gérez vos séances et votre planning</p>
                </div>
                <a href="#" class="btn btn-primary">Gérer les Disponibilités</a>
            </div>

            <!-- Quick Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card stat-primary">
                    <div class="stat-icon">⏳</div>
                    <div class="stat-details">
                        <h3>5</h3>
                        <p>Demandes en attente</p>
                    </div>
                    <div class="stat-trend up">+2</div>
                </div>
                
                <div class="stat-card stat-success">
                    <div class="stat-icon">✓</div>
                    <div class="stat-details">
                        <h3>3</h3>
                        <p>Séances aujourd'hui</p>
                    </div>
                </div>
                
                <div class="stat-card stat-info">
                    <div class="stat-icon">📅</div>
                    <div class="stat-details">
                        <h3>7</h3>
                        <p>Séances demain</p>
                    </div>
                </div>
                
                <div class="stat-card stat-warning">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-details">
                        <h3>4.9</h3>
                        <p>Note moyenne</p>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="dashboard-grid coach-grid">
                <!-- Pending Requests -->
                <div class="dashboard-card requests-card">
                    <div class="card-header">
                        <h2>Demandes en Attente</h2>
                        <span class="badge badge-primary">5 nouvelles</span>
                    </div>
                    <div class="requests-list">
                        <div class="request-item">
                            <div class="request-info">
                                <div class="request-avatar">👤</div>
                                <div class="request-details">
                                    <h4>Youssef Benali</h4>
                                    <p class="request-discipline">Football - Technique</p>
                                    <div class="request-meta">
                                        <span class="request-date">📅 Lun 18 Déc - 14:00</span>
                                        <span class="request-duration">⏱️ 1h30</span>
                                    </div>
                                </div>
                            </div>
                            <div class="request-actions">
                                <button class="btn btn-success btn-sm" onclick="acceptRequest(1)">
                                    ✓ Accepter
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="rejectRequest(1)">
                                    ✕ Refuser
                                </button>
                            </div>
                        </div>

                        <div class="request-item">
                            <div class="request-info">
                                <div class="request-avatar">👤</div>
                                <div class="request-details">
                                    <h4>Sara Alami</h4>
                                    <p class="request-discipline">Football - Préparation physique</p>
                                    <div class="request-meta">
                                        <span class="request-date">📅 Mar 19 Déc - 10:00</span>
                                        <span class="request-duration">⏱️ 1h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="request-actions">
                                <button class="btn btn-success btn-sm" onclick="acceptRequest(2)">
                                    ✓ Accepter
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="rejectRequest(2)">
                                    ✕ Refuser
                                </button>
                            </div>
                        </div>

                        <div class="request-item">
                            <div class="request-info">
                                <div class="request-avatar">👤</div>
                                <div class="request-details">
                                    <h4>Karim Tazi</h4>
                                    <p class="request-discipline">Football - Tactique</p>
                                    <div class="request-meta">
                                        <span class="request-date">📅 Mer 20 Déc - 16:00</span>
                                        <span class="request-duration">⏱️ 2h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="request-actions">
                                <button class="btn btn-success btn-sm" onclick="acceptRequest(3)">
                                    ✓ Accepter
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="rejectRequest(3)">
                                    ✕ Refuser
                                </button>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="view-all-link">Voir toutes les demandes →</a>
                </div>

                <!-- Next Session -->
                <div class="dashboard-card next-session-card">
                    <div class="card-header">
                        <h2>Prochaine Séance</h2>
                    </div>
                    <div class="next-session">
                        <div class="session-time-block">
                            <div class="session-time">14:00</div>
                            <div class="session-date">Aujourd'hui</div>
                        </div>
                        <div class="session-divider"></div>
                        <div class="session-info-block">
                            <div class="client-info">
                                <div class="client-avatar-large">👤</div>
                                <div>
                                    <h3>Mohamed Idrissi</h3>
                                    <p class="client-type">Sportif Amateur</p>
                                </div>
                            </div>
                            <div class="session-details-grid">
                                <div class="detail-item">
                                    <span class="detail-icon">🏃</span>
                                    <span>Football - Technique</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-icon">⏱️</span>
                                    <span>1h30</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-icon">📍</span>
                                    <span>Stade Municipal</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-icon">📱</span>
                                    <span>06 12 34 56 78</span>
                                </div>
                            </div>
                            <div class="session-actions-bottom">
                                <button class="btn btn-outline btn-sm">Voir les détails</button>
                                <button class="btn btn-primary btn-sm">Démarrer la séance</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Schedule -->
                <div class="dashboard-card schedule-card">
                    <div class="card-header">
                        <h2>Planning du Jour</h2>
                        <span class="schedule-date">Lundi 18 Décembre</span>
                    </div>
                    <div class="schedule-timeline">
                        <div class="timeline-item confirmed">
                            <div class="timeline-time">09:00</div>
                            <div class="timeline-content">
                                <h4>Séance de préparation physique</h4>
                                <p>Fatima Zahra - 1h</p>
                                <span class="status-badge status-confirmed">Confirmée</span>
                            </div>
                        </div>

                        <div class="timeline-item confirmed">
                            <div class="timeline-time">14:00</div>
                            <div class="timeline-content">
                                <h4>Technique et tactique</h4>
                                <p>Mohamed Idrissi - 1h30</p>
                                <span class="status-badge status-confirmed">Confirmée</span>
                            </div>
                        </div>

                        <div class="timeline-item confirmed">
                            <div class="timeline-time">17:00</div>
                            <div class="timeline-content">
                                <h4>Entraînement collectif</h4>
                                <p>Groupe U17 - 2h</p>
                                <span class="status-badge status-confirmed">Confirmée</span>
                            </div>
                        </div>

                        <div class="timeline-item available">
                            <div class="timeline-time">20:00</div>
                            <div class="timeline-content">
                                <h4>Créneau disponible</h4>
                                <p>Aucune réservation</p>
                                <span class="status-badge status-available">Disponible</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats & Performance -->
                <div class="dashboard-card performance-card">
                    <div class="card-header">
                        <h2>Statistiques ce Mois</h2>
                    </div>
                    <div class="performance-stats">
                        <div class="perf-stat">
                            <div class="perf-label">Séances réalisées</div>
                            <div class="perf-value">45</div>
                            <div class="perf-progress">
                                <div class="progress-bar" style="width: 75%"></div>
                            </div>
                            <div class="perf-detail">75% de l'objectif</div>
                        </div>

                        <div class="perf-stat">
                            <div class="perf-label">Revenus ce mois</div>
                            <div class="perf-value">15,750 DH</div>
                            <div class="perf-progress">
                                <div class="progress-bar" style="width: 63%"></div>
                            </div>
                            <div class="perf-detail">+12% vs mois dernier</div>
                        </div>

                        <div class="perf-stat">
                            <div class="perf-label">Nouveaux clients</div>
                            <div class="perf-value">8</div>
                            <div class="perf-progress">
                                <div class="progress-bar" style="width: 80%"></div>
                            </div>
                            <div class="perf-detail">+3 cette semaine</div>
                        </div>

                        <div class="perf-stat">
                            <div class="perf-label">Taux de satisfaction</div>
                            <div class="perf-value">98%</div>
                            <div class="perf-progress">
                                <div class="progress-bar" style="width: 98%"></div>
                            </div>
                            <div class="perf-detail">Excellent</div>
                        </div>
                    </div>
                </div>

                <!-- Recent Reviews -->
                <div class="dashboard-card reviews-card">
                    <div class="card-header">
                        <h2>Avis Récents</h2>
                        <a href="#" class="link">Voir tous</a>
                    </div>
                    <div class="reviews-list">
                        <div class="review-item">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <div class="reviewer-avatar">👤</div>
                                    <div>
                                        <h4>Youssef Benali</h4>
                                        <div class="review-rating">⭐⭐⭐⭐⭐</div>
                                    </div>
                                </div>
                                <span class="review-date">Il y a 2 jours</span>
                            </div>
                            <p class="review-text">"Excellent coach ! Très professionnel et à l'écoute. J'ai beaucoup progressé en technique."</p>
                        </div>

                        <div class="review-item">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <div class="reviewer-avatar">👤</div>
                                    <div>
                                        <h4>Fatima Zahra</h4>
                                        <div class="review-rating">⭐⭐⭐⭐⭐</div>
                                    </div>
                                </div>
                                <span class="review-date">Il y a 5 jours</span>
                            </div>
                            <p class="review-text">"Les séances sont toujours bien structurées et adaptées à mon niveau. Je recommande vivement !"</p>
                        </div>

                        <div class="review-item">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <div class="reviewer-avatar">👤</div>
                                    <div>
                                        <h4>Karim Mansouri</h4>
                                        <div class="review-rating">⭐⭐⭐⭐⭐</div>
                                    </div>
                                </div>
                                <span class="review-date">Il y a 1 semaine</span>
                            </div>
                            <p class="review-text">"Coach motivant et compétent. Les exercices sont variés et efficaces."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="../js/utils.js"></script>
    <script src="../js/navigation.js"></script>
    <script src="../js/coach-dashboard.js"></script>
</body>
</html>