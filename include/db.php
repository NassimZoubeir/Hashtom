<?php
// Connexion à la base de données en utilisant PDO
try { // Le bloc try est utilisé pour encapsuler le code susceptible de générer une exception. 
    $user = 'root'; // Nom d'utilisateur de la base de données
    $pass = 'root'; // Mot de passe de la base de données
    $pdo = new PDO('mysql:dbname=app-role;host=localhost:8889', $user, $pass); // Création d'une instance PDO pour la connexion
} catch (PDOException $e) {
    print "Erreur !:" . $e->getMessage() . "<br/>"; // Affiche l'erreur s'il y a un problème de connexion
    die(); // Arrête l'exécution du script en cas d'erreur
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configure le mode de gestion des erreurs de PDO
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Configure le mode de récupération des résultats par défaut
