
        <?php if(!isset($_POST['potvrda'])) { ?>
            <form method="POST" action="?a=adminDeletePost">
                <p>Post :
                    <select name="postID">
                    <?php foreach($post as $p) { ?>
                        <?php if (isset($_POST['postID']) && $_POST['postID'] == $i->getPostID()) { ?>
                            <option value="<?php echo $ps->getPostID();?>" selected><?php echo $ps->getPostName();?></option>
                        <?php } else { ?>
                            <option value="<?php echo $ps->getPostID();?>"><?php echo $ps->getPostName();?></option>
                        <?php } ?>
                    <?php } ?>
                    </select>
                </p>
                <input type="submit" value="Izbriši"></p>
            </form>
        <?php } ?>

        <?php if(isset($_POST['postID'])){ ?>
            <form method="POST" action="?a=adminDeletePost&postID=<?php echo $_POST['postID'] ?>">
                <p>Želite li ukloniti ovaj post?<br>
                    DA <input type="radio" name="potvrda" value="yes">
                    NE <input type="radio" name="potvrda" value="no">
                </p>
                <input type="submit" value="Potvrdi"></p>
            </form>
        <?php } ?>

<?php
    if(isset($_GET['postID']) && isset($_POST['potvrda']) && $_POST['potvrda'] == 'yes') {
        if($ps->deletePost($_GET['postID'])){
            echo 'Post je izbrisan.';
        } else {
            echo 'Greška pri brisanju post-a.';
        }
    } else if (isset($_POST['potvrda'])){
        echo '<a>natrag...</a>';
    }
?>
