function validirajLogin(){
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;

if (username === '' ) {
  var gres =document.getElementById('greska');
    gres.innerHTML="Nise pravilno popunili username !";
    document.getElementById("username").style.borderColor = "red";
return false;
}
else if(password === '' ){
var gres =document.getElementById('greska');
    gres.innerHTML="Nise pravilno popunili password !";
    document.getElementById("password").style.borderColor = "red";
return false;
}
else{
  var gres =document.getElementById('greska');
  gres.innerHTML="";
  document.getElementById("username").style.borderColor = "green";
  document.getElementById("password").style.borderColor = "green";
return true;
}
}
 

function funkcijadropdown() {
    document.getElementById("drop").classList.toggle("show");
}


window.onclick = function(event) {
  if (!event.target.matches('.dropdugme')) {

    var dropdowns = document.getElementsByClassName("drsadrzaj");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 




