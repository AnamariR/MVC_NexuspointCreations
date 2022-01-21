<?php
/*
Klasa korisnik mora sadržavat sve atribute koji su u bazi,
-> mora pristupiti vrijednosti atributa
-> mora pristupiti funkcijama vezanim uz postavljanje atributa
*/

class User {

    /*
    atributi iz tablice u bazi:
    CREATE TABLE `user` (
      `userID` int(4) NOT NULL,
      `userRealName` varchar(30) NOT NULL,
      `userSurname` varchar(30) NOT NULL,
      `userEmail` varchar(50) NOT NULL,
      `birthDate` date NOT NULL,
      `userType` enum('admin','visitor') NOT NULL,
      `userName` varchar(30) NOT NULL,
      `userPassword` varchar(100) NOT NULL,
      `userGender` enum('male','female','other') NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    */
    private $userID;
    private $userRealName;
    private $userSurname;
    private $userEmail;
    private $birthDate;
    private $userType;
    private $userName;
    private $userPassword;
    private $userGender;

    /*
    pristupamo vrijednostima pomoću konstruktora
    */
    public function __construct($userID=false){

        if($userID){
            $c = database::connect();
            $sql = "SELECT * FROM user WHERE userID = $userID LIMIT 1";
            $r = $c->query($sql);
            $row = $r->fetch_assoc();
            /*
            postavljanje vrijednosti
            */
            $this->userID = $row['userID'];
            $this->userRealName = $row['userRealName'];
            $this->userSurname = $row['userSurname'];
            $this->userEmail = $row['userEmail'];
            $this->birthDate = $row['birthDate'];
            $this->userType = $row['userType'];
            $this->username = $row['userName'];
            $this->userPassword = $row['userPassword'];
            $this->userGender = $row['userGender'];
        }
    }
/*
sve funkcije vezane uz prikaz i postavljanje atributa korisnika
*/
    public function getUserID(){ return $this->userID; }
    public function getUserRealName(){ return $this->userRealName; }
    public function getUserSurname(){ return $this->userSurname; }
    public function getUserEmail(){ return $this->userEmail; }
    public function getBirthDate(){ return $this->birthDate; }
    public function getUserType(){ return $this->userType; }
    public function getUserName(){ return $this->userName; }
    public function getUserPassword(){ return $this->userPassword; }
    public function getUserGender(){ return  $this->userGender; }

    public function setUserID($userID){ $this->userID = $userID; }
    public function setUserRealName($userRealName){ $this->userRealName = $userRealName; }
    public function setUserSurname($userSurname){ $this->userSurname = $userSurname; }
    public function setUserEmail($userEmail){ $this->userEmail = $userEmail; }
    public function setBirthDate($birthDate){ $this->birthDate = $birthDate; }
    public function setUserType($userType){ $this->userType = $userType; }
    public function setUserName($userName){ $this->userName = $userName; }
    public function setUserPassword($userPassword){ $this->userPassword =$userPassword; }
    public function setUserGender($userGender){ $this->userGender = $userGender; }

}
