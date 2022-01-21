<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head>
          <meta charset="utf-8">
          <title>Nexuspoint Creations</title>
          <link rel="stylesheet" type="text/css" href="/nexuspoint/css/stylesheet.css">
     </head>
     <body>
       <div id="wrapper">

         <div id="top">
           <ul id="topnav">
           <li><a href="?a=">Početna stranica</a></li>
           <li><a href="views/upute.php">Upute za korištenje web sjedišta</a></li>
           <li><a href="?a=odjava">Odjava</a></li>
           </ul>
         </div>

         <a href="?a="><div id="banner"></div></a>
           <div class="content">
                <?php
                    if($template =='seeProfile'){?>
                      <div id="top">
                      <ul id="topnav">
                        <li><a href="?a=updateData">Promjena korisničkih podataka</a></li>
                        <li><a href="?a=adminCreatePost">Napravi novi post</a></li>
                        <li><a href="?a=adminCreateGame">Napravi novu igru</a></li>
                        <li><a href="?a=deleteAccount">Obriši korisnički račun</a></li>
                      </ul>
                    </div>
                    <?php include("seeProfile.php");
                    }
                    if($template =='updateData'){
                      include("seeProfile.php");
                      include("updateData.php");
                    }
                    if($template =='adminCreatePost'){
                         include("adminCreatePost.php");
                    }
                    if($template =='adminCreateGame'){
                         include("adminCreateGame.php");
                    }
                    if($template =='game'){
                         include("game.php");
                    }
                    if($template =='post'){
                         include("post.php");
                    }
                    if($template =='deleteAccount'){
                         include("deleteAccount.php");
                    }
                    if($template =='createComment'){
                              if(isset($_REQUEST['publish'])){

                                   $commentAuthorID = $_SESSION['userID'];
                                   $commentPostID = $post->getPostID();
                                      if(isset($_POST['commentContent']) &&  $_POST['commentContent'] !== '')
                                      {
                                          if($cm->createComment($_POST['commentContent'],$commentAuthorID,$commentPostID)) {
                                              echo 'Stvoren novi komentar.';?>
                                              <p><a type="button" href="?a=post&ID=<?php echo $post->getPostID()  ?>">Povratak na post</a></p>
                                             <?php
                                          } else {
                                              echo 'Neuspješno stvaranje komentara.';
                                          }
                                      }
                                 }
                    }
                    if($template=='deleteComment'){
                         $commentID = $comment->getCommentID();
                         echo '<p><a type="button" href="?a=post&ID='.$comment->getCommentPostID().'">Povratak na post</a></p>';
                         $cm->deleteComment($commentID);
                         echo " Uspješno izbrisan komentar.";

                    }
                 ?>
               </div>

          <div id="top">
            <ul id="topnav">
              <li><a type="button" href="?a=seeProfile&ID=<?php echo $userProfile->getUserID(); ?>"><?php echo $userProfile->getUserName(); ?></a></li>
            </ul>
          </div>


           <div id="sname">
                <?php if(isset($games)) { ?>
                  <p>
                    <div id="sname">
                        <p>Sortiranje po -
                        <?php if($kako == 'releaseDate') {?>
                          datumu objave igara
                        <?php } else {
                             $kako == 'gameName'?>
                          imenu igara
                        <?php } ?>
                        <?php if($smjer == 'up') { ?>
                          [ uzlazno ]
                        <?php } else { ?>
                          [ silazno ]
                        <?php }?>
                      </p></div>
                      <?php
                        $trenutni_sort = array_fill(0,4,'');
                        switch([$kako, $smjer]) {
                             case ['gameName', 'up']     : $trenutni_sort[0] = 'active'; break;
                             case ['gameName', 'down']   : $trenutni_sort[1] = 'active'; break;
                             case ['releaseDate', 'up']    : $trenutni_sort[2] = 'active'; break;
                             case ['releaseDate', 'down']  : $trenutni_sort[3] = 'active'; break;
                        }
                      ?>
                      <nav id="sort">
                          <ul id="sortnav">
                              <li><a <?php echo $trenutni_sort[0] ?> href="?<?php echo $lokacija?>&kako=gameName&smjer=up">IMENU IGARA &#8593;</a><br></li>
                              <li><a <?php echo $trenutni_sort[1] ?> href="?<?php echo $lokacija?>&kako=gameName&smjer=down">IMENU IGARA &#8595;</a><br></li>
                              <li><a <?php echo $trenutni_sort[2] ?> href="?<?php echo $lokacija?>&kako=releaseDate&smjer=up">DATUMU OBJAVE &#8593;</a><br></li>
                              <li><a <?php echo $trenutni_sort[3] ?> href="?<?php echo $lokacija?>&kako=releaseDate&smjer=down">DATUMU OBJAVE &#8595;</a><br></li>
                          </ul>
                        </nav>
                      <?php unset($trenutni_sort); ?>
                    </div>
                  </p>
                <?php }
                ?>
          <div class="content">
               <?php
               include("$template.php");
               ?>
          </div>
<footer><p>| Dinamičke web aplikacije 2 | Anamari Romih | Mikela Oklen |</p></footer>
       </div>
     </body>
</html>
