<?php
session_start(); 
// Démarre une session pour utiliser les variables de session

unset($_SESSION['auth']); 
// Supprime la variable de session contenant les informations d'authentification de l'utilisateur

$_SESSION['flash']['success'] = 'Vous êtes bien déconnecté'; 
// Stocke un message de succès dans la variable de session

header('Location: ../connexion.php'); 
// Redirige l'utilisateur vers la page de connexion
