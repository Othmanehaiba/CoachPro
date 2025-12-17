<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CoachPro</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/auth.css">
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
                    <li><a href="./coaches.php" class="nav-link">Coachs</a></li>
                    <li><a href="about.html" class="nav-link">À propos</a></li>
                    <li><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
                
                <div class="nav-actions">
                    <a href="login.php" class="btn btn-ghost">Connexion</a>
                </div>
            </nav>
            
            <button class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Register Section -->
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-image">
                <div class="auth-image-content">
                    <h2>Rejoignez CoachPro</h2>
                    <p>Créez votre compte et commencez votre parcours vers l'excellence sportive</p>
                    <div class="auth-features">
                        <div class="auth-feature">
                            <span class="feature-icon">✓</span>
                            <span>Accès à des centaines de coachs</span>
                        </div>
                        <div class="auth-feature">
                            <span class="feature-icon">✓</span>
                            <span>Réservation en ligne facile</span>
                        </div>
                        <div class="auth-feature">
                            <span class="feature-icon">✓</span>
                            <span>Suivi de votre progression</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="auth-form-container">
                <div class="auth-form-content">
                    <h1>Inscription</h1>
                    <p class="auth-subtitle">Créez votre compte CoachPro</p>
                    
                    <!-- Role Selection -->
                    
                    <form id="registerForm" class="auth-form" method="post" action="registerHandling.php" data-validate>
                        <input type="hidden" id="role" name="role" value="sportif">
                        <div class="role-selection">
                            <button type="button" name="sportif" class="role-btn active" data-role="sportif">
                                <span class="role-icon">🏃</span>
                                <span class="role-label">Je suis Sportif</span>
                            </button>
                            <button type="button" name="coach" class="role-btn" data-role="coach">
                                <span class="role-icon">💪</span>
                                <span class="role-label">Je suis Coach</span>
                            </button>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input 
                                    type="text" 
                                    id="nom" 
                                    name="nom" 
                                    placeholder="Votre nom"
                                    data-validate="name"
                                    required
                                >
                                <span class="error-message"></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input 
                                    type="text" 
                                    id="prenom" 
                                    name="prenom" 
                                    placeholder="Votre prénom"
                                    data-validate="name"
                                    required
                                >
                                <span class="error-message"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Adresse Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                placeholder="votre@email.com"
                                data-validate="email"
                                required
                            >
                            <span class="error-message"></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <div class="password-input">
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    placeholder="Minimum 8 caractères"
                                    data-validate="password"
                                    required
                                >
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    👁️
                                </button>
                            </div>
                            <span class="error-message"></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirmPassword">Confirmer le mot de passe</label>
                            <div class="password-input">
                                <input 
                                    type="password" 
                                    id="confirmPassword" 
                                    name="confirmPassword" 
                                    placeholder="Confirmer votre mot de passe"
                                    data-confirm="password"
                                    required
                                >
                                <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                                    👁️
                                </button>
                            </div>
                            <span class="error-message"></span>
                        </div>
                        
                        <!-- Coach specific fields (hidden by default) -->
                        <div id="coachFields" class="coach-fields hidden">
                            <div class="form-group">
                                <label for="discipline">Discipline principale</label>
                                <select id="discipline" name="discipline">
                                    <option value="">Sélectionnez une discipline</option>
                                    <option value="football">Football</option>
                                    <option value="tennis">Tennis</option>
                                    <option value="natation">Natation</option>
                                    <option value="athletisme">Athlétisme</option>
                                    <option value="combat">Sports de Combat</option>
                                    <option value="fitness">Préparation Physique</option>
                                </select>
                                <span class="error-message"></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="experience">Années d'expérience</label>
                                <input 
                                    type="number" 
                                    id="experience" 
                                    name="experience" 
                                    placeholder="Ex: 5"
                                    min="0"
                                    max="50"
                                >
                                <span class="error-message"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="terms" required>
                                <span>J'accepte les <a href="#" class="link">conditions d'utilisation</a> et la <a href="#" class="link">politique de confidentialité</a></span>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            Créer mon compte
                        </button>
                        
                        <div class="auth-divider">
                            <span>OU</span>
                        </div>
                        
                        <div class="social-login">
                            <button type="button" class="btn-social btn-google">
                                <span class="social-icon">G</span>
                                S'inscrire avec Google
                            </button>
                            <button type="button" class="btn-social btn-facebook">
                                <span class="social-icon">f</span>
                                S'inscrire avec Facebook
                            </button>
                        </div>
                        
                        <p class="auth-footer">
                            Déjà un compte ? 
                            <a href="./login.php" class="link">Se connecter</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="../js/utils.js"></script>
    <script src="../js/navigation.js"></script>
    <script src="../js/auth.js"></script>
</body>
</html>