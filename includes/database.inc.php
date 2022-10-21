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
  /**
   * Return the PDO'password
   * @param : none
   * @return : String pass -> PDO's password
   */
  {
    return $this->pass;
  }
  function getHost()
  /**
   * Return the PDO'host
   * @param : none
   * @return : String host -> PDO's host
   */
  {
    return $this->host;
  }

  function getUser()
  {
  /**
   * Return the PDO'user
   * @param : none
   * @return : String user -> PDO's user
   */
    return $this->user;
  }

  function getName()
  /**
   * Return the PDO'name
   * @param : none
   * @return : String name -> PDO's name
   */
  {
    return $this->name;
  }

  function getScores()
  /**
   * Return all scores
   * @param : none
   * @return : Array scores -> All users'scores
   */
  {
    return $this->scores;
  }

  function getConnect()
  /**
   * Return the PDO'connexion
   * @param : none
   * @return : Object(PDO) connexion -> PDO's connexion
   */
  {
    return $this -> connexion;
  }

  function getFilter()
  /**
   * Return all filters
   * @param : none
   * @return : String scores -> All users scores's filters
   */
  {
    return $this -> filter;
  }

  function addFilter($filter)
  /**
   * Add filters to $this -> filter 
   * @param : String $filter -> filters to add to select request
   * @return : none
   */
  {

    $this -> filter.= $filter;
  }

  function resetScores()
  /**
   * Reset displayed scores
   * @param : none
   * @return : none
   */
  {
    $this->scores = [];
  }

  function getMessages()
  /**
   * Return all messages
   * @param : none
   * @return : Array messages -> All data base's messages
   */
  {
    return $this->messages;
  }

  function addScore($array)
  /**
   * Add scores to $this -> scores 
   * @param : Array $array -> array to add to data base's scores
   * @return : none
   */
  {
    array_push($this->scores, $array);
  }

  function connect()
  /**
   * Do the connexion between data base and php
   * @param : none
   * @return: none
   */

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
    /**
     * Select all scores and display them in scores.php
     * @param:none
     * @return:none
     */
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
    
    $req = $this -> connexion-> prepare($sql);
    
    $req -> execute();
    $all = $req->fetchAll();
    

      foreach($all as $row){
        $array = [$row['name'],$row['pseudo'], $row['difficulty'], $row['score'] , $row['game_date']];
        $this -> addScore($array);
      
      }
      
  }

  function getConnectedPlayers(){
    /**
     * Return sql request that select all users in db
     * @param: none
     * @return : String $r -> number of users
     */
    $sql = "SELECT COUNT(id) FROM Utilisateur" ;
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }
  

  function getGamesPlayed(){
    /**
     * Return sql request that select all games played
     * @param: none
     * @return : String $r -> number of games played
     */
    $sql = "SELECT COUNT(id) FROM Score";
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }

  function getBestScore(){
    /**
     * Return sql request that select the best score in data base
     * @param: none
     * @return : String $r -> best score
     */
    $sql = "SELECT score FROM Score ORDER BY score DESC LIMIT 1";
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }

  function getMessageCount(){
    /**
     * Return sql request that select all messages in db
     * @param: none
     * @return : String $r -> number of messages in db
     */
    $sql = "SELECT COUNT(id) FROM Message" ;
    $req = $this -> connexion-> prepare($sql);
    $req -> execute();
    $all = $req->fetchAll();
    
    $r = $all[0][0];
    return $r;
  }


  function selectUser($userIdentifier)
  /**
   * Select a specific user through email
   * @param: String $userIdentifier -> user'email
   * @return: Array $userDataArray -> array with user'informations (email, id, pseudo and password)
   */
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
  /**
   * Select a specific user through id
   * @param: int $userIdentifier -> user'id
   * @return: Array $userDataArray -> array with user'informations (email, id, pseudo and password)
   */
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
  /**
   * SQL update email of a user
   * @param: String $newMail -> new value of email
   * @param: int $userId -> user'id
   * @return : none
   */
  {
    $req = $this->connexion->prepare("
    UPDATE utilisateur
    SET email = ?
    WHERE id = ?
    ");
    $req->execute([$newMail, $userId]);
  }

  function updatePassword($newPassword, $userId)
  /**
   * SQL update password of a user
   * @param: String $newPassword -> new value of password
   * @param: int $userId -> user'id
   * @return : none
   */
  {
    $req = $this->connexion->prepare("
    UPDATE utilisateur
    SET password = ?
    WHERE id = ?
    ");
    $req->execute([$newPassword, $userId]);
  }

  function getAllMessages()
  /**
   * SQL select all messages
   * @param: none
   * @return: none
   */
  {
    $req = $this->connexion->prepare("
    SELECT *
    FROM message
    ORDER BY message_date ASC
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

  function sendMessage($id_game,$id_sender, $message)
  /**
   * SQL insert into Message's table a new message
   * @param: int $id_game -> game'id
   * @param: int $id_sender -> user'id
   * @param: String $message -> message
   * @return: none
   */
  {
    $req = $this->connexion->prepare("
    INSERT INTO Message(id_game, id_sender, message)
    VALUES(".$id_game.",". $id_sender.",'".$message."')");
    $req->execute();
  }
}


$bd = new Bdd();
$bd->selectScore();
