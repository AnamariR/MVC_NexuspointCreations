<?php
/*
login.php je file koji provjerava unos korisnika
-> jesu li podatci točni i nalazi li se taj korisnik u bazi
-> ukoliko ne vraća ga na formu za prijavu
-> ako da prosljeđuje ga na sljedeći file s obzirom na to
radi li se o aminu ili visitoru
*/


/*
Spajanje na bazu i pristup podacima
putem kojih se korisnik spojio
*/
require_once('../pomocne/database.php');
require_once('../controller/userManager.php');
$c = database::connect();
$user = new userManager;

$userName = $_POST['userName'];
$userPassword = md5($_POST['userPassword']);

$c->query($upit);

$r = $user->login($userName,$userPassword);
/*
Provjeravamo ako postoji korisnik u bazi
-> obavezno pokrenuti session kako bismo pratili sesiju korisnika
dok koristi sjedište
*/
if($r && $r->num_rows==1)
{
	session_start();
	$row = $r->fetch_assoc();
	$_SESSION['login']=$userName;
	$_SESSION['userType']= $row['userType'];
     $_SESSION['userID']=$row['userID'];
     var_dump($_SESSION['userType']);

	switch($row['userType'])
	{
		case 'admin':  header("Location: admin.php"); break;
		case 'visitor':  header("Location: visitor.php"); break;
		default: header("Location: index.php");
	}
}
else
{
	header("Location: index.php?a=prijava&failed_login=yes");
}

?>
