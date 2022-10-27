const clickImg = document.querySelectorAll(".case")

clickImg.forEach((elCase)=> {
    elCase.addEventListener("click",funct)
})


function funct(){
    clickImg.style.transition = "all 0.3s"
    clickImg.style.transform = "rotateY(90deg)"
}