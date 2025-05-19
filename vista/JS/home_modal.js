const images = document.querySelectorAll('.img');
const modal = document.getElementById('modal');
const modalTitle = document.getElementById('modal-title');
const modalDescription = document.getElementById('modal-description');
const modalImageContainer = document.getElementById('modal-image-container');
const modalAdditionalImages = document.getElementById('modal-additional-images');
const closeModal = document.querySelector('.close');

function closeModalFunction() {
    modal.style.display = 'none';  
}

images.forEach(image => {
    image.addEventListener('click', openModal);
});

closeModal.addEventListener('click', closeModalFunction);

window.addEventListener('click', function(event) {
    if (event.target === modal) {
        closeModalFunction();
    }
});

function openModal(event) {
    const image = event.target.closest('.img');
    const title = image.getAttribute('data-title');  
    const description = image.getAttribute('data-description');  
    const imgSrc = image.querySelector('img').getAttribute('src'); 
    
    modalTitle.textContent = title;
    modalDescription.textContent = description;
    
    modalImageContainer.innerHTML = '';

    modalAdditionalImages.innerHTML = '';

    if (title === "San Cristóbal de las Casas") {
        modalDescription.innerHTML = `
            <br>San Cristóbal de las Casas es una ciudad colonial ubicada en los Altos de Chiapas, 
            en el sureste de México. Es conocida por su arquitectura de influencia colonial española, 
            sus calles empedradas, y su vibrante cultura indígena.
            <br>
            San Cristóbal de las Casas fue fundada en 1528 por el conquistador español Diego de
            Mazariegos, en un valle rodeado por montañas y bosques. Su nombre original fue Villa Real
            de Chiapas y, a lo largo de los siglos, se ha convertido en un importante centro cultural y
            comercial. La ciudad es conocida por su papel en la historia moderna de México, especialmente
            por ser uno de los epicentros del levantamiento zapatista en 1994.
            <br><br>
            San Cristóbal es un lugar donde coexisten diversas culturas indígenas, principalmente los
            grupos tzotzil y tzeltal, con la herencia española. Esto se refleja en las tradiciones,
            el idioma, la vestimenta, y las costumbres de la población local. Además, es famosa por su
            artesanía, especialmente la cerámica, textiles, y bordados.
            <br><br>
            La ciudad atrae a turistas de todo el mundo, especialmente aquellos interesados en la
            historia, la cultura indígena, la arquitectura colonial, y la belleza natural de la región.<br>
        `;

        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoS1.png" alt="Catedral de San Cristóbal">
                <div class="nombre-imagen">Catedral de San Cristóbal</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoS2.png" alt="Mercado de Santo Domingo">
                <div class="nombre-imagen">Mercado de Santo Domingo</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoS3.png" alt="Museo del Ámbar">
                <div class="nombre-imagen">Museo del Ámbar</div>
            </div>
        `;
    }

    if (title === "Ocosingo") {
        modalDescription.innerHTML = `
            <br>Ocosingo, ubicado en Chiapas, tiene una rica historia que se remonta a tiempos
            prehispánicos, siendo habitado por pueblos mayas, especialmente los Lacandones, que han
            mantenido sus tradiciones hasta la actualidad. Durante la colonización española, la región
            se convirtió en un importante punto comercial. En el siglo XX, Ocosingo fue escenario de
            luchas sociales, destacando su protagonismo durante el levantamiento zapatista de 1994,
            que denunció la pobreza y marginación de los pueblos indígenas. Hoy en día, la cultura
            de Ocosingo sigue profundamente influenciada por la herencia maya, con sus comunidades
            indígenas manteniendo vivas sus lenguas, costumbres y festividades tradicionales. La región
            es un símbolo de resistencia y preservación cultural en el sureste de México.<br><br>
            La gastronomía local refleja esta herencia, con platillos como el mole chiapaneco, tamalitos
            de elote, cochito horneado y pozol, una bebida tradicional. Un dato curioso es que Ocosingo
            es la puerta de entrada a la Selva Lacandona, hogar de especies únicas y una de las zonas
            más biodiversas de México. Además, la zona arqueológica de Toniná y las cercanas Cascadas
            de Agua Azul son algunos de sus atractivos turísticos más destacados.<br>
        `;
        
        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoO1.png" alt="Toniná">
                <div class="nombre-imagen">Toniná</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoO2.png" alt="Cascadas de Agua Azul">
                <div class="nombre-imagen">Cascadas de Agua Azul</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoO3.png" alt="Lagunas de Montebello">
                <div class="nombre-imagen">Lagunas de Montebello</div>
            </div>
        `;
    }

    if (title === "Palenque") {
        modalDescription.innerHTML = `
            <br>Palenque es una ciudad y sitio arqueológico ubicado en el estado de Chiapas, México,
            famosa por su impresionante herencia maya. Durante el período Clásico (250-900 d.C.),
            Palenque fue una de las ciudades más importantes de la civilización maya, destacándose por
            su arquitectura monumental y sus avances en la escritura y astronomía. El Templo de las
            Inscripciones, donde fue encontrado el sarcófago del rey Pakal, es uno de los principales
            puntos de interés del sitio.<br>
            La ciudad fue abandonada alrededor del siglo X y permaneció escondida en la selva hasta su
            redescubrimiento en el siglo XVIII.<br><br>
            La gastronomía local ofrece delicias como cochito horneado, tamales de venado y bebidas
            tradicionales como el pozol.
        `;
        
        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoP1.png" alt="Museo de Sitio de Palenque">
                <div class="nombre-imagen">Museo de Sitio de Palenque</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoP2.png" alt="Cascada de Misol-Ha">
                <div class="nombre-imagen">Cascada de Misol-Ha</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoP3.png" alt="Agua Clara">
                <div class="nombre-imagen">Agua Clara</div>
            </div>
        `;
    }

    if (title === "Tumbalá") {
        modalDescription.innerHTML = `
            <br>Tumbalá es un municipio ubicado en la región de la Selva Lacandona, en el estado de
            Chiapas, México.<br>
            Históricamente, Tumbalá fue habitado por diversas comunidades indígenas, especialmente los
            Tzeltales, que aún mantienen vivas sus tradiciones, lengua y costumbres. Durante
            la época colonial, la región tuvo influencia de los españoles, aunque las
            comunidades indígenas resistieron y conservaron muchas de sus prácticas ancestrales.<br><br>
            En términos turísticos, Tumbalá es conocida por su belleza natural, siendo un lugar ideal
            para quienes buscan ecoturismo y exploración en la Selva Lacandona. Algunos de sus principales
            atractivos incluyen las Cascadas de Tumbalá, un conjunto de impresionantes caídas de agua 
            rodeadas de vegetación tropical, que son perfectas para quienes disfrutan del senderismo y
            la observación de flora y fauna. La región también es rica en biodiversidad, con especies
            únicas de flora y fauna propias de la selva.<br><br>
            Además, las fiestas patronales y ceremonias tradicionales son una parte importante de la vida
            cultural del lugar, donde se celebran danzas, música y rituales indígenas.<br>
        `;
        
        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoT1.png" alt="Río Tulijá">
                <div class="nombre-imagen">Río Tulijá</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoO2.png" alt="Cascadas de Agua Azul">
                <div class="nombre-imagen">Cascadas de Agua Azul</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoP2.png" alt="Cascada de Misol-Ha">
                <div class="nombre-imagen">Cascada de Misol-Ha</div>
            </div>
        `;
    }

    if (title === "Tonalá") {
        modalDescription.innerHTML = `
            <br>Tonalá es un municipio costero en Chiapas, México, conocido por su rica tradición
            artesanal, especialmente en cerámica y madera tallada. Fundado durante la época colonial,
            Tonalá ha sido un importante centro comercial y de producción artesanal. Es también conocida
            como la "capital de la cerámica" de Chiapas, su cerámica es famosa por sus colores vibrantes
            y figuras detalladas, que reflejan la influencia de las culturas indígenas locales, como los
            Zoques y Tzeltales.<br><br>
            La gastronomía de Tonalá incluye platillos típicos como pescado y mariscos frescos, tamales
            de camarón, tzic de venado y la tradicional bebida de pozol. Además, la región es famosa por
            sus playas en la costa del Pacífico, como Playa Ventura y Playa Boca del Cielo, que atraen
            a turistas en busca de descanso y actividades acuáticas.<br>
        `;
        
        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoU1.png" alt="Playa Boca de Cielo">
                <div class="nombre-imagen">Playa Boca de Cielo</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoU2.png" alt="Cerro de la Reina">
                <div class="nombre-imagen">Cerro de la Reina</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoU3.png" alt="Museo Nacional de la Cerámica">
                <div class="nombre-imagen">Museo Nacional de la Cerámica</div>
            </div>
        `;
    }

    if (title === "Tapachula") {
        modalDescription.innerHTML = `
            <br>Tapachula es la ciudad más grande del sur de Chiapas, ubicada cerca de la frontera con
            Guatemala. Fundada en 1498, su historia combina influencias mayas, coloniales y modernas.
            Tradicionalmente un centro comercial, Tapachula es conocida por su producción agrícola,
            especialmente café, plátano y cacao. Además, su proximidad a Centroamérica la ha convertido
            en un punto clave de comercio e intercambio cultural.<br><br>
            Una de las celebraciones más importantes en Tapachula es la Feria del Café, que se realiza
            cada año y celebra la gran producción cafetera de la región. Durante la feria, se realizan
            eventos culturales, conciertos y exposiciones sobre el café y su proceso de producción.<br>
        `;
        
        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoV1.png" alt="Reserva de la Biosfera El Triunfo">
                <div class="nombre-imagen">Reserva de la Biosfera El Triunfo</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoV2.png" alt="Volcán Tacaná">
                <div class="nombre-imagen">Volcán Tacaná</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoV3.png" alt="Museo de Tapachula">
                <div class="nombre-imagen">Museo de Tapachula</div>
            </div>
        `;
    }

    if (title === "Chiapa de Corzo") {
        modalDescription.innerHTML = `
            <br>Chiapa de Corzo es un pintoresco pueblo en Chiapas, México, con una rica historia que
            se remonta a la época prehispánica, cuando fue habitado por los Zoques. Fundado en 1528,
            fue un importante centro comercial durante la colonia. La ciudad conserva una fuerte
            influencia de las culturas indígenas y coloniales, visible en su arquitectura y tradiciones.
            <br><br>
            Uno de los principales atractivos culturales es la Fiesta Grande de Enero, en honor a San
            Sebastián, que ha sido declarada Patrimonio Cultural Inmaterial de la Humanidad por la UNESCO.
            Durante esta festividad, se celebra la tradicional Danza del Parachico, en la que los
            danzantes, con máscaras de madera, representan una mezcla de creencias religiosas e indígenas.
            <br><br>
            La gastronomía local incluye platos como el tzic de venado, tamales de elote y el cochito
            horneado, así como la bebida tradicional de pozol. Además, Chiapa de Corzo es famosa por
            su laca, una técnica artesanal ancestral que se puede conocer en el Museo de la Laca.<br><br>
            Entre sus principales atractivos turísticos, destaca la Fuente Colonial, construida en 1562,
            y la cercanía al Cañón del Sumidero, un impresionante parque natural. La ciudad, con su rica
            mezcla de historia, cultura y belleza natural, es un destino esencial en el estado de Chiapas.
            <br>
        `;
        
        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoC1.png" alt="Arco del Caracol">
                <div class="nombre-imagen">Arco del Caracol</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoC2.png" alt="Parque de la Pila">
                <div class="nombre-imagen">Parque de la Pila</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoC3.png" alt="Museo de la Laca">
                <div class="nombre-imagen">Museo de la Laca</div>
            </div>
        `;
    }

    if (title === "La Trinitaria") {
        modalDescription.innerHTML = `
            <br>La Trinitaria es un pequeño municipio en el estado de Chiapas, México, ubicado cerca
            de la frontera con Guatemala. Fundado en 1974, La Trinitaria es una zona principalmente
            agrícola, conocida por la producción de café, cacao y plátano, lo que ha sido clave para
            su desarrollo económico. Su cercanía con Guatemala ha influido en la cultura local,
            enriquecida por tradiciones tanto chiapanecas como centroamericanas.<br><br>
            La comunidad celebra la Fiesta en honor a La Santísima Trinidad, que tiene lugar en junio,
            con procesiones, danzas folklóricas y eventos religiosos. En cuanto a la gastronomía,
            destacan los tamalitos de elote, ceviches y la bebida tradicional de pozol.<br>
        `;
        
        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoR1.png" alt="Cascadas de El Chiflón">
                <div class="nombre-imagen">Cascadas de El Chiflón</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoR2.png" alt="Pueblo de La Trinitaria">
                <div class="nombre-imagen">Pueblo de La Trinitaria</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoR3.png" alt="Iglesia de La Santísima Trinidad">
                <div class="nombre-imagen">Iglesia de La Santísima Trinidad</div>
            </div>
        `;
    }

    if (title === "Tuxtla Gutiérrez") {
        modalDescription.innerHTML = `
            <br>Tuxtla Gutiérrez, la capital de Chiapas, es una ciudad ubicada en el valle de Tuxtla,
            en el sureste de México. Fundada en 1528, fue un importante centro comercial durante la
            colonia y, a lo largo del siglo XX, se transformó en un motor económico y cultural de la
            región.<br>
            La ciudad es conocida por su rica cultura, que combina influencias indígenas y coloniales.
            Entre sus festividades destaca la Feria de Chiapas, en honor a San Marcos, y su gastronomía
            incluye platos como cochito horneado, tamales de elote y pozol. Tuxtla también es famosa por
            su marimba, instrumento musical tradicional de la región.<br><br>
            Entre los principales atractivos turísticos de la ciudad se encuentran el Cañón del Sumidero,
            una impresionante formación natural ideal para el ecoturismo, el Parque de la Marimba,
            donde se pueden disfrutar de conciertos al aire libre, y el Zoológico de Miguel Álvarez del
            Toro, hogar de fauna local.<br><br>
            Su mezcla de historia, naturaleza y modernidad la convierte en una ciudad central en el
            sureste de México.<br>
        `;
        
        modalAdditionalImages.innerHTML = `
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoG1.png" alt="Cañón del Sumidero">
                <div class="nombre-imagen">Cañón del Sumidero</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoG2.png" alt="Parque de la Marimba">
                <div class="nombre-imagen">Parque de la Marimba</div>
            </div>
            <div class="imagen-container">
                <img src="vista/img/home/modal/FotoG3.png" alt="Zoológico Miguel Álvarez del Toro">
                <div class="nombre-imagen">Zoológico Miguel Álvarez del Toro</div>
            </div>
        `;
    }

    modal.style.display = 'block';  
}

function closeModalFunction() {
    modal.style.display = 'none';  
}

images.forEach(image => {
    image.addEventListener('click', openModal);
});

closeModal.addEventListener('click', closeModalFunction);

window.addEventListener('click', function(event) {
    if (event.target === modal) {
        closeModalFunction();
    }
});