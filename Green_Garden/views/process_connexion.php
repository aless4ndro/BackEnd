<?php
session_start();


if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$login = $_POST["login"];
$password = $_POST["password"];

$host = "localhost";
$user = "root";
$pwd = "new_password";
$dbname = "greengarden";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pwd);
} catch (PDOException $e) {
    echo "Connection failed " . $e->getMessage();
}

$stmt = $conn->prepare("SELECT * FROM t_d_client WHERE Mail_Client = :email");
$stmt->bindValue(':login', $login);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['Id_Client'];

    //pour récupérer le user type faire une requete sur la table t_d_usertype



    header('Location: index.php');
    exit();
}
