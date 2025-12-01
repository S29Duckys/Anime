<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TryAnime - Page de login</title>
  </head>
  <body>
    <main>
      <form action="../actions/login_action.php" method="post">
        <div class="form-group">
          <label for="">Username</label>
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Entrez votre username"
            required
          />
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Entrez votre password"
            required
          />
        </div>

        <button type="submit" name="btn_submit">Connect</button>
      </form>
      <div class="signup-link">
        Pas encore de compte ? <a href="./register.php">S'inscrire</a>
      </div>
    </main>
  </body>
</html>
