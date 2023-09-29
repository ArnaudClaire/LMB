<?php


if(isset($_POST["btConnecter"]))
{

    if($_POST["mdp"] != null || $_POST["login"] != null)
    {            
        // Données à envoyer au format JSON
        $data = [
            "username" => $_POST['login'],
            "password" => $_POST['mdp'],
            "password_type" => 0,
            "code_application" => "webservice_externe",
            "code_version" => "1"
        ];

        // Encodez les données JSON en une chaîne
        $jsonData = json_encode($data);

        // Encodez la chaîne JSON pour qu'elle puisse être utilisée dans l'URL
        $encodedData = urlencode($jsonData);

        // URL de l'API que vous souhaitez appeler en GET
        $apiUrl = 'https://evaluation-technique.lundimatin.biz/api/auth?data='.$encodedData;

        // Créez une ressource cURL
        $ch = curl_init($apiUrl);

        // Définissez les options cURL pour une requête POST
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true); // Utilise la méthode POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Ajoutez les données JSON au corps de la requête

        // Définissez l'en-tête Content-Type pour indiquer que vous envoyez des données JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ]);

        // Exécutez la requête
        $response = curl_exec($ch);

        // Obtenez le code de réponse HTTP
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Fermez la ressource cURL
        curl_close($ch);

        $datas = json_decode($response, true);
        // Vérifiez si la réponse est 200 OK
        if ($httpCode === 200 && $datas !== false) {
            
            $_SESSION['token'] = $datas['datas']['token'];
            include("Controleur/home.php");
            include("Vues/home.php");
            exit();
        } 
        else 
        {
            echo "<script>alert(\"Identifiant ou mot de passe incorrect !\")</script>";
            include("Vues/connexion.php");
        }        
    }
}
else{
    include("Vues/connexion.php");
}
?>

