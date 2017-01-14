
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<TITLE> Prelazni rok
</TITLE>
<link rel="stylesheet" type="text/css" href="clanovi.css">
<link rel="stylesheet" type="text/css" href="login.css">
<script src="login.js"></script>
<script src="clanovi.js"></script>
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
            print'<li><a href="UnosNovosti.php">Dodaj novost</a></li>';
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
	<li><a href="kontakt.php">Kontakt</a></li>
	<li id="trenutni1"><a href="clanovi.php">Članovi</a></li>
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
<<<<<<< HEAD
    print'<li><a href="extract.php">Prebaci iz XML-a u bazu</a></li>';
=======
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6
    }
    ?>
	</ul>
	 </div>
</div>
<div class="red">
<div id="prazan" class ="kol-2">&nbsp;</div>
<div class="kol-10 tekst">
<h2>Postanite naš član</h2>
<p>Popunite svoje lične podatke</p>
<?php 
$firstnameError =$lastnameError=$adressError=$cityError=$usernameError=$password1Error=$password2Error=  "";
if(isset($_REQUEST['posalji'])){
    $passw1 = $_POST['pasvord'];
    $passw1 = htmlentities($passw1, ENT_COMPAT, 'UTF-8', false);
    $passw2= $_POST['pasvord2'];
    $passw2 = htmlentities($passw2, ENT_COMPAT, 'UTF-8', false);
if (!preg_match('/^[A-Z][a-z]{1,20}$/',$_REQUEST['ime']))
                {
                    $firstnameError = "Greska u imenu";
                }
else if (!preg_match('/^[A-Z][a-z]{1,20}$/',$_REQUEST['prezime']))
{
$lastnameError = "Greska u prezimenu";

}
else if (!preg_match('/^[a-zA-Z\s]+\s[0-9]+$/',$_REQUEST['adresa']))
{
$adressError = "Greska u adresi";

}
else if (!preg_match('/^[a-z]{1,20}$/',$_REQUEST['username']))
{
$usernameError = "Greska u username-u";

}
else if (!preg_match('/^[a-z]{1,20}$/',$_REQUEST['pasvord']))
{
$password1Error = "Greska u passwordu";

}
else if (!preg_match('/^[a-z]{1,20}$/',$_REQUEST['pasvord2']) || $passw1!= $passw2)
{
$password2Error = "Greska u passwordu2, nije vam isti kao password 1";

}
                else{
<<<<<<< HEAD
   $veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
   
    $imeTag = $_REQUEST['ime'];
    $prezimeTag = $_REQUEST['prezime'];
    $adresaTag = $_REQUEST['adresa'];
     $gradTag = $_REQUEST['grad'];
    $userTag = $_REQUEST['username'];
    $pas1Tag = $_REQUEST['pasvord'];
    $pas2Tag = $_REQUEST['pasvord2'];

$rezultat = $veza->query("INSERT INTO admin(firstname,lastname,address,city,username,password1,password2)  VALUES('$imeTag','$prezimeTag','$adresaTag','$gradTag','$userTag','$pas1Tag','$pas2Tag')");

    
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

=======
    $xml = new DOMDocument("1.0","utf-8");
    $xml->load("admin.xml");
    $rootTag = $xml->getElementsByTagName("data")->item(0);
    
    $dataTag = $xml->createElement("clan");
   
    $imeTag = $xml->createElement("ime",$_REQUEST['ime']);
    $prezimeTag = $xml->createElement("prezime",$_REQUEST['prezime']);
    $adresaTag = $xml->createElement("adresa",$_REQUEST['adresa']);
     $gradTag = $xml->createElement("grad",$_REQUEST['grad']);
    $userTag = $xml->createElement("username",$_REQUEST['username']);
    $pas1Tag = $xml->createElement("pasvord",$_REQUEST['pasvord']);
    $pas2Tag = $xml->createElement("pasvord2",$_REQUEST['pasvord2']);

    $dataTag->appendChild($imeTag);
    $dataTag->appendChild($prezimeTag);
    $dataTag->appendChild($adresaTag);
    $dataTag->appendChild($gradTag);
    $dataTag->appendChild($userTag);
    $dataTag->appendChild($pas1Tag);
    $dataTag->appendChild($pas2Tag);

    $rootTag->appendChild($dataTag);

    $xml->save("admin.xml");
}
}
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6


?>
<div id="greska"></div>
<form method="POST" action="clanovi.php">
  Ime :<br>
  <input type="text" name="ime" id="imee">
  <span class="error"> <?php echo $firstnameError;?></span>
  <br>
    Prezime :<br>
    <input type="text" name="prezime" id="prezimee">
    <span class="error"> <?php echo $lastnameError;?></span>
    <br>
    Adresa i broj:<br>
    <input type="text" name="adresa" id="adresa">
    <span class="error"> <?php echo $adressError;?></span>
    <br>
    Grad:<br>
    <input type="text" name="grad" id="grad">
    <span class="error"> <?php echo $cityError;?></span>
    <br>
    Username:<br>
    <input type="text" name="username" id="user">
    <span class="error"> <?php echo $usernameError;?></span>
    <br>
    Password:<br>
    <input type="password" name="pasvord" id="pass1">
    <span class="error"> <?php echo $password1Error;?></span>
    <br>
    Ponovite password:<br>
    <input type="password" name="pasvord2" id="pass2">
    <span class="error"> <?php echo $password2Error;?></span>
    <br>
    <br><br>
    <input id="dugmeLogin" type="submit" value="Login" name="posalji" onclick="return validirajClana()">
  </form>
</div>

</div>
</BODY>
</HTML>