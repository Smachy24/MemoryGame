<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/contact.css">
  <link rel="stylesheet" href="styles/header.css">
  <link rel="stylesheet" href="styles/footer.css">
  <script src="https://kit.fontawesome.com/5495e4bddb.js" crossorigin="anonymous"></script>
  <title>Contact</title>
</head>



<body>
  <?php
  include "includes/session.inc.php";
  include "view/header.php"; //inclure le header
  ?>

  <main>
    <div class="deco-header">
      <h2>NOUS CONTACTER</h2>
    </div>

    <section class="contact-container">

      <section class="contact-line">

        <div class="contact-card">
          <div class="content-card">
            <i class="fa-solid fa-mobile-screen-button"></i>
            <p>06 05 04 03 02</p>
          </div>
        </div>

        <div class="contact-card">
          <div class="content-card">
            <i class="fa-regular fa-envelope"></i>
            <p>support@powerofmemory.com</p>
          </div>
        </div>

        <div class="contact-card">
          <div class="content-card">
            <i class="fa-solid fa-location-dot"></i>
            <p>Paris</p>
          </div>
        </div>
      </section>

      <?php if (
        !empty($_POST["username"]) &&
        !empty($_POST["usertopic"]) &&
        strlen($_POST["usermessage"] >= 15)  &&
        filter_var($_POST["usermail"], FILTER_VALIDATE_EMAIL)
      ) { ?>

        <div class="message-sent-validation">
          <h2>Merci pour votre message !</h2>
          <p>Votre message a bien été envoyé à notre boîte mail. <br>
            On vous répondra dans les plus brefs délai !
          </p>

        </div>

      <?php } else { ?>
        <section class="form-box">
          <form action="contact.php" method="POST">

            <div class="align-form">
              <!-- Input Name -->
              <div class="input-error-flex">
                <input type="text" id="name" name="username" placeholder="Nom" class="user-info-box">
                <?php if (isset($_POST["submit"]) && empty($_POST["username"])) {
                  echo "<p> Erreur : l'username ne peut pas être vide ! </p>";
                } ?>
              </div>
              <!-- Input Email -->
              <div class="input-error-flex">
                <input type="email" id="mail" name="usermail" placeholder="Email" class="user-info-box">
                <?php if (isset($_POST["submit"]) && !filter_var($_POST["usermail"], FILTER_VALIDATE_EMAIL)) {
                  echo "<p> Erreur : Veuillez renseigner une adresse email valide ! </p>";
                } ?>
              </div>
            </div>

            <div class="column-form">
              <!-- Input Topic -->
              <div class="input-error-flex">
                <input id="topic" name="usertopic" placeholder="Sujet" class="topic-box"></input>
                <?php if (isset($_POST["submit"]) && empty($_POST["usertopic"])) {
                  echo "<p> Erreur : Le sujet ne peut pas être vide ! </p>";
                } ?>
              </div>
              <!-- Input Message -->
              <div class="input-error-flex">
                <textarea id="message" name="usermessage" placeholder="Message" class="message-box"></textarea>
                <?php if (isset($_POST["submit"]) && strlen($_POST["usermessage"] < 15)) {
                  echo "<p> Erreur : Votre message doit faire au moins 15 caractères !</p>";
                } ?>
              </div>
            </div>
            <!-- Submit form -->
            <div class="submit-button">
              <input type="submit" value="Envoyer" class="subtmit-button" name="submit">
            </div>
          </form>
        </section>
      <?php } ?>
    </section>

  </main>

  <?php include "view/footer.php" //inclure le footer 
  ?>

</body>

</html>