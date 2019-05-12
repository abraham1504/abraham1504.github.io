<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body id="top"><div class="site-wrapper">
  <div class="site-wrapper-inner">
    <div class="cover-container">
        <form name="continua" action="Login.html" style="display:none"></form>
        <form name="vuelve" action="Registrar.html" style="display:none"></form>
    <?php
include("Connect.php");
$link = Connect();
//Preparamos la consulta, almacenandola en una variable 
$cadena = "INSERT INTO Usuarios (Correo, Password , Nombre , Telefono, Direccion, Tarjeta, CVV) " . "VALUES ('" . $_POST['txtcorreo'] . "', '" . $_POST['txtpassword'] ."','" . $_POST['txtnombre'] . "','" . $_POST['txttelefono'] ."', '" . $_POST['txtdireccion'] ."', '" . $_POST['txttarjeta'] ."', '" . $_POST['txtcvv'] ."')";
$result = mysqli_query($link, $cadena);
if ($result)
{
echo '<h1>Registro exitoso</h1>';
echo '';
echo '<button class="btn-default" onclick="continua.submit()">Continuar</button>';
}
else
{
echo '<h1>Compruebe que sus datos sean correctos</h1>';
echo '';
echo '<button class="btn-default" onclick="vuelve.submit()">Volver</button>';
}
mysqli_close($link); // Cerramos la conexion con la base de datos 
?>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="scripts/main.js"></script>
  </body>
</html>