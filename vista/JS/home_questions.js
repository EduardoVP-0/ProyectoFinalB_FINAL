const botones = document.querySelectorAll('.question_title');


botones.forEach((boton) => {
    boton.addEventListener('click', function() {
        const contenido = this.closest('.question').querySelector('.answer');

        // Alternar la visibilidad del contenido
        if (contenido.style.display === 'none' || contenido.style.display === '') {
            contenido.style.display = 'block'; 
            this.classList.remove('icono-abajo'); 
            this.classList.add('icono-arriba');
        } else {
            contenido.style.display = 'none';
            this.classList.remove('icono-arriba'); 
            this.classList.add('icono-abajo'); 
        }
    });
});


(function() {
    const titleQuestions = [...document.querySelectorAll('.question_title')];

    console.log(titleQuestions);

    titleQuestions.forEach(question => {
        question.addEventListener('click', () => {
            let height = 0;

            let answer = question.nextElementSibling;

            let addPadding = question.parentElement.parentElement;

            question.children[0].classList.toggle('question_arrow--rotate');

            if (answer.clientHeight === 0) {
                height = answer.scrollHeight;
            }

            answer.style.height = `${height}px`;
        });
    });
})();
