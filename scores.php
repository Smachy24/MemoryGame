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
  <script src="https://kit.fontawesome.com/7a226b5b65.js" crossorigin="anonymous"></script>
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
        <form method="post" action="scores.php">
          <label>Jeu
            <input type="checkbox" name="filter-game" value="Jeu">
          </label>

          <div class="option-dropdown">Score

            <div class="option-dropdown-content">

              <label>Du plus élevé
                <input type="radio" name="order" value="more">
              </label>
              <label>Du plus faible
                <input type="radio" name="order" value="less">
              </label>

            </div>

          </div>

          <div class="option-dropdown">Difficulté
            <div class="option-dropdown-content">

              <label>Facile
                <input type="radio" name="difficulty" value="easy">
              </label>
              <label>Intermédiaire
                <input type="radio" name="difficulty" value="medium">
              </label>

              <label>Expert
                <input type="radio" name="difficulty" value="expert">
              </label>
              <label>Impossible
                <input type="radio" name="difficulty" value="impossible">
              </label>
            </div>
          </div>
      </div>
    </div>
    <input class="pseudo-research" name="pseudo" type="text" placeholder="Pseudo...">
    <button type="submit" name="submit">Rechercher</button>
    </form>
  </aside>

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

        if (isset($_POST["submit"])) {

          $bd->resetScores(); //On reset le contenu du tableau contenant les scores afin de pouvoir afficher les scores filtrés

          if (isset($_POST["difficulty"])) { //Si l'user décide de filtrer par les difficultés, on sélectione les scores correspondants 
            
            switch ($_POST["difficulty"]) {
              
              case 'easy':
                
                $bd->addFilter("WHERE difficulty = \"easy\"");
                $bd->selectScore();
                break;
              case 'medium':
                $bd->addFilter("WHERE difficulty = \"medium\"");
                $bd->selectScore();
                break;
              case 'expert':
                $bd->addFilter("WHERE difficulty = \"expert\"");
                $bd->selectScore();
                break;
              case 'impossible':
                $bd->addFilter("WHERE difficulty = \"impossible\"");
                $bd->selectScore();
                break;

              default:
                $bd->selectScore();
                break;
            }
          }if(isset($_POST["order"])){
            if($_POST["order"] =='more'){
              $bd->addFilter("ORDER BY Game.name,score DESC, difficulty");
              $bd->selectScore();
            }
            elseif($_POST["order"] =='less'){
              $bd->addFilter("ORDER BY Game.name,score ASC, difficulty ");
              $bd->selectScore();
          }
        }
      }
          else {  //Sinon afficher les scores sans filtres
            
            $bd->addFilter(" ORDER BY game_date DESC ");
            $bd->selectScore();
          }
        

        for ($a = 0; $a < count($bd->getScores()); $a++) { //Affichage des scores
          echo "<tr>";
          for ($b = 0; $b < count($bd->getScores()[$a]); $b++) {
            echo "<td>" . $bd->getScores()[$a][$b] . "</td>";
          }
          echo "</tr>";
        }
        ?>


      </tbody>
    </table>
  </section>

  <?php include "view/footer.php" //inclure le footer 
  ?>
</body>

</html>