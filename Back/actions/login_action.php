<?php
try {
    session_start();
    $base = new PDO('mysql:host=127.0.0.1;dbname=anime_streaming', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["btn_submit"])) {
        # verifie si les champs on ete remplie
        if (!empty($_POST["username"]) and !empty($_POST["password"])) {
            $username = htmlspecialchars($_POST["username"]);
            $password = sha1($_POST["password"]);

            # fait la requette SQL pour verifier les informations
            $sql = "SELECT * FROM utilisateur WHERE pseudo=? AND mot_de_passe=?";
            $resultat = $base->prepare($sql);
            $resultat->execute(array($username, $password));

            # verifie si les champs entrer sont bon
            if ($resultat->rowCount() > 0) {
                $_SESSION["id"] = $username;
                echo $_SESSION["id"];

                header('Location: ../../index.php');
            } else {
                header('Location: ../pages/login.php');
            }

            $resultat->closeCursor();
        } else {
            echo "remplie fdp";
        }
    }
} catch (Exception $e) {
    # message en cas d’erreur
    die('Erreur : ' . $e->getMessage());
}
