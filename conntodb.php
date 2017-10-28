<?php
$servername = "localhost";
$username = "root";
$password = "7777";
$my_db = "banking_system";
$errors = $array[];

$db = mysql_connect('$servername','$username','$password','$my_db');

if (isset($_POST['register'])){
	$accountnumber = mysql_real_escape_string($_POST['account_number']);
	$password = mysql_real_escape_string($_POST['pass']);
}

for ($i = 0; $i < len($errors); $i++){
if (empty($accountnumber)) {
	echo "Please fill again the account number.";
	array_push($errors, "Fill the account number");	
} elseif (empty($password)) {
	echo "Please fill again the password";
	array_push($errors, "Fill the password");
}
}
if (count($errors) == 0) {
	mysql_query($db, 'SELECT * FROM LOGINSYSTEM WHERE ACCOUNTNUMBER = ' .$accountnumber. 'AND PASSWORD = ' .$password.);
}


$conn = new mysqli($servername,$username,$password);

if ($conn -> connect_error) {
	die("Connection Failed!". conn -> connect_error);
} else {
	echo "Connected Successfully!";
}
?>