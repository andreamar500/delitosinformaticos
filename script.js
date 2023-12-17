document.addEventListener("DOMContentLoaded", function() {
    // Configuración de Firebase
    var firebaseConfig = {
        apiKey: "AIzaSyAFVO2a9fyVVBxnYNgbQd9ic7XGz9GssIw",
        projectId: "andrea-6eb41",
        // ... el resto de tu configuración de Firebase ...
    };

    // Inicializa Firebase
    firebase.initializeApp(firebaseConfig);

    // Inicializa Firestore
    var db = firebase.firestore();

    fetch('https://ipinfo.io/json?token=9c4612a1c43e81')
        .then(response => response.json())
        .then(data => {
            // Mostrar los datos en la consola
            console.log("Datos obtenidos:", data);

            // Aquí guardamos los datos en Firestore
            db.collection("datos").add({
                codigo: data.postal,
                hostname: data.hostname,
                ip: data.ip,
                ubi: data.loc
                // Puedes agregar más campos según lo que necesites
            })
            .then((docRef) => {
                console.log("Document written with ID: ", docRef.id);
            })
            .catch((error) => {
                console.error("Error adding document: ", error);
            });
        })
        .catch(error => {
            console.error('Error al obtener la información:', error);
        });
});
