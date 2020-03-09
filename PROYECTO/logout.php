<?php
	session_start();
	$_SESSION["login"] = false;
    session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logout</title>
</head>

<body>
    <header>
        <?php include 'includes/comun/cabecera.php';?>
    </header>

    <div>
        <p>Has cerrado sesión</p>
        <a href="index.php">INICIO</a>
    </div> <!-- Fin del contenedor -->

</body>
</html>