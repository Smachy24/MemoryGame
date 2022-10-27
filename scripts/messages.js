addMessage = document.getElementById("chat-form");

function createFetchOptions(bodyData){
  return {
    method: 'POST',
    headers:{
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams(bodyData)
  }
}

function getMessages(){
  fetch('./includes/getMessage.php')
  .then(result =>  { return result.json()   
})
  .then(data => {
    
    for(let row of data){
      if(row.color =="orange"){
        let childElement = `<div class="message-send">
      <div class="message-box">
          <p class="surname">${row.user.pseudo}</p>
          <p class="message-send-text">${row.message}</p>
          <p class="message-time">${row.message_date.substring(11,16)}</p>
      </div>
  </div>`
      let chat = document.getElementById("chat")
      chat.insertAdjacentHTML("beforeend", childElement);
      }
      else{
        let childElement = `<div class="message-received">
        <img class="profile-picture" src="./assets/profile-picture.jpg" alt="profile picture">
        <div class="message-box">
            <p class="surname">${row.user.pseudo}</p>
            <p class="message-received-text">${row.message}</p>
            <p class="message-time">${row.message_date.substring(11,16)}</p>
        </div>
        </div>`
      let chat = document.getElementById("chat");
      chat.insertAdjacentHTML("beforeend", childElement);
      }

    }
})
}

addMessage.addEventListener('submit', (event) =>{
  event.preventDefault();
  const input = event.target.querySelector("#usermsg");
  const formData = {};
  
  if(input.value && input.value.length >=3){
    formData[input.name] = input.value
    console.log(formData);

    fetch('./includes/insertMessage.php', createFetchOptions(formData))

    .then(input.value="")

    
      
}else{
  input.value=""
}

document.querySelectorAll(".message-received").forEach(el => el.remove()); //On remove les messages précédents pour afficher les nouveaux
document.querySelectorAll(".message-send").forEach(el => el.remove());

getMessages();
})

function showMessages(){
  document.querySelectorAll(".message-received").forEach(el => el.remove()); //On remove les messages précédents pour afficher les nouveaux
  document.querySelectorAll(".message-send").forEach(el => el.remove());
  getMessages();


}

const interval = window.setInterval(showMessages, 10000)
getMessages();



/*createMessage.addEventListener('submit', (event) => {
  event.preventDefault();

  const inputs = event.target.querySelectorAll('input');
  const formData = {};
  for(let input of inputs){
    if(input.name){
    formData[input.name] = input.value
    }
  }
  fetch('../includes/messages.inc.php', createFetchOptions(formData))
  
  .then(result =>  { return result.json()   
  })
  .then(data => {
    console.log(data)*/


