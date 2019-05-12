<?php
function Connect()
{
	if(!($link = mysqli_connect("localhost","id812928_almaguer","abrahamlokillo17")))
	{
		echo "error conectando a la base de datos";
		exit();
		}
	if (!mysqli_select_db($link,"id812928_comercio"))
	{
		echo "Erro seleccionando la base de datos.";
		exit();
		}
		return $link;
	}
?>
