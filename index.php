<?php // Creamos una función para que cada vez el usuario entre en la página cambie el archivo para que incremente en una unidad el valor de los visitantes.
function contar_usuarios(){
	$archivo = 'contador.txt';

	if (file_exists($archivo)) {
		$cuenta = intval(file_get_contents($archivo)) + 1; // Valor que ya teníamos en el archivo + 1.
        // intval lo añadimos porque file_get_contents() recupera el contenido como cadena de texto, y no podemos sumar int a cadena de texto, con intval convertimos la cadena de texto a int para poder hacer la suma.
		file_put_contents($archivo, $cuenta); // Ahora agregamos este valor calculado en la línea de arriba y almacenado en la variable $cuenta, lo sobreescribimos.

		return $cuenta; // Usamos return porque estamos trabajando con una función.
	} else { // Si el archivo no existe.
		file_put_contents($archivo, 1); // file_put_contents crea también el archivo y lo inicializa con el valor 1.
		return 1;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contador de visitas</title>
	<link rel="stylesheet" href="estilos.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald:700,400,300' rel='stylesheet' type='text/css'>
</head>
<body>
	<h1>Contador de visitas</h1>
	<div class="visitantes">
		<p class="numero"><?php echo contar_usuarios(); ?></p>
		<p class="texto">Visitas</p>
	</div>
</body>
</html>