<?php

$xmlDoc=new DOMDocument();
$xmlDoc->load("kontaktXML.xml");

$x=$xmlDoc->getElementsByTagName('data');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0

if (strlen($q)>0) {
  $hint="";
  $NUMBER = 0;
  for($i=0; $i<9; $i++) {
    $y=$x->item($i)->getElementsByTagName('firstname');
    $z=$x->item($i)->getElementsByTagName('lastname');

    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if($NUMBER>9)break;
        if ($hint=="") {
          $NUMBER =$NUMBER+1;
          $hint="<a href='pocetna.php' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $NUMBER =$NUMBER+1;
          $hint=$hint . "<br /><a href='pocetna.php' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
        if (stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
          if($NUMBER>9)break;
        if ($hint=="") {
          $NUMBER =$NUMBER+1;
          $hint="<a href='pocetna.php' target='_blank'>" . 
          $z->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $NUMBER =$NUMBER+1;
          $hint=$hint . "<br /><a href='pocetna.php' target='_blank'>" . 
          $z->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
    
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>