<?php

include "database.inc.php";

if (isset($_POST["submit"])) {
    $bd->sendMessage(
        1,
        $_SESSION["id"],
        $_POST["userMessage"]
    );
    var_dump($_SESSION["id"]);
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

