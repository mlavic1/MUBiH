<?php
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