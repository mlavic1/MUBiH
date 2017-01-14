
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
<style>
.error {color: #FF0000;}
</style>  
<BODY>
<?php
session_start();
        if (isset($_SESSION['user'])) {
            print'<div class="kol-12 meni">';
            print'<ul >';
            print'<li ><a href="UnosNovosti.php">Dodaj novost</a></li>';
            print'<li ><a href="Logout.php">Logout</a></li>';
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
	<li id="trenutni1"><a href="kontakt.php">Kontakt</a></li>
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
<div class="kol-10 tekst">
<h2>Kontakt telefon,mail,adresa</h2>
<p>Udruženje navijača Manchester Uniteda BiH.<br>
Adresa, 76.<br>
Tel.: +387 33 111 111<br>
adresa1@etf.unsa.ba <br><br>
Postavite nam pitanje : <br>
</p>
<?php 
$firstnameError =$lastnameError=$questionError= "";

if(isset($_REQUEST['posalji'])){
	if (!preg_match('/^[A-Z][a-z]{1,20}$/',$_REQUEST['firstname']))
                {
                    $firstnameError = "Greska u imenu";
                }
    else if (!preg_match('/^[A-Z][a-z]{1,20}$/',$_REQUEST['lastname']))
                {
                    $lastnameError = "Greska u prezimenu";
                }
    else if (!preg_match('/^[a-zA-z][a-zA-Z\s]*\?$/',$_REQUEST['area']))
    {
    			$questionError= "Niste fino unijeli pitanje.Na kraju mora biti znak upita.";
    }
    else {
$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");

	$imeTag = $_REQUEST['firstname'];
	$prezimeTag = $_REQUEST['lastname'];
	$goloviTag = $_REQUEST['area'];
$rezultat = $veza->query("INSERT INTO questions(firstname,lastname,question)  VALUES('$imeTag','$prezimeTag','$goloviTag')");

    
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
?>
<div id="greska"></div>
<form action="kontakt.php" method="post">
	Vaše ime :<br>
	<input id="ime" type="text" name="firstname" >
	<span class="error"> <?php echo $firstnameError;?></span>
	<br>
  	Vaše prezime :<br>
  	<input id="prezime" type="text" name="lastname" >
  	<span class="error"> <?php echo $lastnameError;?></span>
  	<br>
  	Vaše pitanje:<br>
  	<textarea id="tekst" cols="40" rows="5" name="area"></textarea>
  	<span class="error"> <?php echo $questionError;?></span>
  	<br><br>
  	<input id="dugme" type="submit" name="posalji" value="Pošalji" onclick="return validiraj()">
	</form>
</div>

</div>

</BODY>
</HTML>