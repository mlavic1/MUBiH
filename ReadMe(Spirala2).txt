I  - Šta je uraðeno?
*Uraðene su validacije svih formi pomoæu regex formata . Za nevalidan unos iznad svake forme sam 
kreirao jedan div koji govori o greški .Takoðe border od odreðenog textboxa postane crven ako je u pitanju
greška, a zelen ako smo pravilno unijeli. Provjeravale su se osnovne stvari: Da li je pritisnuto dugme
a nije unijeto ništa(dakle validacija se radila klikom na dugme), da li je adresa u validnom formatu
da li je password isti kao i prethodni (U formi kod unosa novog èlana) itd.
*Drop down meni je uraðen (nalazi se ispod Logo-a) . U njemu je isti sadržaj kao i sam meni, pa sam 
i za njega stavio da se uèitavaju stranice preko ajax poziva.Takoðe drop down meni je prilagoðen i za mobilne
verzije.
*Uradio sam da se u podstranici "Historija kluba" klikom na 2 slike koje se tu nalaze one raðire na full screen
a pritiskom na dugme esc da se izaðe iz full screen-a, takoðe pored slike ima opcija "Izaði" te klikom na nju takoðe se može izaæ
iz uveæane slike.
*Uraðeno je da se preko Ajax-a podstranice uèitavaju bez reload-a. To smo uradili preko http requesta, i na prepoznavanje
koja stranica je poslana u funkciju da se ta stranica vrati. Poèetna stranica od koje treba krenuti je ajaxpocetak.html 
(dakle prvo se otvara ta stranica, pa se ostale stranice u nju uèitavaju preko Ajax-a)
II  - Šta nije uraðeno?
III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)
IV  - Bug-ovi koje ste primijetili ali ne znate rješenje
V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne reèenice šta se u fajlu nalazi
ajaxpocetak- u njemu se nalazi samo jedan div sa id-om Sadrzaj u kojem se nalazi meni . U taj div se smiještaju
sadržaji ostalih stranica pri klikom na neku od njih.
ajax.js- Tu se nalazi funkcija "ucitaj" koja ucitava stranicu na koju je kliknuto. Koristi se Ajax
clanovi.js- funkcije za validaciju pri unosu èlanova
slika.js- funkcija koja uveæava sliku na full screen, i na dugme esc izlazi iz tog mod-a . Ispod same slike
bude i njen naziv.
kontakt.js- funkcije za validaciju forme
login.js- funkcije za validaciju Login forme
slika1- slika 1 koja se uveæava
slika2- slika 2 koja se uveæava


