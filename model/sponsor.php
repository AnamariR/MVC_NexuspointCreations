<?php
/*
Klasa Sponsor mora sadržavat sve atribute koji su u bazi,
-> mora pristupiti vrijednosti atributa
-> mora pristupiti funkcijama vezanim uz postavljanje atributa
*/

class Sponsor {

    /*
    atributi iz tablice u bazi:

    CREATE TABLE `sponsor` (
      `sponsorID` int(11) NOT NULL,
      `sponsorName` varchar(30) NOT NULL,
      `sponsorEmail` varchar(50) NOT NULL,
      `sponsorNumber` varchar(15) DEFAULT NULL,
      `sponsorLogo` blob DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    */
    private $sponsorID;
    private $sponsorName;
    private $sponsorEmail;
    private $sponsorNumber;
    private $sponsorLogo;

    /*
    pristupamo vrijednostima pomoću konstruktora
    */
    public function __construct($sponsorID=false){

        if($sponsorID){
            $c = database::connect();
            $sql = "SELECT * FROM user WHERE sponsorID = $sponsorID LIMIT 1";
            $r = $c->query($sql);
            $row = $r->fetch_assoc();
            /*
            postavljanje vrijednosti
            */

            $this->sponsorID = $row['sponsorID'];
            $this->sponsorName = $row['sponsorName'];
            $this->sponsorEmail = $row['sponsorEmail'];
            $this->sponsorNumber = $row['sponsorNumber'];
            $this->sponsorLogo = $row['sponsorLogo'];
        }
    }

     /*
     sve funkcije vezane uz prikaz i postavljanje atributa sponzora
     */
    public function getSponsorID(){ return $this->sponsorID; }
    public function getSponsorName(){ return $this->sponsorName; }
    public function getSponsorEmail(){ return $this->sponsorEmail; }
    public function getSponsorNumber(){ return $this->sponsorNumber; }
    public function getSponsorLogo(){ return $this->sponsorLogo; }

    public function setSponsorID($sponsorID){ $this->sponsorID = $sponsorID; }
    public function setSponsorName($sponsorName){ $this->sponsorName = $sponsorName; }
    public function setSponsorEmail($sponsorEmail){ $this->sponsorEmail = $sponsorEmail; }
    public function setSponsorNumber($sponsorNumber){ $this->sponsorNumber = $sponsorNumber; }
    public function setSponsorLogo($sponsorLogo){ $this->sponsorLogo = $sponsorLogo; }

}
