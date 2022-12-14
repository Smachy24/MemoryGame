<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href=" ./styles/chat.css" />
    <title>Chat</title>
  </head>
  <body>
    <aside class="chat">
      <div class="chat-head">
        <div class="profile">
          <img
            class="my-profile-picture"
            src="assets/profile-picture.jpg"
            alt="profile picture"
          />
          <img
            class="green-circle-icon"
            src="assets/green-circle-icon.jpg"
            alt="green circle icon"
          />
        </div>
        <p class="chat-title">Chat général</p>
      </div>

      <div class="message-send">
        <div class="message-box">
          <p class="surname">Moi</p>
          <p class="message-send-text">Hello</p>
          <p class="message-time">Aujourd'hui à 15h22</p>
        </div>
      </div>

      <div class="message-received">
        <img
          class="profile-picture"
          src="assets/profile-picture.jpg"
          alt="profile picture"
        />
        <div class="message-box">
          <p class="surname">Arthur</p>
          <p class="message-received-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
          </p>
          <p class="message-time">Aujourd'hui à 15h30</p>
        </div>
      </div>

      <div class="send-message">
        <input placeholder="Votre message..." type="text" class="text-input" />
        <p class="send-message-text">Envoyer</p>
      </div>
    </aside>
  </body>
</html>
