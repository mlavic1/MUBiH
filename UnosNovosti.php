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
	print'<li><a href="extract.php">Prebaci iz XML-a u bazu</a></li>';
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
	
$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
	$imeTag = $_REQUEST['firstname'];
	$prezimeTag =$_REQUEST['lastname'];
	$goloviTag = $_REQUEST['goals'];

	if($ime = $_POST['clubs']=="Arsenal")
		$pl_id=2;
	else
		$pl_id =1;
	$rezultat = $veza->query("INSERT INTO players(firstname,lastname,goals,player_id)  VALUES('$imeTag','$prezimeTag','$goloviTag','$pl_id')");

    
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

<div id="greska"></div>
<p>Unesite igrača i broj golova koji je postigao u bazu</p>
<form action="UnosNovosti.php" method="post">
	Ime igrača :<br>
	<input id="ime" type="text" name="firstname" >
	<br>
  	Prezime igrača :<br>
  	<input id="prezime" type="text" name="lastname" >
  	<br>
  	Broj golova:<br>
  	<input  type="text" name="goals" >
  	<br>
  	Tim :<br>
  	<select name ="clubs">
  <option name="" value="Arsenal">Arsenal</option>
  <option value="Manchester United">Manchester United</option>
  
</select>
  	<br>
  	<br>
  	<input id="dugme" type="submit" name="posalji" value="Unesi" onclick="validiraj()">
	</form>
</div>
<div class="kol-1 tekst">


</div>
<div class="kol-3 tekst">
<?php 
if(isset($_POST['promijeni'])){
	$id = $_GET['id'];

		$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
$rezultat = $veza->query("SELECT id, firstname, lastname,goals FROM players");
foreach ($rezultat as $row) 
		  { 

			$data_id = $row['id'];

			if ($id == $data_id) {

				if (isset($_POST['nameizmjena'])) {
					
					$rezultat = $veza->query("UPDATE players SET firstname='".$_POST['nameizmjena']."' WHERE id=$id");
					if (!$rezultat) {
          		$greska = $veza->errorInfo();
          		print "SQL greška: " . $greska[2];
        	 	 exit();
    			 }
				else{
				echo "Uspješno";
					}
					
				}

				if (isset($_POST['lastnameizmjena'])) {
						$rezultat = $veza->query("UPDATE players SET lastname='".$_POST['lastnameizmjena']."' WHERE id=$id");
					if (!$rezultat) {
          		$greska = $veza->errorInfo();
          		print "SQL greška: " . $greska[2];
        	 	 exit();
    			 }
				else{
				echo "Uspješno";
					}
				
					
					
				}
				
				if (isset($_POST['goalsizmjena'])) {
						$rezultat = $veza->query("UPDATE players SET goals='".$_POST['goalsizmjena']."' WHERE id=$id");
					if (!$rezultat) {
          		$greska = $veza->errorInfo();
          		print "SQL greška: " . $greska[2];
        	 	 exit();
    			 }
				else{
				echo "Uspješno";
					}
				
					
				}
			}
			
		}

		

		header('Location: '."index.php",true,303);

		exit();

}

if (isset($_POST['update'])) {

	
	
	$id = $_GET['id'];

	$ime = "";
	$prezime = "";
	$golovi = "";
$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
$rezultat = $veza->query("SELECT id, firstname, lastname,goals FROM players");
	
	foreach ($rezultat as $children) {

		if ($id == $children['id']) {
			$ime = $children['firstname'];
			$prezime = $children['lastname'];
			$golovi = $children['goals'];

		}
	}
	if (!$rezultat) {
          		$greska = $veza->errorInfo();
          		print "SQL greška: " . $greska[2];
        	 	 exit();
    			 }
				else{
				echo "Uspješno";
					}

	echo	'<p>Unesite ime i prezime igraca i promijenite njegov broj golova</p>
		<form action="UnosNovosti.php?id='. $id .'" method="post">
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