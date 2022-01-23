<?php
    session_start();
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_php;charset=utf8", "root", "");
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Supprimer</title>
        <!-- <link rel="stylesheet" href="style_1.css" type="text/css"> -->
    </head>
    <body>
        <div>
        <style> <?php include('style_1.php'); ?> </style>
            <table class="table">
                <thead>
                    <tr>
                        <th><a href="index.php">Accueil</a></th>
                        <th><a href="user_profil.php">Profil</a></th>
                        <th><a href="redaction.php">Créer</a></th>
                        <th><a href="logout.php">Deconnexion</a></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="cnt">
            <h1>Suprimer</h1>
        </div>
    </body>
</html>