<?php

session_start();

$root = dirname(__DIR__, 2);

include($root . '/back/include/header.php');

try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=anime_streaming', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM anime";
    $resultat = $base->prepare($sql);
    $resultat->execute();
} catch (Exception $e) {
    # message en cas d’erreur
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TryAnime - Page catalogue</title>
</head>

<body>
    <?php while ($anime = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
        <div>
            <img src="<?php echo IMG_COVERS_URL . htmlspecialchars($anime['image_cover']);?>" alt="image cover <?php htmlspecialchars($anime['titre']);?>">
            <h3><?php echo htmlspecialchars($anime['titre']);?></h3>
            <p><?php echo htmlspecialchars($anime['description']);?></p>
            <span><?php echo htmlspecialchars($anime['date_sortie']);?></span>
            <form action="../actions/add_favoris_action.php" method="post">
                <input type="hidden" name="id_anime" value="<?php echo $anime['id_anime']; ?>">
                <button name="btn_submit" type="submit">add favorit</button>
            </form>
        </div>
    <?php } ?>
</body>

</html>