
<!DOCTYPE HTML PUBLIC >
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
function prikazi(str) {

  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    
    xmlhttp=new XMLHttpRequest();
  } else { 
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid black";
      document.getElementById("livesearch").style.backgroundColor ="white";
    }
  }

  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
<TITLE>
Početna
</TITLE>
<link rel="stylesheet" type="text/css" href="pocetna.css">
<link rel="stylesheet" type="text/css" href="login.css">
</HEAD>
<BODY>
<?php
session_start();
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
	<li id="trenutni1"><a href="index.php">Početna</a></li>
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
	
	<div class="kol-2"><form action="index.php" method="post">
<input type="text" size="15" name="kljrijec" id ="pretraga" onkeyup="prikazi(this.value)">
<button type="submit" name="search">Search</button>
<div id="livesearch"></div>
<?php
 if(isset($_REQUEST['search'])){
	$rijec = $_POST['kljrijec'];
	$rijec = htmlentities($rijec, ENT_COMPAT, 'UTF-8', false);
<<<<<<< HEAD
  $q=$rijec;
	$hint = "";
  $veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
$rezultat = $veza->query("SELECT id, firstname, lastname,goals FROM players");
if (!$rezultat) {
              $greska = $veza->errorInfo();
              print "SQL greška: " . $greska[2];
             exit();
           }
           foreach ($rezultat as $u)  {
            if (stristr($u['firstname'],$q) || stristr($u['lastname'],$q) )
    {
        
        print "<p>".$u['firstname']. PHP_EOL."</p>";
        print "<p>".$u['lastname']. PHP_EOL."</p>";
        
    }
           }
         }
  /*
=======
	$hint = "";
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6
	$q=$rijec;
$xmlDoc=new DOMDocument();
$xmlDoc->load("kontaktXML.xml");

$x=$xmlDoc->getElementsByTagName('data');
if (strlen($q)>0) {
  foreach ($x as $data) {
    $y=$data->getElementsByTagName('firstname');
    $z=$data->getElementsByTagName('lastname');

    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        
        if ($hint=="") {
          
          $hint="<a href='index.php' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          
          $hint=$hint . "<br /><a href='index.php' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
        if (stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
         
        if ($hint=="") {
          
          $hint="<a href='index.php' target='_blank'>" . 
          $z->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          
          $hint=$hint . "<br /><a href='index.php' target='_blank'>" . 
          $z->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
    
  }
 }

 echo "\n".$hint;
}
<<<<<<< HEAD
*/
=======
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6
 ?>
</form> </div>
	<div id="tekst" class ="kol-10 tekst"><h1>Trenutna tabela:</h1>
	<div class="kol-12 tabelasl"><img src="tabela.jpg" alt ="Slika tabele"></div>
	</div>
	
	
</div>


<div class="red">
<div class="kol-2">&nbsp; </div>
<?php 

<<<<<<< HEAD
	$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
	
	print'<div id="tekst" class ="kol-10 tekst"><h1>Lista najboljih strijelaca</h1>';

$rezultat = $veza->query("SELECT id, firstname, lastname,goals FROM players");
foreach ($rezultat as $row) {
    echo  $row["firstname"]. " " . $row["lastname"]." " . $row["goals"]. "<br>";

       
    

         if(isset($_SESSION['user'])){

         echo '

		<form action="delete.php?id='. $row["id"] .'" method="post"  id="form1">
=======
	$filexml='kontaktXML.xml';
	$xml = simplexml_load_file($filexml);
	$Parent = 0;
	$Nodes = 0;
	
	print'<div id="tekst" class ="kol-10 tekst"><h1>Lista najboljih strijelaca</h1>';

	foreach($xml->children() as $x)
       {
       	
	foreach ($x->children() as $data) 
        {
        
            echo $data."&nbsp;";


        }
         echo "<br>";
         if(isset($_SESSION['user'])){
         echo '

		<form action="delete.php?id='. $x['id'] .'" method="post"  id="form1">
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6

        	<button type="submit" name="delete">Delete</button>

		</form>
<<<<<<< HEAD
		<form action="UnosNovosti.php?id='. $row["id"] .'" method="post" >
=======
		<form action="UnosNovosti.php?id='. $x['id'] .'" method="post" >
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6

        	<button type="submit" name="update">Update</button>

		</form>
<<<<<<< HEAD

         ';
}
 }       

=======
         ';
}
        $Parent = $Parent + 1;
}
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6

	
	?>
	
	
</div>

</BODY>
</HTML>