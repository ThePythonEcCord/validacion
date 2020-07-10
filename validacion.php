<?php
//$nombres=trim($nombres);//GUARDAR EN LA OTRA VARIABLE
//$nombres=htmlspecialchars($nombres);//CONVIERTE CARACTERES ESPECIALES
//$nombres=stripcslashes($nombres);	//remover simbolos como // etc

$error='';
if (isset($_POST['enviardato'])) {

$nombres=$_POST['nombres'];
$correo=$_POST['correo'];
$celular=$_POST['celular'];


if (!empty($nombres)) {//SI NO ESTA VACIO EJECUTAS TODO ESTO

$nombres=filter_var($nombres,FILTER_SANITIZE_STRING);//SANIANDO EL CODIGO
echo 'Hola '.$nombres;
}else{
	$error  .= 'Por favor agregar un nombre';

///////correo//////////

if (!empty($correo)){
	$correo =filter_var($correo,FILTER_SANITIZE_EMAIL);

if (!filter_var($correo,FILTER_VALIDATE_EMAIL)){
	$error .='POR FAVOR INGRESE UN CORREO VALDO '.'</br>';

}else{
	echo "Tu corro es: $correo";
}

} else{
	$error  .= 'Por favor agregar un correo';
}

}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
            <h2>Ingresa Tus Datos Personales </h2>
            <p>nombres: <input type="text" name="nombres"></p>
            <p> correo: <input type="text" name="correo"></p>
            <p>celular: <input type="text" name="celular"></p>
<?php if(!empty($error)): ?>
	<div class="error">  <?php echo $error; ?>   </div>
<?php endif; ?>
            <input type="submit" value="Enviar" name="enviardato">

        </form>

</body>
</html>
