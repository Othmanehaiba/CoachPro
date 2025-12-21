<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require "../database/db.php";
// require "../pages/login.php";

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$email = $_SESSION['email'];
$photo = $_SESSION['photoURL'];
?>

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
                    <li><a href="sportif-dashboard.php" class="nav-link">Tableau de bord</a></li>
                    <li><a href="coaches.php" class="nav-link">Trouver un Coach</a></li>
                    <!-- <li><a href="#" class="nav-link">Mes Réservations</a></li> -->
                    <li><a href="profile-sportif.php" class="nav-link active">Mon Profil</a></li>
                </ul>
                
                <div class="nav-actions">
                    <button class="btn btn-ghost" onclick="UserSession.logout()"><a href="logout.php">Déconnexion</a></button>
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
                    <?php 
                        echo "
                            <form id='personalInfoForm' method='POST' class='profile-form' data-validate>
                        <div class='form-row'>
                            <div class='form-group'>
                                <label for='nom'>Nom *</label>
                                <input 
                                    type='text' 
                                    id='nom' 
                                    name='nom' 
                                    value='$nom'
                                    data-validate='name'
                                    disabled
                                    required
                                >
                                <span class='error-message'></span>
                            </div>
                            
                            <div class='form-group'>
                                <label for='prenom'>Prénom *</label>
                                <input 
                                    type='text' 
                                    id='prenom' 
                                    name='prenom' 
                                    value='$prenom'
                                    data-validate='name'
                                    disabled
                                    required
                                >
                                <span class='error-message'></span>
                            </div>
                        </div>
                        
                        <div class='form-group'>
                            <label for='email'>Email *</label>
                            <input 
                                type='email' 
                                id='email' 
                                name='email' 
                                value='$email'
                                data-validate='email'
                                disabled
                                required
                            >
                            <span class='error-message'></span>
                        </div>

                        <div class='form-actions' style='display: none;'>
                            <button type='button' class='btn btn-ghost' onclick='cancelEdit()'>Annuler</button>
                            <button type='submit' class='btn btn-primary'>Enregistrer</button>
                        </div>
                    </form>
                            ";
                    ?>
                </div>
                
                <!-- Account Actions -->
                <div class="profile-card danger-card">
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
                    </div>
                </div>
            </div>
        </div>
    </section>   

    <!-- Scripts -->
    <script src="../js/utils.js"></script>
    <script src="../js/navigation.js"></script>
    <script src="../js/profile.js"></script>
</body>
</html>