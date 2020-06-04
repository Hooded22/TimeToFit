const CACHE_NAME = "Time_To_Fit";
const urlsToCache = [
    '/TimeToFit/index.php',
    '/TimeToFit/Style/homePage-style.css',
    '/TimeToFit/Img/Backgrounds/Pages_Backgrounds/MainContainer.jpg',
    '/TimeToFit/Img/Backgrounds/Pages_Backgrounds/Quotes_1.jpg',
    '/TimeToFit/Img/Backgrounds/Pages_Backgrounds/Quotes_2.jpg',
    '/TimeToFit/Img/Backgrounds/Pages_Backgrounds/Quotes_3.jpg',
]

const self = this;

self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME)
        .then((cache) => {
            console.log("Chache opened");
            return cache.addAll(urlsToCache);
        })
    )
})

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request)
        .then(() => {
            return fetch(event.request)
                .catch(() => caches.match('/TimeToFit/index.php'))
        })
    )
})

self.addEventListener('active', (event) => {
    const cacheWhiteList = [];
    cacheWhiteList.push(CACHE_NAME);

    event.waitUntil(
        caches.keys().then((cacheNames) => Promise.all(
            cacheNames.map((cacheName) => {
                if(!cacheWhiteList.includes(cacheName))
                {
                    return caches.delete(cacheName);
                }
            })
        ))
    )
})