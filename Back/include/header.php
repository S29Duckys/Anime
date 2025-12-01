<?php
include(__DIR__ . '/../../config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <span>
            <img src="" alt="">
            <h2>TryAnime</h2>
        </span>
        <ul>
            <a href="<?php echo BASE_URL ?>index.php">
                <li>Accueil</li>
            </a>
            <a href="<?php echo PAGES_URL ?>catalogue.php">
                <li>Catalogue</li>
            </a>
            <a href="<?php echo PAGES_URL ?>favori.php">
                <li>Favori</li>
            </a>
            <a href="">
                <li>Mon porfil</li>
            </a>
        </ul>
        <?php
        if (isset($_SESSION['id'])) {
            echo '<a href="' . ACTIONS_URL . 'logout_action.php"><button>Logout</button></a>';
            echo $_SESSION['id'];
        } else {
            echo '<a href="' . PAGES_URL . 'login.php"><button>Login</button></a>';
        }
        ?>
    </header>
</body>

</html>