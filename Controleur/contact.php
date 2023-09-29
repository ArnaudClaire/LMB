<?php
  $url = "https://evaluation-technique.lundimatin.biz/api/clients/".$_POST['id']."&fields=nom,tel,mail,adresse,code_postal,ville";

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

// Vérifier s'il y a des erreurs
if ($json_data === false) {
  // Gérer les erreurs si la requête échoue
  die("Erreur cURL : " . curl_error($ch));
}
else{
  // Fermer la session cURL
  curl_close($ch);

  // Convertir le JSON en tableau associatif
  $contact = json_decode($json_data, true);

  if ($contact === null) {
      // Gérer les erreurs si la conversion échoue
      die("Erreur lors de la conversion du JSON.");
  }

  include("Vues/home.php");

  
}


?>
