<?php
ob_start();
    session_start();
    if(empty($_SESSION['txtcorreo']))
            $_SESSION['txtcorreo'] = $_POST['txtcorreo'];
    if(empty($_SESSION['txtcorreo'])) { 
        session_destroy();
        header('Location: error.php');
        }
if(isset($_POST['txtcorreo'])){
	 $username=$_POST['txtcorreo'];
	}
if(isset($_POST['txtpassword'])){
	 $password=$_POST['txtpassword'];
	}
require_once 'Connection.php';
$_db= new Connection();
     try{
		 $query = "select User_id ,Correo from Usuarios where Correo=? and Password=?";
		 $arreglo;
		 $arreglo[0]=$username;
		 $arreglo[1]=$password;
		 $resultado=$_db -> executeQuery($query,$arreglo);
		 if(count($resultado)==0){
		     session_destroy();
			 header ("Location: error.php?error=true");
			 }
		 else{
			 echo "LOGIN EXITOSO!";
			 header("Location:LoginTrue/Catalogo.html");
			 }
		 
		 } catch (Exception $ex){
			 print "Hubo un error: " . $ex -> getMessage();
			 }
			 ob_end_flush();?>
