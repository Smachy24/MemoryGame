<?php
try
{
	$db = new PDO('mysql:host=localhost;dbname=testmemory;charset=utf8', 'root');
  echo "a";
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

