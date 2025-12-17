<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - CoachPro</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/variables.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/components.css">
    <link rel="stylesheet" href="../css/profile.css">
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
                    <li><a href="sportif-dashboard.html" class="nav-link">Tableau de bord</a></li>
                    <li><a href="coaches.html" class="nav-link">Trouver un Coach</a></li>
                    <li><a href="#" class="nav-link">Mes Réservations</a></li>
                    <li><a href="mon-profil.html" class="nav-link active">Mon Profil</a></li>
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

    <!-- Profile Content -->
    <section class="profile-section">
        <div class="container">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar-section">
                    <div class="profile-avatar-container">
                        <div class="profile-avatar" id="profileAvatar">
                            <span class="avatar-placeholder">👤</span>
                            <img id="avatarImage" style="display: none;">
                        </div>
                        <button class="avatar-edit-btn" onclick="triggerFileUpload()">
                            <span>📷</span>
                        </button>
                        <input type="file" id="avatarInput" accept="image/*" style="display: none;" onchange="handleAvatarUpload(event)">
                    </div>
                    <div class="profile-header-info">
                        <h1 id="profileName">Youssef Benali</h1>
                        <p class="profile-role" id="profileRole">Sportif Amateur</p>
                        <div class="profile-stats-inline">
                            <span class="stat-inline">
                                <strong>45</strong> Séances
                            </span>
                            <span class="stat-inline">
                                <strong>3</strong> Coachs
                            </span>
                            <span class="stat-inline">
                                <strong>4.8</strong> ⭐
                            </span>
                        </div>
                    </div>
                </div>
                <div class="profile-actions">
                    <button class="btn btn-outline" onclick="toggleEditMode()">
                        <span id="editBtnText">✏️ Modifier</span>
                    </button>
                </div>
            </div>

            <!-- Profile Content Grid -->
            <div class="profile-grid">
                <!-- Personal Information -->
                <div class="profile-card">
                    <div class="card-header">
                        <h2>Informations Personnelles</h2>
                    </div>
                    <form id="personalInfoForm" class="profile-form" data-validate>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nom">Nom *</label>
                                <input 
                                    type="text" 
                                    id="nom" 
                                    name="nom" 
                                    value="Benali"
                                    data-validate="name"
                                    disabled
                                    required
                                >
                                <span class="error-message"></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="prenom">Prénom *</label>
                                <input 
                                    type="text" 
                                    id="prenom" 
                                    name="prenom" 
                                    value="Youssef"
                                    data-validate="name"
                                    disabled
                                    required
                                >
                                <span class="error-message"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="youssef.benali@email.com"
                                data-validate="email"
                                disabled
                                required
                            >
                            <span class="error-message"></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                value="0612345678"
                                data-validate="phone"
                                disabled
                            >
                            <span class="error-message"></span>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="dateNaissance">Date de naissance</label>
                                <input 
                                    type="date" 
                                    id="dateNaissance" 
                                    name="dateNaissance" 
                                    value="1995-05-15"
                                    disabled
                                >
                            </div>
                            
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <select id="genre" name="genre" disabled>
                                    <option value="">Sélectionner</option>
                                    <option value="homme" selected>Homme</option>
                                    <option value="femme">Femme</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input 
                                type="text" 
                                id="ville" 
                                name="ville" 
                                value="Casablanca"
                                disabled
                            >
                        </div>

                        <div class="form-actions" style="display: none;">
                            <button type="button" class="btn btn-ghost" onclick="cancelEdit()">Annuler</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>

                <!-- Sports & Preferences -->
                <div class="profile-card">
                    <div class="card-header">
                        <h2>Sports & Préférences</h2>
                    </div>
                    <form id="preferencesForm" class="profile-form">
                        <div class="form-group">
                            <label>Sports pratiqués</label>
                            <div class="sports-tags">
                                <span class="sport-tag active">⚽ Football</span>
                                <span class="sport-tag">🎾 Tennis</span>
                                <span class="sport-tag">🏊 Natation</span>
                                <span class="sport-tag">🏃 Athlétisme</span>
                                <span class="sport-tag">🥊 Boxe</span>
                                <span class="sport-tag">💪 Fitness</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="niveau">Niveau</label>
                            <select id="niveau" name="niveau" disabled>
                                <option value="debutant">Débutant</option>
                                <option value="intermediaire" selected>Intermédiaire</option>
                                <option value="avance">Avancé</option>
                                <option value="expert">Expert</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="objectifs">Objectifs</label>
                            <textarea 
                                id="objectifs" 
                                name="objectifs" 
                                rows="4"
                                placeholder="Décrivez vos objectifs sportifs..."
                                disabled
                            >Améliorer ma technique et ma condition physique pour participer à des compétitions locales.</textarea>
                        </div>

                        <div class="form-group">
                            <label>Disponibilités préférées</label>
                            <div class="availability-options">
                                <label class="checkbox-label">
                                    <input type="checkbox" checked disabled>
                                    <span>Matin (6h-12h)</span>
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" disabled>
                                    <span>Après-midi (12h-18h)</span>
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" checked disabled>
                                    <span>Soir (18h-22h)</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Security Settings -->
                <div class="profile-card">
                    <div class="card-header">
                        <h2>Sécurité</h2>
                    </div>
                    <form id="securityForm" class="profile-form">
                        <div class="security-item">
                            <div class="security-info">
                                <h4>Mot de passe</h4>
                                <p>Dernière modification il y a 3 mois</p>
                            </div>
                            <button type="button" class="btn btn-outline btn-sm" onclick="openChangePasswordModal()">
                                Modifier
                            </button>
                        </div>

                        <div class="security-item">
                            <div class="security-info">
                                <h4>Authentification à deux facteurs</h4>
                                <p>Sécurisez votre compte avec la 2FA</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" id="2faToggle">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="security-item">
                            <div class="security-info">
                                <h4>Sessions actives</h4>
                                <p>2 appareils connectés</p>
                            </div>
                            <button type="button" class="btn btn-outline btn-sm" onclick="viewActiveSessions()">
                                Gérer
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Notifications Settings -->
                <div class="profile-card">
                    <div class="card-header">
                        <h2>Notifications</h2>
                    </div>
                    <form id="notificationsForm" class="profile-form">
                        <div class="notification-item">
                            <div class="notification-info">
                                <h4>Emails de confirmation</h4>
                                <p>Recevez un email pour chaque réservation</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-item">
                            <div class="notification-info">
                                <h4>Rappels de séances</h4>
                                <p>Notification 24h avant chaque séance</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-item">
                            <div class="notification-info">
                                <h4>Nouveautés et promotions</h4>
                                <p>Restez informé des offres spéciales</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="notification-item">
                            <div class="notification-info">
                                <h4>Messages des coachs</h4>
                                <p>Notifications pour les nouveaux messages</p>
                            </div>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </form>
                </div>

                <!-- Account Actions -->
                <div class="profile-card danger-card">
                    <div class="card-header">
                        <h2>Zone Dangereuse</h2>
                    </div>
                    <div class="danger-actions">
                        <div class="danger-item">
                            <div class="danger-info">
                                <h4>Télécharger mes données</h4>
                                <p>Exportez toutes vos données personnelles</p>
                            </div>
                            <button type="button" class="btn btn-outline btn-sm" onclick="downloadData()">
                                Télécharger
                            </button>
                        </div>

                        <div class="danger-item">
                            <div class="danger-info">
                                <h4>Supprimer mon compte</h4>
                                <p>Action irréversible - toutes vos données seront supprimées</p>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteAccount()">
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Change Password Modal -->
    <div id="changePasswordModal" class="modal">
        <div class="modal-content modal-sm">
            <div class="modal-header">
                <h2>Modifier le mot de passe</h2>
                <button class="modal-close" onclick="Modal.close('changePasswordModal')">&times;</button>
            </div>
            <form id="changePasswordForm" class="modal-body" data-validate>
                <div class="form-group">
                    <label for="currentPassword">Mot de passe actuel *</label>
                    <div class="password-input">
                        <input 
                            type="password" 
                            id="currentPassword" 
                            name="currentPassword" 
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('currentPassword')">
                            👁️
                        </button>
                    </div>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="newPassword">Nouveau mot de passe *</label>
                    <div class="password-input">
                        <input 
                            type="password" 
                            id="newPassword" 
                            name="newPassword" 
                            data-validate="password"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('newPassword')">
                            👁️
                        </button>
                    </div>
                    <span class="error-message"></span>
                </div>

                <div class="form-group">
                    <label for="confirmNewPassword">Confirmer le nouveau mot de passe *</label>
                    <div class="password-input">
                        <input 
                            type="password" 
                            id="confirmNewPassword" 
                            name="confirmNewPassword" 
                            data-confirm="newPassword"
                            required
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword('confirmNewPassword')">
                            👁️
                        </button>
                    </div>
                    <span class="error-message"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-ghost" onclick="Modal.close('changePasswordModal')">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../js/utils.js"></script>
    <script src="../js/navigation.js"></script>
    <script src="../js/profile.js"></script>
</body>
</html>