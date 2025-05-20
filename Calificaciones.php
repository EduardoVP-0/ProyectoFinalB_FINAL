<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Comentarios</title>
  <link rel="icon" href="./vista/img/icono.ico">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 30px;
      background: #f8f8f8;
    }
    .opiniones {
      max-width: 1000px;
      margin: auto;
      background: white;
      padding: 20px 80px 10px 80px;
      border-radius: 10px;
    }
    .resumen {
      text-align: center;
      margin-bottom: 20px;
    }
    .barra {
      display: flex;
      align-items: center;
      margin: 5px 0;
    }
    .barra span {
      width: 30px;
    }
    .barra-progreso {
      height: 15px;
      border-radius: 4px;
      background: #ddd;
      margin-left: 10px;
      flex: 1;
      overflow: hidden;
      position: relative;
    }

    .progreso-interno {
      height: 100%;
      border-radius: 4px;
    }

    .estrella {
      color: gold;
    }
    .comentario {
      display: flex;
      gap: 15px;
      border-top: 1px solid #FFF;
      padding: 15px 0;
    }
    .comentario:last-child {
      border-bottom: 1px solid #FFF;
    }
    .foto-perfil {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background-color: #ccc;
      background-size: cover;
      background-position: center;
      flex-shrink: 0;
    }
    .contenido {
      flex: 1;
    }
    .nombre-correo {
      display: flex;
      gap: 10px;
      align-items: center;
      flex-wrap: wrap;
    }
    .nombre {
      font-weight: bold;
    }
    .correo {
      font-size: 0.9em;
      color: #555;
    }
    .estrellas {
      margin: 5px 0;
    }

    .nuevo-comentario {
  display: flex;
  align-items: center;
  gap: 5px;
  margin-bottom: 40px;
  border-bottom: 1px solid #ccc;
  padding-bottom: 0px;
}

.campo-comentario {
  flex: 1;
  border: none;
  border-bottom: 2px solid #4B5881;
  padding: 0px 5px;
  font-size: 1em;
  background: transparent;
  outline: none;
  font-family: 'Poppins', sans-serif;
}

.boton-enviar {
  padding: 8px 16px;
  background-color: #4B5881;
  color: white;
  border: none;
  border-radius: 5px;
  font-size: 1em;
  cursor: pointer;
}
.boton-enviar:hover {
  background-color:rgb(55, 64, 95);
}

  </style>
