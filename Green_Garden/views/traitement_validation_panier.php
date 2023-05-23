<?php

// Inclusion de votre fichier de configuration ou de connexion à la base de données

session_start(); // Démarrer la session
include('config.php');
// Récupérer l'Id_Client de la session
$Id_Client = $_SESSION['user_id'];

// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION['Id_Client'])) {
    $Id_Client = $_SESSION['Id_Client'];
} else {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
    header("Location: process_connexion.php");
    exit;
}





// Récupération des données du formulaire
$livraison_rue = $_POST['livraison_rue'];
$livraison_ville = $_POST['livraison_ville'];

$facturation_rue = $_POST['facturation_rue'];
$facturation_ville = $_POST['facturation_ville'];

$type_paiement = $_POST['type_paiement'];
$type_livraison = $_POST['type_livraison'];

$Num_Commande = '123ABC'; // Ceci doit être généré ou reçu d'une manière ou d'une autre.
$Date_Commande = date('Y-m-d H:i:s'); // Ceci va générer la date et l'heure actuelles.
$Id_Statut = 1; // Ceci devrait probablement être basé sur une certaine logique dans votre application.
$Id_TypePaiement = 1; // Ceci devrait être reçu comme entrée de votre formulaire.
$Remise_Commande = 0; // Ceci devrait être calculé en fonction de la logique de votre application.

// Utilisez ces variables pour insérer les données dans votre base de données.
// Par exemple, vous pouvez préparer une requête SQL pour insérer ces données dans la table appropriée.
// Assurez-vous d'utiliser des requêtes préparées pour éviter les injections SQL.

$requete = $conn->prepare("INSERT INTO t_d_commande (Num_Commande, Date_Commande, Id_Statut, Id_Client, Id_TypePaiement, Remise_Commande) VALUES (:Num_Commande, :Date_Commande, :Id_Statut, :Id_Client, :Id_TypePaiement, :Remise_Commande)");
$requete->execute([
    'Num_Commande' => $Num_Commande, 
    'Date_Commande' => $Date_Commande, 
    'Id_Statut' => $Id_Statut, 
    'Id_Client' => $Id_Client, 
    'Id_TypePaiement' => $Id_TypePaiement, 
    'Remise_Commande' => $Remise_Commande
]);

header('Location: confirmation.php');
exit;
include('../includes/footer.php');
?>
