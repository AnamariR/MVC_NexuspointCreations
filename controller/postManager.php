<?php
class PostManager {

	private $posts = array();
	private $post;
	private $c;

	public function __construct(){
		$this->c = database::connect();
	}
	/*
     Prikaz postova
     */
    public function getPosts(){
        $r = $this->c->query("SELECT * FROM post ORDER BY postDate");
        while($row = $r->fetch_assoc()){
            $ps = new Post();
            $ps->setPostID($row['postID']);
            $ps->setPostTitle($row['postTitle']);
		  $ps->setPostAuthorID($row['postAuthorID']);
            $this->posts[] = $ps;
        }
        return $this->posts;
    }
	/*
	Postovi kategorije
	*/
    public function getPostsByGame($gameID){
	   $this->posts = array();
        $r = $this->c->query("SELECT p.*,u.userName FROM post p
		   	LEFT JOIN user u ON (p.postAuthorID = u.userID)
	    		WHERE p.postGameID = '$gameID' ORDER BY p.postDate");
        while($row = $r->fetch_assoc()){
            $i = new Post();
            $i->setPostID($row['postID']);
            $i->setPostTitle($row['postTitle']);
		  $i->setPostAuthorName($row['userName']);
            $this->posts[] = $i;
        }
        return $this->posts;
    }
     /*
     Dohvati 1 post
     */
	public function getPost(){
		$postID = $_GET['postID'];
		$r = $this->c->query("SELECT postTitle FROM post WHERE postID = $postID LIMIT 1");
		while($row = $r->fetch_assoc()){
            $i = new Post();
            $i->setPostTitle($row['postTitle']);
            $this->post = $i;
        }
		return $this->post;
    }
    /*
    Funkcija stvaranja posta
    */
    public function createPost($postTitle, $postContent, $postType,$postAuthorID,$postGameID){
        $r = $this->c->query("INSERT INTO post (postTitle, postContent, postType,postAuthorID,postGameID) VALUES ('$postTitle', '$postContent', '$postType','$postAuthorID','$postGameID')");
        return $r;
    }
    /*
    Funkcija brisanja posta
    */
    public function deletePost($postID){
        $r = $this->c->query("DELETE FROM post WHERE post.postID = '$postID'");
        return $r;
    }
    /*
	Funkcija dohvaćanja post-a
    */
    public function getCurrentPost($postID){
	    $r = $this->c->query("SELECT * FROM post WHERE postID = '$postID' LIMIT 1");
	    while($row = $r->fetch_assoc()){
		 $nesto = new Post();
		 $nesto->setPostID($row['postID']);
		 $nesto->setPostTitle($row['postTitle']);
		 $nesto->setPostContent($row['postContent']);
		 $nesto->setPostType($row['postType']);
		 $nesto->setPostDate($row['postDate']);
		 $nesto->setPostAuthorID($row['postAuthorID']);
		 $nesto->setPostGameID($row['postGameID']);
		 $this->post = $nesto;
	  }
	    return $this->post;
   }


}

?>
