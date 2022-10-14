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
<?php include "view/header.php" //inclure le header ?>  

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

    <section class="form-box">
        <form action="#" method="post">
        <div class="align-form">
                <input type="text" id="name" name="user-name" placeholder="Nom" class="name-box">

                <input type="email" id="mail" name="user-mail" placeholder="Email" class="mail-box">

        </div>
        <div class="column-form">
                <input id="topic" name="user-topic" placeholder="Sujet" class="topic-box"></input>
    
                <textarea id="message" name="user-message" placeholder="Message" class="message-box"></textarea>
        </div>

            <div class="submit-button">
                <input type="submit" value="Envoyer" class="subtmit-button">
            </div>
        </form>
    </section>
    
  </section>

  </main>

  <?php include "view/footer.php" //inclure le footer ?> 

</body>
</html>