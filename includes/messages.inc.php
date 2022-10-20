<?php

include "database.inc.php";

if (isset($_POST["submit"])) {
    $bd->sendMessage(
        3,
        1,
        $_SESSION["id"],
        $_POST["userMessage"],
        "2022-10-17 16:01:07"
    );
    unset($_POST["submit"]);
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
    <?php } else { ?>

        <div class="message-received">
            <img class="profile-picture" src="assets/profile-picture.jpg" alt="profile picture">
            <div class="message-box">
                <p class="surname">Arthur</p>
                <p class="message-received-text"><?= $messages["message"] ?></p>
                <p class="message-time"><?= $messages["message_date"] ?></p>
            </div>
        </div>
<?php }
}

?>