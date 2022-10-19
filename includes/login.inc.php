<?php

require "database.inc.php";
require "session.inc.php";

$errors;
$sucessMessage;

if (isset($_POST["mail"]) && isset($_POST["submit"]) && $_SESSION["connected"] == false) {
    $userData = $bd->selectUser($_POST["mail"]);

    if ($userData["password"] == $_POST["password"]) {


        $_SESSION["username"] = $userData["pseudo"];
        $_SESSION["id"] = $userData["id"];
        $_SESSION["mail"] = $userData["email"];
        $_SESSION["connected"] = true;
        $sucessMessage = "Vous êtes connecté !";
    } else {
        $errors = "Information incorrect";
    }
}
