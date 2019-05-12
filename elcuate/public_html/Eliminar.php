<!Doctype HTML>
	<html>	<head>
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
        ob_start();
        $username=$_POST['txtusuarioeliminar'];
        $password=$_POST['txtcontraeliminar'];
require_once 'Connection.php';
$_db= new Connection();
     try{
		 $query = "Select User_id ,Correo from Usuarios where Correo=? and Password=?";
		 $arreglo;
		 $arreglo[0]=$username;
		 $arreglo[1]=$password;
		 $resultado=$_db -> executeQuery($query,$arreglo);
		 if(count($resultado)==0){
             echo'<h1>Registro no encontrado<h1>';
			 }
		 else{
              $query = "Delete User_id ,Correo from Usuarios where Correo=? and Password=?";
		 $arreglo;
		 $arreglo[0]=$username;
		 $arreglo[1]=$password;
		 $db -> executeQuery($query,$arreglo);
             echo'<h1>Eliminación exitosa</h1>';
			 }
		 
		 } catch (Exception $ex){
			 print "Hubo un error: " . $ex -> getMessage();
			 }
			 ob_end_flush();
        ?> 
      </div>
    </div>
</body>
	</html>
