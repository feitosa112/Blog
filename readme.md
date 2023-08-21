Za izradu aplikacije koristena * PHP Version 8.0.26 *.
Za pokretanje potrebno kreirati bazu podataka pod nazivom "onlinemagazine" ili promijeniti naziv za "dbname" u fileu "config.php" gdje se nalaze i ostala podesavanja za konekciju sa bazom.
Potrebno preuzeti file "onlinemagazine.sql" te importovati ga u novonapravljenu bazu (onlinemagazine).

U navigacionoj traci se nalazi link za login i registraciju.Klikom na njega otvaraju nam se forme za login i registraciju.
Za uspjesnu registraciju potrebno je unijeti sva polja koja se nalaze u formi.Ukoliko je neko polje izostavljeno ispisuje nam se poruka da je potrebno unijeti sva polja,a polja koja su vec popunjena ostaju.
Ukoliko su sva polja popunjena provjerava se da li u bazi postoji korisnik sa unesenim emailom.Ukoliko posotoji dobijamo obavijest da korisnik  vec postoji u suprotnom poruku da je registracija uspjesna i  da se mozemo ulogovati.
U formu za login potrebno je popuniti polja za email i za pasword.
Ukoliko neko polje preskocimo na to nas upozorava bootstrap atribut "required".
Ukoliko popunimo oba polja vrsi se provjera da li u bazi postoji korisnik sa unesenim emailom i sa unesenim paswordom.Ukoliko ne postoji ispisuje se poruka da je nesto pogresno upisano u suprotnom se pojavljuje poruka o uspjesnom logovanju i link koji vodi na pocetnu stranicu
Kada se uspjesno ulogujemo na navigacionoj traci se pojavljuje ime ulogovanog korisnika i link za logout.

Na pocetnoj strani se ispisuju svi postovi bezobzira da li je korisnik ulogovan s tim da su prikazana

 samo po tri posta a klikom na dugme "next" koje se nalazi na dnu stranice prikazuju se sledeca tri i tako sve dok ima postova u bazi.Kada dodjemo na drugu stranicu pojavljuje se dugme "back".U okviru svakog posta nalazi se sam post,kategorija kojoj pripada post,username usera koji je post kreirao,tagovi i svi komentari vezani za taj post kao i username usera koji je ostavio komentar.
Ukoliko se korisnik uloguje moze da klikom na username korisnika koji je kreirao post dodje na stranicu gdje su ispisani svi postovi od tog korisnika.Isto vazi i za klikove na kategoriju posta,kao i na username usera koji je ostavio komentar.Takodje klikom na tag idemo na sve postove koji sadrze taj tag.
U okviru postova koje je kreirao ulogovani korisnik nalazi se button za brisanje i za editovanje tog posta,a u okviru postova koje su kreirali drugi korisnici nalazi se polje za unos komentara.



Postman kolekcija se nalazi u fileu pod nazivom "OnlineMagazine.postman_collection.json" koju je potrebno preuzete te importovati
