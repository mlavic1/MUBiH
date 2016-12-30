<?php
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