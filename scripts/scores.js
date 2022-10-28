function createFetchOptions(bodyData){
  return {
    method: 'POST',
    headers:{
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams(bodyData)
  }
}

function insertScore(score, difficulty){
  const formData = {};
  formData["score"] = score;
  formData["difficulty"] = difficulty;

  console.log(formData);
  
  fetch('./includes/insertScore.php', createFetchOptions(formData))
}

