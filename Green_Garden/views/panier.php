<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
  <title>Document</title>
</head>

<body>
  <div class="container mt-5 text-center">
    <div class="jumbotron">
      <hr class="my-4">
      <div class="text-center">
        <h2><i class="fas fa-shopping-cart"></i> Panier</h2>
      </div>
      <hr class="my-4">
      <div class="text-center">
        <a class="btn btn-primary btn-lg" href="catalogue.php" role="button">Retour au catalogue</a>
      </div>
</body>

</html>

<?php
session_start();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "my-secret-pw";
$dbname = "greengarden";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Récupérer les produits du panier
  $cartProducts = [];
  foreach ($_SESSION['cart'] as $productId => $quantity) {
    $sql = "SELECT * FROM t_d_produit WHERE Id_Produit = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $product['quantity'] = $quantity;
    $cartProducts[] = $product;
  }

  // Afficher les produits du panier
  foreach ($cartProducts as $product) {
    echo '<h2>' . $product['Nom_court'] . ' (x' . $product['quantity'] . ')</h2>';
    echo '<img src="' . $product['Photo'] . '" alt="' . $product['Nom_court'] . '">';
    echo '<p>' . $product['Nom_Long'] . '</p>';
    echo '<p>' . $product['Prix_Achat'] . ' €</p>';
    echo '<a href="remove_from_cart.php?id=' . $product['Id_Produit'] . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>';
  }
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}

$conn = null;
