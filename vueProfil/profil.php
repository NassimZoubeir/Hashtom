<?php
require '../include/function.php';
logged_only();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--  définit le jeu de caractères utilisé dans la page comme UTF-8, ce qui permet de prendre en charge une large gamme de caractères spéciaux et internationaux. -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- spécifie la version du mode de compatibilité d'Internet Explorer utilisée par le navigateur. Dans ce cas, "IE=edge" indique d'utiliser la dernière version disponible. -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- définit la vue de la page pour les appareils mobiles. Elle indique que la largeur de la page doit correspondre à la largeur de l'appareil et que l'échelle initiale doit être définie à 1.0, assurant ainsi une mise en page adaptative sur les différents appareils. -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Link de la feuille de style de BootStrap -->

    <!-- lien spécifique au Favicon suivant le support de diffusion utilisé --> 
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="../assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- fin Favicon -->
    <title>Profil | Utilisateur</title>
</head>
<body>
    <?php
    include 'menu.php'
    ?>
    <div class="container-fluid position-relative">
        <img src="../assets/images/pikachu.png" alt="combat pokemon pikachu sacha contre miaous" class="img-fluid w-100">
        <h1 class="d-block position-absolute top-50 start-50 translate-middle p-5 border border-5 bg-light">Bonjour, <?= $_SESSION['auth']->name; ?></h1>
    </div>
</body>
</html>