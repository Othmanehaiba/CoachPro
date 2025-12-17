<?php
$host = "localhost";
$user = "root";
$pass = "Root@123"; 
$db   = "coachPro";     

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// else {
//     echo "its oky";
// }
?>