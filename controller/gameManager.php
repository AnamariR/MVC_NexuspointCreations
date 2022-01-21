<?php
class GameManager {

	private $games = array();
	private $game;
	private $c;

	public function __construct(){
		$this->c = database::connect();
	}
	/*
     Prikaz igara
     */
    public function getGames(){
	 /*
    	Sort games na temelju imena ili datuma / uzlazno ili silazno
    	*/
    	list($kako, $smjer) = Pomocne::lastSort();
         switch ($kako)
         {
		    /*
		    Biramo sort na temelju imena ili datuma objave
		    */
             case 'releaseDate': $orderby = 'releaseDate'; break;
             case 'gameName': $orderby = 'gameName'; break;     }
         switch ($smjer)
         {
		   /*
		   Biramo oćemo li ascending ili descending
		   */
             case 'up': $orderdirection = 'DESC'; break;
             case 'down': $orderdirection = 'ASC'; break;
         }
        $r = $this->c->query("SELECT * FROM game ORDER BY $orderby $orderdirection");
        while($row = $r->fetch_assoc()){
            $g = new Game();
            $g->setGameID($row['gameID']);
            $g->setGameName($row['gameName']);
            $g->setReleaseDate($row['releaseDate']);
            $g->setGameDescription($row['gameDescription']);
            $this->games[] = $g;
        }
        return $this->games;
    }

	/*
     Dobavi igru
     */
	public function getCurrentGame(){
		$gameID = $_GET['ID'];
		$r = $this->c->query("SELECT gameName,releaseDate,gameDescription FROM game WHERE gameID = '$gameID' LIMIT 1");
		while($row = $r->fetch_assoc()){
            $g = new Game();
            $g->setGameName($row['gameName']);
		  $g->setReleaseDate($row['releaseDate']);
		  $g->setGameDescription($row['gameDescription']);
            $this->game = $g;
        }
		return $this->game;
    }
    /*
    Napravi igru
    */
    public function createGame($gameName, $releaseDate, $gameDescription){
        $r = $this->c->query("INSERT INTO game (gameName, releaseDate, gameDescription) VALUES ('$gameName', '$releaseDate', '$gameDescription')");
        return $r;
    }

    /*
    Izbriši igru
    */
    public function deleteGame($gameID){
        $r = $this->c->query("DELETE FROM game WHERE game.gameID = '$gameID'");
        return $r;
    }

}

?>
