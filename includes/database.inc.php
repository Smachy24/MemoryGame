<?php

class Bdd{
  private $user;
  private $pass;
  private $host;
  private $name;
  private $connexion;
  private $scores;

  public function __construct($user = "root", $pass = "", $host = "localhost",$name = "memorygame"){
    $this -> user = $user;
    $this -> pass = $pass;
    $this -> host = $host;
    $this -> name = $name;
    $this -> connect();
    $this -> scores = [];

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

  function getScores(){
    return $this -> scores;
  }

  function addScore($array){
    array_push($this -> scores, $array);
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
    
    $req = $this -> connexion-> prepare("SELECT Game.name, Utilisateur.pseudo, difficulty, score, game_date
    FROM Score
    JOIN Utilisateur ON score.player_id = Utilisateur.id
    JOIN Game ON Score.game_id = Game.id 
    ORDER BY Game.name, difficulty, score DESC ");

    $req -> execute();
    $all = $req->fetchAll();
    foreach($all as $row){
      $array = [$row['name'],$row['pseudo'], $row['difficulty'], $row['score'] , $row['game_date']];
      $this -> addScore($array);
    }
    
  }

  

}


$bd = new Bdd();
$bd -> selectScore();
<<<<<<< HEAD
=======





?>

>>>>>>> 44b060ddcbee6a9a482b9083ec7c60482e8f72af
