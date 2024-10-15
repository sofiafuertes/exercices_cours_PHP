fetch('http://localhost/php/Exercices_cours_php/php_API/utilisateur.php')
.then(reponse=> {
    return reponse.json();
})
.then(data=>{
    console.log(data);
})
.catch(error => {
    console.error(error);
})



//INSCRIPTION D'UN UTILISATEUR VIA API
//Création de mon objet utilisateur à enregistrer, en respectant la nomenclature des clés
const DATA = {
    name_user : "Uzumaki",
    first_name_user:"Naruto",
    login_user : "naruto@gmail.com",
    mdp_user :"12345"
}
//Création des paramètres de la requête
const INIT = {
    method: "POST",
    mode: "cors",
    body: JSON.stringify(DATA) //Ici j'encode les données envoyés en JSON
};
//Envoie de la requête
fetch('http://localhost/php/Exercices_cours_php/php_API/inscription.php',INIT)
    .then(response => {
        console.log(response);
        return response.json();
    })
    .then(data => {
        console.log(data);
    })
    .catch(error=>{
        console.error(error);
    });


    fetch('http://localhost/php/Exercices_cours_php/php_API/compte.php?id=27')
.then(reponse=> {
    console.log(reponse);
    return reponse.json();
})
.then(data=>{
    console.log(data);
})
.catch(error => {
    console.error(error);
})



const user = {
    old_login: "Laura@gmail.com", 
    name_user: "bubu",             
    first_name_user: "sofia",
    login_user : "Laura@gmail.com" 

};

fetch('http://localhost/php/Exercices_cours_php/php_API/modifier-informations.php', {
    method: 'PUT',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(user) // Convertimos el objeto a JSON
})
.then(response => {
    return response.json();
})
.then(data => {
    console.log(data); // Procesa la respuesta
})
.catch(error => {
    console.error("Erreur:", error);
});

const userData = {
    login_user: "Laura@gmail.com" 
};

fetch('http://localhost/php/Exercices_cours_php/php_API/supprimer.php', {
    method: 'DELETE',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(userData) // Convertimos el objeto a JSON
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok ' + response.statusText);
    }
    return response.json();
})
.then(data => {
    console.log(data); // Procesa la respuesta
})
.catch(error => {
    console.error("Erreur:", error);
});