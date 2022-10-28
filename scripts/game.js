/* API REQUEST ========================================================================================== */

async function fetchPokemon (numbers){
    const pokemonImage = [];
    
    for (let i = 0; i <= numbers-1; i++) {

        let pokemonIndex = Math.floor(Math.random()*600+1);

        let fetchData = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemonIndex}`);
        let pokemonData = await fetchData.json();
        let pokemonDataImage = pokemonData.sprites.front_default;
        if(pokemonImage.some((el) => el == pokemonDataImage)){
            i--;
            continue;
        }else{
            pokemonImage.push(pokemonDataImage);
            pokemonImage.push(pokemonDataImage);
        }
    }
    
    return shuffleArray(pokemonImage);
}

async function fetchItem (numbers){
    const emojiImage = [];
    
    for (let i = 0; i <= numbers-1; i++) {

        let emojiIndex = Math.floor(Math.random()*200+1);

        let fetchData = await fetch(`https://pokeapi.co/api/v2/item/${emojiIndex}`);
        let emojiData = await fetchData.json();
        let emojiDataImage = emojiData.sprites.default;
        console.log(emojiDataImage);
        if(emojiImage.some((el) => el == emojiDataImage)){
            i--;
            continue;
        }else{
            emojiImage.push(emojiDataImage);
            emojiImage.push(emojiDataImage);
        }
    }
    //console.log(emojiImage);
    return shuffleArray(emojiImage);
}

async function fetchrick (numbers){
    const rickImage = [];
    
    for (let i = 0; i <= numbers-1; i++) {

        let rickIndex = Math.floor(Math.random()*600+1);

        let fetchData = await fetch(`https://rickandmortyapi.com/api/character/${rickIndex}`);
        let rickData = await fetchData.json();
        let rickDataImage = rickData.image;
        if(rickImage.some((el) => el == rickDataImage)){
            i--;
            continue;
        }else{
            rickImage.push(rickDataImage);
            rickImage.push(rickDataImage);
        }
    }
    return shuffleArray(rickImage);
}

function shuffleArray (array){
    for(let i = array.length -1; i > 0;i--){
        let randomIndex = Math.floor(Math.random() * (i+1));
        let tmpEl = array[i];

        array[i] = array[randomIndex];
        array[randomIndex] = tmpEl;
    }
    return array
}

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

/* DIFFICULTY AND THEME REQUEST ======================================================================== */

const difficultyBtn = document.querySelector("#difficulty-btn");
const difficultyChoice = document.querySelector("#difficulty-choice");

difficultyBtn.addEventListener("click", (e) =>{
    e.preventDefault();
    difficultyChoice.classList.toggle("inactive");

})

const themesBtn = document.querySelector("#theme-btn");
const themesChoice = document.querySelector("#theme-choice");

themesBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    themesChoice.classList.toggle("inactive");
})

const radioDifficultyChoice = document.querySelectorAll('input[name="difficulty"]');

let userDifficultyChoice;

radioDifficultyChoice.forEach(userChoice => {
    userChoice.addEventListener('change', (e)=>{
        e.preventDefault();
        userDifficultyChoice = e.target.value;
    })
})

const radioThemeChoice = document.querySelectorAll('input[name="theme"]');

let userThemeChoice;

radioThemeChoice.forEach(userChoice => {
    userChoice.addEventListener('change', (e)=>{
        e.preventDefault();
        userThemeChoice = e.target.value;
    })
})

/* Create Grid Game =======================================================================================*/

const playButton = document.querySelector("#playbutton");
const tablefeatures = document.querySelector("#tablefeatures")
const gridGame = document.querySelector("#gamegrid");
const gameBody = document.querySelector("#gamebody");



let isVictory = false; //Victory section
let isTimerStarted = false;
const victoryPopup = document.querySelector("#popup");

let scorePopup = document.querySelector("#score-popup");//Score section ===============================
let timePopup = document.querySelector("#time-popup");
let multiplier;
const scoreGame = document.querySelector("#score")
let scoreMemory = 0;

const replayBtn = document.querySelector("#replay");

replayBtn.addEventListener('click', (e)=>{ //Replay =========================================
    e.preventDefault();

    victoryPopup.classList.toggle("inactive");
    gridGame.classList.toggle("inactive");
    tablefeatures.classList.toggle("inactive");
    resetGrid();
    

})


playButton.addEventListener('click', (e)=>{ // Play ===============================
    e.preventDefault();

    gridGame.classList.toggle("inactive");
    tablefeatures.classList.toggle("inactive");
    generateMemoryGame(userDifficultyChoice);
})

function resetGrid (){
    userDifficultyChoice = undefined;
    userThemeChoice = undefined;
    hoursValue = 0;
    minutesValue = 0;
    secondsValue = 0;
    scoreMemory = 0;
    while(gameBody.firstChild){
        console.log("delete")
        gameBody.firstChild.remove();
    }
    radioDifficultyChoice.forEach((el)=>{
        el.checked = false;
    })

    radioThemeChoice.forEach((el)=>{
        el.checked = false;
    })
    

}


function generateMemoryGame (difficulty){
    let numbersOfImage;
    switch (difficulty) {
        case 'easy':
            generateGrid(2,13);
            numbersOfImage = 13;
            multiplier = 0.8;
            break;
        case 'medium':
            generateGrid(4,16);
            numbersOfImage = 32;
            multiplier = 0.8;
            break;
        case 'expert':
            generateGrid(8,18);
            numbersOfImage = 72;
            multiplier = 1;
            break;
        case 'impossible':
            generateGrid(16,25);
            numbersOfImage = 200;
            multiplier = 1.8;
            break;
        default:
            console.log("erreur")
            break;
    }
    loadImage(numbersOfImage);
    memoryMechanism();
};

