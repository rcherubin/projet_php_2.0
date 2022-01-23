<?php
    session_start();
//    require "config.php";

    //connexion à la base de donnee
    $bd = new PDO("mysql:host=127.0.0.1;dbname=projet_php;charset=utf8", "root", "");
    if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
        if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
            
            // récupération de la saisie utilisateur
            $article_titre = htmlspecialchars($_POST['article_titre']);
            $article_contenu = htmlspecialchars($_POST['article_contenu']);

            $articles_id_users = $_SESSION["id_users"];

            //insersion dans la base de données les élément saisis par l'utilisateur
            $add_article = $bd->prepare('INSERT INTO articles (titre, description, dates, id_users) VALUES (?, ?, NOW(), ?)');
            $add_article->execute(array($article_titre, $article_contenu, $articles_id_users));
            
            $message = 'Votre article a bien été créé';
        }else {
            $message = 'Veuillez remplir tous les champs';
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Rédaction</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_1.css">
    </head>
    <body>
        <div class="">
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
            <div>
                <form method="POST">
                    <p>Créer un article</p>
                    <input type="text" name="article_titre" placeholder="Titre" /><br />
                    <textarea name="article_contenu" placeholder="Contenu de l'article"></textarea><br />
                    <input type="submit" value="Créer " />
                </form>
            </div>
            <br />
            <?php if(isset($message)) { echo $message; } ?>
        </div>
    </body>
</html>