document.addEventListener('DOMContentLoaded', () => {
    let prev = document.querySelector('.rotate-prev');
    let next = document.querySelector('.rotate-next');
    let box = document.querySelector('.box');
    let dataDisplay = document.querySelector('.data-display');
    let carTitle = document.getElementById('car-title');
    let carInfo = document.getElementById('car-info');
    let degrees = 0;

    box.querySelectorAll('span').forEach(span => {
        span.addEventListener('click', function() {
            carTitle.textContent = this.querySelector('img').alt; 
            let infoText = this.getAttribute('data-info'); 

            let infoLines = infoText.split(' | ');

            carInfo.innerHTML = infoLines.join('<br>'); 
        });
    });

    prev.addEventListener('click', function() {
        degrees += 60; 
        box.style.transform = `perspective(1000px) rotateY(${degrees}deg)`;
    });

    next.addEventListener('click', function() {
        degrees -= 60; 
        box.style.transform = `perspective(1000px) rotateY(${degrees}deg)`;
    });
});