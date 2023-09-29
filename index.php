<?php
session_start();

//On récupère l'URL de la page pour ensuite affecter class="active" au lien de la nav
    $page = $_SERVER['REQUEST_URI'];
    //$page = str_replace("/PROJET_SITE/SITE_FRONT_OFFICE/", "",$page);
    $page = str_replace("/", "",$page);
?>

<!DOCTYPE html>
<html lang="fr">
    <div id="container">
        <head>
            <meta charset="UTF-8"/>
            <title>LMB</title>
            <link rel="shortcut icon" href="..\Documents\Images\png-clipart-book-icon-opened-books-angle-text.png"/>
            <link rel="stylesheet" href="Style/style.css"/>        
        </head>

        <body>
            <?php
                if($page!="connexion")
                {
                    include("Vues/header.php");
                }

                if(!isset($_GET['page']))
                {
                    include("Vues/Connexion.php");
                }
                else
                {
                    $page=$_GET["page"];  

                    // if($page == 'deconnecter')
                    // {
                    //     echo "<script>alert(\"Le compte ".utf8_encode($_SESSION['login'])." a bien été déconnecté ! À bientôt !\")</script>";
                    //     $_SESSION = array();
                    //     session_destroy(); 
                    //     echo '<script language="Javascript"> document.location.replace("index.php"); </script>';
                    // }

                    if(file_exists("Vues/".$page.".php")||file_exists("Controleur/".$page.".php"))
                    {   
                        ?>
                            <div id="page">
                        <?php
                        if(file_exists("Controleur/".$page.".php"))
                        {
                            include("Controleur/".$page.".php");   
                        }

                        else
                        {
                            include("Vues/".$page.".php");
                        }
                        ?>
                            </div>
                        <?php
                    }

                    else
                    {
                        include("Vues/Include/error.inc.php");            
                    }    
                }
            ?>               
        </body>     

    </div>
</html>

