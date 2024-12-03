function jours() {
    // Récupération des valeurs des dates depuis les éléments du formulaire
    var startDate = document.getElementById('sdate').value;
    var endDate = document.getElementById('edate').value;

    // Conversion des dates en objets Date de JavaScript
    var start = new Date(startDate);
    var end = new Date(endDate);

    // Calcul de la différence en millisecondes
    var diff = end - start;

    // Conversion de la différence en jours
    var diffDays = diff / (1000 * 60 * 60 * 24);

    // Affichage du résultat
    document.getElementById('result-value').innerText = Math.round(diffDays) + ' jours';
}

const dbName = "myDB";
const dbVersion = 1;
const dbPromise = indexedDB.open(dbName, dbVersion);
dbPromise.onupgradeneeded = function (event) {
    var db = event.target.result;
    var store = db.createObjectStore("events", { keyPath: "id" });
    store.createIndex("senderName", "senderName", { unique: false });
    store.createIndex("eventDate", "eventDate", { unique: false });
};
function addRecordToDB() {
    var date = new Date();
    var transaction = dbPromise.result.transaction("events", "readwrite");
    var store = transaction.objectStore("events");
    // Creation d’un enregistrement
    var record = {
        id: date.toISOString(), // ID unique (chaine de caractère) représentant date
        senderName: "THOMY", // A remplacer par votre nom
        eventDate: document.getElementById("edate").value // XXXX étant l’id du deuxieme selecteur de date
    };
    var request = store.add(record); // Ajout de l’enregistrement
    request.onsuccess = function () { console.log("Record added to IndexedDB"); };
    getRecordFromDB(record)
    request.onerror = function () { console.error("Error adding record to IndexedDB:", error); };
}

function getRecordFromDB(record) {
    var transaction = dbPromise.result.transaction("events", "readwrite");
    var store = transaction.objectStore("events");
    var readRequest = store.get(record.id); // lecture de l’enregistrement, en fournissant l’id
    readRequest.onsuccess = function () {
        var readRecord = readRequest.result;
        fetch("https://bbessere.lpmiaw.univ-lr.fr/TPBase/getdata.php", {
            method: "POST",
            mode: "no-cors",
            headers: { "Content-Type": "text/plain" },
            body: JSON.stringify(record)
        }).then(function (res) {
            console.log("OK sending data", res);

        })
            .catch(function (err) {
                console.log("Error while sending data", err);
            });
    };
}