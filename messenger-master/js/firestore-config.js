// Initialize Firebase
// var config = {
// 	apiKey: "AIzaSyDQdJLluamjJSzzOqiVm-Bujgd20vPYISk",
// 	authDomain: "my-test-app-91f99.firebaseapp.com",
// 	databaseURL: "https://my-test-app-91f99.firebaseio.com",
// 	projectId: "my-test-app-91f99",
// 	storageBucket: "my-test-app-91f99.appspot.com",
// 	messagingSenderId: "279160965485"
// };

const firebaseConfig = {
	apiKey: "AIzaSyBBJSOHrhZMEZ892W9--FKezlXd2dK78TI",
	authDomain: "reno-5fa7a.firebaseapp.com",
	projectId: "reno-5fa7a",
	storageBucket: "reno-5fa7a.appspot.com",
	messagingSenderId: "435004805563",
	appId: "1:435004805563:web:f98c68246ae3566d31b49e",
	measurementId: "G-SWMEWHHGXN"
};

firebase.initializeApp(config);

// Initialize Cloud Firestore through Firebase
var db = firebase.firestore();

// Disable deprecated features
db.settings({
	timestampsInSnapshots: true
});