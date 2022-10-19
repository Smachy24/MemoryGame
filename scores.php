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
      <div class = "dropdown">
        <button class="filter-dropdown-button" type="button">Filter</button>
        <ul class = "filter-category">Jeu
          <li class = "filter-element" >Power of memory</li>
        </ul>

        <ul class = "filter-category">Joueur
          <li class = "filter-element">Power of memory</li>
          <li class = "filter-element">Power of memory</li>
          <li class = "filter-element">Power of memory</li>
        </ul>

        <ul class = "filter-category">Difficulté
          <li class = "filter-element">Facile</li>
          <li class = "filter-element">Intermédiaire</li>
          <li class = "filter-element">Expert</li>
          <li class = "filter-element">Impossible</li>
        </ul>
        
      </div>

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