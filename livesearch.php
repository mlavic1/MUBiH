<?php
<<<<<<< HEAD
/*
=======

>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6
$xmlDoc=new DOMDocument();
$xmlDoc->load("kontaktXML.xml");

$x=$xmlDoc->getElementsByTagName('data');
<<<<<<< HEAD
*/
$veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");
$rezultat = $veza->query("SELECT id, firstname, lastname,goals FROM players");
//get the q parameter from URL
$q=$_GET["q"];
$NUMBER = 0;
=======

//get the q parameter from URL
$q=$_GET["q"];

>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6
//lookup all links from the xml file if length of q>0

if (strlen($q)>0) {
  $hint="";
<<<<<<< HEAD
  
  foreach ($rezultat as $u)  {
            
      if (stristr($u['firstname'],$q) || stristr($u['lastname'],$q)) {
          $NUMBER=$NUMBER+1;
        if ($hint=="") {
                    
            if(stristr($u['firstname'],$q)){
                $hint=$hint .$u['firstname'];
            }
            else{$hint=$hint .$u['lastname'];}
         
        } else {
            if(stristr($u['firstname'],$q)){
                $hint=$hint . "<br />".$u['firstname'];
            }
            else{$hint=$hint . "<br />".$u['lastname'];}
          
        }
      }
        if($NUMBER==10)break;
    
  }
}
if ($hint!="") {
   $tekst=$hint;
} else {
$tekst="Nema prijedloga";
 
}
echo $tekst;
  /*
=======
  $NUMBER = 0;
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6
  for($i=0; $i<9; $i++) {
    $y=$x->item($i)->getElementsByTagName('firstname');
    $z=$x->item($i)->getElementsByTagName('lastname');

    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if($NUMBER>9)break;
        if ($hint=="") {
          $NUMBER =$NUMBER+1;
          $hint="<a href='index.php' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $NUMBER =$NUMBER+1;
          $hint=$hint . "<br /><a href='index.php' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
        if (stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
          if($NUMBER>9)break;
        if ($hint=="") {
          $NUMBER =$NUMBER+1;
          $hint="<a href='index.php' target='_blank'>" . 
          $z->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $NUMBER =$NUMBER+1;
          $hint=$hint . "<br /><a href='index.php' target='_blank'>" . 
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
<<<<<<< HEAD

*/
=======
>>>>>>> 99a142b8baf56c2e8ca1fd67e0ac192393b771d6
?>