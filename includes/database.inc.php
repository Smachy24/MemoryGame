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

      /*$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass); */
      }
    }catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
   
    }
  }

}






?>

