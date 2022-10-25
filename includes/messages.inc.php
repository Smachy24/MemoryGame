<?php
//( ! ) Error: Cannot access private property Bdd::$connexion in C:\wamp64\www\MemoryGame\includes\messages.inc.php on line 14
include "database.inc.php";

if (isset($_POST["submit"]) && !empty($_POST["userMessage"])) {

    $id_game = 1;
    $id_sender = $_SESSION["id"];
    $message =  $_POST["userMessage"];

    $sql = "INSERT INTO Message(id_game, id_sender, message)
    VALUES(".$id_game.",". $id_sender.",'".$message."')";

    $req = $bd -> getConnect() -> prepare($sql);
    $req -> execute();

    echo json_encode(['success' => 'ok']);

    /*$bd->sendMessage(
        1,
        $_SESSION["id"],
        $_POST["userMessage"]
    );*/

    /**
     * $req = $this->connexion->prepare("
    *INSERT INTO Message(id_game, id_sender, message)
    *VALUES(".$id_game.",". $id_sender.",'".$message."')");
    *$req->execute();
     */

   
}

$bd->getAllMessages();

$allDbMessage = $bd->getMessages();

foreach ($allDbMessage as $messages) {
    if ($messages["id_sender"] == $_SESSION["id"]) { ?>
        <div class="message-send">
            <div class="message-box">
                <p class="surname"><?= $_SESSION["username"] ?></p>
                <p class="message-send-text" id="message-send" ><?= $messages["message"] ?></p>
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

<script src ="scripts/messages.js"></script>