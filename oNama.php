<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<TITLE> O nama
</TITLE>
<link rel="stylesheet" type="text/css" href="oNama.css">
<link rel="stylesheet" type="text/css" href="login.css">
</HEAD>
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
	<li><a href="kontakt.php">Kontakt</a></li>
	<li><a href="clanovi.php">Članovi</a></li>
	<li id="trenutni1"><a href="oNama.php">O nama</a></li>
	<li><a href="efpedeef.php">PDF prikaz</a></li>
		<?php 
if (isset($_SESSION['user'])) {
	print'<li><a href="download.php">Download csv</a></li>';
<<<<<<< HEAD
	print'<li><a href="extract.php">Prebaci iz XML-a u bazu</a></li>';
=======
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6
}
else 
print'<li><a href="login.php">Login</a></li>';
	?>
	
	
	</ul>
	 </div>
</div>
<div class="red">
<div id="prazan" class ="kol-2">&nbsp;</div>
<div class="kol-10 tekst">
<p>Udruženje je zvanično priznato 9.4.2013 od strane Ministrstva pravde BiH.

Udruženje navijača Manchester Uniteda u Bosni i Hercegovini (dalje u tekstu UNMU BIH) je osnovano kao neprofitabilna građanska organizacija.

Vizija udruženja je da promoviše ime Manchester Uniteda u Bosni i Hercegovini naravno u dobrom smislu, da učestvuje u humantiranim akcijama, da organizuje okupljanja navijača i svojih članova kao i kada bude oficijelno priznato od strane Manchester Uniteda da organizuje karte za utakmice našeg voljenog kluba.

</p>

</div>
</div>
</BODY>
</HTML>