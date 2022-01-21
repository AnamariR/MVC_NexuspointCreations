<?php
if($a='post') {

echo '<form method="POST" action="?a=createComment&ID='.$post->getPostID().'">
    <p>
        <textarea name="commentContent" rows="10" cols="60"></textarea>
    </p>
    <p><input type="submit" id="publish" name="publish" value="Komentiraj"></p>
</form>';

} else if($a='createComment'){
     $commentDate= date('Y-m-d');
     $commentAuthorID = $_SESSION['userID'];
     $commentPostID = $post->getPostID();
          if(isset($_REQUEST['publish'])){
                  if(isset($_POST['commentContent']) &&  $_POST['commentContent'] !== '')
                  {
                      if($cm->createComment($_POST['commentDate'],$_POST['commentContent'],$_POST['commentAuthorID'],$commentPostID)) {
                          echo 'Stvoren novi komentar.';
                      } else {
                          echo 'Neuspješno stvaranje komentara.';
                      }
                  }
             }
}
?>
