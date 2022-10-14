<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="styles/login.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/footer.css" />
    <script
      src="https://kit.fontawesome.com/7a226b5b65.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
  <?php include "view/header.php" //inclure le header ?>

    <main>
      <div class="deco-header">
        <h2>CONNEXION</h2>
      </div>

      <div class="container">
        <div class="infos">
          <input type="email" placeholder="     Email" id="Cmail" />
          <br />
          <input type="password" placeholder="     Mot de passe" id="Cmdp" />
          <a href="register.php"
            >Vous n'avez pas encore de compte ? Inscrivez-vous !</a
          >
        </div>

        <div class="buttonlogin">
          <button href="" id="but">Connexion</button>
        </div>
      </div>
    </main>

    <?php include "view/footer.php" //inclure le footer ?> 
  </body>
</html>
