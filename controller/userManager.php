<?php

class UserManager {

	private $users = array();
	private $user;
	private $c;

	public function __construct(){
		$this->c = database::connect();
	}

     /*
     Dohvati sve korisnike i stavi ih u array
     */
	public function getAllUsers(){
	   $this->users = array();
        $r = $this->c->query("SELECT userID, userName FROM user
                              WHERE userType = '1'");
        while($row = $r->fetch_assoc()){
			$k = new User();
               $k->setUserID($row['userID']);
			$k->setUserName($row['userName']);
            $this->korisnici[] = $k;
        }
		return $this->korisnici;
	}

     /*
     Registracija korisnika, odnosno unos korisničkih podataka u bazu
     */
	public function register($userRealName, $userSurname,$userEmail, $birthDate, $userName, $userPassword, $userGender){
		if($userRealName == '' || $userSurname == '' || $userEmail=='' || $birthDate='' || $userName=='' || $userPassword=='' || $userGender=='')
		{
			return false;
		} else {
			$r = $this->c->query("INSERT INTO user (userRealName, userSurname, userEmail, birthDate, userName, userPassword, userGender) VALUES
               ('$userRealName','$userSurname','$userEmail', '$birthDate', '$userName', '$userPassword', '$userGender')");
			if($r == NULL){
				return false;
			}
			else {
				return true;
			}
		}
	}
     /*
     Prijava korisnika na temelju imena i passworda
     $r je true / false
     */
	public function login($userName, $userPassword){
    	$r = $this->c->query("SELECT userID, userType FROM user WHERE userName='$userName' AND userPassword = '$userPassword' LIMIT 1");
		return $r;
	}

     /*
     Promjena podataka korisnika ( password i email , ostalo ne može mijenjati)
     */
	public function userUpdate($userID, $newData, $whichData){
		if($whichData == 'userPassword'){
			$r = $this->c->query("UPDATE user SET userPassword = '$newData' WHERE user.userID = '$userID'");
		} else if ($whichData == 'userEmail') {
			$r = $this->c->query("UPDATE user SET userEmail = '$newData' WHERE user.userID = '$userID'");
		} else if ($whichData =='userRealName'){
			$r = $this->c->query("UPDATE user SET userRealName = '$newData' WHERE user.userID = '$userID'");
		} else if ($whichData =='userSurname'){
			$r = $this->c->query("UPDATE user SET userSurname = '$newData' WHERE user.userID = '$userID'");
		} else if ($whichData =='birthDate'){
			$r = $this->c->query("UPDATE user SET birthDate = '$newData' WHERE user.userID = '$userID'");
		} else if ($whichData =='userGender'){
			$r = $this->c->query("UPDATE user SET userGender = '$newData' WHERE user.userID = '$userID'");
		} else if ($whichData == 'userName'){
			$r = $this->c->query("UPDATE user SET userName = '$newData' WHERE user.userID = '$userID'");
		}
		return $r;
	}

     /*
     Brisanje korisničkog računa
     $r je true / false
     */
	public function deleteAccount($userID){
		$r = $this->c->query("DELETE FROM user WHERE user.userID = '$userID'");
		return $r;
	}


	/*
     Dohvati autora posta i sve vrijednosti
	*/
	public function getAuthorOfPost($postID){
	    	$r = $this->c->query("SELECT p.*,u.* FROM post p
  		   	LEFT JOIN user u ON (p.postAuthorID = u.userID)
  	    		WHERE p.postID = '$postID'");
	    while($row = $r->fetch_assoc()){
		   $i = new User();
		   $i->setUserID($row['userID']);
		   $i->setUserName($row['userName']);
		   $i->setUserRealName($row['userRealName']);
		   $i->setUserSurname($row['userSurname']);
		   $i->setUserEmail($row['userEmail']);
		   $i->setBirthDate($row['birthDate']);
		   $i->setUserType($row['userType']);
		   $i->setUserGender($row['userGender']);
		   $this->author = $i;
	    }
	    return $this->author;
	}
	/*
	Pregled profila korisnika
	*/
	public function getAllUserData($userID){
		$r = $this->c->query("SELECT * FROM user WHERE userID = '$userID' LIMIT 1");
		while($row = $r->fetch_assoc()){
            $u = new User();
		  $u->setUserID($row['userID']);
		  $u->setUserRealName($row['userRealName']);
		  $u->setUserSurname($row['userSurname']);
		  $u->setUserEmail($row['userEmail']);
		  $u->setBirthDate($row['birthDate']);
		  $u->setUserType($row['userType']);
            $u->setUserName($row['userName']);
		  $u->setUserPassword($row['userPassword']);
		  $u->setUserGender($row['userGender']);
            $this->user = $u;
        }
		return $this->user;
	}

}
?>
