<?php

if(isset($_POST['btOrange'])){
    $url = "https://evaluation-technique.lundimatin.biz/api/clients?fields=nom,tel,adresse,code_postal,ville&nom=".$_POST['name'];
}
else{
    $url = "https://evaluation-technique.lundimatin.biz/api/clients?fields=nom,tel,adresse,code_postal,ville";
}


// Configuration de l'en-tête 'Accept'
$headers = [
    'Accept: application/api.rest-v1+json',
];

// Initialiser cURL
$ch = curl_init($url);

// Configurer les options cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // Utilise l'authentification Basic Auth
curl_setopt($ch, CURLOPT_USERPWD, ":".$_SESSION['token']); // Utilisez le nom d'utilisateur et le mot de passe

// Exécuter la requête cURL
$json_data = curl_exec($ch);



    // Fermer la session cURL
    curl_close($ch);
    // Convertir le JSON en tableau associatif
    $contacts = json_decode($json_data, true);
    // if(isset($_POST['name'])){
    //     // Filtrer les données pour ne récupérer que celles avec un nom égal à "name"
    //     $contacts = array_filter($contacts, function ($element) {
    //         return $element['name'] == $_POST['name'];
    //     });
    // }
    $contacts = $contacts['datas'];
    if ($contacts === null) {
        // Gérer les erreurs si la conversion échoue
        
        die("Erreur lors de la conversion du JSON.");
    }
    else{
        // print_r($data);
    }
    



?>
