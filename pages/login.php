<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CoachPro</title>
    
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
                    <li><a href="index.html" class="nav-link">Accueil</a></li>
                    <li><a href="coaches.html" class="nav-link">Coachs</a></li>
                    <li><a href="about.html" class="nav-link">À propos</a></li>
                    <li><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
                
                <div class="nav-actions">
                    <a href="register.html" class="btn btn-primary">Inscription</a>
                </div>
            </nav>
            
            <button class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Login Section -->
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-image">
                <div class="auth-image-content">
                    <h2>Bienvenue sur CoachPro</h2>
                    <p>Connectez-vous pour accéder à votre espace personnel et gérer vos séances d'entraînement</p>
                    <div class="auth-features">
                        <div class="auth-feature">
                            <span class="feature-icon">✓</span>
                            <span>Réservez vos séances</span>
                        </div>
                        <div class="auth-feature">
                            <span class="feature-icon">✓</span>
                            <span>Suivez votre progression</span>
                        </div>
                        <div class="auth-feature">
                            <span class="feature-icon">✓</span>
                            <span>Contactez vos coachs</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="auth-form-container">
                <div class="auth-form-content">
                    <h1>Connexion</h1>
                    <p class="auth-subtitle">Accédez à votre compte CoachPro</p>
                    
                    <form id="loginForm" class="auth-form" data-validate>
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
                                    placeholder="Votre mot de passe"
                                    required
                                    minlength="6"
                                >
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    👁️
                                </button>
                            </div>
                            <span class="error-message"></span>
                        </div>
                        
                        <div class="form-options">
                            <label class="checkbox-label">
                                <input type="checkbox" name="remember">
                                <span>Se souvenir de moi</span>
                            </label>
                            <a href="forgot-password.html" class="link">Mot de passe oublié ?</a>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            Se connecter
                        </button>
                        
                        <div class="auth-divider">
                            <span>OU</span>
                        </div>
                        
                        <div class="social-login">
                            <button type="button" class="btn-social btn-google">
                                <span class="social-icon">G</span>
                                Continuer avec Google
                            </button>
                            <button type="button" class="btn-social btn-facebook">
                                <span class="social-icon">f</span>
                                Continuer avec Facebook
                            </button>
                        </div>
                        
                        <p class="auth-footer">
                            Pas encore de compte ? 
                            <a href="register.html" class="link">Créer un compte</a>
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