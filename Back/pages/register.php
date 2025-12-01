<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TryAnime - Page de register</title>
</head>

<body>
    <main>
        <form method="POST" action="../actions/register_action.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Entrez votre username"
                    required>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input
                type="email"
                id="email"
                name="email"
                placeholder="Entrez votre email"
                required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Entrez votre password"
                    required>
            </div>
            <button type="submit" name="btn_submit">Créé mon compte</button>
        </form>
        <div class="signup-link">
            Deja un compte ? <a href="./login.php">se connecter</a>
        </div>
    </main>
</body>

</html>