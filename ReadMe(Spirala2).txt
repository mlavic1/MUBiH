I  - �ta je ura�eno?
*Ura�ene su validacije svih formi pomo�u regex formata . Za nevalidan unos iznad svake forme sam 
kreirao jedan div koji govori o gre�ki .Tako�e border od odre�enog textboxa postane crven ako je u pitanju
gre�ka, a zelen ako smo pravilno unijeli. Provjeravale su se osnovne stvari: Da li je pritisnuto dugme
a nije unijeto ni�ta(dakle validacija se radila klikom na dugme), da li je adresa u validnom formatu
da li je password isti kao i prethodni (U formi kod unosa novog �lana) itd.
*Drop down meni je ura�en (nalazi se ispod Logo-a) . U njemu je isti sadr�aj kao i sam meni, pa sam 
i za njega stavio da se u�itavaju stranice preko ajax poziva.Tako�e drop down meni je prilago�en i za mobilne
verzije.
*Uradio sam da se u podstranici "Historija kluba" klikom na 2 slike koje se tu nalaze one ra�ire na full screen
a pritiskom na dugme esc da se iza�e iz full screen-a, tako�e pored slike ima opcija "Iza�i" te klikom na nju tako�e se mo�e iza�
iz uve�ane slike.
*Ura�eno je da se preko Ajax-a podstranice u�itavaju bez reload-a. To smo uradili preko http requesta, i na prepoznavanje
koja stranica je poslana u funkciju da se ta stranica vrati. Po�etna stranica od koje treba krenuti je ajaxpocetak.html 
(dakle prvo se otvara ta stranica, pa se ostale stranice u nju u�itavaju preko Ajax-a)
II  - �ta nije ura�eno?
III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rje�enje (opis rje�enja)
IV  - Bug-ovi koje ste primijetili ali ne znate rje�enje
V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne re�enice �ta se u fajlu nalazi
ajaxpocetak- u njemu se nalazi samo jedan div sa id-om Sadrzaj u kojem se nalazi meni . U taj div se smije�taju
sadr�aji ostalih stranica pri klikom na neku od njih.
ajax.js- Tu se nalazi funkcija "ucitaj" koja ucitava stranicu na koju je kliknuto. Koristi se Ajax
clanovi.js- funkcije za validaciju pri unosu �lanova
slika.js- funkcija koja uve�ava sliku na full screen, i na dugme esc izlazi iz tog mod-a . Ispod same slike
bude i njen naziv.
kontakt.js- funkcije za validaciju forme
login.js- funkcije za validaciju Login forme
slika1- slika 1 koja se uve�ava
slika2- slika 2 koja se uve�ava


