<?php 



include "dbconnection.php";
SESSION_START();

include "sql.php";

$sql = new sql();







if (isset($_POST['login'])) {

	if (isset($_POST['username']) and isset($_POST['password'])) {


		$check = $sql->getLogin($_POST['username'], $_POST['password']);



		if ($check[2] == 1) {
			$_SESSION['username'] = $_POST['username'];
			header("Location:index.php?infant_ID=0");

		} else {

			header("Location:login.php?invalid=invalid");
		}

	}




}





?>