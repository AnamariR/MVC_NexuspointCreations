<?php
/*
Klasa Comment mora sadržavat sve atribute koji su u bazi,
-> mora pristupiti vrijednosti atributa
-> mora pristupiti funkcijama vezanim uz postavljanje atributa
*/

class Comment {

    /*
    atributi iz tablice u bazi:

    CREATE TABLE `comment` (
      `commentID` int(11) NOT NULL,
      `commentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
      `commentContent` varchar(250) NOT NULL,
      `commentAuthorID` int(11) NOT NULL,
      `commentPostID` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    */
    private $commentID;
    private $commentDate;
    private $commentContent;
    private $commentAuthorID;
    private $commentPostID;

    private $commentAuthorName;


    /*
    pristupamo vrijednostima pomoću konstruktora
    */
    public function __construct($commentID=false){

        if($commentID){
            $c = database::connect();
            $sql = "SELECT * FROM user WHERE commentID = $commentID LIMIT 1";
            $r = $c->query($sql);
            $row = $r->fetch_assoc();
            /*
            postavljanje vrijednosti
            */
            $this->commentID = $row['commentID'];
            $this->commentDate = $row['commentDate'];
            $this->commentContent = $row['commentContent'];
            $this->commentAuthorID = $rom['commentAuthorID'];
            $this->commentPostID = $row['commentPostID'];
        }
    }

/*
sve funkcije vezane uz prikaz i postavljanje atributa komentara
*/
    public function getCommentID(){ return $this->commentID; }
    public function getCommentDate(){ return $this->commentDate; }
    public function getCommentContent(){ return $this->commentContent; }
    public function getCommentAuthorID(){ return $this->commentAuthorID; }
    public function getCommentPostID(){ return $this->commentPostID; }

    public function getCommentAuthorName(){return $this->commentAuthorName;}

    public function setCommentID($commentID){ $this->commentID = $commentID; }
    public function setCommentDate($commentDate){ $this->commentDate = $commentDate; }
    public function setCommentContent($commentContent){ $this->commentContent = $commentContent; }
    public function setCommentAuthorID($commentAuthorID){ $this->commentAuthorID = $commentAuthorID; }
    public function setCommentPostID($commentPostID){ $this->commentPostID = $commentPostID; }

    public function setCommentAuthorName($commentAuthorName){$this->commentAuthorName = $commentAuthorName;}
}
