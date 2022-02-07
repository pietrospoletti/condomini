Importare la cartella da github presente nel branch ##master## per avviare il progetto

Il database con nome ##buildings## sarà la chiave per fare funzionare il tutto

Il database è composto da una sola tabella contente tutti i campi che formiscono informazioni del condominio. la tabella si chiama ##buildings##
Sarà necessario avviare xampp e cerarlo su phpmyadmin e successivamente, aprendo la cartella del nostro progetto, sostituire sul file ##.env## della cartella server il nome del database
Con un terminale, posizionandosi su server, con il comando ##composer install## verranno installati tutti i pacchetti e con ##php artisan migrate## tutte le migrazioni necessarie saranno eseguite. Infine, con  il comando ##php artisan server## in nostro server partirà
Con un secondo terminale sarà necessario aprire la cartella client e digitare ##npm install##, dopodichè con il comando ##npm run serve## o ##yarn serve## la nostra applicazione si aprirà cliccando nel link fornito dal terminale

Il modello della nostra parte server si chiama ##building##

Il controller della nostra parte server si chiama ##BuildingController##

API route: 
Route::get("/buildings",[BuildingController::class, 'buildings']); -> consente di vedere tutte le strutture ordinate per data di aggiunta
Route::get("/buildings/{id}",[BuildingController::class, 'building']); -> consente di vedere il dettaglio di un condominio
Route::post("/addbuilding",[BuildingController::class, 'addbuilding']); -> consente di aggiungere un nuovo condominio alla lista
Route::put("/edit/{id}",[BuildingController::class, 'edit']); -> consente di modificare i dettagli e le informazioni della struttura
Route::delete('/delete/{id}', [BuildingController::class,"delete"]); -> consente di eleminare una stuttura

PROGETTO
Una volta avviato il progetto da comando sul terminale e dopo aver cliccato il link si aprirà in localhost la homepage del nostro progetto
Qui saranno elencati tutti i condomini presenti nel database e ordinati per data di aggiunta all lista
In ogni condominio si portanno vedere i dettagli con il pulsante ##dettagli edificio##, eliminare l'edificio con il pulsante ##elimina edificio## e fare delle modifiche con il pulsante ##modifica dettagli edificio## 
Nella header della nostra pagina ci sarà un pulsante ##aggiungi condominio## che manderà ad una opagina che consente di aggiungere un nuovo edificio
