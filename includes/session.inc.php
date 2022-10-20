<?php

session_start();

$_SESSION["mail"] = isset($_SESSION["mail"]) ? $_SESSION["mail"] : NULL;
$_SESSION["id"] = isset($_SESSION["id"]) ? $_SESSION["id"] : NULL;
$_SESSION["username"] = isset($_SESSION["username"]) ? $_SESSION["username"] : NULL;
$_SESSION["connected"] = isset($_SESSION["connected"]) ? $_SESSION["connected"] : false;

if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: index.php");
};
