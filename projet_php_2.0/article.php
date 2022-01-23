<?php
    
    session_start();
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_php;charset=utf8", "root", "");

    $articles = $bdd->query("SELECT id_articles,titre, description, dates, username
    FROM articles
    INNER JOIN users ON articles.id_users = users.id_users
    ORDER BY dates DESC");

    $articles->execute();

    while($art = $articles->fetch()) {
        $article_users = $art['username'];
        $article_titre = $art['titre'];
        $article_description = $art['description'];
        $article_dates = $art['dates'];
    }
?>

<!doctype html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8">
    </head>
    <body>
    <?php
    
    session_start();
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=projet_php;charset=utf8", "root", "");

    $articles = $bdd->query("SELECT id_articles,titre, description, dates, username
    FROM articles
    INNER JOIN users ON articles.id_users = users.id_users
    ORDER BY dates DESC");

    $articles->execute();

    while($art = $articles->fetch()) {
        $article_users = $art['username'];
        $article_titre = $art['titre'];
        $article_description = $art['description'];
        $article_dates = $art['dates'];
    }
?>
        <h1><?= $article_titre ?></h1>
        <p><?= $article_description ?></p>
        <p><?= $article_dates ?></p>
    </body>
</html>