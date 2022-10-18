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

    <div class="filter-box">
      

      <label class ="filter-text" for="filter-label">Filtrer par :</label>
      <form action="#" method="post">
        <select name="filter" class="filter-dropdown">
          <option value="jeu">JEU</option>       
          <option value="joueur">JOUEUR</option>
          <option value="difficulte">DIFFICULTÉ</option>
        </select>
        <input name="pseudo" type="text" placeholder="Pseudo" class ="pseudo-research">
      </form>

    </div>

   
    

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