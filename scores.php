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

        <label>Jeu
          <input type="checkbox" name="filter-game" value="Jeu">
        </label>

        <div>Score</div>

        <div class="option-dropdown">Difficulté
          <div class="option-dropdown-content">

            <label>Facile
              <input type="checkbox" name="filter-dif-1" value="easy">
            </label>
            <label>Intermédiaire
              <input type="checkbox" name="filter-dif-2" value="medium">
            </label>
            <label>Difficile
              <input type="checkbox" name="filter-dif-3" value="hard">
            </label>
            <label>Expert
              <input type="checkbox" name="filter-dif-4" value="expert">
            </label>
            <label>Impossible
              <input type="checkbox" name="filter-dif-5" value="impossible">
            </label>
          </div>

        </div>




      </div>


      <!--<ul class="dropdown-content">

        <li class="dropdown-category">Joueur

        <li class="dropdown-category">Jeu
          <ul class="dropdown-content">
            <li class="dropdown-category">Power of memory</li>
          </ul>
        </li>

        </li>

        <li class="dropdown-category">Difficulté
          <ul class="dropdown-content">
            <li class="dropdown-category">Facile</li>
            <li class="dropdown-category">Intermédiaire</li>
            <li class="dropdown-category">Expert</li>
            <li class="dropdown-category">Impossible</li>
          </ul>
        </li>

      </ul>-->
    </div>
    <input class="pseudo-research" type="text" value="Pseudo...">
  </aside>

  <?php

  if (isset($_POST["submit"])) {
    if (!empty($_POST["easy"])) {
      $bd->addFilter("WHERE difficulty = \"easy\"");
      $bd->selectScore();
    } elseif (!empty($_POST["medium"])) {

      $bd->addFilter("WHERE difficulty = \"medium\"");
      $bd->selectScore();
    } elseif (!empty($_POST["expert"])) {

      $bd->addFilter("WHERE difficulty = \"expert\"");
      $bd->selectScore();
    } elseif (!empty($_POST["impossible"])) {

      $bd->addFilter("WHERE difficulty = \"impossible\"");
      $bd->selectScore();
    }

    if (!empty($_POST["more"]) xor !empty($_POST["less"])) {
      echo "b";
    }
    if (!empty($_POST["pseudo"])) {
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



        for ($a = 0; $a < count($bd->getScores()); $a++) {
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