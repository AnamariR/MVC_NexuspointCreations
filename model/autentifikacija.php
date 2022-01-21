<?php

class Autentifikacija {

    private $c;
    public function __construct(){
        $this->c = new database();
    }
    /*
    Vlastita funkcija odjave korisnika
    */
    public static function logout() {
        session_start();
        unset($_SESSION['login']);
        unset($_SESSION['userType']);
        unset($_SESSION['userID']);
        session_destroy();
        header("Location: ../index.php");
    }
    /*
    Prijava korisnika
    */
    public function login($userType) {

        $userName = $_POST['userName'];
        $userPassword = md5($_POST['userPassword']);

        $sql = "SELECT * FROM user WHERE userName='$userName' AND userPassword = '$userPassword' LIMIT 1";
        $r = $this->c->query($sql);

        /*
        Otvaramo session za korisnika
         -> s obzirom na vrstu korisnika šalje ga se na određenu stranicu
         -> default šalje na index.php gdje je prijava
         -> također ako nije zadovoljen uvjet index.php
        */
        if ($r && $r->num_rows == 1) {
            session_start();
            $row = $r->fetch_assoc();
            $_SESSION['login'] = $userName;
            $_SESSION['tip'] = $row['vk_tip'];

            switch ($row['userType']) {
               case 'admin':  header("Location: admin.php"); break;
      		case 'visitor':  header("Location: visitor.php"); break;
      		default: header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }

    }

}

?>
