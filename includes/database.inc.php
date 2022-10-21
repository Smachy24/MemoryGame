<?php

class Bdd{
  private $user;
  private $pass;
  private $host;
  private $name;
  private $connexion;
  private $scores;
  private $messages;
  private $filter;
  

  public function __construct($user = "root", $pass = "", $host = "localhost", $name = "memorygame")
  {
    $this->user = $user;
    $this->pass = $pass;
    $this->host = $host;
    $this->name = $name;
    $this->connect();
    $this->scores = [];
    $this->messages = [];
    $this->filter = "";
    
  }
  function getPass()
  {
    return $this->pass;
  }
  function getHost()
  {
    return $this->host;
  }

  function getUser()
  {
    return $this->user;
  }

  function getName()
  {
    return $this->name;
  }

  function getScores()
  {
    return $this->scores;
  }

  function getConnect(){
    return $this -> connexion;
  }

  function getFilter(){
    return $this -> filter;
  }

  function addFilter($filter){

    $this -> filter.= $filter;
  }

  function resetScores(){
    $this->scores = [];
  }

  function getMessages()
  {
    return $this->messages;
  }

  function addScore($array)
  {
    array_push($this->scores, $array);
  }

  function connect()

  {
    try {
      if ($this->connexion === null) {
        $this->connexion = new PDO('mysql:host=' . $this->getHost() . ';dbname=' . $this->getName() . '', $this->getUser(),  $this->getPass());
      }
    } catch (PDOException $e) {
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


    if(strpos($this -> getFilter(),"WHERE")!==false){ //Filter only where
      $sql .= $this -> getFilter();
      $sql .= "ORDER BY Game.name, difficulty, score DESC";
    }
    else{
      
      $sql .= $this -> getFilter(); //Other cases (only order, both and nothing)
    }
    echo $sql;


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

  function getMessageCount(){
    $sql = "SELECT COUNT(id) FROM Message" ;
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }











  function selectUser($userIdentifier)
  {
    $req = $this->connexion->prepare("
    SELECT *
    FROM utilisateur
    WHERE email = ?
    ");
    $req->execute([$userIdentifier]);
    $userData = $req->fetchAll();
    $userDataArray = [];
    foreach ($userData as $data) {
      $userDataArray = [
        'email' => $data["email"],
        'id' => $data["id"],
        'pseudo' => $data["pseudo"],
        'password' => $data["password"]
      ];
    }
    return $userDataArray;
  }

  function selectUserById($userIdentifier)
  {
    $req = $this->connexion->prepare("
    SELECT *
    FROM utilisateur
    WHERE id = ?
    ");
    $req->execute([$userIdentifier]);
    $userData = $req->fetchAll();
    $userDataArray = [];
    foreach ($userData as $data) {
      $userDataArray = [
        'email' => $data["email"],
        'id' => $data["id"],
        'pseudo' => $data["pseudo"],
        'password' => $data["password"]
      ];
    }
    return $userDataArray;
  }


  function updateEmail($newMail, $userId)
  {
    $req = $this->connexion->prepare("
    UPDATE utilisateur
    SET email = ?
    WHERE id = ?
    ");
    $req->execute([$newMail, $userId]);
  }

  function updatePassword($newPassword, $userId)
  {
    $req = $this->connexion->prepare("
    UPDATE utilisateur
    SET password = ?
    WHERE id = ?
    ");
    $req->execute([$newPassword, $userId]);
  }

  function getAllMessages()
  {
    $req = $this->connexion->prepare("
    SELECT *
    FROM message
    ");
    $req->execute();
    $allMessages = $req->fetchAll();
    foreach ($allMessages as $messages) {
      $messagesArray = [
        "id" => $messages["id"],
        "id_game" => $messages["id_game"],
        "id_sender" => $messages["id_sender"],
        "message" => $messages["message"],
        "message_date" => $messages["message_date"]
      ];
      array_push($this->messages, $messagesArray);
    }
  }

  function sendMessage()
  {
    $req = $this->connexion->prepare('
    INSERT INTO Message(id_game, id_sender, message)
    VALUES(1, 21, "Salut")
    ');
    $req->execute();
  }
}


$bd = new Bdd();
$bd->selectScore();
