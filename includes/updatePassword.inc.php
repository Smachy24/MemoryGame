<?php
var_dump($_SESSION["mail"]);

if (
    isset($_POST["submitUpdatePassword"])
    && isset($_POST["oldpassword"])
    && ($_POST["newpassword"] == $_POST["confirmnewpassword"])
) {
    $userData = $bd->selectUser($_SESSION["mail"]);
    if ($userData["password"] == $_POST["oldpassword"]) {
        $bd->updatePassword($_POST["newpassword"], $userData["id"]);
    }
}