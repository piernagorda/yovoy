<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
     <link href="estilos.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
    <title>Preguntas Precuentes</title>
</head>
<body>
    <div>
        <div> 
        <h3> PREGUNTAS FRECUENTES </h3>
            <script>
            function ret(){
               window.history.go(-2);
            }
            </script>

        </div>
        
        <div class = "tarjeta_naranja">
            <h2> Puedo crear una cuenta gratuita?</h2>
            <p> Todos los usuarios disponen de una cuenta gratuita de base, que puede ser mejorada con la membresia premium.</p>
        </div>
        
        <div class = "tarjeta_naranja">
            <h2> Puedo cancelar mi membresia premium?</h2>
            <p> En cualquier momento, puedes decidir cancelar tu suscripcion y volverás a ser un usuario standar.</p>
        </div>
        
       <button onclick="ret()"> Volver</button>
    </div>
</body>
</html>