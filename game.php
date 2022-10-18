<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="styles/header.css">
  <link rel="stylesheet" href="styles/game.css">
  <link rel="stylesheet" href="styles/chat.css">
  <script src="https://kit.fontawesome.com/7a226b5b65.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>

<?php include "view/header.php" //inclure le header ?>

  <div class="deco-header">
    <h2>THE MEMORY GAME</h2>
  </div>


  <main class="game-grid">
      <table>
        <tbody>
          <tr>
            <td><div class="case"><img src="assets/assets-pokemon/1.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/2.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/3.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/4.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/5.png" alt="Image de Pokémons"></div></td>
          </tr>

          <tr>
            <td><div class="case"><img src="assets/assets-pokemon/6.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/7.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/8.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/9.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/10.png" alt="Image de Pokémons"></div></td>
          </tr>

          <tr>
            <td><div class="case"><img src="assets/assets-pokemon/11.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/12.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/13.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/1.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/2.png" alt="Image de Pokémons"></div></td>
          </tr>

          <tr>
            <td><div class="case"><img src="assets/assets-pokemon/3.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/4.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/5.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/6.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/7.png" alt="Image de Pokémons"></div></td>
          </tr>

          <tr>
            <td><div class="case"><img src="assets/assets-pokemon/8.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/9.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/10.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/11.png" alt="Image de Pokémons"></div></td>
            <td><div class="case"><img src="assets/assets-pokemon/12.png" alt="Image de Pokémons"></div></td>
          </tr>
        </tbody>
      </table>

      <section class="table-features">

        <ul class="difficulty">
          <li class="easy">FACILE</li>
          <li class="medium">INTERMÉDIARE</li>
          <li class="expert">EXPERT</li>
          <li class="impossible">IMPOSSIBLE</li>
        </ul>

        <div class="theme">
          <div class="pokemon">Pokémons</div>
          <div class="flags">Drapeaux</div>
          <div class="cars">Voitures</div>

        </div>

      </section>
      </div>

      <aside class="chat-box">
        <div class="chat">
          <div class="chat-head">
            <div class="profile">
              <img class = "my-profile-picture" src="assets/profile-picture.jpg" alt="profile picture">
              <img class = "green-circle-icon" src="assets/green-circle-icon.jpg" alt="green circle icon">
            </div>
            <p class="chat-title">Chat général</p>
          </div>
      
          <div class="message-send">
            <div class="message-box">
              <p class="surname">Moi</p>
              <p class="message-send-text">Hello</p>
              <p class="message-time">Aujourd'hui à 15h22</p>
            </div>
          </div>
      
          <div class="message-received">
            <img class="profile-picture"src="assets/profile-picture.jpg" alt="profile picture">
            <div class="message-box">
              <p class="surname">Arthur</p>
              <p class="message-received-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
              <p class="message-time">Aujourd'hui à 15h30</p>
            </div>
          </div>
      
          <div class="send-message">
            <input placeholder="Votre message..." type="text" class="text-input">
            <p class ="send-message-text">Envoyer</p>
          </div>
        </div>
      </aside>
  </main>

  

  <?php include "view/footer.php" //inclure le footer ?> 
  
  
</body>
</html>