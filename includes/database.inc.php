<?php

class Bdd{
  private $user;
  private $pass;
  private $host;
  private $name;
  private $connexion;

  public function __construct($user = "root", $pass = "", $host = "localhost",$name = "memorygame"){
    $this -> user = $user;
    $this -> pass = $pass;
    $this -> host = $host;
    $this -> name = $name;
    $this -> connect();
  }

  function getUser(){
    return $this -> user;
  }
  function getPass(){
    return $this -> pass;
  }
  function getHost(){
    return $this -> host;
  }

  function getName(){
    return $this -> name;
  }

  function connect(){
    try {
     if($this -> connexion===null){
      $this -> connexion = new PDO('mysql:host='.$this -> getHost().';dbname='.$this -> getName(). '' ,$this -> getUser(),  $this -> getPass());

    
      }
    }catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
   
    }
  }


  function selectScore(){
    
    $req = $this -> connexion-> prepare("SELECT Game.name, difficulty, score, Utilisateur.pseudo
    FROM Score
    JOIN Utilisateur ON score.player_id = Utilisateur.id
    JOIN Game ON Score.game_id = Game.id 
    ORDER BY Game.name, difficulty, score DESC ");

    $req -> execute();
    $all = $req->fetchAll();
    foreach($all as $row){

      echo $row["name"];
      echo $row["difficulty"];
      echo $row["score"];
      echo $row["pseudo"];
      echo "<br>";
      
    }
  }

}


$bd = new Bdd();
$bd -> selectScore();
