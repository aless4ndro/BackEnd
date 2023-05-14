<?php
// Connexion à la base de données (remplacez les valeurs par celles de votre base de données)
$servername = "localhost";
$username = "root";
$password = "my-secret-pw";
$dbname = "green_garden";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Recherche de produits
  $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
  $sql = "SELECT * FROM products WHERE name LIKE :searchQuery";
  $stmt = $conn->prepare($sql);
  $stmt->execute(['searchQuery' => '%' . $searchQuery . '%']);
  $products = $stmt->fetchAll();

  // Affichage des produits
  foreach ($products as $product) {
    echo '<div class="col-md-4 mb-4">';
    echo '<div class="card">';
    echo '<img src="' . $product['image'] . '" class="card-img-top" alt="' . $product['name'] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $product['name'] . '</h5>';
    echo '<p class="card-text">' . $product['description'] . '</p>';
    echo '<p class="card-text">' . $product['price'] . ' €</p>';
    echo '<a href="consult_produit.php?id=' . $product['id'] . '" class="btn btn-primary">Voir le produit</a>';
    echo '<a href="add_to_cart.php?id=' . $product['id'] . '" class="btn btn-warning m-2">Ajouter au panier</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}

$conn = null;
