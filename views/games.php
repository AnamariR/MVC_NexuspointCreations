<!-- ispis svih igara -->
<?php
$content = '';
foreach($games as $gs) {
              echo '<div id="block"><a href="?a=game&ID='.$gs->getGameID() .'"><table class="gameTable">
              <tr>
                <th rowspan ="6" width="150px"><img  src="/nexuspoint/images/gameLogo.png"/>
                <td colspan = "2"><h3>' . $gs->getGameName() . '</h3></td>
              </tr>
              <tr>
                <td>'.$gs->getGameDescription().'</td>
              </tr>
              </table></a></div>';
      }
?>
