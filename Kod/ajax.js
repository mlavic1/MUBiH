
function ucitaj(naziv) {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("sadrzaj").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("sadrzaj").innerHTML = naziv;
                }
                
                if (naziv === 'pocetna') {
                    ajax.open("GET", "pocetna.html", true);
                    ajax.send();
                }
                if (naziv === 'historijaKluba') {
                    ajax.open("GET", "historijaKluba.html", true);
                    ajax.send();
                }
                if (naziv === 'kontakt') {
                    ajax.open("GET", "kontakt.html", true);
                    ajax.send();
                }
                if (naziv === 'clanovi') {
                    ajax.open("GET", "clanovi.html", true);
                    ajax.send();
                }
                if (naziv === 'oNama') {
                    ajax.open("GET", "oNama.html", true);
                    ajax.send();
                }
                if (naziv === 'login') {
                    ajax.open("GET", "login.html", true);
                    ajax.send();
                }
            }