<?php

require 'conntodb.php'

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

if (isset($_GET['account_number']) && !empty($_GET['account_number'])){
	$account_number = $_GET['account_number'];
	if (preg_match('account_number', $account_number)){
		echo "Success Login!"
	} else {
		echo "Wrong account number or password!"
		typeagain();   	// tha tin ftiaksei o pts
	}
}
?>