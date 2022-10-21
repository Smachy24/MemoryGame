<?php

class Bdd{
  private $user;
  private $pass;
  private $host;
  private $name;
  private $connexion;
  private $scores;
  private $filter;

  public function __construct($user = "root", $pass = "", $host = "localhost",$name = "memorygame"){
    $this -> user = $user;
    $this -> pass = $pass;
    $this -> host = $host;
    $this -> name = $name;
    $this -> connect();
    $this -> scores = [];
    $this -> filter = "";
    

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

  function getFilter(){
    return $this -> filter;
  }

  function addFilter($filter){
    /*if($this -> getFilter() != ""){
      $this -> filter. " AND ";
    }*/
    $this -> filter.= $filter;
  }

  function resetScores(){
    $this->scores = [];
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
    $sql = "SELECT Game.name, Utilisateur.pseudo, difficulty, score, game_date
    FROM Score
    JOIN Utilisateur ON score.player_id = Utilisateur.id
    JOIN Game ON Score.game_id = Game.id ";

    $this -> resetScores();
    echo $this -> getFilter();

    if(strpos($this -> getFilter(),"WHERE")!==false){ //Filter only where
      $sql .= $this -> getFilter();
      $sql .= "ORDER BY Game.name, difficulty, score DESC";
    }
    else{
      
      $sql .= $this -> getFilter(); //Other cases (only order, both and nothing)
    }



    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    

      foreach($all as $row){
        $array = [$row['name'],$row['pseudo'], $row['difficulty'], $row['score'] , $row['game_date']];
        $this -> addScore($array);
      
      }
      
  }
 

  function getConnectedPlayers(){
    $sql = "SELECT COUNT(id) FROM Utilisateur" ;
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }

  function getGamesPlayed(){
    $sql = "SELECT COUNT(id) FROM Score";
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }

  function getBestScore(){
    $sql = "SELECT score FROM Score ORDER BY score DESC LIMIT 1";
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }

  function getMessages(){
    $sql = "SELECT COUNT(id) FROM Message" ;
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }

}


$bd = new Bdd();
$bd -> selectScore();
