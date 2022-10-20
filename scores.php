<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Scores</title>
    <link rel="stylesheet" href="styles/scores.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/footer.css" />
    <script
      src="https://kit.fontawesome.com/7a226b5b65.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
  <?php 
    include "view/header.php"; //inclure le header 
    include "includes/database.inc.php";
  ?>

    <div class="deco-header">
      <h2>SCORES</h2>
    </div>

    <aside class="filter-box">

    <div class="dropdown">
      <div class="filter-btn">Filtrer</div>
      <div class="filter-content">
      <form method="post" action ="scores.php">
        <label>Jeu
          <input type="checkbox" name="filter-game" value="Jeu">
        </label>

        <div class="option-dropdown">Score

          <div class="option-dropdown-content">

            <label>Du plus élevé
              <input type="checkbox" name="more" value="more">
            </label>
            <label>Du plus faible
              <input type="checkbox" name="less" value="less">
            </label>

          </div>

        </div>

        <div class="option-dropdown">Difficulté
          <div class="option-dropdown-content">

            <label>Facile
              <input type="checkbox" name="easy" value="easy">
            </label>
            <label>Intermédiaire
              <input type="checkbox" name="medium" value="medium">
            </label>

            <label>Expert
              <input type="checkbox" name="expert" value="expert">
            </label>
            <label>Impossible
              <input type="checkbox" name="impossible" value="impossible">
            </label>
          </div>
        </div>
      </div>
    </div>
      <input class="pseudo-research" name = "pseudo" type="text" placeholder="Pseudo...">
    <button type="submit" name ="submit">Rechercher</button>
    </form>
  </aside>

  <?php

  if(isset($_POST["submit"])){
    if(!empty($_POST["easy"])) {
      $bd -> addFilter("WHERE difficulty = \"easy\"");
      $bd -> selectScore();
    
    }elseif(!empty($_POST["medium"])){
      $bd -> addFilter("WHERE difficulty = medium");
      $bd -> selectScore();

    }elseif(!empty($_POST["expert"])){
      $bd -> addFilter("WHERE difficulty = expert");
      $bd -> selectScore();

    }elseif(!empty($_POST["impossible"])){
      $bd -> addFilter("WHERE difficulty = impossible");
      $bd -> selectScore();
    }

    if(!empty($_POST["more"]) xor !empty($_POST["less"])){
      echo"b";
    }
    if(!empty($_POST["pseudo"])){
      echo "c";
   
    }
    
  }
  
  ?>
    <section class="scores-table">
      <table>
        <thead>
          <th>JEU</th>
          <th>PSEUDO</th>
          <th>DIFFICULTÉ</th>
          <th>SCORE</th>
          <th>DATE / HEURE</th>
        </thead>

        <tbody>

          
          <?php

          
          
          for($a=0; $a<count($bd->getScores()); $a++){
            echo "<tr>";
            for($b=0; $b<count($bd->getScores()[$a]); $b++){
              echo "<td>". $bd->getScores()[$a][$b]."</td>";
            }
            echo "</tr>";
          }
          
          
          ?>

        
        </tbody>
      </table>
    </section>

    <?php include "view/footer.php" //inclure le footer ?> 
  </body>
</html>