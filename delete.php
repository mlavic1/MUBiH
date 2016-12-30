<?php 

	if(isset($_POST['delete'])) {

		$id = $_GET['id'];

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

		header("location:/master/index.php");
		exit();

	}


?>