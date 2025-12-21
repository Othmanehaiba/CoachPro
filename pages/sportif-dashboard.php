<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
    require "../database/db.php";

    $nom = $_SESSION['nom'] ;
    $prenom = $_SESSION['prenom']; 
    $email = $_SESSION['email'] ;
    $photo = $_SESSION['photo'];

?>
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
            <a href="../index.php" class="logo">
                <div class="logo-icon">CP</div>
                <span>CoachPro</span>
            </a>
            
            <nav class="nav">
                <ul class="nav-links">
                    <li><a href="sportif-dashboard.php" class="nav-link active">Tableau de bord</a></li>
                    <li><a href="coaches.php" class="nav-link">Trouver un Coach</a></li>
                    <!-- <li><a href="#" class="nav-link">Mes Réservations</a></li> -->
                    <li><a href="profile-sportif.php" class="nav-link">Mon Profil</a></li>
                </ul>
                
                <div class="nav-actions">
                    <button class="btn btn-ghost"><a href="logout.php">Déconnexion</a></button>
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
                    <h1>Bienvenue, <span id="userName"><?php echo "$prenom"; ?></span>! 👋</h1>
                    <p>Prêt pour votre prochaine séance d'entraînement ?</p>
                </div>
                <a href="coaches.php" class="btn btn-primary">Réserver une séance</a>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📅</div>
                    <div class="stat-details">
                        <h3><?php
                            $res = $conn->query("select count(id_reservation) as total from reservation where id_sportif = 1");
                            $row = $res->fetch_assoc();
                            echo $row['total'];
                         ?></h3>
                        <p>Séances</p>
                    </div>
                </div>  
                
                <div class="stat-card">
                    <div class="stat-icon">🎯</div>
                    <div class="stat-details">
                        <h3><?php
                            $res = $conn->query("select count(c.nom) as total
                                from sportif s 
                                join reservation r on r.id_sportif = s.id_sportif
                                join coach c on c.id_coach = r.id_coach
                                where s.id_sportif = 1;
                                ");
                            $row = $res->fetch_assoc();
                            echo $row['total'];
                         ?></h3>
                        <p>Coachs différents</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-details">
                        <h3><?php
                            $res = $conn->query("select avg(id_avis) as total from avis where id_sportif = 4");
                            $row = $res->fetch_assoc();
                            echo number_format($row['total'], 1);
                         ?></h3>
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
                        <?php
                            $res = $conn->query("
                                SELECT 
                                    r.date_reservation,
                                    s.nom,
                                    s.prenom,
                                    d.nom_discipline
                                FROM reservation r
                                JOIN coach c ON r.id_coach = c.id_coach
                                JOIN Coachdiscipline cd ON c.id_coach = cd.id_coach
                                JOIN disciplineSportif d ON cd.id_discipline = d.id_discipline
                                JOIN sportif s ON r.id_sportif = s.id_sportif
                                ORDER BY r.date_reservation ASC;
                        ");
                        
                        while ($row = $res->fetch_assoc()) {
                            if (!$res) {
                               die("SQL Error: " . $conn->error);
                               
                            }
                            $day   = date('d', strtotime($row['date_reservation']));
                            $month = strtoupper(date('M', strtotime($row['date_reservation'])));
                        
                            echo "
                            <div class='session-item'>
                                <div class='session-date'>
                                    <div class='date-day'>$day</div>
                                    <div class='date-month'>$month</div>
                                </div>
                        
                                <div class='session-details'>
                                    <h4>{$row['nom_discipline']}</h4>
                                    <p>Coach {$row['prenom']} {$row['nom']}</p>
                                </div>
                        
                                <div class='session-actions'>
                                    <button class='btn-icon' title='Modifier'>✏️</button>
                                    <button class='btn-icon' title='Annuler'>🗑️</button>
                                </div>
                            </div>
                            ";
                        }
                        ?>
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
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="../js/utils.js"></script>
    <script src="../js/navigation.js"></script>
    <script src="../js/dashboard.js"></script>
</body>
</html>