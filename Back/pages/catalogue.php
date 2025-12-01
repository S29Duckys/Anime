<?php

include(__DIR__ . '/../../config.php');

try {
    session_start();
    $base = new PDO('mysql:host=127.0.0.1;dbname=anime_streaming', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $image = 
    $titre = 
    $description = 
    $date_sortie = 

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
        </div>
    <?php } ?>
</body>

</html>