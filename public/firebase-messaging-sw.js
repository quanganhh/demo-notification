/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/6.3.4/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/6.3.4/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyAZD1OD5JAwOwwwPoLUQYdjo5Z_l7qau8M",
    authDomain: "web-push-notification-80a0b.firebaseapp.com",
    databaseURL: "https://web-push-notification-80a0b.firebaseio.com",
    projectId: "web-push-notification-80a0b",
    storageBucket: "web-push-notification-80a0b.appspot.com",
    messagingSenderId: "1068793579431",
    appId: "1:1068793579431:web:bb4a2132019cca6f8f5882"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
        body: 'Background Message body.',
        icon: '/firebase-logo.png'
    };

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});
