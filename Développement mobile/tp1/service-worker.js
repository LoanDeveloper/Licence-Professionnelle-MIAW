var CACHE_NAME = 'my-cache-v1';
var urlsToCache = [
  '/',
  'css/mini.css',
  'index.html',
  'img/icons/pwa-app-icon-192.png',
  'img/icons/pwa-app-icon-512.png',
  'main.js'
];

self.addEventListener('install', function (event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function (cache) {
      console.log('Opened cache');
      return cache.addAll(urlsToCache);
    })
  );
});

self.addEventListener('activate', function (event) {
  var cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(function (cacheNames) {
      return Promise.all(
        cacheNames.map(function (cacheName) {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

self.addEventListener('fetch', function (event) {
  event.respondWith(
    caches.match(event.request).then(function (response) {
      if (response) {
        return response;
      }

      var fetchRequest = event.request.clone();
      return fetch(fetchRequest).then(function (response) {
        if (!response || response.status !== 200 || response.type !== 'basic') {
          return response;
        }

        var responseToCache = response.clone();
        caches.open(CACHE_NAME).then(function (cache) {
          cache.put(event.request, responseToCache);
        });
        return response;
      });
    })
  );
});

self.addEventListener(’sync’, (event) => {
  if (event.tag === ’syncData’) {
  const request = indexedDB.open(dbName);
  request.onsuccess = (event) => {
    const transaction = event.target.result.transaction("events", "readonly");
    const store = transaction.objectStore("events");
    const getAllRequest = store.getAll();
    getAllRequest.onsuccess = (event) => {
      const data = event.target.result;
      // a rajouter : envoi des données vers le serveur
      // en cas de succès, effacer les enregistrements de indexedDB
      // en cas d’échec, on s’arrete là
    }
  }
  request.onerror = (event) => {
    reject(’Error opening IndexedDB: ’ + event.target.error);
  }
});