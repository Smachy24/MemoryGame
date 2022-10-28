<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inscription</title>
  <link rel="stylesheet" href="styles/register.css" />
  <link rel="stylesheet" href="styles/header.css" />
  <link rel="stylesheet" href="styles/footer.css" />
  <script src="https://kit.fontawesome.com/7a226b5b65.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include "includes/database.inc.php";
  include "view/header.php"; //inclure le header
  
  
  

  ?>
  

  <main>
    <div class="deco-header">
      <h2>INSCRIPTION</h2>
    </div>


    <?php
    
    $bool = true; // Y a t il une erreur ?
    if(isset($_POST["submit"])){  // On regarde si le bouton submit est presse
      
      


      $uppercase = preg_match('@[A-Z]@', $_POST["password"]); //variable : majuscule
      $number= preg_match('@[0-9]@', $_POST["password"]); //variable : chiffre
      $special_character = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"]); // variable : caractere special
      
      $mail_error ="";
      $pseudo_error ="";
      $password_error = "";
      $same_password ="";

      ?>

      <p class="mess-erreur"><?php
      if(!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){//On vérifie si le mail n'est pas valide
        $mail_error = "<p class='mess-erreur'>Erreur : Veuillez renseigner une adresse email valide !</p>";
        $bool=false;
      }?>
      </p>
      
      <p class="mess-erreur"><?php
      if(strlen( $_POST["pseudo"]) < 4){ //On vérfie si le pseudo < 4 caractères 
        $pseudo_error = "<p class='mess-erreur'>Erreur : Votre pseudo doit faire minimum 4 caractères</p>";
        $bool=false;
      }?>
      </p>

      <p class="mess-erreur"><?php
      if (!$uppercase || !$number || !$special_character){ // verifie si le mdp ne correspond pas a ces prerequis
        $password_error = "<p class='mess-erreur'>Erreur : Votre mot de passe doit faire minimum 8 caractères, contenir au moins 1 majuscule, 1 caractère spécial et 1 chiffre !</p>";
        $bool=false;
      }?>
      </p>

      <p class="mess-erreur"><?php
      if($_POST["password"] != $_POST["confirmPassword"]){//On compare les deux mdp
        $same_password = "<p class='mess-erreur'>Erreur : Votre mot de passe doit être identique !</p>";
        $bool=false;
      }?>
      </p>


    <?php } ?>


<div class="container">
      <form action="register.php" method="post">
        <div class="infos">
          <input name="mail" type="email" placeholder="     Email" id="Cmail" />
          <br />

          <?php
          
          
            if(isset($_POST["submit"])){ // On affiche l'erreur ("" si pas d'erreur)
              echo $mail_error;
              
            }
          ?>

          <input name="pseudo" type="text" placeholder="     Pseudo" id="Cpseud" />
          <br />

          <?php
            if(isset($_POST["submit"])){ // On affiche l'erreur ("" si pas d'erreur)
              echo $pseudo_error;
              
            }
          ?>

          <input name="password" type="password" placeholder="     Mot de passe" id="Cmdp" />
          
          <div class="container2">
            <div id="jauge"></div>
          </div>
          <div id="cont"></div>

          <?php
            if(isset($_POST["submit"])){ // On affiche l'erreur ("" si pas d'erreur)
              echo $password_error;
              
            }
          ?>

          <input name="confirmPassword" type="password" placeholder="     Confirmer le mot de passe" id="Confirmmdp" />
          <?php
            if(isset($_POST["submit"])){ // On affiche l'erreur ("" si pas d'erreur)
              echo $same_password; 
              
            }?>
            
            <p class="mess-validation"><?php
            if(isset($_POST["submit"]) && $bool){  //On fait la requete que s'il n'y a pas d'erreurs
 
              echo "<p class='mess-validation'>Votre compte à bien été créé</p>";
            ?></p>
            
            <?php
              $date = "CURRENT_TIMESTAMP()";
     

             
              
              $sql="INSERT INTO Utilisateur (email, password, pseudo, inscription_date) VALUES ('".$_POST["mail"] . "','".$_POST["password"] . "','" .$_POST["pseudo"] . "'," .$date . ")";
              

              $req = $bd->getConnect()->prepare($sql);
              $req->execute();
              $all = $req->fetchAll();
              
              }
           


          ?>
        
        </div>
        <div class="buttonregister">
          <button type="submit" name ="submit" href="" id="but">Inscription</button>
        </div>
      </form>
    </div>



  </main>

  <?php include "view/footer.php" //inclure le footer 
  ?>
  <script src= "scripts/register.js"></script>
</body>

</html>