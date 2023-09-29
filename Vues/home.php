
  <div class="flex flex-col space-y-10 h-screen text-left items-center ">

  

    <div class="bg-white w-4/5 border-2 case">
        <p class="text-lg">Recherche d'une fiche de contact</p>
    </div>
    <div class="border-2 flex flex-col w-4/5 items-center pr-50 case">
      <form method="post" class="flex flex-col" action="index.php?page=home" enctype="multipart/form-data">
        <label class="bold" for="name">Renseigner un nom ou une dénomination</label>
        <input type="text" name="name" placeholder="Nom du dénomination">
        <input type="button" class="btOrange" name="btOrange" value="Rechercher"></input>
      </form>
    </div>

    <div>
      <?php 
      if(isset($contacts))
      { 
      ?>
          <table>
              <tr>
                <td></td>
                  <td>Nom</td>  
                  <td>Adresse</td>   
                  <td>Ville</td> 
                  <td>T&eacute;l&eacute;phone</td> 
              </tr>
              <?php 
              foreach($contacts as $contact)
              { 
              ?>
                  <tr>    
                    <td></td> 
                      <td><?php echo $contact['nom']; ?></td>
                      <td><?php echo $contact['adresse']; ?></td>
                      <td><?php echo ($contact['code_postal']." - ".$contact['ville']); ?></td>
                      <td><?php echo $contact['tel']; ?></td>
                      <td>
                        <a href="http://localhost:8000/contact=<?php echo $contact['id']; ?>">     
                            <button class="bg-blue-500 rounded-full pr-10 pl-10 flex flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" viewBox="0 0 50 50">
                              <path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path>
                              </svg>
                            <p>Voir</p>
                          </button>
                        </a>
                      </td>
                  </tr>
              <?php                     
              } 
              ?>
          </table>
      <?php 
      }

      else
      {
          echo "<h1>Il n'y a aucun Client.</h1>";
      }
      ?>
    </div>
  </div>
