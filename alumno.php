<?php
// #1.- Devuelve todos los datos del alumno más joven.
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
	$consulta = "SELECT id, nif, nombre, apellido1, apellido2, ciudad, direccion, telefono, fecha_nacimiento, sexo, tipo FROM persona WHERE fecha_nacimiento=(SELECT MAX(fecha_nacimiento) FROM persona)";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
	// Motrar el resultado de los registro de la base de datos
	// Encabezado de la tabla
	echo "<table border='2'>";
	echo "<tr>";

    echo "<th>id</th>";
    echo "<th>nif </th>";
    echo "<th>nombre</th>";
    echo "<th>apellido1</th>";
    echo "<th>apellido2</th>";
    echo "<th>ciudad</th>";
    echo "<th>direccion</th>";
    echo "<th>telefono</th>";
    echo "<th>fecha_nacimiento</th>";
    echo "<th>sexo</th>";
    echo "<th>tipo</th>";

	echo "</tr>";
	
	// Bucle while que recorre cada registro y muestra cada campo en la tabla.
    
    while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['id'] . "</td><td>" . $columna['nif'] . "</td><td>" . $columna['nombre'] . "</td><td>". $columna['apellido1'] . "</td><td>". $columna['apellido2'] . "</td><td>". $columna['ciudad'] . "</td><td>". $columna['direccion'] . "</td><td>". $columna['telefono'] . "</td><td>". $columna['fecha_nacimiento'] . "</td><td>". $columna['sexo'] . "</td><td>". $columna['tipo'];
		echo "</tr>";
	}
	
	echo "</table>"; // Fin de la tabla

	// cerrar conexión de base de datos
	//mysqli_close( $conexion );?>
</body>
</html>