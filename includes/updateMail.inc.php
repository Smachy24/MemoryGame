<?php
include "database.inc.php";
include "includes/session.inc.php";

if (
    isset($_POST["submitUpdateEmail"])
    && isset($_POST["email"])
    && ($_POST["email"] == $_SESSION["mail"])
    && isset($_POST["newemail"])
    && ($_POST["password"] == $_POST["confirmpassword"])
) {
    $userData = $bd->selectUser($_SESSION["mail"]);
    if ($userData["password"] == $_POST["password"]) {
        $bd->updateEmail($_POST["newemail"], $userData["id"]);
        $_SESSION["mail"] = $_POST["newemail"];
        var_dump($_SESSION["mail"]);
    }
}