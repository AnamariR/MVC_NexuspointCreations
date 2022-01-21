<?php
class CommentManager {

	private $comments = array();
	private $comment;
	private $c;

	public function __construct(){
		$this->c = database::connect();
	}

    /*
    Funkcija stvaranja komentara tako da dohvaćene vrijednosti ubacuje u bazu
    */
    public function createComment($commentContent,$commentAuthorID,$commentPostID){
        $r = $this->c->query("INSERT INTO comment (commentContent,commentAuthorID,commentPostID) VALUES
	    ('$commentContent','$commentAuthorID','$commentPostID')");
        return $r;
    }
    /*
    Funkcija brisanja posta iz baze na temelju odabranog posta
    */
    public function deleteComment($commentID){
        $r = $this->c->query("DELETE FROM comment WHERE comment.commentID = '$commentID'");
        return $r;
    }
    /*
	Dohvati komentare posta
    */
    public function getCommentsOnPost($postID){
        $r = $this->c->query("SELECT * FROM comment WHERE commentPostID = '$postID' ORDER BY commentDate");
        while($row = $r->fetch_assoc()){
            $cm = new Comment();
            $cm->setCommentID($row['commentID']);
            $cm->setCommentContent($row['commentContent']);
		  			$cm->setCommentDate($row['commentDate']);
		  			$cm->setCommentAuthorID($row['commentAuthorID']);
		  			$cm->setCommentPostID($row['commentPostID']);
            $this->comments[] = $cm;
        }
        return $this->comments;
    }

		public function getCommentByAuthor($postID){
			$r = $this->c->query("SELECT c.*,u.userName FROM comment c
			LEFT JOIN user u ON (c.commentAuthorID = u.userID)
				ORDER BY c.commentDate");
				while($row = $r->fetch_assoc()){
					$i = new Comment();
					$i->setCommentID($row['commentID']);
					$i->setCommentDate($row['commentDate']);
					$i->setCommentContent($row['commentContent']);
					$i->setCommentAuthorName($row['userName']);
					$this->comments[] = $i;
				}
				return $this->comments;
		}

		public function getAllCommentData($commentID){
			$r = $this->c->query("SELECT * FROM comment WHERE commentID = '$commentID' LIMIT 1");
			while($row = $r->fetch_assoc()){
				$i = new Comment();
   			  $i->setCommentID($row['commentID']);
   			  $i->setCommentDate($row['commentDate']);
   			  $i->setCommentContent($row['commentContent']);
			  $i->setCommentPostID($row['commentPostID']);
   			  $this->comments= $i;
	        }
			return $this->comments;
		}

}

?>
