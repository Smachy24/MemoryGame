<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="./styles/index.css">
  <script src="https://kit.fontawesome.com/7a226b5b65.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./styles/footer.css">
  <title>The power of memory</title>
</head>
<body>
  
  <section class="landing-page">

  <?php include "includes/database.inc.php";
    include "view/header.php"; //inclure le header
  
  ?>

    <section class="home">
      <h1>BIENVENUE DANS NOTRE STUDIO !</h1>
      <p>Venez challenger les cerveaux les plus agiles !</p>
      <div class="play-btn">
        <a href="game.php">JOUER</a>
      </div>
    </section>
  </section>
  
  <section class="website-content">

    <section class="description">

      <div class="list-image">
        <img src="assets/mini-ordi.jpg" alt="Image d'un mini ordi">
        <img src="assets/dab.png" alt="Image d'un superhero vieux qui fait un dab sur une trotinette">
        <img src="assets/cards.png" alt="Image d'un jeu de Poker">
      </div>

      <div class="desc-text">

        <div class="desc-el">
          <h2>01</h2>
          <div>
            <h3>Memory Game</h3>
            <p>A chaque tour, retourne une paire de cartes et regarde si elles sont les mêmes. Si oui, bien joué, tu as fait une paire. Arriveras-tu à retourner l’ensemble des paires et à finir le jeu ? Viens découvrir notre memory game et mesure toi aux autres joueurs pour déterminer qui a la meilleure mémoire !</p>
          </div>
        </div>



        <div class="desc-el">
          <h2>02</h2>
          <div>
            <h3>3 thèmes différents</h3>
            <p>
              - Pokémon : Viens mesurer tes connaissances sur Pokemon pour voir si tu n’es pas inculte ! <br>
              - Drapeaux : T’es un fan de géo ? Seras-tu capable de finir le jeu sans te tromper ? <br>
              - Voitures : Plutôt voitures italiennes ou allemandes ? Découvre notre memory game sur les voitures ! <br>
              </p>
          </div>
        </div>

        <div class="desc-el">
          <h2>03</h2>
          <div>
            <h3>4 niveaux de difficulté</h3>
            <p>
              - Facile : la difficulté fait pour les mémoires de poissons rouges. Découvre notre grille de 5x5 cases. <br>
              - Intermédiaire : un niveau un peu plus dur mais tout aussi facile : une grille de 8x8 cases.<br>
              - Expert : deviens un expert de ce memory game en terminant cette grille de 12x12 cases.<br>
              - Impossible : Essaye de définir ce jeu impossible de 20x20 cases (PS : tu n’y arriveras pas) !
              </p>
          </div>

      </div>
    </section>
    
    <section class="games-status">

      <img src="assets/1.jpg" alt="Image Watch Dogs">


      
      <div class="game-stats">

        <div class="box" id="box1">
        <?php echo $bd -> getGamesPlayed(); ?>
          <span>Parties Jouées</span></div>  
          <div class="box" id="box2">  
        <?php echo $bd -> getConnectedPlayers(); ?>
        <span>Joueurs inscrits</span></div>
        <div class="box" id="box3">
        <?php echo $bd -> getBestScore(); ?>
        <span>Meilleur score</span></div>
        <div class="box" id="box4">
        <?php echo $bd -> getMessageCount(); ?>  
        <span>Messages</span></div>
      </div>
    </section>

    <section class="team">
      <h2>Notre Équipe</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, temporibus.</p>
      <img src="assets/hline.svg" alt="Séparateur">
      <div class="cardbox">

        <div class="card">
          <div class="avatar">
            <img src="assets/valdo_avatar.jfif" alt="Valdo avatar">
          </div>
          <h3>VALDO</h3>
          <h4>Développeur Full-Stack</h4>

          <ul class="social media">
            <a href=""><li><i class="fa-brands fa-facebook"></i></li></a>
            <a href=""><li><i class="fa-brands fa-twitter"></i></li></a>
            <a href=""><li><i class="fa-brands fa-pinterest"></i></li></a>
          </ul>
        </div>

        <div class="card">
          <div class="avatar">
            <img src="assets/diego_avatar.jfif" alt="Diego avatar">
          </div>
          <h3>DIEGO</h3>
          <h4>Développeur Full-Stack</h4>

          <ul class="social media">
            <a href=""><li><i class="fa-brands fa-facebook"></i></li></a>
            <a href=""><li><i class="fa-brands fa-twitter"></i></li></a>
            <a href=""><li><i class="fa-brands fa-pinterest"></i></li></a>
          </ul>
        </div>

        <div class="card">
          <div class="avatar">
            <img src="assets/jeff_avatar.jfif" alt="Jeff avatar">
          </div>
          <h3>JEFF</h3>
          <h4>Développeur Full-Stack</h4>

          <ul class="social media">
            <a href=""><li><i class="fa-brands fa-facebook"></i></li></a>
            <a href=""><li><i class="fa-brands fa-twitter"></i></li></a>
            <a href=""><li><i class="fa-brands fa-pinterest"></i></li></a>
          </ul>
        </div>

        <div class="card">
          <div class="avatar">
            <img src="assets/kevin_avatar.jfif" alt="Kevin avatar">
          </div>
          <h3>Kevin</h3>
          <h4>Développeur <a href= "https://www.coque-unique.com/boutique-img/coqueunique/produit/-impostor-among-us-45024-smartphone-small.jpg" target="_blank">Imposteur</a></h4>

          <ul class="social media">
            <a href=""><li><i class="fa-brands fa-facebook"></i></li></a>
            <a href=""><li><i class="fa-brands fa-twitter"></i></li></a>
            <a href=""><li><i class="fa-brands fa-pinterest"></i></li></a>
          </ul>
        </div>

        
      </div>
    </section>

  </section>

  <?php include "view/footer.php" //inclure le footer ?> 
  
</body>
</html>