<div class="formReg"><div id="form">
<form method="POST" action="registracija.php">
    <p>
        Name : <input type="text" name="userRealName">
        <br><br>
        Surname : <input type="text" name="userSurname">
        <br><br>
        Contact e-mail : <input type="text" name="userEmail">
        <br><br>
        Birth date : <input type="date" name="birthDate">
        <br><br>
        Gender:<br>
        <input type="radio" id="male" name="userGender" value="male"><label for="male">Male</label><br>
        <input type="radio" id="female" name="userGender" value="female"><label for="female">Female</label><br>
        <input type="radio" id="other" name="userGender" value="other"><label for="other">Other</label>
        <br><br>
        Username : <input type="text" name="userName">
        <br><br>
        Password : <input type="password" name="userPassword">
        <br><br>
    </p>
    <p><input type="submit" value="Registracija"></p>
</form>
</div></div>
<?php
if(isset($_GET['failed_registracija'])) {
  echo "Pokušajte se ponovno registrirati.";
}

?>
