<?php
/*
Klasa Game mora sadržavat sve atribute koji su u bazi,
-> mora pristupiti vrijednosti atributa
-> mora pristupiti funkcijama vezanim uz postavljanje atributa
*/

class Game {

    /*
    atributi iz tablice u bazi:

    CREATE TABLE `game` (
      `gameID` int(11) NOT NULL,
      `gameName` varchar(30) NOT NULL,
      `releaseDate` timestamp NOT NULL DEFAULT current_timestamp(),
      `gameDescription` text NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    */
    private $gameID;
    private $gameName;
    private $releaseDate;
    private $gameDescription;

    /*
    pristupamo vrijednostima pomoću konstruktora
    */
    public function __construct($gameID=false){

        if($gameID){
            $c = database::connect();
            $sql = "SELECT * FROM user WHERE gameID = $gameID LIMIT 1";
            $r = $c->query($sql);
            $row = $r->fetch_assoc();
            /*
            postavljanje vrijednosti
            */
            $this->gameID = $row['gameID'];
            $this->gameName = $row['gameName'];
            $this->releaseDate = $row['releaseDate'];
            $this->gameDescription = $row['gameDescription'];
        }
    }

/*
sve funkcije vezane uz prikaz i postavljanje atributa igre
*/
    public function getGameID(){ return $this->gameID; }
    public function getGameName(){ return $this->gameName; }
    public function getReleaseDate(){ return $this->releaseDate; }
    public function getGameDescription(){ return $this->gameDescription; }

    public function setGameID($gameID){ $this->gameID = $gameID; }
    public function setGameName($gameName){ $this->gameName = $gameName; }
    public function setReleaseDate($releaseDate){ $this->releaseDate = $releaseDate; }
    public function setGameDescription($gameDescription){ $this->gameDescription = $gameDescription; }

}
