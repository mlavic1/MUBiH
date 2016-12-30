<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<TITLE> Historija kluba
</TITLE>
<link rel="stylesheet" type="text/css" href="historijakluba.css">
<link rel="stylesheet" type="text/css" href="login.css">
<script src="slika.js"></script>
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
	<li id="trenutni1"><a href="historijakluba.php">Historija kluba</a></li>
	<li><a href="kontakt.php">Kontakt</a></li>
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
<div class="kol-10 tekst">
Manchester United je  engleski nogometni klub koji svoje domaće utakmice igra na stadionu Old Trafford u Manchesteru. Jedan je od najuspješnijih engleskih i europskih nogometnih klubova sa 20 naslova prvaka, 12 pobjeda u engleskom kupu i tri naslova europskih prvaka.
Klub je u svojoj historiji imao dva izuzetno uspješna razdoblja, oba pod vodstvom škotskih trenera: 1950.-ih i 1960.-ih pod upravom Matta Busbyja te 1990.-ih i 2000.-ih pod Alexom Fergusonom. Prvo razdoblje uspjeha prekinuto je avionskom nesrećom 1958. godine u Münchenu u kojoj je poginulo 23 ljudi od toga 8 igrača i 3 klupska dužnosnika, dok su neki od igrača zbog ozljeda zauvijek završili karijeru. Ipak, klub se uspio oporaviti od te tragedije. Nakon Busbyjeva odlaska iz kluba 1969. uslijedilo je razdoblje lošijih rezultata, koje je kulminiralo ispadanjem iz prve lige godine 1974. Klub se u prvoj drugoligaškoj sezoni uspio vratiti u prvu ligu, ali nove je uspjehe počeo nizati tek s Fergusonovim dolaskom na mjesto trenera.<br>
<div  class="kol-5 "><img id="slika1" src="slika1.jpg" alt ="Slika1" onclick="funk(this);"></div>
<div  class="kol-5 "><img id="slika2" src="slika2.jpg" alt ="Slika2" onclick="funk(this);"></div>
<div id="myModal" class="modal">

  <span class="close">Izađi</span>
  <img class="modsadrzaj" id="sl">
  
  <div id="opis"></div>
</div>

</div>
</div>
</BODY>
</HTML>