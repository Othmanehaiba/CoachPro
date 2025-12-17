<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CoachPro - Plateforme de mise en relation entre sportifs et coachs professionnels">
    <title>CoachPro - Trouvez votre coach sportif idéal</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="index.html" class="logo">
                <div class="logo-icon">CP</div>
                <span>CoachPro</span>
            </a>
            
            <nav class="nav">
                <ul class="nav-links">
                    <li><a href="./index.php" class="nav-link">Accueil</a></li>
                    <li><a href="./pages/coaches.php" class="nav-link">Coachs</a></li>
                    <li><a href="./pages/about.html" class="nav-link">À propos</a></li>
                    <li><a href="./pages/contact.html" class="nav-link">Contact</a></li>
                </ul>
                
                <div class="nav-actions">
                    <a href="./pages/login.php" class="btn btn-ghost">Connexion</a>
                    <a href="./pages/register.php" class="btn btn-primary">Inscription</a>
                </div>
            </nav>
            
            <button class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title fade-in">
                    Transformez votre <span class="highlight">Performance</span> Sportive
                </h1>
                <p class="hero-subtitle fade-in">
                    Trouvez le coach professionnel qui vous correspond et atteignez vos objectifs sportifs
                </p>
                <div class="hero-actions fade-in">
                    <a href="./pages/coaches.php" class="btn btn-primary btn-lg">Trouver un Coach</a>
                    <a href="./pages/register.php" class="btn btn-outline btn-lg">Devenir Coach</a>
                </div>
                
                <div class="hero-stats fade-in">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Coachs Certifiés</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Séances Réalisées</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Disciplines Sportives</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Disciplines Section -->
    <section class="disciplines">
        <div class="container">
            <div class="section-header text-center">
                <h2>Disciplines Sportives</h2>
                <p>Découvrez nos coachs spécialisés dans différentes disciplines</p>
            </div>
            
            <div class="disciplines-grid">
                <div class="discipline-card">
                    <div class="discipline-icon">⚽</div>
                    <h3>Football</h3>
                    <p>Technique, tactique et préparation physique</p>
                </div>
                
                <div class="discipline-card">
                    <div class="discipline-icon">🎾</div>
                    <h3>Tennis</h3>
                    <p>Perfectionnez votre jeu et votre stratégie</p>
                </div>
                
                <div class="discipline-card">
                    <div class="discipline-icon">🏊</div>
                    <h3>Natation</h3>
                    <p>Améliorez votre technique et endurance</p>
                </div>
                
                <div class="discipline-card">
                    <div class="discipline-icon">🏃</div>
                    <h3>Athlétisme</h3>
                    <p>Course, sprint et préparation physique</p>
                </div>
                
                <div class="discipline-card">
                    <div class="discipline-icon">🥊</div>
                    <h3>Sports de Combat</h3>
                    <p>Boxe, MMA, et arts martiaux</p>
                </div>
                
                <div class="discipline-card">
                    <div class="discipline-icon">💪</div>
                    <h3>Préparation Physique</h3>
                    <p>Musculation et conditionnement</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-header text-center">
                <h2>Comment ça marche ?</h2>
                <p>Réservez votre séance en 3 étapes simples</p>
            </div>
            
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-icon">🔍</div>
                    <h3>Trouvez votre Coach</h3>
                    <p>Parcourez les profils de nos coachs certifiés et choisissez celui qui correspond à vos besoins</p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-icon">📅</div>
                    <h3>Réservez une Séance</h3>
                    <p>Sélectionnez un créneau disponible et confirmez votre réservation en quelques clics</p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-icon">🏆</div>
                    <h3>Atteignez vos Objectifs</h3>
                    <p>Suivez vos séances, progressez avec votre coach et dépassez-vous</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header text-center">
                <h2>Pourquoi choisir CoachPro ?</h2>
                <p>Une plateforme complète pour vos entraînements sportifs</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">✓</div>
                    <h3>Coachs Certifiés</h3>
                    <p>Tous nos coachs sont diplômés et expérimentés dans leur domaine</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">⏰</div>
                    <h3>Réservation Facile</h3>
                    <p>Système de réservation en ligne simple et intuitif 24/7</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">💳</div>
                    <h3>Paiement Sécurisé</h3>
                    <p>Transactions sécurisées et protection de vos données</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Suivi de Progression</h3>
                    <p>Suivez vos performances et vos objectifs atteints</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3>Avis Vérifiés</h3>
                    <p>Consultez les avis authentiques de nos utilisateurs</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Application Mobile</h3>
                    <p>Gérez vos séances depuis votre smartphone</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Prêt à commencer votre transformation ?</h2>
                <p>Rejoignez des milliers de sportifs qui ont déjà franchi le cap</p>
                <div class="cta-actions">
                    <a href="register.html" class="btn btn-primary btn-lg">Inscription Gratuite</a>
                    <a href="coaches.html" class="btn btn-outline btn-lg">Découvrir les Coachs</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>CoachPro</h3>
                    <p>La plateforme n°1 de mise en relation entre sportifs et coachs professionnels au Maroc.</p>
                    <div class="social-links">
                        <a href="#" class="social-link">f</a>
                        <a href="#" class="social-link">in</a>
                        <a href="#" class="social-link">ig</a>
                        <a href="#" class="social-link">tw</a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Liens Rapides</h3>
                    <ul class="footer-links">
                        <li><a href="./pages/coaches.php">Trouver un Coach</a></li>
                        <li><a href="./pages/register.php">Devenir Coach</a></li>
                        <li><a href="./pages/about.html">À propos</a></li>
                        <li><a href="./pages/contact.html">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Disciplines</h3>
                    <ul class="footer-links">
                        <li><a href="#">Football</a></li>
                        <li><a href="#">Tennis</a></li>
                        <li><a href="#">Natation</a></li>
                        <li><a href="#">Athlétisme</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact</h3>
                    <ul class="footer-links">
                        <li>📧 contact@coachpro.ma</li>
                        <li>📱 +212 6 12 34 56 78</li>
                        <li>📍 Casablanca, Maroc</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 CoachPro. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/utils.js"></script>
    <script src="js/navigation.js"></script>
</body>
</html>