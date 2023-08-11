const conteneder2 = document.querySelector("#contenedor2");
let sliderSection = document.querySelectorAll(".slider-section");
let sliderSectionLast = sliderSection[sliderSection.length -1];

const btnLeft = document.querySelector("#btn-left");
const btnRight = document.querySelector("#btn-right");

contenedor2.insertAdjacentElement('afterbegin', sliderSectionLast);

function Next() {
    let sliderSectionFirst = document.querySelectorAll(".slider-section")[0];
    conteneder2.style.marginLeft = "-200%";
    contenedor2.style.transition = "all 0.5s";
    setTimeout(function(){
        conteneder2.style.transition = "none";
        contenedor2.insertAdjacentElement('beforeend', sliderSectionFirst);
        contenedor2.style.marginLeft = "-100%";
    }, 500);
}

function Prev() {
    let sliderSection = document.querySelectorAll(".slider-section");
    let sliderSectionLast = sliderSection[sliderSection.length -1];
    conteneder2.style.marginLeft = "0";
    contenedor2.style.transition = "all 0.5s";
    setTimeout(function(){
        conteneder2.style.transition = "none";
        contenedor2.insertAdjacentElement('afterbegin', sliderSectionLast);
        contenedor2.style.marginLeft = "-100%";
    }, 500);
}

btnRight.addEventListener('click', function(){
    Next();
});

btnLeft.addEventListener('click', function(){
    Prev();
});


setInterval(function(){
    Next();
}, 5000);