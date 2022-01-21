<?php
    if(isset($_GET['commentID']) ) {
        if($cm->deleteComment($_GET['commentID'])){
            echo 'Komentar je uklonjen.';
        } else {
            echo 'Greška pri brisanju komentara.';
        }
    } else if (isset($_POST['potvrda'])){
        echo '<a>natrag...</a>';
    }
?>
