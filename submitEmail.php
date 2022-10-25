<?php

/*
Vu le problème de l'hébergement du serveur le délai et qu'on a pour réaliser le projet on ne pourra pas envoyer de vrais emails

Cependant, voici le code permettant d'envoyer un email depuis notre site */

$mailFrom = $_POST["usermail"];
$mailTo = "powerofmemory@coding.fr";
$subject = $_POST["usertopic"];
$message = $_POST["usermessage"];

$headers = [
    'FROM' => $_POST["usermail"],
    'Reply-To' => $_POST["usermail"],
    'To' => $mail
];

mail($mailTo,$subject,$message,$headers);
