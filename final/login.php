<?php	 
/* start the session */
session_start();
?>
 
<!DOCTYPE html>
<html lang="es">	 
<head>
<title>Check Login</title>
<meta charset = "utf-8" />
</head>
 
<body>
	 
<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "host";
$db_name = "bdscb";
$tbl_name = "usuarios";


 
// Connect to server and select databse.
mysql_connect($host_db, $user_db, $pass_db)or die("Cannot Connect to Data Base.");
 
mysql_select_db($db_name)or die("Cannot Select Data Base");
 
// sent from form
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['username'])){
            if(!empty($_POST['username']) and !empty($_POST['password'])){
                 
$sql= "SELECT privilegios_id_rol, usuario, contrasenia FROM ".$tbl_name." WHERE usuario = '".$username."' and contrasenia='".$password."';";
 
$result=mysql_query($sql);
	 
// counting table row
$count = mysql_num_rows($result);
// If result matched $username and $password
 
if($count == 1){
    $res = mysql_fetch_array($result);
    $_SESSION['privilegio'] = $res ['privilegios_id_rol'];
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
	
    //echo "<br> Bienvenido! " . $_SESSION['username'];
    header('location:presentacion/layoutC.php');

    }
    else {
	echo "<br/>Usuario o contraseña estan incorrectos.<br>";

	echo "<a href='registro.html'>Volver a Intentarlo</a>";

    }
}else {
	echo "<br/>Usuario o contraseña estan vacios.<br>";

	echo "<a href='registro.html'>Volver a Intentarlo</a>";

    }

}
?>
 
</body>
</html>
