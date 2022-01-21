
        <?php if(!isset($_POST['potvrda'])) { ?>
            <form method="POST" action="?a=adminDeleteGame">
                <p>Igra :
                    <select name="gameID">
                    <?php foreach($game as $g) { ?>
                        <?php if (isset($_POST['gameID']) && $_POST['gameID'] == $gm->getGameID()) { ?>
                            <option value="<?php echo $gm->getGameID();?>" selected><?php echo $gm->getGameName();?></option>
                        <?php } else { ?>
                            <option value="<?php echo $gm->getGameID();?>"><?php echo $gm->getGameName();?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                </p>
                <input type="submit" value="Izbriši"></p>
            </form>
        <?php } ?>

        <?php if(isset($_POST['gameID'])){ ?>
            <form method="POST" action="?a=adminDeleteGame&gameID=<?php echo $_POST['gameID'] ?>">
                <p>Želite li izbrisati ovu igru?<br>
                    DA <input type="radio" name="potvrda" value="yes">
                    NE <input type="radio" name="potvrda" value="no">
                </p>
                <input type="submit" value="Potvrdi"></p>
            </form>
        <?php } ?>

<?php
    if(isset($_GET['gameID']) && isset($_POST['potvrda']) && $_POST['potvrda'] == 'yes') {
        if($gm->deleteGame($_GET['gameID'])){
            echo 'Igra je uspješno izbrisan.';
        } else {
            echo 'Greška pri brisanju igre.';
        }
    } else if (isset($_POST['potvrda'])){
        echo '<a>natrag...</a>';
    }
?>
