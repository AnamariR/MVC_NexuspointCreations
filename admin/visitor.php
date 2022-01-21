<?php
/*
- nexuspoint/admin/admin.php
pokrećemo sesiju
*/
session_start();

require_once('../pomocne/database.php');
require_once('../pomocne/pomocne.php');
/* Priključeni modeli */
require_once('../model/autentifikacija.php');
require_once('../model/comment.php');
require_once('../model/game.php');
require_once('../model/user.php');
require_once('../model/sponsor.php');
require_once('../model/post.php');
/* Priključeni controleri */
require_once('../controller/commentManager.php');
require_once('../controller/postManager.php');
require_once('../controller/userManager.php');
require_once('../controller/gameManager.php');

if(isset($_GET['a']) && $_GET['a'] == 'odjava') {
    Autentifikacija::logout();
}


$c = database::connect();
$us = new userManager;
$pm = new postManager;
$cm = new commentManager;
$gm = new gameManager;

$user = new User($_SESSION['userID']);

/*
Koristimo funkciju loggedIn iz klase Korisnik da vidimo ako je
sve uredu oko logina
*/

/*
Provjeravamo ako je već postavljena neka akcija , ako ne ide default
-> Gledaj Swithc!
*/
if (isset($_GET['a']) && isset($_GET['ID']))
{
   $lokacija = 'a='.$_GET['a'].'&ID='.$_GET['ID'].'';
}
else
{
   $lokacija = '';
}
/*
Odlučuje o vrsti sortiranja
-> koristenje cookia
*/
list($kako, $smjer) = Pomocne::lastSort();
Pomocne::postaviSortiranje($kako, $smjer);

if(!isset($_GET['a'])) {
     $a = '';
} else {
     $a = $_GET['a'];
}

switch($a){
     case 'seeProfile':
          $template = 'seeProfile';
          if($_SESSION['userID'] !== $_GET['ID']){
             $template = 'pregled';
          } else {
             $template = 'seeProfile';
             $korID = $us->getAllUserData($_SESSION['userID']);
          }
          break;
     case 'updateData':
          $template = 'updateData';
          $korID = $us->getAllUserData($_SESSION['userID']);
          break;
     case 'deleteAccount':
          $template = 'deleteAccount';
          break;
     case 'createComment':
          $template = 'createComment';
          $post = $pm->getCurrentPost($_GET['ID']);
          break;
     case 'deleteComment':
          $template = 'deleteComment';
          $comment = $cm->getAllCommentData($_GET['ID']);
          break;
     case 'game':
          $game = $gm->getCurrentGame();
          $posts = $pm->getPostsByGame($_GET['ID']);
          $template = 'game';
          break;
     case 'post':
          $post = $pm->getCurrentPost($_GET['ID']);
          $comments = $cm->getCommentsOnPost($_GET['ID']);
          $author = $us->getAuthorOfPost($_GET['ID']);
          $template='post';
          break;
     default:
          $template = 'games';
          $games = $gm->getGames();
          $userProfile = $us->getAllUserData($_SESSION['userID']);
          break;
}

include_once 'views/visitorIndex.php';

 ?>
