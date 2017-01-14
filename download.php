<?php
<<<<<<< HEAD
$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
    
       $users = $veza->query("SELECT * FROM players");
                if (!$users) {
                      $greska = $veza->errorInfo();
                      print "SQL greška: " . $greska[2];
                      exit();
                 }
       $line=createCsv($users);
       file_put_contents("NajboljiStrijelci.csv",$line);
    

    function createCsv($users)
    {
    	$linija = "";
        foreach ($users as $user) 
        {

         		$firstname = $user['firstname'];
                $lastname = $user['lastname'];
                $goals = $user['goals'];
=======
$filexml='kontaktXML.xml';

    if (file_exists($filexml)) 
           {
       $xml = simplexml_load_file($filexml);
       $line=createCsv($xml);
       file_put_contents("NajboljiStrijelci.csv",$line);
    }

    function createCsv($xml)
    {
    	$linija = "";
        foreach ($xml->children() as $item) 
        {

         		$firstname = $item->firstname;
                $lastname = $item->lastname;
                $goals = $item->goals;

                $firstname = str_replace(",",";.?",$firstname);
                $lastname = str_replace(",",";.?",$lastname);
                $goals=str_replace(",",";.?",$goals);
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6

                $linija = $linija . $firstname . ", " . $lastname . ", " . $goals . "\n";
                
     }
return $linija;
    }
    ?>

<?php
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=NajboljiStrijelci.csv");
    readfile('NajboljiStrijelci.csv');
   ?>