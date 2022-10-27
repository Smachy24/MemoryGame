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
  <script src="https://kit.fontawesome.com/7a226b5b65.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include "includes/login.inc.php";
  include "view/header.php"; //inclure le header 
  ?>

  <main>
    <div class="deco-header">
      <h2>CONNEXION</h2>
    </div>

    <div class="container">
      <?php if ($_SESSION["connected"] == true) {
        echo $sucessMessage;
      } else { ?>
        <form action="#" method="post">
          <div class="infos">
            <input name="mail" type="email" placeholder="     Email" id="Cmail" />
            <br />
            <input name="password" type="password" placeholder="     Mot de passe" id="Cmdp" />
            <a href="register.php">Vous n'avez pas encore de compte ? Inscrivez-vous !</a>
            <?php if (isset($_POST["submit"]) && $_SESSION["connected"] == false) {?>
              <p id="incorrect"><?php echo $errors;?></p>
            <?php } ?>
          </div>

          <div class="buttonlogin">
            <button type="submit" href="" id="but" name="submit">Connexion</button>
          </div>
        </form>
      <?php } ?>
    </div>
  </main>

  <?php include "view/footer.php" //inclure le footer 
  ?>
</body>

</html>
