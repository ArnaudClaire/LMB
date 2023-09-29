
  <div class="flex flex-col space-x-5 space-y-10 h-screen text-left items-center">

  

    <div class="bg-white w-4/5 border-2">
        <p class="text-lg"><?php echo $contact['fullname']?></p>
    </div>
    <div class="border-2 flex flex-col w-4/5 items-center pr-50">
        <label for="name" >un nom ou une dénomination</label>
        <input type="text" name="name" placeholder="Nom du dénomination">
        <button class="bg-amber-600 w-40">Rechercher</button>
    </div>
    <div>
    <?php 
    if(isset($contact))
    { 
    ?>
        <div class="flex flex-col border-r-8 border-black" style="text-align: right;">
            <p>Pr&eacute;nom et nom</p>  
            <p>T&eacute;l&eacute;phone</p>       
            <p>Email</p>  
            <p>Adresse</p>           
        </div>
        <div class="">
            <p><?php echo $contact['nom']?></p>               
            <p><?php echo $contact['tel']?></p>  
            <p><?php echo $contact['mail']?></p>  
            <p><?php echo $contact['adresse']?></p>  
            <p><?php echo $contact['code_postal']?></p>  
            <p><?php echo $contact['ville']?></p>  
        </div>
    <?php                     
    } 
    ?>
</div>
  </div>
