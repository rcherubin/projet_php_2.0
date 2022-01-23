

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <!-- <link rel="stylesheet" href="style_1.css" type="text/css" /> -->
        <title>Accueil</title>
    </head>
    <body>
        <style> <?php include('style_1.php'); ?> </style>
        <div class="container">
            <div>
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
                <div class="art">
                <section class="services" id="services">
                    <div class="box-container">
                        <ul>
                            <?php
                            // Connexion avec la base de donné
                                $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_php;charset=utf8", "root", "");

                                // Selection de article
                                $articles = $bdd->query("SELECT id_articles,titre, description, dates, username
                                FROM articles
                                INNER JOIN users ON articles.id_users = users.id_users
                                ORDER BY dates DESC");
                                $articles->execute();

                                while($art = $articles->fetch())
                                {
                                    ?> <div class="box">
                                       <div class="title-user">
                                           <h1><?= $art["username"]?></h1>
                                       </div>
                                    <h1 id="title-user"><i><?= $art["titre"]?> :</i></h1>
                                    <p><?= $art["description"]?></p>
                                    <p id="date"><?= $art["dates"]?></p>
                                    <table class="tab">
                                        <thead>
                                            <tr>
                                                <th><a href="update.php"><i>Modifier</i></a></th>
                                                <th><a href="delete.php"><i>Supprimer</i></a></th>
                                            </tr>
                                        </thead>
                                    </table>
                                    </div>
                                    <?php   
                                }
                            ?>
                        </ul>
                    </div>
                </section>
                </div>
            </div>
        </div>
    </body>
</html>