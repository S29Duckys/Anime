<?php
try {
    session_start();
    $base = new PDO('mysql:host=127.0.0.1;dbname=anime_streaming', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST["btn_submit"])) {
            echo 'oui';
        }

} catch (Exception $e) {
    # message en cas d’erreur
    die('Erreur : ' . $e->getMessage());
}
