<?php 
require('fpdf/fpdf.php'); 

//create a FPDF object
$pdf=new FPDF();

//set document properties
$pdf->SetAuthor('Midhat Lavic');
$pdf->SetTitle('Lista igrača i golova koje su postigli');

//set font for the entire document
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(200,40,40);

//set up a page
$pdf->AddPage('P'); 


//insert an image and make it a link


//display the title with a border around it
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(100,7,'Lista strijelaca',1,0,'C',0);
$filexml='kontaktXML.xml';
$xml = simplexml_load_file($filexml);
$linija = "";
        foreach ($xml->children() as $item) 
        {

            $firstname = $item->firstname;
                $lastname = $item->lastname;
                $goals = $item->goals;

               

                $linija = $linija ."Ime:". $firstname . "\n Prezime: " . $lastname . "\n Golovi:" . $goals . ".\n";
              }
                

$pdf->SetXY (11,50);
$pdf->SetFontSize(11);
$pdf->Write(5,'Lista igraca sa postignutim golovima je slijedeca:');
$pdf->Write(5,"\n");
$pdf->Write(5,$linija);

$pdf->Output('ListaStrijelaca.pdf','I'); 
?>

