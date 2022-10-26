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

      if(row.color =="gray"){
        
      }
      console.log(row.user.pseudo);
      console.log(row.message_date);
      console.log(row.message);
    }
})
}

function insertMessage(){
  
}



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

