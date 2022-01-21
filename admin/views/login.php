<?php
echo '<div class="form">
<div id="form">
<form method="POST" action="login.php">
   <p>Username: <input type="text" name="userName">
        <br><br>
        Password: <input type="password" name="userPassword"></p>
   <p><input type="submit" value="login"></p>
</form>
</div></div>';

if(isset($_GET['failed_login'])) {
     echo "Pokušajte ponovno.";
}

?>
