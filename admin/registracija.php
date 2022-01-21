<?php

require_once('../pomocne/database.php');
require_once('../controller/userManager.php');
$c = database::connect();
$um = new UserManager;


$userRealName = $_POST['userRealName'];
$userSurname = $_POST['userSurname'];
$userEmail = $_POST['userEmail'];
$birthDate = $_POST['birthDate'];
$userType = $_POST['birthDate'];
$userName = $_POST['userName'];
$userPassword = md5($_POST['userPassword']);
$userGender = $_POST['userGender'];

$uspjehRegistracije = $um->register($userRealName, $userSurname,$userEmail, $birthDate, $userName, $userPassword, $userGender);
var_dump($uspjehRegistracije);

// ako je registracija uspjesna
if($uspjehRegistracije)
{
    $r = $um->login($userName, $userPassword);

	if($r && $r->num_rows==1)
    {
        session_start();
        $row = $r->fetch_assoc();
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['userName'] = $row['userName'];
        $_SESSION['userType']= $row['userType'];

        switch($row['userType'])
        {
            case 'admin':  header("Location: admin.php"); break;
            case 'visitor':  header("Location: visitor.php"); break;
            default: header("Location: index.php?a=prijava");
        }
    }
    else
    {
        header("Location: index.php?a=prijava&failed_login=yes");
    }

}
else
{
	header("Location: index.php?a=registracija&failed_registracija=yes");
}

?>
