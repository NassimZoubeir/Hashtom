<?php 
require_once "include/db.php";
session_start();

if(isset($_POST['submit'])){

    $errors = array();
    //nom d'utilisateur conditions et implémentation dans la base de données (utilisation d'une Regex n'autorisant que les lettres minuscules et majuscules)

    if (empty($_POST['name']) || !preg_match('/^[a-zA-Z]+$/', $_POST['name'])) {

        $errors['name'] = "Votre nom n'est pas valide, il doit contenir que des majuscules et ou minuscules";
    }

    // email conditions et implémentation dans la base de données (utilisation de filter_var())

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $errors['email'] = "votre email n'est pas valide";

    } else { // Requête pour vérifier si le compte mail existe déja ou non dans la base de données

        $req = $pdo->prepare('SELECT id FROM user WHERE mail=?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();

        if ($user) { // si existant

            $errors['email'] = 'Cet e-mail existe déjà';

        };
    }

    if(empty($errors)){

        // récupération des valeurs de champs de formulaire et sanitize
        $name = htmlspecialchars($_POST['name']) ;
        $email = htmlspecialchars($_POST['email']) ;
        $password = $_POST['mp'];

        // cryptage du mot de passe
        $passHash = password_hash($password, PASSWORD_BCRYPT);

        // Préparation de la requête d'insertion
        $query = "INSERT INTO user (name, mail, mp) VALUES (:name, :mail, :mp)";
        $statement = $pdo->prepare($query);

        // liaison entre les colonnes et leur valeur
        $statement->bindParam(':name', $name);
        $statement->bindParam(':mail', $email);
        $statement->bindParam(':mp', $passHash);

        // Execution pour insertion en base de donnée
        $statement->execute();
        $_SESSION['flash']['success'] = 'Votre compte a bien été créé merci de vous connecter';
        header('Location: ./connexion.php');
        exit();
    }
        

}
?>