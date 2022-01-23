<?php
    session_start();
    require "config.php";

    if(isset($_POST["submit"])) {
        $username_email = $_POST["username_email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0) {
            if($password == $row["password"]) {
                $_SESSION["login"] = true;
                $_SESSION["id_users"] = $row["id_users"];
                header("Location: index.php");
            }
            else {
                echo 
                "<script> alert('Mauvai mot de passe');</script>";
            }
        }
        else {
            echo 
            "<script> alert('Cet utilisateur n'existe pas');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrap">
            <h2 class="title">Connexion</h2>
            <form action="" class="from" method="post" autocomplete="off">
                <div class="input-field">
                    <label for="username_email" class="input-label">Nom d'utilisateur ou mail</label>
                    <input type="email" name="username_email" id="username_email" class="input" placeholder="Entrer votre email" required>
                </div>
                <div class="input-field">
                    <label for="password" class="input-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="input" placeholder="Entrer votre mot de passe" required>
                </div>
                <button type="submit" name="submit" class="btn">Connexion</button>
                <p>Créer un compte! <a href="register.php">Inscription</a></p>
            </form>
        </div>
    </body>
</html>