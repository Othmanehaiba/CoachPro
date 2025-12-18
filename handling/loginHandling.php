<?php 
    
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require "../database/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $email = $_POST['email'] ;
    $password = $_POST['password'];
    
    if (!$email || !$password) {
        die("Email or password missing");
    }
    
    $stmt = $conn->prepare(
    "SELECT id_user, nom, prenom, email, pass, role
     FROM user
     WHERE email = ?"
    );

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows !== 1) {
        die("Invalid email or password");
    }

    $user = $result->fetch_assoc();

    if (!password_verify($password, $user['pass'])) {
        die("Invalid email or password");
    }

    
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['prenom'] = $user['prenom'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];


    if ($user['role'] === 'coach') {
        header("Location: ../pages/coach-dashboard.php");
    } else {
        header("Location: ../pages/sportif-dashboard.php");
    }
    exit();
}else{
    header("Location: ../pages/login.php");
    exit();
}


?>