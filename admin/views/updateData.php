<div>
    <div>
         <form method="POST" action="?a=updateData">
            <p>Korisničko ime :<br> <input type="text" name="userName" value="">
            <input type="submit" value="Izmijeni"></p>
        </form>
        <form method="POST" action="?a=updateData">
            <p>Lozinka :<br> <input type="password" name="userPassword" value="">
            <input type="submit" value="Izmijeni"></p>
        </form>
        <form method="POST" action="?a=updateData">
            <p>Ime :<br> <input type="text" name="userRealName" value="">
            <input type="submit" value="Izmijeni"></p>
        </form>
        <form method="POST" action="?a=updateData">
            <p>Prezime :<br> <input type="text" name="userSurname" value="">
            <input type="submit" value="Izmijeni"></p>
        </form>
        <form method="POST" action="?a=updateData">
            <p>Kontakt e-mail :<br> <input type="text" name="userEmail" value="">
            <input type="submit" value="Izmijeni"></p>
        </form>
        <form method="POST" action="?a=updateData">
            <p>Datum rođenja : <br> <input type="date" name="birhtDate" value="">
            <input type="submit" value="Izmijeni"></p>
        </form>
        <form method="POST" action="?a=updateData">
            <p>Spol :<br>
                 <input type="radio" name="userGender" value="male">male<br>
                 <input type="radio" name="userGender" value="female">female<br>
                 <input type="radio" name="userGender" value="other">other<br>
            <input type="submit" value="Izmijeni"></p>
        </form>
    </div>
</div>
<div>
    <div>
        <?php

        /*Izmjena korisničkog imena */
         if(isset($_POST['userName']) && $_POST['userName'] !== ''){
             if($us->userUpdate($_SESSION['userID'], $_POST['userName'], 'userName') == true){
                 echo 'Ažuriranje korisničkog imena uspješno.';
                 header("Refresh:0");
             } else {
                 echo 'Ažuriranje korisničkog imena neuspješno.';
             }
        } else if (isset($_POST['userName']) && $_POST['userName'] == ''){
             echo 'Novo korisničko ime nije upisano.';
         }

          /*Izmjena korisničke lozinke*/
            if(isset($_POST['userPassword']) && $_POST['userPassword'] !== ''){
                if($us->userUpdate($_SESSION['userID'], md5($_POST['userPassword']), 'userPassword') == true){
                    echo 'Ažuriranje lozinke uspješno.';
                    header("Refresh:0");
                } else {
                    echo 'Ažuriranje lozinke neuspješno.';
                }
            } else if (isset($_POST['userPassword']) && $_POST['userPassword'] == ''){
                echo 'Lozinka nije upisana.';
            }

            /*Izmjena korisničkog maila*/
             if(isset($_POST['userEmail']) && $_POST['userEmail'] !== ''){
                 if($us->userUpdate($_SESSION['userID'], $_POST['userEmail'], 'userEmail') == true){
                     echo 'Ažuriranje e-maila uspješno.';
                     header("Refresh:0");
                 } else {
                     echo 'Ažuriranje e-maila neuspješno.';
                 }
             } else if (isset($_POST['userEmail']) && $_POST['userEmail'] == ''){
                 echo 'E-mail nije upisan.';
             }

             /*Izmjena imena korisnika*/
              if(isset($_POST['userRealName']) && $_POST['userRealName'] !== ''){
                  if($us->userUpdate($_SESSION['userID'], $_POST['userRealName'], 'userRealName') == true){
                      echo 'Ažuriranje imena uspješno.';
                      header("Refresh:0");
                  } else {
                      echo 'Ažuriranje imena neuspješno.';
                  }
             } else if (isset($_POST['userRealName']) && $_POST['userRealName'] == ''){
                  echo 'Ime nije upisano.';
              }

              /*Izmjena prezimena korisnika*/
              if(isset($_POST['userSurname']) && $_POST['userSurname'] !== ''){
                  if($us->userUpdate($_SESSION['userID'], $_POST['userSurname'], 'userSurname') == true){
                      echo 'Ažuriranje prezimena uspješno.';
                      header("Refresh:0");
                  } else {
                      echo 'Ažuriranje prezimena neuspješno.';
                  }
             } else if (isset($_POST['userSurname']) && $_POST['userSurname'] == ''){
                  echo 'Prezime nije upisano.';
              }

              /*Izmjena datuma rođenja korisnika*/
              if(isset($_POST['birthDate']) && $_POST['birthDate'] !== ''){
                  if($us->userUpdate($_SESSION['userID'], $_POST['birthDate'], 'birthDate') == true){
                      echo 'Ažuriranje datuma rođenja uspješno.';
                      header("Refresh:0");
                  } else {
                      echo 'Ažuriranje datuma rođenja neuspješno.';
                  }
             } else if (isset($_POST['birthDate']) && $_POST['birthDate'] == ''){
                  echo 'Datum rođenja nije određen.';
              }

              /*Izmjena spola korisnika*/
              if(isset($_POST['userGender']) && $_POST['userGender'] !== ''){
                  if($us->userUpdate($_SESSION['userID'], $_POST['userGender'], 'userGender') == true){
                      echo 'Ažuriranje spola uspješno.';
                      header("Refresh:0");
                  } else {
                      echo 'Ažuriranje spola neuspješno.';
                  }
             } else if (isset($_POST['userGender']) && $_POST['userGender'] == ''){
                  echo 'Spol nije odabran.';
              }

        ?>
    </div>
</div>
