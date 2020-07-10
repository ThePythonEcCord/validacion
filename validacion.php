<?php
$error = '';

if (isset($_POST)) {
	$nombre=$_POST['nombre'];
	$correo=$_POST['correo'];
	$celular=$_POST['celular'];
	
	// Nombre
	
	if (empty($nombre) and !filter_var($nombre, FILTER_SANITIZE_STRING)) {//SI NO ESTA VACIO EJECUTAS TODO ESTO
		$error  .= 'Por favor agregar un nombre <br>';
	}
	
	// Correo
	
	if (empty($correo) and !filter_var($correo,FILTER_VALIDATE_EMAIL)){
		$error .='POR FAVOR INGRESE UN CORREO VALDO '.'</br>';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Test Formulario PHP</title>
</head>
<body>
	<form action="#"  method="post">
		<h2>Ingresa Tus Datos Personales </h2>
		<p>nombres: <input type="text" name="nombre" required></p>
		<p>correo: <input type="email" name="correo" required></p>
		<p>celular: <input type="number" name="celular" required></p>
		<?php if(!empty($error)): ?>
		<div class="error">
			<?=$error?>
		</div>
		<?php endif; ?>
		<input type="submit" value="Enviar">
	</form>
	
	<?php if(isset($_POST) and empty($error)): ?>
	<p>Tu nombre es: <?=$nombre?></p>
	<p>Tu correo es: <?=$correo?></p>
	<?php endif; ?>
</body>
</html>
