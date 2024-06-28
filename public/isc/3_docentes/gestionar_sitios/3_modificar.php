<!--Este archivo solo contiene un formulario con la informacion de un registro seleccionado desde 
    el archivo "1_tabla.php", permite modificar esa informacino.-->

<?php
	
	/************************************* 
	| Verificar si alguien inicio sesion |
	*************************************/
	session_start();//Se inicia una sesion


	/************************************************************* 
	| Agregar el archivo que permite hacer la conexion con la BD |
	*************************************************************/
	include("../conexion.php");


	/************************************************************************************************ 
	| Recuperar y almacena el id, del registro seleccionado, enviado desde el archivo "1_tabla.php" |
	************************************************************************************************/
	$id = $_GET['id']; // Recupera el 'id' 


	/****************************************************************************************************** 
	| Formular la "consulta" para obtener el registro de la tabla "sitiosweb" donde el id sea igual a $id |
	******************************************************************************************************/
	$consulta = "select sitiosweb.nombre, link, descripcion, usuarios.usuario from sitiosweb inner join usuarios on sitiosweb.idusuario = usuarios.id";


	/************************************************************* 
	| Ejecutar la "consulta" y almacenar el "registro" que devuelve|
	*************************************************************/
	$resultado_de_la_consulta = mysqli_query($conexion, $consulta);
		/*
			mysqli_query()             -->  Ejecuta la consulta sql y devuelve un "resultado"
	        $resultado_de_la_consulta  -->  Almacena el "resultado"	
	    */


	/********************************************** 
	| Obtener el "registro" en forma de una arreglo |
	**********************************************/
	$registro = mysqli_fetch_array($resultado_de_la_consulta);


	/********************************************** 
	| Copiar los campos del registro en variables |
	**********************************************/
	$nombreSitio = $registro[0];
	$link = $registro[1];
	$descripcion = $registro[2];
	$usuario = $registro[3];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ISC oficial</title>
		<link rel="stylesheet" type="text/css" href="../0_diseno/css/estilos.css">
	</head>

	<body>
		<header>
			<img src="../0_diseno/img/logo1.png" height="55" style="margin-right: 150px; float: left;">
			<img src="../0_diseno/img/logo2.png" height="55">
		</header>

		<nav>
			
		</nav>

		<section>

			<h2>Sitios web</h2>

			<form enctype="multipart/form-data" action = "3_modificar_update.php" method="post">
				<table>

					<?php 
					/**************************************************************** 
					| Pegar los variables, obtenidas del registro, en el formulario |
					****************************************************************/

					echo '
					<tr>
						<td>Nombre:</td>
						<td><input type = text name = "txtNombre" size = 40 required value="'.$nombreSitio.'"></td>
					</tr>
					<tr>
						<td>Link:</td>
						<td><input type = text name = "txtLink" size = 40 required value="'.$link.'"></td>
					</tr>
					<tr>
						<td>Descripción:</td>
						<td><input type = text name = "txtDesc" size = 40 required value="'.$descripcion.'"></td>
					</tr>
					<tr>
						<td>Creado por..</td>
						<td><input type = text name = "txtCreado" value="'.$usuario.'"></td>
					</tr>
					<input type=hidden name=id value = "'.$id.'">'?>
					<tr>
						<td>Cambiar imagen:</td>
						<td><input type = file name = "txtImg" accept=".jpg, .jpeg, .png"></td>
					</tr>
				</table> <br>

				<input type = submit value = "Guardar">
				<!--Este boton abre el archivo "3_modificar_update.php", y envia los datos del formulario hacia ese mismo archivo-->
				
				<input type = reset value = "Limpiar campos">
			</form>	<br><br>


			<!--FORMULARIO PARA VISUALIZAR LA IMAGEN-->
			<form action = "eliminarImg.php" method="post">
				<table>
					<tr>
						<th> Imagen </th>	
					</tr>
				
					<?php
						/**************************************************************************** 
						| Formular la "consulta" para obtener la imagenes relacionadas al sitio web |
						****************************************************************************/
						$consulta = "select id, nombre from imagenes where tipo = 'sitio' and ids = '$id'";


						/**************************************************************** 
						| Ejecutar la "consulta" y almacenar el "registro" que devuelve |
						****************************************************************/
						$resultado_de_la_consulta = mysqli_query($conexion, $consulta);
							/*
								mysqli_query()             -->  Ejecuta la consulta sql y devuelve un "resultado"
	   						    $resultado_de_la_consulta  -->  Almacena el "resultado"	
	   						 */


						/*************************************** 
						| Mostrar los registros de la consulta |
						***************************************/
						while ($registro = mysqli_fetch_array($resultado_de_la_consulta)) { 
								/*
									mysqli_fetch_array()  -->  "Obtiene" un registro del objeto
									$registro             -->  "Almacena" el registro en forma de un vector o arreglo

									y mientras existan registros...
								*/

							// COPIAR LOS "CAMPOS" DE CADA REGISTRO.
							$idI = $registro["id"];
							$nombre = $registro["nombre"];
						

							// PEGAR LOS "CAMPOS" EN UNA FILA DE LA TABLA.
							echo"
							<tr> 
								<td><img width='600' id='imagen' src='../../imagenes/". $nombre. "'></td> 
							</tr>
							<input type=hidden name=idI value = $idI>
							<input type=hidden name=idS value = $id>";
						}?>
				</table>

				<input type=submit value="Eliminar imagen"> <br><br>
					<!-- Este boton abre el "archivo":  ->  "4_delete.php"
			     		 Envia el arrego "eliminar[]" hacia ese mismo "archivo""-->
			</form>	
		</section>
	</body>
</html>