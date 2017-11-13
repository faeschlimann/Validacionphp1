<?php
//En un principio la variable $tabla que muestra el nuevo registro debe declararse y estar en blanco.
$tabla = "";
//En un principio la variable $error que muestra el posible error al filtrar los datos debe declararse y estar en blanco.
$error = "";

/* Si el formulario es enviado */
if (isset($_POST["insertar"]))
{
//Almacenar los campos en variables
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$annyo = $_POST['annyo'];
$semestre = $_POST['semestre'];
$descripcion = $_POST['descripcion'];


//Filtrar los datos por motivos de seguridad
//Este proceso siempre hay que llevarlo a cabo al hacer consultas a la base de datos
//Para cada campo aplicaré un filtro de no pasarlo no se realizará la inserción del nuevo registro.

if (!preg_match("/^[0-9]+$/", $codigo)) //Sólo números
{
$error = "Ha ocurrido un error, datos no permitidos. (Codigo)";
}
else if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/", $nombre)) //letras latinas + espacios
{
$error = "Ha ocurrido un error, datos no permitidos. (Nombre)";
}
else if(!preg_match("/^[0-9]+$/", $annyo))
{
$error = "Ha ocurrido un error, datos no permitidos. (Año)";
}
else if(!preg_match("/^[0-9]+$/", $semestre)) 
{
$error = "Ha ocurrido un error, datos no permitidos. (semestre)";
}
else if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/", $descripcion)) //
{
$error = "Ha ocurrido un error, datos no permitidos (descripcion).";
}
else
{
//Datos de conexión a la base de datos.
$mysql_usuario = "root";
$mysql_password = "ximi1234";
$mysql_host = "localhost";
$mysql_database = "alumnos";

//Conectar
$conexion = mysql_connect($mysql_host, $mysql_usuario, $mysql_password, true);

//Seleccionamos la base datos y la conexión, die para mostrar el error si existe algún problema.
mysql_select_db($mysql_database, $conexion) || die('No pudo conectarse: '.mysql_error());


//Preparar la consulta para insertar los datos
$consulta = "INSERT INTO datos (codigo, nombre, annyo, semestre, descripcion)";
$consulta .= "VALUES ('$codigo', '$nombre', '$annyo', '$semestre', '$descripcion')";

//Ejecutar la consulta para guardar el registro
$resultado = mysql_query($consulta, $conexion) or die(mysql_error());

//Mostrar el registro nuevo en una tabla
$tabla = "<table border='1' table align='center' cellpadding='10'>\n";
$tabla .= "<tr><th>Codigo</th><th>Nombre</th><th>Año</th><th>Semestre</th><th>Descripcion</th></tr>\n";
$tabla .= "<tr>
          <td>$codigo</td>
          <td>$nombre</td>
          <td>$annyo</td>
		  <td>$semestre</td>
		  <td>$descripcion</td>
		  </tr>\n";
$tabla .= "</tabla>\n";

//Cerrar la conexión
mysql_close($conexion);
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
<title>Mantenedor Alumnos</title>
</head>
<body>
<header>
		<h1 class="header-h1">Mantenedor de Alumnos</h1>
	</header>

<!-- Para mostrar un posible error al filtrar los datos -->
<p style="color: red;"><?php echo $error; ?></p>
<!-- Para mostrar el nuevo registro -->
<p style="color: blue;"><?php echo $tabla; ?></p>

<!-- con $_SERVER["PHP_SELF"] estamos diciendo que la consulta será enviada al mismo archivo desde donde se envía el formulario, es decir éste -->
<section>
		<article>
<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
<table border="0">
<tr>
<td>Codigo:</td>
<td><input type="text" name="codigo"></td>
</tr>
<tr>
<td>Nombre:</td>
<td><input type="text" name="nombre"></td>
</tr>
<tr>
<td>Año:</td>
<td><input type="text" name="annyo"></td>
</tr>
<tr>
<td>Semestre</td>
<td><input type="text" name="semestre"></td>
</tr>
<tr>
<td>Descripcion</td>
<td><input type="text" name="descripcion" maxlength="500"></td>
</tr>
<tr>
<td>
<!-- El envío de este campo 'insertar' será capturado por $_POST para realizar la consulta -->
<input type="hidden" name="insertar">
</td>
<td><input type="submit" value="Enviar"></td>
</tr>
</table>
</form>
</body>
	</article>
	</section>
</html>