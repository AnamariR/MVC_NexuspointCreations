<form method="POST" action="?a=deleteAccount">
            <p>Jeste li sigurni : <br>
                <p>
                    <input type="submit" name="confirm" value="yes">
                    <input type="submit" name="confirm" value="no" checked>
                </p>
            </p>
        </form>
        <?php
            if(isset($_POST['confirm']) && $_POST['confirm'] == 'yes'){
                if($us->deleteAccount($_SESSION['userID'])){
                    echo 'Račun uspješno izbrisan.';
                    echo '<a href="?a=odjava">Odjava</a>';
                } else {
                    echo 'Greška pri brisanju računa.';
                }
            }
            if(isset($_POST['confirm']) && $_POST['confirm'] == 'no'){
                 header("Location:admin.php");
                }
        ?>
