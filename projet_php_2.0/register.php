<?php
    session_start();
    require "config.php";

    //récupération de la saisie utilisateur
    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' or email = '$email'");
        if(mysqli_num_rows($duplicate) > 0) {
            echo 
            "<script> alert('le nom ou l'adresse mail est déjà pris');</script>";
        }
        else {
            if($password == $cpassword) {
                //insersion dans la base de données les élément saisis par l'utilisateur
                $query = "INSERT INTO users VALUES('','$username', '$email', '$password')";
                mysqli_query($conn, $query);
                echo
                "<script> alert('L'inscription a réussi');</script>";
            }
            else {
                echo
                "<script> alert('le mot de passe ne correspond pas');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrap">
            <h2 class="title">Inscription sur le site SÔDÔ</h2>
            <form method="post" action="register.php" class="from" autocomplete="off"> 
                <div class="input-field">
                    <label for="username" class="input-label">Nom d'utilisateur</label>
                    <input type="username" name="username" id="username" class="input" placeholder="Entrer votre nom" required>
                </div>
                <div class="input-field">
                    <label for="email" class="input-label">Email</label>
                    <input type="email" name="email" id="email" class="input" placeholder="Entrer votre email" required>
                </div>
                <div class="input-field">
                    <label for="password" class="input-label">Mot de passe</label>
                    <input type="password" name ="password" id="password" class="input" placeholder="Entrer votre mot de passe" required>
                </div>
                <div class="input-field">
                    <label for="cpassword" class="input-label">Confirmer le mot de passe</label>
                    <input type="cpassword" name="cpassword"id="cpassword" class="input" placeholder="Confirmer votre mot de passe" required>
                </div>
                <button type="submit" class="btn" name="submit">Inscription</button>
                <p>Vous avez déjà un compte : <a href="login.php">Connexion</a></p>
            </form>
        </div>
    </body>
</html>