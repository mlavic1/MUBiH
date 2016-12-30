function validirajClana(){

  var ime = document.getElementById("imee").value;

var prezime = document.getElementById("prezimee").value;
  var adresa = document.getElementById("adresa").value;
var grad = document.getElementById("grad").value;
  var username = document.getElementById("user").value;
var pass1 = document.getElementById("pass1").value;
var pass2 = document.getElementById("pass2").value;


var adresaReg = /^[a-zA-Z\s]+\s[0-9]+$/;

if (ime === '' ) {
  var gres =document.getElementById('greska');
    gres.innerHTML="Niste pravilno popunili ime !";
    document.getElementById("imee").style.borderColor = "red";
return false;
}

else if(prezime === '' ){
var gres =document.getElementById('greska');
    gres.innerHTML="Nise pravilno popunili prezime !";
    document.getElementById("prezimee").style.borderColor = "red";
return false;
}

else if(!(adresa).match(adresaReg)){
var gres =document.getElementById('greska');
    gres.innerHTML="Nise pravilno popunili adresu ! Upisujete adresu i broj ";
    document.getElementById("adresa").style.borderColor = "red";
return false;
}

else if (grad === '' ) {
  var gres =document.getElementById('greska');
    gres.innerHTML="Nise pravilno popunili grad !";
    document.getElementById("grad").style.borderColor = "red";
return false;
}

else if (username === '' ) {
  var gres =document.getElementById('greska');
    gres.innerHTML="Nise pravilno popunili username !";
    document.getElementById("user").style.borderColor = "red";
return false;
}

else if(pass1 === '' ){
var gres =document.getElementById('greska');
    gres.innerHTML="Nise pravilno popunili password !";
    document.getElementById("pass1").style.borderColor = "red";
return false;
}

else if(pass1 !== pass2){
var gres =document.getElementById('greska');
    gres.innerHTML="Niste fino ponovili password !";
    document.getElementById("pass2").style.borderColor = "red";
return false;
}
else{
  var gres =document.getElementById('greska');
  gres.innerHTML="";
  document.getElementById("imee").style.borderColor = "green";
  document.getElementById("prezimee").style.borderColor = "green";
  document.getElementById("adresa").style.borderColor = "green";
  document.getElementById("grad").style.borderColor = "green";
  document.getElementById("user").style.borderColor = "green";
  document.getElementById("pass1").style.borderColor = "green";
  document.getElementById("pass2").style.borderColor = "green";
  
return true;
}

}

