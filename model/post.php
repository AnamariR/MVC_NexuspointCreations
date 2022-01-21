<?php
/*
Klasa Post mora sadržavat sve atribute koji su u bazi,
-> mora pristupiti vrijednosti atributa
-> mora pristupiti funkcijama vezanim uz postavljanje atributa
*/

class Post {

    /*
    atributi iz tablice u bazi:

    DROP TABLE IF EXISTS `post`;
    CREATE TABLE IF NOT EXISTS `post` (
      `postID` int(11) NOT NULL AUTO_INCREMENT,
      `postTitle` varchar(30) NOT NULL,
      `postContent` text NOT NULL,
      `postType` enum('devlog','news') NOT NULL,
      `postDate` timestamp NOT NULL DEFAULT current_timestamp(),
      `postAuthorID` int(11) NOT NULL,
      PRIMARY KEY (`postID`),
      KEY `postAuthorID` (`postAuthorID`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

    */
    private $postID;
    private $postTitle;
    private $postContent;
    private $postType;
    private $postDate;
    private $postAuthorID;

    private $postAuthorName;
    private $postGameID;


    /*
    pristupamo vrijednostima pomoću konstruktora
    */
    public function __construct($postID=false){

        if($postID){
            $c = database::connect();
            $sql = "SELECT * FROM user WHERE postID = $postID LIMIT 1";
            $r = $c->query($sql);
            $row = $r->fetch_assoc();
            /*
            postavljanje vrijednosti
            */
            $this->postID = $row['postID'];
            $this->postTitle= $row['postTitle'];
            $this->postContent= $row['postContent'];
            $this->postType = $row['postType'];
            $this->postDate = $row['postDate'];
            $this->postAuthorID = $row['postAuthorID'];
        }
    }

/*
sve funkcije vezane uz prikaz i postavljanje atributa posta
*/
    public function getPostID(){ return $this->postID; }
    public function getPostTitle(){ return $this->postTitle; }
    public function getPostContent(){ return $this->postContent; }
    public function getPostType(){ return $this->postType; }
    public function getPostDate(){ return $this->postDate; }
    public function getPostAuthorID(){ return $this->postAuthorID; }

    public function getPostAuthorName(){ return $this->postAuthorName; }
    public function getPostGameID(){return $this->postGameID; }



    public function setPostID($postID){ $this->postID = $postID; }
    public function setPostTitle($postTitle){ $this->postTitle = $postTitle; }
    public function setPostContent($postContent){ $this->postContent = $postContent; }
    public function setPostType($postType){ $this->postType = $postType; }
    public function setPostDate($postDate){ $this->postDate = $postDate; }
    public function setPostAuthorID($postAuthorID){ $this->postAuthorID = $postAuthorID; }

    public function setPostAuthorName($postAuthorName){ $this->postAuthorName = $postAuthorName; }
    public function setPostGameID($postGameID){ $this->postGameID = $postGameID; }
}
