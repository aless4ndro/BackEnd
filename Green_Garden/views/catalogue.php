
<script src="/js/catalogue.js"></script>

</div>
<?php
 include('../includes/header.php');?>

<div class="container mt-5">
  <h1 class="text-center">Catalogue</h1>
  <form class="d-flex mt-4" method="get" action="catalogue.php" id="search-form">
    <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche" name="query">
    <button class="btn btn-outline-success" type="submit">Recherche</button>
  </form>
</div>

<div class="container mt-5">
  <div class="row" id="search-results">
    <!-- Les résultats de la recherche seront affichés ici -->
  </div>

 <?php

// Connexion à la base de données (remplacez les valeurs par celles de votre base de données)
$servername = "localhost";
$username = "root";
$password = "new_password";
$dbname = "greengarden";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Recherche de produits
  $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
  $sql = "SELECT * FROM t_d_produit WHERE nom_court LIKE :searchQuery";
  $stmt = $conn->prepare($sql);
  $stmt->execute(['searchQuery' => '%' . $searchQuery . '%']);
  $products = $stmt->fetchAll();

  // Affichage des produits
  foreach ($products as $product) {
    echo '<div class="col-md-4 mb-4">';
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo '<img src="' . $product['Photo'] . '" class="card-img-top" alt="'  . '">';
    echo '<h5 class="card-title">' . $product['Nom_court'] . '</h5>';
    echo '<p class="card-text">' . $product['Nom_Long'] . '</p>';
    echo '<p class="card-text">' . $product['Prix_Achat'] . ' €</p>';
    echo '<p class="card-text">' . $product['Taux_TVA'] . '</p>';
    echo '<a href="consult_produit.php?id=' . $product['Id_Produit'] . '" class="btn btn-primary">Voir le produit</a>';
    echo '<a href="add_to_cart.php?id=' . $product['Id_Produit'] . '" class="btn btn-warning m-2">Ajouter au panier</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}

$conn = null;
?>