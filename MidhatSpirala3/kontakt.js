
function validiraj()
{
	var ime = document.getElementById("ime").value;
var prezime = document.getElementById("prezime").value;
var tekst = document.getElementById("tekst").value;
var tekstReg = /^[a-zA-z][a-zA-Z\s]*\?$/;
if (ime === '' ) {
	var gres =document.getElementById('greska');
   	gres.innerHTML="Nise pravilno popunili ime !";
   	document.getElementById("ime").style.borderColor = "red";
return false;
}
else if(prezime === '' ){
var gres =document.getElementById('greska');
   	gres.innerHTML="Nise pravilno popunili prezime !";
   	document.getElementById("prezime").style.borderColor = "red";
return false;
}
else if(tekst === ''){
	var gres =document.getElementById('greska');
   	gres.innerHTML="Nise pravilno popunili pitanje !";
   	document.getElementById("tekst").style.borderColor = "red";
return false;
	
}
else if (!(tekst).match(tekstReg)) {
var gres =document.getElementById('greska');
   	gres.innerHTML="Nise pravilno popunili pitanje ! Na kraju morate staviti znak ' ? '";
   	return false;
} 
 else {
 	var gres =document.getElementById('greska');
 	gres.innerHTML="";
 	document.getElementById("tekst").style.borderColor = "green";
 	document.getElementById("prezime").style.borderColor = "green";
 	document.getElementById("ime").style.borderColor = "green";
return true;
}
}

