<?php

     echo '<table class="gameTable">
     <tr>
       <th rowspan ="6" width="150px"><img  src="/nexuspoint/images/gameLogo.png"/>
       <td colspan = "2"><h3>' . $game->getGameName() . '</h3></td>
     </tr>
     <tr>
       <td>'.$game->getGameDescription().'</td>
     </tr>
     </table>';

if(!empty($posts) ){
foreach($posts as $ps) {
    echo '<div id="post">
    <table>
    <tr>
    <td><b>'.$ps->getPostTitle().'</b> by: '.$ps->getPostAuthorName().'</td>
    <td><a href="?a=post&ID='. $ps->getPostID().'"><p>See more</p></a></td>
    </tr>
    </table>
    </div>';
 }
}
else{echo "<br>Ova igra nema postova";}
 ?>
