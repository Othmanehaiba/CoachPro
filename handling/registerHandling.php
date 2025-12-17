<?php 
    require "../CoachPro/pages/register.php";
    require "./database/db.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['coach']) && isset($_POST['submit'])){
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

    $sql = "INSERT INTO user (email, mdp, firstName, lastName)
     VALUES('$email_signup' , '$sign_pass' , '$fname' , '$lname')";
    $row = $conn->query($sql);  
    header("Location: ./pages/login.php");
    exit();
          
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sportif'])){
        if(!empty($_POST['nom']))
            $nom = $_POST['nom'];
        if(!empty($_POST['prenom']))
            $prenom = $_POST['prenom'];
        if(!empty($_POST['email']))
            $email = $_POST['email'];
        if(!empty($_POST['password']))
            $password = $_POST['password'];
    }
?>