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
        console.log(pokemonImage);
    }
    
    return shuffleArray(pokemonImage);
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

/* DIFFICULTY AND THEME REQUEST ======================================================================== */

const scoreGame = document.querySelector("#score")
let scoreMemory = 0;

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

let isVictory = false;

playButton.addEventListener('click', (e)=>{
    e.preventDefault();

    gridGame.classList.toggle("inactive");
    tablefeatures.classList.toggle("inactive");
    generateMemoryGame(userDifficultyChoice);
})

function generateMemoryGame (difficulty){
    let numbersOfImage;
    switch (difficulty) {
        case 'easy':
            generateGrid(5,5);
            numbersOfImage = 10;
            break;
        case 'medium':
            generateGrid(4,16);
            numbersOfImage = 32;
            break;
        case 'expert':
            generateGrid(8,18);
            numbersOfImage = 72;
            break;
        case 'impossible':
            generateGrid(16,25);
            numbersOfImage = 200;
            break;
        default:
            console.log("erreur")
            break;
    }
    loadImage(numbersOfImage);
    startTimer();
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
    const imagesArray = await fetchPokemon(numbers);
    
    allCase.forEach((elCase,index) => {
        elCase.src = imagesArray[index];
    })

}

function selectAllCase (){
    allImgCase = document.querySelectorAll('.imgcase');
    return allImgCase;
}

/* TIMER INI =================================================================================================*/

function startTimer (){
    let hours = document.querySelector("#hours");
    let minutes = document.querySelector("#minutes");
    let seconds = document.querySelector("#seconds");

    let hoursValue = 0;
    let minutesValue = 0;
    let secondsValue = 0;

        setInterval( ()=>{
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
        },1000)
}

/* MEMORY GAMEPLAY ===========================================================================================*/

function memoryMechanism (){
    let firstCase;
    let secondCase;
    let firstCaseImage;
    let secondCaseImage;
    const allCase = selectAllCase();
    
    allCase.forEach((elCase)=>{
        elCase.addEventListener('click', (e)=>{ //Quand l'utilisateur clique sur une case...
            e.preventDefault();

            if(firstCase == undefined){     //Si il n'a toujours pas cliquer sur une case, la variable firstcase va prendre pour valeur la case que l'utilisateur vient de cliquer.
                firstCase = e.target;
                firstCaseImage = firstCase.src;
                e.target.style.pointerEvents = "none"; //On rend l'élément incliquable pour éviter que l'utilisateur clique plusieurs fois sur l'élément en question
                e.target.style.opacity = "1";
                e.target.style.transition = "all 0.3s"
                e.target.style.transform = "rotateY(360deg)"
            }else{  //Sinon la case que l'utilisateur vient de cliquer va être stocké dans la variable secondCase.
                secondCase = e.target;
                secondCaseImage = secondCase.src;
                e.target.style.pointerEvents = "none";
                
                e.target.style.opacity = "1";
            }

            if(secondCase !== undefined){
                secondCase.style.opacity = "1";
            }
            
            setTimeout( () => {
                if(firstCase !== undefined && secondCase !== undefined){ // Si les deux variables ont une valeur on les compare
                    if(firstCaseImage == secondCaseImage){ // Si les deux ont la même image on augmente le score et on reset les variables 
                        scoreMemory+=1;
                        firstCase = undefined;
                        secondCase = undefined;
                    }else{ //Sinon on réduit le score et on rend les éléments de nouveau cliquable7
                        
                        scoreMemory-=1;
                        secondCase.style.opacity = "0";
                        secondCase.style.pointerEvents = "auto";
                        firstCase.style.opacity = "0";
                        firstCase.style.pointerEvents = "auto"; 
                        firstCase = undefined;
                        secondCase = undefined; 
                        
                        
                        
                    }}
            },200)
            

            scoreGame.innerText = scoreMemory;
            isVictory = allCase.every((elCase) => elCase.style.opacity == 1); 

        })
    })
}

