<?php 

	if(isset($_POST['delete'])) {

		$id = $_GET['id'];

<<<<<<< HEAD
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
=======
		$doc = new DomDocument;
		$doc->load('kontaktXML.xml');

		$thedocument = $doc->documentElement;

		$list = $thedocument->getElementsByTagName("data");
		$length = $list->length;

		for ($i=$length-1; $i >= 0; $i--) { 

			$data = $list->item($i);
			$dataId = $data->getAttribute('id');

			echo $dataId . " ";

			if ($id == $dataId) {
				$data->parentNode->removeChild($data);
			}
		}

		$doc->save('kontaktXML.xml');

		header('Location: '."index.php",true,303);
		exit();
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6

	}


?>