</head>
<body>
  <div class="opiniones">
    <div class="resumen">
      <h2>Comentarios y Calificaciones</h2>
      <p style="font-size: 2em;">3.6 ★</p>
      <p>8 opiniones en total</p>
      <div class="barra">
        <span>5★</span>
        <div class="barra-progreso">
          <div class="progreso-interno" style="width: 40%; background: #a0d468;"></div>
        </div>
      </div>
      <div class="barra">
        <span>4★</span>
        <div class="barra-progreso">
          <div class="progreso-interno" style="width: 25%; background: #ffce54;"></div>
        </div>
      </div>
      <div class="barra">
        <span>3★</span>
        <div class="barra-progreso">
          <div class="progreso-interno" style="width: 12.5%; background: #f6bb42;"></div>
        </div>
      </div>
      <div class="barra">
        <span>2★</span>
        <div class="barra-progreso">
          <div class="progreso-interno" style="width: 12.5%; background: #f89406;"></div>
        </div>
      </div>
      <div class="barra">
        <span>1★</span>
        <div class="barra-progreso">
          <div class="progreso-interno" style="width: 12.5%; background: #ed5565;"></div>
        </div>
      </div>
    </div><br>

    <div class="nuevo-comentario">
      <textarea class="campo-comentario" placeholder="Escribe tu comentario..."></textarea>
      <button class="boton-enviar">Enviar</button>
    </div>

    <!-- Comentarios -->
    <div class="comentario">
      <div class="foto-perfil" style="background-image: url('./vista/img/usuarioA.png');"></div>
      <div class="contenido">
        <div class="nombre-correo">
          <div class="nombre">Mariana Vargas</div>
          <div class="correo">mariana.v@gmail.com</div>
        </div>
        <div class="estrellas">⭐⭐⭐⭐⭐</div>
        <p>La interfaz es intuitiva, el proceso fue muy rápido y no tuve que andar comparando en diferentes sitios. Definitivamente volveré a usarla para mi próximo viaje, ojalá incluyan pronto más destinos dentro de Chiapas.</p>
      </div>
    </div>
    
    <div class="comentario">
      <div class="foto-perfil" style="background-image: url('./vista/img/usuarioB.png');"></div>
      <div class="contenido">
        <div class="nombre-correo">
          <div class="nombre">Natalia Ruíz</div>
          <div class="correo">natalia.ruiz@gmail.com</div>
        </div>
        <div class="estrellas">⭐⭐⭐⭐</div>
        <p>Me gustó la app, aunque siento que podría tener una sección con sugerencias de itinerarios para los que viajamos por primera vez a Chiapas. Aparte de eso, me ayudó mucho a planear mi escapada de fin de semana. El diseño es limpio y agradable a la vista.</p>
      </div>
    </div>

    <div class="comentario">
      <div class="foto-perfil" style="background-image: url('./vista/img/usuarioC.png');"></div>
      <div class="contenido">
        <div class="nombre-correo">
          <div class="nombre">Camila Reyes</div>
          <div class="correo">camila.reyes@gmail.com</div>
        </div>
        <div class="estrellas">⭐⭐⭐⭐⭐</div>
        <p>Una app muy bien pensada. Lo que más me gustó fue la opción de comparar varias excursiones ofrecidas por diferentes agencias locales. Eso me dio más confianza al elegir y además encontré precios más accesibles que en otras plataformas. Además, la atención al cliente respondió súper rápido cuando tuve una duda. ¡100% recomendable!</p>
      </div>
    </div>

    <div class="comentario">
      <div class="foto-perfil" style="background-image: url('./vista/img/usuarioD.png');"></div>
      <div class="contenido">
        <div class="nombre-correo">
          <div class="nombre">Angel Jiménez</div>
          <div class="correo">angel.jmz@gmail.com</div>
        </div>
        <div class="estrellas">⭐⭐⭐⭐⭐</div>
        <p>Reservé un paquete completo para visitar San Cristóbal de las Casas con transporte, guía y hospedaje. ¡Todo salió excelente! La app es clara, rápida y confiable. Además, me permitió contactar directamente a la agencia que elegí, lo cual me dio mucha tranquilidad. Muy buena experiencia.</p>
      </div>
    </div>

    <div class="comentario">
      <div class="foto-perfil" style="background-image: url('./vista/img/usuarioE.png');"></div>
      <div class="contenido">
        <div class="nombre-correo">
          <div class="nombre">Ricardo Vázquez</div>
          <div class="correo">ricky32452@gmail.com</div>
        </div>
        <div class="estrellas">⭐⭐</div>
        <p>La aplicación tiene potencial, pero encontré que algunas secciones cargan bastante lento, sobre todo al buscar paquetes con operadores menos conocidos. También me costó trabajo ver los detalles de los

      </div>
    </div>

    <div class="comentario">
      <div class="foto-perfil" style="background-image: url('./vista/img/usuarioF.png');"></div>
      <div class="contenido">
        <div class="nombre-correo">
          <div class="nombre">Laura Esponisa</div>
          <div class="correo">lauriiii@gmail.com</div>
        </div>
        <div class="estrellas">⭐⭐⭐</div>
        <p>La app es útil, aunque al principio me costó entender cómo filtrar por operadores específicos. Una vez que lo logré, todo fluyó mejor. Me gustaría que agregaran más fotos y reseñas de usuarios dentro de cada servicio para tener una idea más clara de qué esperar antes de reservar.</p>
      </div>
    </div>

    <div class="comentario">
      <div class="foto-perfil" style="background-image: url('./vista/img/usuarioG.png');"></div>
      <div class="contenido">
        <div class="nombre-correo">
          <div class="nombre">Jorge Gutiérrez</div>
          <div class="correo">jorgito.gtz1@gmail.com</div>
        </div>
        <div class="estrellas">⭐⭐⭐⭐</div>
        <p>Una experiencia de diez. Planeé un viaje con amigos y todos usamos la app para reservar el mismo paquete. Incluso pudimos ver opiniones de otros usuarios y todo fue tal como lo ofrecían. Me encantó la opción de contactar directamente a la operadora para resolver dudas. ¡Repetiremos el próximo verano sin duda!</p>
      </div>
    </div>

    <div class="comentario">
      <div class="foto-perfil" style="background-image: url('./vista/img/usuarioH.png');"></div>
      <div class="contenido">
        <div class="nombre-correo">
          <div class="nombre">Sofía Velázquez</div>
          <div class="correo">panquesitosabroso@gmail.com</div>
        </div>
        <div class="estrellas">⭐</div>
        <p>La peor aplicación que he descargado en mucho tiempo. Nada funciona como debería: se cierra sola, los precios cambian de un momento a otro y los paquetes parecen estar desactualizados. Perdí más de una hora intentando reservar sin éxito. Sinceramente, es una pérdida de tiempo total.</p>
      </div>
    </div>
  </div>
</body>
</html>