function generateGrid (rows,cols){
    let maxRows = rows;
    let childElement = `
        <tr>
            ${generateColumn(cols)}
        </tr>
    `
    for(let rows = 1; rows <= maxRows; rows++){
        
        gameBody.insertAdjacentHTML("beforeend", childElement)
    }
}


function generateColumn (cols){
    let maxCols = cols-1;
    let gameRows = `
    <td>
        <div class="case">
            <img class="imgcase"/>
        </div> 
    </td>
    `
    let tmpRows =`
    <td>
        <div class="case">
            <img class="imgcase"/>
        </div> 
    </td>
    `
    for(let col= 1; col <= maxCols; col++){
        gameRows += tmpRows;
    }

    return gameRows;
}

async function loadImage(numbers){
    const allCase = selectAllCase();
    let imagesArray = []
    switch (userThemeChoice) {
        case 'pokemon':
            imagesArray = await fetchPokemon(numbers);
            break;
        case 'rick':
            imagesArray = await fetchrick(numbers);
            break;
        case 'item':
            imagesArray = await fetchItem(numbers);
        default:
            break;
    }
    allCase.forEach((elCase,index) => {
        elCase.src = imagesArray[index];
    })

}

function selectAllCase (){
    allImgCase = document.querySelectorAll('.imgcase');
    return Array.from(allImgCase);
}

function rotateCases (){
    allCase = document.querySelectorAll('.case')
    allCase.forEach((el)=>{
        el.addEventListener('click', (e)=>{
            e.preventDefault;
            rotateCard(el);
        })
    })
}


/* TIMER INI =================================================================================================*/
let hours = document.querySelector("#hours");
let minutes = document.querySelector("#minutes");
let seconds = document.querySelector("#seconds");

let hoursValue = 0;
let minutesValue = 0;
let secondsValue = 0;

const timer = function (){
    if(isVictory == false){
        let gameTimer = setInterval( ()=>{
            if(secondsValue == 59){
                secondsValue = 0;
                minutesValue+= 1;
            }else if (minutesValue == 59){
                minutesValue = 0;
                hoursValue+=1;
            }
            secondsValue+=1;
            hours.innerText = hoursValue;
            minutes.innerText = minutesValue;
            seconds.innerText = secondsValue;
            scoreMemory -= 10;
            scoreGame.innerText = scoreMemory;
        },1000)
    }else{
    }
        
}

/* MEMORY GAMEPLAY ===========================================================================================*/

function memoryMechanism (){
    let firstCase;
    let secondCase;
    let firstCaseImage;
    let secondCaseImage;
    let allCase = selectAllCase();
    const clickCountText = document.querySelector("#click-count");
    let clickCount = 0;
    let isFilled = (el) => el.style.opacity == "1";
    timer();
    

    allCase.forEach((elCase)=>{
        if(isVictory == false && isTimerStarted == false){
            isTimerStarted =true;
        }
        elCase.addEventListener('click', (e)=>{ //Quand l'utilisateur clique sur une case...
            e.preventDefault();
            if(firstCase == undefined){     //Si il n'a toujours pas cliquer sur une case, la variable firstcase va prendre pour valeur la case que l'utilisateur vient de cliquer.
                firstCase = e.target;
                firstCaseImage = firstCase.src;
                e.target.style.pointerEvents = "none"; //On rend l'élément incliquable pour éviter que l'utilisateur clique plusieurs fois sur l'élément en question
                rotateCard(e.target);
            }else if(secondCase == undefined){  //Sinon la case que l'utilisateur vient de cliquer va être stocké dans la variable secondCase.
                secondCase = e.target;
                secondCaseImage = secondCase.src;
                e.target.style.pointerEvents = "none";
                rotateCard(e.target);
            }else{
                //pass;
            }

            if(firstCase !== undefined && secondCase !==undefined){
                setTimeout( () => {
                    if(firstCaseImage == secondCaseImage){ // Si les deux ont la même image on augmente le score et on reset les variables 
                        scoreMemory += (700*multiplier);
                        scoreGame.innerText = scoreMemory;
                        console.log(scoreMemory);
                        clickCount++;
                        firstCase = undefined;
                        secondCase = undefined;
                    }else{ //Sinon on réduit le score et on rend les éléments de nouveau cliquable7
                        clickCount++;
                        scoreMemory-= 50;
                        scoreGame.innerText = scoreMemory;
                        if(secondCase != undefined){
                            rotateCard(secondCase);
                            secondCase.style.pointerEvents = "auto";
                        }
                        if(firstCase != undefined){
                            rotateCard(firstCase);
                            firstCase.style.pointerEvents = "auto";
                        }
                        
                        firstCase = undefined;
                        secondCase = undefined;  
                    }
                },1000)
            } 
            isVictory = allCase.every( (el) => {
                return (el.style.opacity == "1");
            })
            if(isVictory == true){
                scoreMemory = scoreMemory + (700 * multiplier);
                insertScore(scoreMemory, userDifficultyChoice);
                victoryPopup.classList.toggle("inactive");
                timePopup.innerText = `${hoursValue} : ${minutesValue} : ${secondsValue}`;
                scorePopup.innerText = scoreMemory;
            }
            console.log(isVictory);
            clickCountText.innerText = clickCount;

        })
    })
}

/* ANIMATIONS ====================================================*/
function rotateCard(card){
    if(card.style.opacity == 0){
        card.style.transform = "rotateY(360deg)"
        card.style.opacity = 1
        card.style.transition = "all 0.7s"

    } else if(card.style.opacity == 1){
        card.style.transform = "rotateY(-360deg)"
        card.style.opacity = 0
        card.style.transition = "all 0.7s"
    }
}