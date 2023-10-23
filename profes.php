<?php
#2.- Devuelve un listado con los profesores que no están asociados a un departamento.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // Ejemplo de conexión a base de datos MySQL con PHP.
	
	// Datos de la base de datos
	$usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "Script_Profes";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

	// establecer y realizar consulta. guardamos en variable.
	$consulta = "SELECT id_profesor, id_departamento FROM profesor WHERE id_departamento IS NULL";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
	// Motrar el resultado de los registro de la base de datos
	// Encabezado de la tabla
	echo "<table border='2'>";
	echo "<tr>";

    echo "<th>id_profesor</th>";
    echo "<th>id_departamento </th>";

	echo "</tr>";
	
	// Bucle while que recorre cada registro y muestra cada campo en la tabla.
    
    while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['id_profesor'] . "</td><td>" . $columna['id_departamento'];
		echo "</tr>";
	}
	
	echo "</table>"; // Fin de la tabla

	// cerrar conexión de base de datos
	//mysqli_close( $conexion );?>
</body>
</html>