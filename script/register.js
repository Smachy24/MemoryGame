const input = document.querySelector("#Cmdp");
input.addEventListener("input",test);

const jauge = document.querySelector("#jauge");

const para = document.createElement("p"); //créé une balise p
para.innerText = ""; // initialise le text dans para



function test(){
    if(input.value.length >= 1){ // si on commence à écrire :
      modifJauge("20%","red"); 
      para.style.color = "red"
      para.innerText = "weak" // affecte le message weak à para 
      document.querySelector("#cont").appendChild(para); // ajoute le message weak
      if(input.value.length >= 8 && input.value.match(/([0-9])/) && input.value.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){ //si le mdp fait minimum 8 caractères, contient une maj et un chiffre :
        para.style.color = "yellow"
        modifJauge("50%","yellow");
        modifMessage("medium");
        if(input.value.length >= 8 && input.value.match(/([0-9])/) && input.value.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/) && input.value.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){ //si le mdp fait minimum 8 caractères, contient une maj, un caractère spécial et un chiffre :
          para.style.color = "green"
          modifJauge("75%","green");
          modifMessage("strong");
          if(input.value.length >= 15 && input.value.match(/([0-9])/) && input.value.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/) && input.value.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){ //si le mdp fait minimum 15 caractères, contient une maj, un caractère spécial et un chiffre :
            para.style.color = "purple"
            modifJauge("100%","purple");
            modifMessage("perfect");
          }
        }
      }
    } else { // si on efface tout 
      jauge.style.width = "0%"; 
      jauge.style.backgroundColor = "none";
      document.querySelector("#cont").removeChild(para); // supprime le message restant 
    }
}

//fonction qui modifie la longueur de la jauge et sa couleur 

function modifJauge(width,backgroundColor){
  jauge.style.width = width;
  jauge.style.backgroundColor = backgroundColor;
  jauge.style.transition = "all 0.7s"
}

//fonction qui modifie le message du mdp

function modifMessage(mess){
  document.querySelector("#cont").removeChild(para); // supprime le message d'avant
  para.innerText = mess; // affecte le message à para 
  document.querySelector("#cont").appendChild(para); // ajoute le message suivant
}