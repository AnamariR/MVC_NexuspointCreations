<?php

echo '<form method="POST" action="?a=adminCreateGame">
           <p>Ime igre :
               <input type="text" name="gameName">
           </p>
           <p>Datum izlaska/objave igre  :
               <input type="date" name="releaseDate">
           </p>
           <p>Opis igre : <br>
               <textarea name="gameDescription" rows="10" cols="60"></textarea>
           </p>
           <p><input type="submit" value="Stvori"></p>
       </form>';

            if(isset($_POST['gameName']) && isset($_POST['releaseDate']) && isset($_POST['gameDescription']) && $_POST['gameName'] !== '')
            {
                if($gm->createGame($_POST['gameName'], $_POST['releaseDate'], $_POST['gameDescription'])) {
                    echo 'Stvorena nova igra.';
                } else {
                    echo 'Neuspješno stvaranje nove igre.';
                }
            }
        ?>
