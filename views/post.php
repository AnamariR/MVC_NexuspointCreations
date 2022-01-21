<!-- ispis posta i komentara na post-->
<?php
  echo '<table id="post">
  <tr>
  <td><h3>'.$post->getPostTitle().'</h3><p> by:'.$author->getUserName().'</p></td>
  <td><p>'.$post->getPostDate().'</p></td>
  </tr>
  <tr>
  <td>'.$post->getPostContent().'</td>
  </tr>
  </table>';

foreach($comments as $com) {
  echo '<div id="comment">
  <hr>
  <table>
  <tr>
  <td>'.$com->getCommentContent().'</td>
  </tr>

  <tr>
  <td><p>'.$com->getCommentDate().'</p></td>
  </tr>
  <tr>
  <td><p>Comment by: '.$com->getCommentAuthorID().'</p></td>
  </tr>

  </table>
  </div>';

} ?>
