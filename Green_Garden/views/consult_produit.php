<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consultation produit</title>
  <!-- Ajoutez le lien vers votre fichier CSS ici -->
</head>

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo $product['name']; ?>">
      </div>
      <div class="col-md-6">
        <h1><?php echo $product['name']; ?></h1>
        <p><?php echo $product['description']; ?></p>
        <p><?php echo $product['price']; ?></p>
      </div>
    </div>
  </div>


  <!-- Ajoutez le lien vers votre fichier JavaScript ici -->
  <?php
  // Connexion à la base de données
  $servername = "localhost";
  $username = "root";
  $password = "my-secret-pw";
  $dbname = "green_garden";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer l'ID du produit
    $productId = $_GET['id'];

    // Requête pour récupérer les informations du produit
    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le produit a été trouvé
    if ($product) {
      // Afficher les informations du produit
      echo '<h1>' . $product['name'] . '</h1>';
      echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
      echo '<p>' . $product['description'] . '</p>';
      echo '<p>' . $product['price'] . ' €</p>';
    } else {
      echo "Le produit n'a pas été trouvé.";
    }
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
  }

  $conn = null;

  ?>


</body>

</html>