
        <?php if(!isset($_POST['potvrda'])) { ?>
            <form method="POST" action="?a=adminDeleteUser">
                <p>Korisnici :
                    <select name="userID">
                    <?php foreach($users as $user) { ?>
                        <?php if (isset($_POST['userID']) && $_POST['userID'] == $korisnik->getUserID()) { ?>
                            <option value="<?php echo $user->getUserID();?>" selected><?php echo $user->getUserName();?></option>
                        <?php } else { ?>
                            <option value="<?php echo $user->getUserID();?>"><?php echo $user->getUserName();?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                </p>
                <input type="submit" value="Izbrisi"></p>
            </form>
        <?php } ?>

        <?php if(isset($_POST['userID'])){ ?>
            <form method="POST" action="?a=adminDeleteUser&userID=<?php echo $_POST['userID'] ?>">
                <p>Jeste li sigurni da želite ukloniti korisnika iz baze?<br>
                    DA <input type="radio" name="potvrda" value="yes">
                    NE <input type="radio" name="potvrda" value="no">
                </p>
                <input type="submit" value="Potvrdi"></p>
            </form>
        <?php } ?>

<?php
    if(isset($_GET['userID']) && isset($_POST['potvrda']) && $_POST['potvrda'] == 'yes') {
        if($us->deleteAccount($_GET['userID'])){
            echo 'Korisnički račun izbrisan.';
        } else {
            echo 'Greška pri brisanju korisničkog računa.';
        }
    } else if (isset($_POST['potvrda'])){
        echo '<a> natrag... </a>';
    }
?>
