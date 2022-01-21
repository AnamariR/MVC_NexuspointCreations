<?php

require_once('pomocne/database.php');
require_once('pomocne/pomocne.php');

require_once('controller/postManager.php');
require_once('controller/gameManager.php');
require_once('controller/commentManager.php');
require_once('controller/userManager.php');

require_once('model/autentifikacija.php');
require_once('model/comment.php');
require_once('model/game.php');
require_once('model/post.php');
require_once('model/sponsor.php');
require_once('model/user.php');
/*
Spajanje na bazu
*/
$c = database::connect();
/*
Uzimamo managere
*/
$gm = new GameManager;
$pm = new PostManager;
$cm = new commentManager;
$ca = new commentManager;
$us = new userManager;
/*
sortiranje na temelju odabranog sorta
->uzimamo lokaciju za sortiranje unutar igara
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
// $game_template = 'games'; -> nije još implementirano
if(!isset($_GET['a'])) { $a = ''; } else { $a = $_GET['a']; }
 switch ($a) {
      case 'game':
          $game = $gm->getCurrentGame();
          $posts = $pm->getPostsByGame($_GET['ID']);
          $template = 'game';
          break;
     case 'post':
          $post = $pm->getCurrentPost($_GET['ID']);
          $comments = $cm->getCommentsOnPost($_GET['ID']);
          $commentAuthor = $ca->getCommentByAuthor($_GET['ID']);
          $author = $us->getAuthorOfPost($_GET['ID']);
          $template='post';

          break;
    default:
          $games = $gm->getGames();
          $template = 'games';
          break;
 }
/*
Prikazujemo stranicu kroz views/index.php -> SUCELJE
-> M Views C
-> Poanta je da tu nema ništa vezano uz prikaz na ekran, samo dohvaćanje
onda index.php iz viewa radi dalje na temelju ovoga
*/
include_once 'views/index.php';
