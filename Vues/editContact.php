<div>

</div>

<form method="post" action="index.php?page=edit-Contact" enctype="multipart/form-data">
        <h1>Edition</h1>
            <div class="flex flex-col border-r-8 border-black" style="text-align: right;">
                  <p>Pr&eacute;nom et nom</p>  
                  <p>T&eacute;l&eacute;phone</p>       
                  <p>Email</p>  
                  <p>Adresse</p>           
            </div>

            <div>
                <input name="fullName" type="text" placeholder="<?php echo $contact['nom']?>">                
                <input name="Tel" type="text" placeholder="<?php echo $contact['tel']?>">  
                <input name="mail" type="email" placeholder="<?php echo $contact['mail']?>" >  
                <input name="adress" type="text" placeholder="<?php echo $contact['adresse']?>" >    
                <input name="ZIP" type="text" placeholder="<?php echo $contact['code_postal']?>">
                <input name="city" type="text" placeholder="<?php echo $contact['ville']?>">        
            </div>
        </table>
        <br>
        <input type="hidden" name="idFig" value="<?php echo $lacontact[0]->idFig; ?>">
        <input name="validerModification" type="submit" value="Modifier">
        <a href="index.php?page=edit-contact"><input type="button" value="Enregistrer"></a>
    </form>
