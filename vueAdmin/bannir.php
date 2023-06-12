<?php
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=app-role', 'root' , 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() >0) {

        $bannirUser = $bdd->prepare('DELETE FROM user WHERE id = ?');
        $bannirUser->execute(array($getid));

        header('Location: admin.php');
    }else {
        echo "Aucun utilisateur n'a été trouvé";
    }
} else {
    echo "L'identifiant n'a pas été récuperé";
}

?>