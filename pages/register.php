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
            <a href="../index.php" class="logo">
                <div class="logo-icon">CP</div>
                <span>CoachPro</span>
            </a>
            
            <nav class="nav">
                <ul class="nav-links">
                    <li><a href="../index.php" class="nav-link">Accueil</a></li>
                    <!-- <li><a href="./coaches.php" class="nav-link">Coachs</a></li> -->
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
                                        
                    <form id="registerForm" class="auth-form" method="POST" action="../handling/registerHandling.php" data-validate>                         
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

                        <!-- Photo URL Input with Preview -->
                        <div class="form-group photo-input-group">
                            <label for="photoUrl">Photo de profil (URL)</label>
                            <div class="photo-input-wrapper">
                                <input
                                    type="url"
                                    id="photoUrl"
                                    name="photoUrl"
                                    placeholder="https://exemple.com/photo.jpg"
                                    data-validate="url"
                                >
                                <div id="photoPreview" class="photo-preview hidden">
                                    <img id="previewImage" src="" alt="Aperçu">
                                </div>
                            </div>
                            <span class="error-message"></span>
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
                        <button type="submit" name="submit" class="btn btn-primary btn-block">
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
    <script src="../js/auth.js"></script>
</body>
</html>