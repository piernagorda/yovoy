<!DOCTYPE html>
<html>
    <body>
    <div>   
        <h1>ESTO ES UNA PRUEBA</h1>

        <?php
            if(!isset($_SESSION["login"])){
                echo "<ul>";
                echo "<li><a href='register.php'>REGISTRARSE</a></li>";
                echo "<li><a href='login.php'>LOGIN</a></li>";
                echo "</ul>";
            }
            else{
                if($_SESSION["login"]){
                    echo "<p>Bienvenido, " . $_SESSION["username"]. "!</p>";
                    echo "<a href='logout.php'>Cerrar sesión</a>";

                    if(isset($_SESSION["newUser"])){
                        if($_SESSION["newUser"]){
                            echo "<h1>AHORA ERES UN USUARIO REGISTRADO!</h1>";
                        }
                    }   
                }
            }
        ?>
        
    </div>
    </body>
</html>