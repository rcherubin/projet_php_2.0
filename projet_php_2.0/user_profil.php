<?php
    
    session_start();
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_php;charset=utf8", "root", "");

    $articles = $bdd->query("SELECT id_articles,titre, description, dates, username, email
    FROM articles
    INNER JOIN users ON articles.id_users = users.id_users
    ORDER BY dates DESC");

    $articles->execute();

    while($art = $articles->fetch()) {
        $article_users = $art['username'];
        $article_email = $art['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Index</title>
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
            <section class="services" id="services">
                <div class="box-container">
                    <div class="profil">
                        <h1><?= $article_users ?></h1>
                        <h1><?= $article_email ?></h1>
                    </div>
                    <?php
                        $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_php;charset=utf8", "root", "");
                        $articles = $bdd->query("SELECT id_articles,titre, description, dates, username
                        FROM articles
                        INNER JOIN users ON articles.id_users = users.id_users
                        ORDER BY dates DESC");
                        $articles->execute();
                        
                        
                        while($art = $articles->fetch()) {
                            ?> <div class="box">
                            <p id="title-user"><?= $art["titre"]?></p>
                            <p><?= $art["description"]?></p>
                            <p>Publié le <?= $art["dates"]?></p>
                            </div>
                            <?php 
                        }
                    ?>
                </div>
            </section>
        </div>
    </body>
</html>