<?php 
session_start();
$bdd = new PDO('mysql:host=localhost:8889;dbname=app-role;', 'root', 'root');
if(!$_SESSION['admin']) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="../assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Admin</title>
</head>
<body>
    <?php include '../include/menu.php' ?>
    <h1 class="text-center mt-5">Bienvenue sur la page Admin</h1>

    <div class="container-fluid position-relative">
        <img src="../assets/images/goku2.png" alt="Image de Goku" class="img-fluid rounded mx-auto d-block">
    </div>

    <?php 

    $recupUsers = $bdd->query('SELECT * FROM user');
    while ($user = $recupUsers->fetch()) {
       ?>
       <p><?=  $user['name'];?> <button><a href="bannir.php?id=<?= $user['id']; ?>" style="color:red;
       text-decoration: none">Bannir le membre</a></button></p>
       <?php
    }
    
    ?>

</body>
</html>