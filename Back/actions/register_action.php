<?php
try {
    session_start();
    $base = new PDO('mysql:host=127.0.0.1;dbname=anime_streaming', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['btn_submit'])) {
        # cree les varialble des information entrer 
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);

        # verifi que les champs sont bien remplie 
        if (!empty($username) and !empty($email) and !empty($password)) {
            $sql = 'INSERT INTO utilisateur (pseudo, email, mot_de_passe) VALUES (?, ?, ?)';
            $resultat = $base->prepare($sql);
            $resultat->execute(array($username, $email, $password));

            $_SESSION['id'] = $username;

            header('Location: ../../index.php');

            $resultat->closeCursor();
        }else{
            echo 'remplie';
        }
    }
} catch (Exception $e) {
    # message en cas d’erreur
    die('Erreur : ' . $e->getMessage());
}
