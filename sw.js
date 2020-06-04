const CACHE_NAME = "Time_To_Fit";
const urlsToCache = [
    '/TimeToFit/index.php',
    '/TimeToFit/Img/*.*',
    '/TimeToFit/Style/bootstrap.css',
    '/TimeToFit/Style/homePage-style.css',
    '/TimeToFit/Style/feedBack-style.css',
    '/TimeToFit/Style/loadingAnimation.css'
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
                .catch(() => caches.match('/TimeToFit/index.html'))
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