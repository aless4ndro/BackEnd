
<?php
include('config.php'); 
?>

<form action="traitement_validation_panier.php" method="post">
  <h2>Adresse de livraison</h2>
  <label for="livraison_rue">Rue:</label><br>
  <input type="text" id="livraison_rue" name="livraison_rue"><br>
  <label for="livraison_ville">Ville:</label><br>
  <input type="text" id="livraison_ville" name="livraison_ville"><br>
  <!-- Continuez avec le reste des champs pour l'adresse de livraison -->

  <h2>Adresse de facturation</h2>
  <label for="facturation_rue">Rue:</label><br>
  <input type="text" id="facturation_rue" name="facturation_rue"><br>
  <label for="facturation_ville">Ville:</label><br>
  <input type="text" id="facturation_ville" name="facturation_ville"><br>
  <!-- Continuez avec le reste des champs pour l'adresse de facturation -->


  <h2>Type de paiement</h2>
  <select name="type_paiement" id="type_paiement">
    <option value="carte">Carte de crédit</option>
    <option value="espece">espece</option>
    <option value="paypal">Paypal</option>
    <?php if ($utilisateurEstProfessionnel) : ?>
      <option value="differe">Paiement différé</option>
    <?php endif; ?>
  </select>


  <h2>Type de livraison</h2>
  <select name="type_livraison" id="type_livraison">
    <option value="standard">Standard</option>
    <option value="express">Express</option>
    <!-- Ajoutez plus d'options si nécessaire -->
  </select>

  <input type="submit" value="Valider le panier">
</form>