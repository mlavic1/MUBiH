Spirala 3
Uradio sam serijalizaciju svih formi u xml fajlove. Postoji vi�e xml fajlova. Posebno bitni su admin.xml i 
kontaktXML.xml.
U admin.xml se nalazi username i password koji je hashiran pomocu md5, to je ustvari password admin ali hashiran.
kontaktXML.xml je xml u  kojem se smjestaju igraci i njihovi golovi. Omoguceno je adminu da ih moze dodavati,brisati i 
updateovati.Tako�e ura�ena je i php validacija , s tim da se ona pojavi tek kada se javascript validacija probije(to se vidi na username i password kod log in-a)
Tako�e pazio sam i na xss ranjivost. Adminu je omogu�en download u csv fajl fudbalera i njihovih golova koji su odvojeni zarezom. To sam uradio tako �to prvo
uzmem podatke iz xml fajla a u csv spasavam samo atribute izostavljaju�i tagove. Atributi su odvojeni zarezom.
Napravljeno je generisanje izvje�taja u obliku pdf fajla, preko fpdf biblioteke. I u tom slu�aju sam pokupio podatke iz XML-a u varijablu i onda to ispisao
u odre�enom formatu u pdf.
Opcija pretrage je napravljana pomo�u ajax-a i na unos slova se poziva funkcija koja provjerava da li trenutni upisani string pripada nekom imenu ili prezimenu
igra�a , jer pretraga ide po ta dva polja.ukoliko jeste, to ime se spasi u varijablu te se ispi�e u div ispod samog unosa teksta.maksimalni broj igraca u padaju�oj
listi je 10 igra�a. Klikom na dugme search ispod se pojave sva imena i prezimena igra�a koja zadovoljavaju string koji se pretra�uje.

