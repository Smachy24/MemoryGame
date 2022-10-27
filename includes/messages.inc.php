<?php

/*
if (isset($_POST["submit"]) && !empty($_POST["userMessage"])) {

    $id_game = 1;
    $id_sender = $_SESSION["id"];
    $message =  $_POST["userMessage"];

    $bd -> sendMessage($id_game, $id_sender, $message);


   
}

$bd->getAllMessages();

$allDbMessage = $bd->getMessages();

foreach ($allDbMessage as $messages) {
    if ($messages["id_sender"] == $_SESSION["id"]) { ?>
        <div class="message-send">
            <div class="message-box">
                <p class="surname"><?= $_SESSION["username"] ?></p>
                <p class="message-send-text"><?= $messages["message"] ?></p>
                <p class="message-time"><?= $messages["message_date"] ?></p>
            </div>
        </div>
    <?php } else {
        $sender = $bd->selectUserById($messages["id_sender"]);
    ?>

        <div class="message-received">
            <img class="profile-picture" src="assets/profile-picture.jpg" alt="profile picture">
            <div class="message-box">
                <p class="surname"><?= $sender["pseudo"] ?></p>
                <p class="message-received-text"><?= $messages["message"] ?></p>
                <p class="message-time"><?= $messages["message_date"] ?></p>
            </div>
        </div>
<?php }
}

?>

<script src ="scripts/messages.js"></script>*/