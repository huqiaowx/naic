const CACHE_NAME = 'skibidibike-cache-v1';
const urlsToCache = [
  '/',
  '/index.html',
  '/login.html',
  '/styles.css',
  '/images/hero-bg.jpg',
  '/icons/icon-192x192.png',
  '/icons/icon-512x512.png'
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => cache.addAll(urlsToCache))
  );
});

self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request)
      .then((response) => response || fetch(event.request))
  );
});