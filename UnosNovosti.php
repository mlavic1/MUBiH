<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<TITLE> Prelazni rok
</TITLE>
<link rel="stylesheet" type="text/css" href="kontakt.css">
<link rel="stylesheet" type="text/css" href="login.css">
<script src="kontakt.js"></script>
<script src="login.js"></script>
</HEAD>
<BODY>
<?php
session_start();
        if (isset($_SESSION['user'])) {
            print'<div class="kol-12 meni">';
            print'<ul >';
            print'<li id="trenutni1"><a href="UnosNovosti.php">Dodaj novost</a></li>';
            print'<li  ><a href="Logout.php">Logout</a></li>';
            print'</ul>';
            print'</div>';
        }
        
    ?>
<div class="red">
	<div id="slika-logo" class="kol-2 logo"><img src="Logo-Manutd.jpg" alt ="Slika loga"></div>
	<div class="kol-10 meni">
	<ul>
	<li><a href="index.php">Početna</a></li>
	<li><a href="historijakluba.php">Historija kluba</a></li>
	<li ><a href="kontakt.php">Kontakt</a></li>
	<li><a href="clanovi.php">Članovi</a></li>
	<li><a href="oNama.php">O nama</a></li>
	<li><a href="efpedeef.php">PDF prikaz</a></li>
		<?php 
if (isset($_SESSION['user'])) {
	print'';
}
else 
print'<li><a href="login.php">Login</a></li>';
	?>
	<?php
	if (isset($_SESSION['user'])) {
	print'<li><a href="download.php">Download csv</a></li>';
}
	?>
	</ul>
	 </div>
</div>
<div class="red">
<div id="prazan" class ="kol-2">&nbsp;</div>
<div class="kol-3 tekst">

<?php 
if(isset($_REQUEST['posalji'])){
	$xml = new DOMDocument("1.0","utf-8");
	$xml->load("kontaktXML.xml");
	$rootTag = $xml->getElementsByTagName("document")->item(0);

	$dataTag = $xml->createElement("data");

	$id = 0;

	$x = simplexml_load_file("kontaktXML.xml");

	foreach ($x->children() as $childrens) {
		
		$id = $childrens['id'];
	}

	$id = $id + 1;

	$imeTag = $xml->createElement("firstname",$_REQUEST['firstname']);
	$prezimeTag = $xml->createElement("lastname",$_REQUEST['lastname']);
	$goloviTag = $xml->createElement("goals",$_REQUEST['goals']);

	$dataTag->setAttribute('id', $id);
	$dataTag->appendChild($imeTag);
	$dataTag->appendChild($prezimeTag);
	$dataTag->appendChild($goloviTag);

	$rootTag->appendChild($dataTag);

	$xml->save("kontaktXML.xml");

}



?>
<div id="greska"></div>
<p>Unesite igrača i broj golova koji je postigao u XML</p>
<form action="UnosNovosti.php" method="post">
	Ime igrača :<br>
	<input id="ime" type="text" name="firstname" >
	<br>
  	Prezime igrača :<br>
  	<input id="prezime" type="text" name="lastname" >
  	<br>
  	Broj golova:<br>
  	<input  type="text" name="goals" >
  	<br><br>
  	<input id="dugme" type="submit" name="posalji" value="Unesi" onclick="validiraj()">
	</form>
</div>
<div class="kol-1 tekst">


</div>
<div class="kol-3 tekst">
<?php 
if(isset($_POST['promijeni'])){
	$id = $_GET['id'];

		$doc = new DomDocument;
		$doc->load('kontaktXML.xml');

		$thedocument = $doc->documentElement;

		$list = $thedocument->getElementsByTagName("data");
		$length = $list->length;

		foreach ($list as $data)  { 

			$data_id = $data->getAttribute('id');

			if ($id == $data_id) {

				if (isset($_POST['nameizmjena'])) {
					$data->getElementsByTagName('firstname')->item(0)->nodeValue = $_POST['nameizmjena'];
				}

				if (isset($_POST['lastnameizmjena'])) {
					$data->getElementsByTagName('lastname')->item(0)->nodeValue = $_POST['lastnameizmjena'];
					
				}
				
				if (isset($_POST['goalsizmjena'])) {
					$data->getElementsByTagName('goals')->item(0)->nodeValue = $_POST['goalsizmjena'];
				}
			}
			
		}

		$doc->save('kontaktXML.xml');

		header("location:/master/index.php");
		exit();

}

if (isset($_POST['update'])) {

	
	
	$id = $_GET['id'];

	$ime = "";
	$prezime = "";
	$golovi = "";

	


	$xml = simplexml_load_file("kontaktXML.xml");

	foreach ($xml->children() as $children) {

		if ($id == $children['id']) {
			$ime = $children->firstname;
			$prezime = $children->lastname;
			$golovi = $children->goals;

		}
	}

	echo	'<p>Unesite ime i prezime igraca i promijenite njegov broj golova</p>
		<form action="updateNovost.php?id='. $id .'" method="post">
			Ime igrača :<br>
			<input id="ime" type="text" name="nameizmjena" value="'. $ime .'"><br>
			Prezime igrača :<br>
			<input id="ime" type="text" name="lastnameizmjena" value="'. $prezime .'"><br>
			Novi broj golova :<br>
			<input id="ime" type="text" name="goalsizmjena" value="'. $golovi .'">
		  	<br><br>
		  	<input id="dugme" type="submit" name="promijeni" value="Promijeni" onsubmit="validiraj()">
			</form>';
}

?>

</div>
</div>

</BODY>
</HTML>