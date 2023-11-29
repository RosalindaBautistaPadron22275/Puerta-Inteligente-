<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="iniciostyle.css">

    <link rel="stylesheet" href="plugin\components\Font Awesome\css\font-awesome.min.css">
    <link rel="stylesheet" href="plugin\whatsapp-chat-support.css">

    <title>Elva Security</title>
    
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php">Home</a>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="informacion.php">Informacion</a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="funcionalidad.php">Funcionalidad</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" href="index.php" tabindex="-1" aria-disabled="true">Cerrar sesion</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
    
</head>
<body>


<h1 class="primer-texto">Bienvenido a Elva Security</h1>
<!-- <p class="primer-parrafo">Aqui podras encontrar informacion sobre el producto y como funciona</p> -->
<div class="center-container">
<!-- <a href="">Informacion</a> -->
</div>

<h2 class="segundo-texto">Comprar sistema</h2>
<p class="segundo-parrafo">Aqui podras comprar el sistema de seguridad</p>
<div class="center-container">
<a href="carrito.php">Comprar ahora</a>
</div>


<h2 class="tercer-texto">Comprobar funcionalidad</h2>
<p class="tercer-parrafo">Aqui podras ver la funcionalidad de la cerradura</p>
<div class="center-container">
<a href="funcionalidad.php">Ver funcionalidad</a>
</div>


<!-- <iframe width="560" height="315" text-align="center" src="https://www.youtube.com/embed/9x_ssHGiwbA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->


    <div class="whatsapp_chat_support wcs_fixed_right" id="button-w">
        <div class="wcs_button_label">
            Contáctanos
        </div>
        <div class="wcs_button wcs_button_circle">
            <span class="fa fa-whatsapp"></span>
        </div>
        <div class="wcs_popup">
            <div class="wcs_popup_close">
                <span class="fa fa-close"></span>
            </div>
            <div class="wcs_popup_header">
                <span class="fa fa-whatsapp"></span>
                <strong>Servicio al cliente</strong>
                <div class="wcs_popup_header_description">Que tengas un buen dia ¿En que te puedo ayudar?</div>
            </div>

            <div class="wcs_popup_input" data-number="8126061069" data-availability='{ "monday":"07:00-22:30", "tuesday":"07:00-22:30", "wednesday":"07:30-22:30", "thursday":"07:00-22:30", "friday":"07:00-22:30", "saturday":"09:00-18:30", "sunday":"09:00-22:30" }'>
                <input type="text" placeholder="Escribir pregunta!" />
                <i class="fa fa-play"></i>
            </div>
            <div class="wcs_popup_avatar">
                <img src="imagenes\foto1.jpg" alt="">
            </div>

        </div>
    </div>

    <script src="plugin\components\jQuery\jquery-1.11.3.min.js"></script>

    <script src="plugin\components\moment\moment.min.js"></script>
    <script src="plugin\components\moment\moment-timezone-with-data.min.js"></script>

    <script src="plugin/whatsapp-chat-support.js"></script>
    <script>
        $('#button-w').whatsappChatSupport({
            defaultMsg: '',
        });
    </script>

</body>
</html>



