<?php
			session_start();
			
			$user = "";
			$nameError =$passError=  "";

	$xml = simplexml_load_file('admin.xml');

	if (isset($_SESSION['user'])) $user = $_SESSION['user'];
	else if(isset($_REQUEST['user'])){
	$username = $_POST['user'];
	$username = htmlentities($username, ENT_COMPAT, 'UTF-8', false);
	$password = $_POST['pass'];
	$password = htmlentities($password, ENT_COMPAT, 'UTF-8', false);
	foreach($xml->clan as $clan) { 
	    if($clan->pasvord == md5($password) && $clan->username == $username) {
	    	$user = $_REQUEST['user'];
	     	$_SESSION['user'] = $user;
	     	
	        break;
	    }
	    else 
	    	$nameError = "Nepravilan username";
	    	$passError= "Nepravilan password";
	}
	}

			
		?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<style>
.error {color: #FF0000;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<TITLE> Prelazni rok
</TITLE>
<link rel="stylesheet" type="text/css" href="login.css">

<script src="login.js"></script>
</HEAD>
<BODY>

	<?php
		if (isset($_SESSION['user'])) {
	        print'<div class="kol-12 meni">';
			print'<ul ">';
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
	<li><a href="kontakt.php">Kontakt</a></li>
	<li><a href="clanovi.php">Članovi</a></li>
	<li><a href="oNama.php">O nama</a></li>
	<li><a href="efpedeef.php">PDF prikaz</a></li>
		<?php 
if (isset($_SESSION['user'])) {
	print'';
}
else 
print'<li id="trenutni1"><a href="login.php">Login</a></li>';
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
<div class="kol-10 tekst">
<h2>Login na stranicu</h2>

<div id="greska"></div>

<form name="login" id="loginforma" action="login.php" method="post">
	Username :<br>
	<input id="username" type="text" name="user" >
	<span class="error"> <?php echo $nameError;?></span>
	<br>
  	Password :<br>
  	<input id="password" type="password" name="pass" >
  	<span class="error"> <?php echo $passError;?></span>
  	<br>
  	*Prijaviti se mogu samo članovi kluba
  	
  	<br><br>
  	<input id="dugmeLogin" type="submit" value="Login" onclick ="return validirajLogin()">
	</form>
</div>



</div>
</BODY>
</HTML>