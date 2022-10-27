<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/footer.css">
  <link rel="stylesheet" href="styles/popup.css">
  <link rel="stylesheet" href="styles/header.css">
  <link rel="stylesheet" href="styles/game.css">
  <link rel="stylesheet" href="styles/chat.css">
  <script src="https://kit.fontawesome.com/7a226b5b65.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>


<body>

  <?php
  include "includes/session.inc.php";
  include "view/header.php"; //inclure le header
  ?>
  <div class="deco-header">
    <h2>THE MEMORY GAME</h2>
  </div>


  <section class="table-features" id="tablefeatures">

    <div class="difficulty">
      <div id="difficulty-btn">DIFFICULTÉ</div>
      <div id="difficulty-choice" class="inactive">
        <label class="easy">
          FACILE
          <input type="radio" name="difficulty" value="easy" />
        </label>
        <label class="medium">
          INTERMÉDIARE
          <input type="radio" name="difficulty" value="medium" />
        </label>
        <label class="expert">
          EXPERT
          <input type="radio" name="difficulty" value="expert" />
        </label>
        <label class="impossible">
          IMPOSSIBLE
          <input type="radio" name="difficulty" value="impossible" />
        </label>

      </div>
    </div>

    <div class="theme">
      <div id="theme-btn">THEMES</div>
      <div id="theme-choice" class="inactive">
        <label class="pokemon">Pokémons
          <input type="radio" name="theme" value="pokemon">
        </label>
        <label class="flags">Rick et Morty
          <input type="radio" name="theme" value="rick">
        </label>
        <label class="pokemon">Emoji
          <input type="radio" name="theme" value="emoji">
        </label>
      </div>
    </div>

    <button id="playbutton">JOUER</button>

  </section>


  <main class="game-grid inactive" id="gamegrid">
    <section class="popup inactive" id="popup">

      <div class="message-div">
        <p>Bien joué ! Voici ton score</p>
      </div>

      <div class="stats-div">
        <div class="scores-div">
          <h2>Score</h2>
          <p id="score-popup">8000</p>
        </div>
        <div class="time-div">
          <h2>Temps</h2>
          <p id="time-popup">1 : 45</p>
        </div>
      </div>

      <div class="replay-div">
        <button class="replay-button" id="replay">Rejouer</button>
      </div>

    </section>
    <div class="game-info">
      <h3 id="score">0</h3>
      <h3><span id="hours">00</span> : <span id="minutes">00</span> : <span id="seconds">00</span></h3>
      <!--<h3 id="click-count"></h3>-->

    </div>
    <table>
      <tbody id="gamebody">

      </tbody>
    </table>
    </div>

    <aside class="chat-box">
      <div class="chat" id="chat">
        <div class="chat-head">
          <div class="profile">
            <img class="my-profile-picture" src="assets/profile-picture.jpg" alt="profile picture">
            <img class="green-circle-icon" src="assets/green-circle-icon.jpg" alt="green circle icon">
          </div>
          <p class="chat-title">Chat général</p>
        </div>

        <?php include "includes/messages.inc.php"; ?>


        <form class="send-message" method="POST" id="chat-form">
          <input placeholder="Votre message..." type="text" class="text-input" name="usermsg" id="usermsg">
          <button class="send-message-text" type="submit" name="submit">Envoyer</button>
        </form>
      </div>
      </div>
    </aside>
  </main>



  <?php include "view/footer.php" //inclure le footer 
  ?>
  <script src="scripts/animation.js"></script>
  <script src="scripts/game.js"></script>

</body>

<script src="scripts/messages.js"></script>

</html>