function funk(img){

var modal = document.getElementById('myModal');

var modalImg = document.getElementById("sl");
var tekst = document.getElementById("opis");
	
    modal.style.display = "block";
    modalImg.src = img.src;
    tekst.innerHTML = img.alt;
var s = document.getElementsByClassName("close")[0];


s.onclick = function() {
    modal.style.display = "none";
}
    window.onkeydown = function( event ) {
    if ( event.keyCode == 27 ) {
        modal.style.display = "none";
    }
}
}
