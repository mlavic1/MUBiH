Spirala 3
Uradio sam serijalizaciju svih formi u xml fajlove. Postoji više xml fajlova. Posebno bitni su admin.xml i 
kontaktXML.xml.
U admin.xml se nalazi username i password koji je hashiran pomocu md5, to je ustvari password admin ali hashiran.
kontaktXML.xml je xml u  kojem se smjestaju igraci i njihovi golovi. Omoguceno je adminu da ih moze dodavati,brisati i 
updateovati.Takoðe uraðena je i php validacija , s tim da se ona pojavi tek kada se javascript validacija probije(to se vidi na username i password kod log in-a)
Takoðe pazio sam i na xss ranjivost. Adminu je omoguæen download u csv fajl fudbalera i njihovih golova koji su odvojeni zarezom. To sam uradio tako što prvo
uzmem podatke iz xml fajla a u csv spasavam samo atribute izostavljajuæi tagove. Atributi su odvojeni zarezom.
Napravljeno je generisanje izvještaja u obliku pdf fajla, preko fpdf biblioteke. I u tom sluèaju sam pokupio podatke iz XML-a u varijablu i onda to ispisao
u odreðenom formatu u pdf.
Opcija pretrage je napravljana pomoæu ajax-a i na unos slova se poziva funkcija koja provjerava da li trenutni upisani string pripada nekom imenu ili prezimenu
igraèa , jer pretraga ide po ta dva polja.ukoliko jeste, to ime se spasi u varijablu te se ispiše u div ispod samog unosa teksta.maksimalni broj igraca u padajuæoj
listi je 10 igraèa. Klikom na dugme search ispod se pojave sva imena i prezimena igraèa koja zadovoljavaju string koji se pretražuje.

