 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="css/style.css">
 </head>

 <body>
     <?php
        require_once('header.php');
        ?>

     <main>

         <div class="gameToevoegen">
             <h1>Game toevoegen</h1>

             <form class="toevoegForm" method="post">

                 <div class="Form-Group">
                     <label for="naam">Naam game *</label>
                     <input type="text" id="naam" name="naam" required>
                 </div>

                 <div class="Form-Group">
                     <label for="afbeelding">Afbeelding *</label>
                     <input type="file" id="afbeelding" name="afbeelding" accept="image/*" required>
                 </div>

                 <div class="Form-Group">
                     <label for="platform">Platform *</label>
                     <select id="platform" name="platform" required>
                         <option value="" disabled selected>Selecteer platform</option>
                         <option value="PC">PC</option>
                         <option value="PlayStation">PlayStation</option>
                         <option value="Xbox">Xbox</option>
                         <option value="Nintendo Switch">Nintendo Switch</option>
                         <option value="Mobiel">Mobiel</option>
                     </select>
                 </div>

                 <div class="Form-Group">
                     <label for="genre">Genre *</label>
                     <select id="genre" name="genre" required>
                         <option value="" disabled selected>Selecteer genre</option>
                         <option value="Actie">Actie</option>
                         <option value="Avontuur">Avontuur</option>
                         <option value="RPG">RPG</option>
                         <option value="Shooter">Shooter</option>
                         <option value="Platformer">Platformer</option>
                         <option value="Simulatie">Simulatie</option>
                         <option value="Strategie">Strategie</option>
                         <option value="Sport">Sport</option>
                         <option value="Race">Race</option>
                         <option value="Puzzel">Puzzel</option>
                     </select>
                 </div>

                 <div class="Form-Group">
                     <label for="releasejaar">Releasejaar *</label>
                     <input type="number" id="releasejaar" name="releasejaar" min="1950" max="2100" required>
                 </div>

                 <div class="Form-Group">
                     <label for="status">Status *</label>
                     <select id="status" name="status" required>
                         <option value="" disabled selected>Selecteer status</option>
                         <option value="Wishlist">Wishlist</option>
                         <option value="In bezit">In bezit</option>
                         <option value="Speelt nu">Speelt nu</option>
                         <option value="Uitgespeeld">Uitgespeeld</option>
                     </select>
                 </div>

                 <div class="Form-Group">
                     <label for="beoordeling">Beoordeling (1-10) *</label>
                     <input type="number" id="beoordeling" name="beoordeling" min="1" max="10" required>
                 </div>

                 <hr>

                 <div class="Form-Knoppen">
                     <button type="submit" class="opslaanKnop">Opslaan</button>
                     <a href="index.php" class="annulerenKnop">Annuleren</a>
                 </div>

             </form>
         </div>

     </main>

     <?php
        require_once('footer.php');
        ?>

 </body>


 </html>