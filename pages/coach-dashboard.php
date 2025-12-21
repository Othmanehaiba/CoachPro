<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require "../database/db.php";
// require "../pages/login.php";

// $nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
// $email = $_SESSION['email'];
// $photo = $_SESSION['photo'];
?>

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
                    <!-- <li><a href="#" class="nav-link">Mes Séances</a></li> -->
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
                    <h1>Bienvenue Coach <span id="coachName"><?php echo $prenom ?></span>! 💪</h1>
                    <p>Gérez vos séances et votre planning</p>
                </div>
                <a href="#" class="btn btn-primary">Gérer les Disponibilités</a>
            </div>

            <!-- Quick Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card stat-primary">
                    <div class="stat-icon">⏳</div>
                    <div class="stat-details">
                        <h3><?php 
                        $res = $conn->query("select count(id_reservation) as total from reservation
                        where statut = 'en Attente'");
                        $row = $res->fetch_assoc();
                        echo $row['total'];
                        ?></h3>
                        <p>Demandes en attente</p>
                    </div>
                </div>
                
                <div class="stat-card stat-success">
                    <div class="stat-icon">✓</div>
                    <div class="stat-details">
                        <h3><?php 
                        $res = $conn->query("SELECT count(id_reservation) as total
                                                FROM reservation
                                                WHERE date_reservation = CURDATE() and id_coach = 2;
                                            ");
                        $row = $res->fetch_assoc();
                        echo $row['total'];
                        ?></h3>
                        <p>Séances aujourd'hui</p>
                    </div>
                </div>
                
                <div class="stat-card stat-info">
                    <div class="stat-icon">📅</div>
                    <div class="stat-details">
                        <h3><?php 
                        $res = $conn->query("SELECT count(id_reservation) as total
                                                FROM reservation
                                                WHERE date_reservation = CURDATE() + INTERVAL 1 DAY and id_coach = 2;
                                            ");
                        $row = $res->fetch_assoc();
                        echo $row['total'];
                        ?></h3>
                        <p>Séances demain</p>
                    </div>
                </div>
                
                <div class="stat-card stat-warning">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-details">
                        <h3><?php
                            $res = $conn->query("select avg(r.id_coach) as avrege
                                                    from avis a 
                                                    join reservation r on r.id_reservation = a.id_reservation
                                                    where r.id_coach = 2");
                            $row = $res->fetch_assoc();
                            echo number_format($row['avrege'], 1);
                         ?></h3>
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
                        <span class="badge badge-primary"><?php 
                            $res = $conn->query("select count(r.id_reservation) as total
                                                    from reservation r 
                                                    join sportif s on r.id_sportif = s.id_sportif
                                                    join Coachdiscipline cd on cd.id_coach = r.id_coach
                                                    join coach c on cd.id_coach = cd.id_coach
                                                    join disciplineSportif d on cd.id_discipline = d.id_discipline
                                                    where r.statut = 'en Attente'");
                            $row = $res->fetch_assoc();
                            echo $row['total'];
                             ?> nouvelles</span>
                    </div>
                    <div class="requests-list">
                        <?php 
                            $res = $conn->query("select s.nom, s.prenom, d.nom_discipline, r.date_reservation
                                                    from reservation r 
                                                    join sportif s on r.id_sportif = s.id_sportif
                                                    join Coachdiscipline cd on cd.id_coach = r.id_coach
                                                    join coach c on cd.id_coach = cd.id_coach
                                                    join disciplineSportif d on cd.id_discipline = d.id_discipline
                                                    where r.statut = 'en Attente'");
                            while($row = $res->fetch_assoc()){
                                echo "
                                    <div class='request-item'>
                            <div class='request-info'>
                                <div class='request-avatar'>👤</div>
                                <div class='request-details'>
                                    <h4>{$row['nom']}</h4>
                                    <p class='request-discipline'>{$row['nom_discipline']}</p>
                                    <div class='request-meta'>
                                        <span class='request-date'>📅 {$row['date_reservation']}</span>
                                    </div>
                                </div>
                            </div>
                            <div class='request-actions'>
                                <button class='btn btn-success btn-sm' name='accepte' onclick='acceptRequest(1)'>
                                    ✓ Accepter
                                </button>
                                <button class='btn btn-danger btn-sm' name='refuse' onclick='rejectRequest(1)'>
                                    ✕ Refuser
                                </button>
                            </div>
                        </div>
                                ";
                            }
                           
                        ?>
                    </div>
                    <a href="#" class="view-all-link">Voir toutes les demandes →</a>
                </div>
                
                <!-- Today's Schedule -->
                <div class="dashboard-card schedule-card">
                    <div class="card-header">
                        <h2>Planning du Jour</h2>
                        <span class="schedule-date">Lundi 18 Décembre</span>
                    </div>
                    <div class="schedule-timeline">
                        <?php
                            $res = $conn->query("select s.nom, s.prenom, d.nom_discipline
                                                    from reservation r 
                                                    join sportif s on r.id_sportif = s.id_sportif
                                                    join Coachdiscipline cd on cd.id_coach = r.id_coach
                                                    join coach c on cd.id_coach = cd.id_coach
                                                    join disciplineSportif d on cd.id_discipline = d.id_discipline
                                                    where r.statut = 'accepté' and r.date_reservation = CURDATE()");
                            while($row = $res->fetch_assoc()){
                                echo "
                                    <div class='timeline-item confirmed'>
                                        <div class='timeline-content'>
                                            <h4>{$row['nom_discipline']}</h4>
                                            <p>{$row['nom']} {$row['prenom']}</p>
                                <span class='status-badge status-confirmed'>Confirmée</span>
                            </div>
                        </div>
                                    ";
                            }                        
                        ?>
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



