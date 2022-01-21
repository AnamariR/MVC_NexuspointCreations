<?php
// klasa prijave na bazu podataka nexuspoint
class database {

    const host = 'localhost';
    const user = 'root';
    const pass = '';
    const db = 'nexuspoint'; //baza se zove nexuspoint.sql

    //funkcija spajanja na bazu
    public static function connect() {
        $c = new mysqli(self::host, self::user, self::pass, self::db);
        return $c;
    }

}

?>
