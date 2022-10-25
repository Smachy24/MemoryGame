const createMessage = document.querySelectorAll("#message-send")
console.log(createMessage);

function createFetchOptions(bodyData){
  return {
    method: 'POST',
    headers:{
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams(bodyData)
  }
}


createMessage.addEventListener('submit', (event) => {
  event.preventDefault();

  const inputs = event.target.querySelectorAll('input');
  const formData = {};
  for(let input of inputs){
    if(input.name){
    formData[input.name] = input.value
    }
  }
  fetch('../includes/messages.inc.php', createFetchOptions(formData))
  
  .then(result =>  {result.json()   
  })
  .then(data => {
    console.log(data)

  })
})