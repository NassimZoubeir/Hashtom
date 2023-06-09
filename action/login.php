<?php
session_start(); 
// Démarre une session pour utiliser les variables de session

if (!empty($_POST) && !empty($_POST['mail']) && !empty($_POST['mp'])) {

    require_once 'include/db.php'; 
    // Inclut le fichier contenant la connexion à la base de données

    $req = $pdo->prepare("SELECT `user`.* FROM `user` WHERE `user`.`mail` = ?");
      // Prépare une requête pour récupérer les données utilisateur en fonction de l'email
      $req->execute([$_POST['mail']]); 
      // Exécute la requête en utilisant l'email fourni dans le formulaire
      $user = $req->fetch(); 
      // Récupère la première ligne de résultat

    if ($user) {

        $reqRoles = $pdo->prepare("SELECT `role`.`nom` AS 'role'
        FROM `user_has_role`
        LEFT JOIN `role` ON `user_has_role`.`role_id` = `role`.`id`
        WHERE `user_has_role`.`user_id` = ?");
        $reqRoles->execute([$user->id]);
        $roles = $reqRoles->fetchAll(PDO::FETCH_COLUMN);


        if(password_verify($_POST['mp'], $user->mp)){
             // Vérifie si le mot de passe fourni correspond au mot de passe haché stocké en base de données
            $_SESSION['auth'] = $user;
            
            if (in_array('ADMIN', $roles)) {
                // Utilisateur a le rôle ADMIN
                $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté en tant qu\'administrateur';
                header('Location: vueAdmin/admin.php');
                exit();
            } elseif (in_array('USER', $roles)) {
                // Utilisateur a le rôle USER
                $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté en tant qu\'utilisateur';
                header('Location: vueProfil/profil.php');
                 // Redirige l'utilisateur vers la page de profil
                exit(); // Arrête l'exécution du script
            } else {
                // Utilisateur sans rôle approprié
                $_SESSION['flash']['danger'] = 'Vous n\'avez pas les droits d\'accès';
                header('Refresh:0');
                exit();
            }

        }else{
             // Stocke un message d'erreur dans la variable de session
            $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
        }   
    }

}
