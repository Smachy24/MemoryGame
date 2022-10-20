
<?php

class Bdd
{
  private $user;
  private $pass;
  private $host;
  private $name;
  private $connexion;
  private $scores;
  private $messages;

  public function __construct($user = "root", $pass = "", $host = "localhost", $name = "memorygame")
  {
    $this->user = $user;
    $this->pass = $pass;
    $this->host = $host;
    $this->name = $name;
    $this->connect();
    $this->scores = [];
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


  function selectScore($filter = null)
  {
    $sql = "SELECT Game.name, Utilisateur.pseudo, difficulty, score, game_date
    FROM Score
    JOIN Utilisateur ON score.player_id = Utilisateur.id
    JOIN Game ON Score.game_id = Game.id 
    ORDER BY Game.name, difficulty, score DESC ";

    if ($filter == "jeu") {
      $sql .= "WHERE Game.name = '' ";
    } elseif ($filter == "joueur") {
    } elseif ($filter == "difficulte") {
    }


    $req = $this->connexion->prepare($sql);

    if ($filter == "jeu") {
      $sql .= "WHERE Game.name = '' ";
    } elseif ($filter == "joueur") {
    } elseif ($filter == "difficulte") {
    }


    $req = $this->connexion->prepare($sql);

    $req->execute();
    $all = $req->fetchAll();
    foreach ($all as $row) {
      $array = [$row['name'], $row['pseudo'], $row['difficulty'], $row['score'], $row['game_date']];
      $this->addScore($array);
    }
  }

  function selectMessage()
  {

    $req = $this->connexion->prepare("SELECT *
    FROM message
    WHERE DATEDIFF(CURRENT_TIMESTAMP(), message_date)<1");
    $req->execute();
    $lastMessages = $req->fetchAll();
    foreach ($lastMessages as $messages) {
      $array = [$messages['id'], $messages['id_game'], $messages['id_sender'], $messages['message'], $messages['message_date']];
      $this->addScore($array);
    }
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

  function updateEmail($newMail, $userId)
  {
    $req = $this->connexion->prepare("
    UPDATE utilisateur
    SET email = ?
    WHERE id = ?
    ");
    $req->execute([$newMail, $userId]);
  }
}


$bd = new Bdd();
$bd->selectScore();
