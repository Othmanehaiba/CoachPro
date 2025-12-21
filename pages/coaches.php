<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require "../database/db.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trouver un Coach - CoachPro</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/coaches.css">
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
                    <li><a href="../index.php" class="nav-link">Accueil</a></li>
                    <li><a href="coaches.php" class="nav-link active">Coachs</a></li>
                    <li><a href="./about.html" class="nav-link">À propos</a></li>
                    <li><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
                
                <div class="nav-actions">
                    <a href="login.php" class="btn btn-ghost">Connexion</a>
                    <a href="register.php" class="btn btn-primary">Inscription</a>
                </div>
            </nav>
            
            <button class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Trouvez votre Coach Idéal</h1>
            <p>Plus de 500 coachs certifiés disponibles dans 15+ disciplines sportives</p>
        </div>
    </section>

    <!-- Filters & Search -->
    <section class="filters-section">
        <div class="container">
            <div class="filters-container">
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Rechercher un coach..." class="search-input">
                    <button class="btn btn-primary">Rechercher</button>
                </div>
                
                <div class="filters">
                    <div class="filter-group">
                        <label>Discipline</label>
                        <select id="disciplineFilter">
                            <option value="">Toutes les disciplines</option>
                            <option value="football">Football</option>
                            <option value="tennis">Tennis</option>
                            <option value="natation">Natation</option>
                            <option value="athletisme">Athlétisme</option>
                            <option value="combat">Sports de Combat</option>
                            <option value="fitness">Préparation Physique</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label>Expérience</label>
                        <select id="experienceFilter">
                            <option value="">Toute expérience</option>
                            <option value="0-2">0-2 ans</option>
                            <option value="3-5">3-5 ans</option>
                            <option value="6-10">6-10 ans</option>
                            <option value="10+">10+ ans</option>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label>Prix</label>
                        <select id="priceFilter">
                            <option value="">Tous les prix</option>
                            <option value="0-200">0-200 DH</option>
                            <option value="200-400">200-400 DH</option>
                            <option value="400-600">400-600 DH</option>
                            <option value="600+">600+ DH</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-ghost" onclick="resetFilters()">Réinitialiser</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Coaches List -->
    <section class="coaches-section">
        <div class="container">
            <div class="coaches-header">
                <p class="results-count"><span id="resultsCount">24</span> coachs trouvés</p>
                <div class="sort-options">
                    <label>Trier par:</label>
                    <select id="sortBy">
                        <option value="recommended">Recommandés</option>
                        <option value="rating">Mieux notés</option>
                        <option value="experience">Expérience</option>
                        <option value="price-low">Prix croissant</option>
                        <option value="price-high">Prix décroissant</option>
                    </select>
                </div>
            </div>
            
            <div id="coachesGrid" class="coaches-grid">
                <?php
                        
                    $res = $conn->query("SELECT * FROM coach");

                    while ($ro = $res->fetch_assoc()) {

    
                        if (!empty($ro['photo'])) {
                            $photoHtml = "<img src='{$ro['photo']}' alt='{$ro['prenom']} {$ro['nom']}'>";
                        } else {
                            $photoHtml = "
                            <div style='
                                width:100%;
                                height:100%;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                font-size:4rem;
                                color:white;
                            '>👤</div>
                            ";
                        }

                                echo "
                                <div class='coach-card'>

                                    <div class='coach-image'>
                                        $photoHtml

                                        <div class='coach-rating'>
                                            ⭐ 4.5 (20)
                                        </div>
                                    </div>

                                    <div class='coach-content'>
                                        <div class='coach-header'>
                                            <h3 class='coach-name'>{$ro['prenom']} {$ro['nom']}</h3>
                                            <div class='coach-discipline'>
                                                <span>🏆</span> Coach sportif
                                            </div>
                                        </div>

                                        <p class='coach-bio'>
                                            Coach professionnel expérimenté.
                                        </p>

                                        <div class='coach-info'>
                                            <div class='info-item'>
                                                <span class='info-icon'>📅</span>
                                                <span>{$ro['annees_experience']} ans d'exp.</span>
                                            </div>

                                            <div class='info-item'>
                                                <span class='info-icon'>🎓</span>
                                                <span>Certifié</span>
                                            </div>
                                        </div>

                                        <div class='coach-footer'>
                                            <div class='coach-price'>
                                                150 DH
                                                <div class='price-label'>/séance</div>
                                            </div>

                                            <button class='btn btn-primary'
                                                onclick=\"bookCoach({$ro['id_coach']})\">
                                                Réserver
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                ";
                    }               
                ?>

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
                        <li><a href="coaches.html">Trouver un Coach</a></li>
                        <li><a href="register.html">Devenir Coach</a></li>
                        <li><a href="about.html">À propos</a></li>
                        <li><a href="contact.html">Contact</a></li>
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
    <script src="../js/utils.js"></script>
    <script src="../js/navigation.js"></script>
    <script src="../js/coaches.js"></script>
</body>
</html>