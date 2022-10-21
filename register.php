<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inscription</title>
    <link rel="stylesheet" href="styles/register.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/footer.css" />
    <script
      src="https://kit.fontawesome.com/7a226b5b65.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
  <?php
    //Déconnexion de la session
    include "includes/session.inc.php";
    include "view/header.php"; //inclure le header


    ?>

    <main>
      <div class="deco-header">
        <h2>INSCRIPTION</h2>
      </div>

      <div class="container">
      <form action="#" method="post">
        <div class="infos">
          <input name="mail" type="email" placeholder="     Email" id="Cmail" />
          <br />
          <input name="pseudo" type="text" placeholder="     Pseudo" id="Cpseud" />
          <br />
          <input name="password" type="password" placeholder="     Mot de passe" id="Cmdp" />
          <br />
          <input
          name = "confirmPassword"
            type="password"
            placeholder="     Confirmer le mot de passe"
            id="Confirmmdp"
          />
        </div>
        <div class="buttonregister">
          <button type="submit" href="" id="but">Inscription</button>
        </div>
      </form>
      </div>
    </main>

    <?php include "view/footer.php" //inclure le footer ?> 
  </body>
</html>
