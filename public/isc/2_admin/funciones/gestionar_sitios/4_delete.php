<!--Este archivo elimina los datos, enviados desde el archivo "1_tabla.php" -->

<?php

	/************************************************************* 
	| Agregar el archivo que permite hacer la conexion con la BD |
	*************************************************************/
	include("../../conexion/conexion.php");


	/************************************************************************************ 
	| Recuperar y almacena el arreglo eliminar[] enviado desde el archivo "1_tabla.php" |
	************************************************************************************/
	$datosAEliminar = $_POST["eliminar"]; // Este arreglo contiene los id´s de los registros a eliminar
		

	/************************************************************ 
	| Eliminar los registros usando el arreglo datosAEliminar[] |
	************************************************************/
	if ($datosAEliminar != null) { 
		// Si el arreglo datosAEliminar[] no esta vacio, entonces...

			for ($i=0; $i < count($datosAEliminar); $i++) { // count() --> obtiene la longitud del arreglo
				//Para cada id que esta dentro del arreglo datosAEliminar[]...

				$id = $datosAEliminar[$i]; // Obtener el id

				// Formular la consuLta para eliminar el registro de "sitiosweb" donde el id sea igual a la variable $id
				$sql = "delete from sitiosweb where id = '".$id."'";
				mysqli_query($conexion, $sql); // Ejecutar la consulta
				// Formular otra consulta para eliminar el registro de "imagenes" relacionado a la variable $id
				$sql = "delete from imagenes where ids = '".$id."' and tipo = 'sitio'";
				mysqli_query($conexion, $sql); // Ejecutar la consulta
		}
	}
	mysqli_close($conexion); // cierra la conexion


	/*********************************** 
	| Regresar al archivo "1_tabla.php"|
	***********************************/
	header("location:1_tabla.php"); // regresa al archivo "1_tabla.php"

?>