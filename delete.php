<?php 

	if(isset($_POST['delete'])) {

		$id = $_GET['id'];

		$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
     
     $rezultat = $veza->query("DELETE FROM players WHERE ID=$id");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	else{
		echo "Uspješno";
	}

	}


?>