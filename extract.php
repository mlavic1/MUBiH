<?php

	$xml1=simplexml_load_file('kontaktXML.xml');
	$xml2=simplexml_load_file('admin.xml');
	$xml3=simplexml_load_file('pitanja.xml');
	$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
     
     $rezultat = $veza->query("SELECT id, firstname, lastname,goals FROM players");
	
     
foreach ($xml1->data as $red) {

	
	$firstname= $red->firstname;
	$lastname= $red->lastname;
	$goals= $red->goals;

	$rezultat = $veza->query("INSERT INTO players(firstname,lastname,goals,player_id)  VALUES('$firstname','$lastname','$goals','1')");
	
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	else{
		echo "Uspješno";
	}


}
/*
$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
$veza->exec("set names utf8");
foreach ($xml2->clan as $red) {
	$firstname= $red->ime;
	$lastname= $red->prezime;
	$address= $red->adresa;
	$city= $red->grad;
	$username= $red->username;
	$password1= $red->pasvord;
	$password2= $red->pasvord2;
	$rezultat = $veza->query("INSERT INTO admin(firstname,lastname,address,city,username,password1,password2)  VALUES('$firstname','$lastname','$address','$city','$username','$password1','$password2')");

	
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	else{
		echo "Uspješno";
	}
}
$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
$veza->exec("set names utf8");
foreach ($xml3->kontakt as $red) {
	$firstname= $red->ime;
	$lastname= $red->prezime;
	$question= $red->pitanje;
	
	$rezultat = $veza->query("INSERT INTO questions(firstname,lastname,question) VALUES('$firstname','$lastname','$question')");

	
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	else{
		echo "Uspješno";
	}
}
header('Location: '."index.php",true,303);
*/
?>