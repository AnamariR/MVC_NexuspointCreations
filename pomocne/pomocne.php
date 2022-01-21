<?php
/*
Pomocna klasa za sortiranje koja koristi cookie
->primjer koristenja cookia
*/

class Pomocne {

    // sorting funkcija
    public static function lastSort(){
        if(isset($_GET['kako']) && isset($_GET['smjer'])){
            $kako = $_GET['kako'];
            $smjer = $_GET['smjer'];
        } else if(isset($_COOKIE['kako']) && isset($_COOKIE['smjer'])){
            $kako = $_COOKIE['kako'];
            $smjer = $_COOKIE['smjer'];
        }
        else {
            $kako = 'releaseDate';
            $smjer = 'down';
        }
        return array($kako, $smjer);
    }
    /*
    Funkcija sortiranja
    ->postavlja cookie i overwritea postojeci ako se sort promijeni
    */
    public static function postaviSortiranje($kako, $smjer){
        if(isset($_COOKIE['kako']) && isset($_COOKIE['smjer']) && ($_COOKIE['kako'] != $kako || $_COOKIE['smjer'] != $smjer))
        {
            setcookie('kako', $kako, time()+360000);
            setcookie('smjer', $smjer, time()+360000);
        }
        else
        {
            setcookie('kako', $kako, time()+360000);
            setcookie('smjer', $smjer, time()+360000);
        }
    }
}

?>
