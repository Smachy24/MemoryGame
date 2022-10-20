<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mon espace</title>
  <link rel="stylesheet" href="./styles/account.css" />
  <link rel="stylesheet" href="./styles/header.css" />
  <link rel="stylesheet" href="./styles/footer.css" />
  <script src="https://kit.fontawesome.com/7a226b5b65.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include "includes/updateMail.inc.php";
  include "includes/updatePassword.inc.php";
  include "view/header.php"; //inclure le header

  ?>
  <main>
    <div class="deco-header">
      <h2>MON ESPACE</h2>
    </div>

    <div class="account-container">
      <aside class="user-control-panel">
        <div class="user-info">
          <div class="user-avatar">
            <i class="fa-solid fa-user"></i>
          </div>
          <p><?php echo $_SESSION["username"] ?></p>
        </div>

        <h3>
          <span><i class="fa-solid fa-chart-simple"></i></span>
          STATISTIQUES
        </h3>

        <h3>
          <span><i class="fa-solid fa-gear"></i></span>
          MODIFIER MES IDENTIFIANTS
        </h3>

        <h3>
          <span><i class="fa-solid fa-gear"></i></span>
          <a href="index.php?logout=true">Deconnexion</a>
        </h3>
      </aside>

      <section class="modif-section">
        <form class="modif-container" method="POST">
          <h3>Modification de l'adresse mail</h3>
          <div id="modifmail" class="modif-container-column">
            <input type="email" placeholder="Ancien Email" name="email" />

            <input type="email" placeholder="Nouveau Email" name="newemail" />

            <input type="password" placeholder="Mot de passe" name="password" />

            <input type="password" placeholder="Confirmer le mot de passe" name="confirmpassword" />

            <button type="submit" id="butVmail" class="validation" name="submitUpdateEmail">
              Valider
            </button>
          </div>
        </form>

        <form class="modif-container" method="POST">
          <h3>Modification du mot de passe</h3>
          <div id="modifmdp" class="modif-container-column">
            <input type="password" placeholder="Ancien mot de passe" name="oldpassword" />

            <input type="password" placeholder="Nouveau mot de passe" name="newpassword" />

            <input type="password" placeholder="Confirmer le nouveau mot de passe" name="confirmnewpassword" />

            <button type="submit" id="butVmail" class="validation" name="submitUpdatePassword">
              Valider
            </button>
          </div>
        </form>
      </section>
    </div>
  </main>

  <?php include "view/footer.php" //inclure le footer 
  ?>
</body>

</html>