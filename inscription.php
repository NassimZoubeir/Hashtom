<?php require 'action/register.php' ?>
<!DOCTYPE html>
<html lang="fr">
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
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- fin Favicon -->
    <title>Inscription</title>
   
</head>
<body>
    <div class="container-fluid p-0">
        <?php include 'include/menu.php' ?>
        <section class="p-5">
            <h1>Inscription</h1>

            <!-- Message de Session -->
            <?php if (isset($_SESSION['flash'])) : ?>
                <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
                    <div class="ms-1 me-3 alert alert-<?= $type; ?>">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

            <form method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" required><br><br>
                <label for="email">Email:</label>
                <input type="email" name="email" required><br><br>
                <label for="password">Mot de passe:</label>
                <input type="password" name="mp" required><br><br>
                <input type="submit" name="submit" value="S'inscrire">
            </form>

            <!--messages liés au formulaire -->
            <?php if (!empty($errors)) : ?>
                <div class="ms-1 me-3 alert alert-danger">
                    <p>Vous n'avez pas rempli le formulaire correctement</p>
                        <?php foreach ($errors as $error) : ?>
                            <ul>
                                <li><?= $error; ?></li>
                            </ul>
                        <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
             
    </div>
          
   
</body>
</html>