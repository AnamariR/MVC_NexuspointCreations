<?php
       $postDate= date('Y-m-d');
       $postAuthorID = $_SESSION['userID'];

       echo '<form method="POST" action="?a=adminCreatePost">
           <p>Odaberite za koju igru želite napisati novi post: </p>';

                    echo '<select name="gameSelect">';
                    foreach($game as $gs)
                        echo '<option value="'.$gs->getGameID().'">'. $gs->getGameName() . "</option>";
                    echo '</select>';
      echo '<p>Naslov posta: <br><input type="text" name="postTitle"></p>
      <p>Sadržaj objave: <br><textarea name="postContent" rows="10" cols="50"></textarea></p>
      <p>Vrsta objave:<br>
     <input type="radio" id="devlog" name="postType" value="devlog">
     <label for="male">Devlog post</label><br>
     <input type="radio" id="news" name="postType" value="news">
     <label for="female">News post</label><br>

      <p><input type="submit" value="Objavi post"></p>
  </form>';

  if(isset($_POST['gameSelect'])){
       $postAuthorID = $_SESSION['userID'];
       $postGameID = $_POST['gameSelect'];
       if(isset($_POST['postTitle']) && isset($_POST['postContent']) && isset($_POST['postType']) && isset($_POST['gameSelect']))
      {
           if($pm->createPost($_POST['postTitle'], $_POST['postContent'], $_POST['postType'],$postAuthorID,$postGameID)) {
               echo 'Novi post je objavljen.';
           } else {
               echo ' &#128169; Greška prilikom stvaranja post-a. &#128169; ';
           }
       }
  }

  ?>
