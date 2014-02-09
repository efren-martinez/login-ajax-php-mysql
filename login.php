<?php 
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];
$mysql_db_hostname = "localhost";
$mysql_db_user = "usuario_base_datos";
$mysql_db_password = "contrasena_base_datos";
$mysql_db_database = "nombre_base_datos";
$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password)
or die("No se pudo conectar a la db");
mysql_select_db($mysql_db_database, $con)or die("No se encontro db");
$query = "SELECT * FROM usuarios WHERE email='$email' AND pass='$pass'";
$result = mysql_query($query)or die(mysql_error());
$num_row = mysql_num_rows($result);
$row=mysql_fetch_array($result);
if( $num_row >=1 ) { 
$_SESSION['user']=$row['email'];
header('Location: home.html');
}
else{
echo 'na-ha-ha, no estas invitado a esta fiesta';
}
?>
