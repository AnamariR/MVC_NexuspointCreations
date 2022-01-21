<?php
$postID = $post->getPostID();
  echo '<table id="post">
  <tr>
  <td><h3>'.$post->getPostTitle().'</h3><p> by:'.$author->getUserName().'</p></td>
  <td><p>'.$post->getPostDate().'</p></td>
  </tr>
  <tr>
  <td>'.$post->getPostContent().'</td>
  </tr>
  </table>';

  include("createComment.php");

 foreach($comments as $com) {

                     echo '
                     <div id="comment"><hr>
                     <a href="?a=post&ID='.$com->getCommentID().'"></a><table>
                     <tr>
                     <td></td>
                     </tr>

                     <tr>
                     <td>'.$com->getCommentContent().'</td>
                     </tr>

                     <tr>
                     <td><p>'.$com->getCommentAuthorID().'</p></td>
                     </tr>

                     <tr>
                     <td><p>'.$com->getCommentDate().'</p></td>
                     </tr></table></div>';
                     if($com->getCommentAuthorID()==$_SESSION['userID']){
                       echo '<div id="comdel"><a style="color: #339989; text-decoration: none;" href="?a=deleteComment&ID='.$com->getCommentID().'">Izbriši komentar</a></div>';
                     }

                         }?>
