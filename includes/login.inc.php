<?php

require "database.inc.php";
include "session.inc.php";

$sucessMessage = "Vous êtes connecté !";
$errors = "Information incorrect";




if (isset($_POST["mail"]) && isset($_POST["submit"]) && $_SESSION["connected"] == false) {
    $userData = $bd->selectUser($_POST["mail"]);
    if ($userData["password"] == $_POST["password"]) {
        $_SESSION["username"] = $userData["pseudo"];
        $_SESSION["id"] = $userData["id"];
        $_SESSION["mail"] = $userData["email"];
        $_SESSION["connected"] = true;
    } else {
        $_SESSION["connected"] = false;
    }
}
