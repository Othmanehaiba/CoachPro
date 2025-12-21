<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require "../database/db.php";
     //require "../pages/register.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){

        if(!empty($_POST['photoUrl']))
            $url = $_POST['photoUrl'];
        if(!empty($_POST['nom']))
            $nom = $_POST['nom'];
        if(!empty($_POST['prenom']))
            $prenom = $_POST['prenom'];
        if(!empty($_POST['email']))
            $email = $_POST['email'];
        if(!empty($_POST['password']))
            $password = $_POST['password'];
        if(!empty($_POST['discipline']))
            $discipline = $_POST['discipline'];
        if(!empty($_POST['experience']))
            $experience = $_POST['experience'];

        $hash = password_hash($password,PASSWORD_DEFAULT);

        // password_verify($password,$hash);

        $stmt = $conn->prepare("INSERT INTO user (nom, prenom, email, pass, photo, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nom, $prenom, $email, $hash, $url, $_POST['role']);
         

        if ($stmt->execute()) {
                    echo "A";

            header("Location: ../pages/login.php");
            exit();
        } else {
                    echo "B";

            die("Insert error: " . $stmt->error);
        }
    }
?>