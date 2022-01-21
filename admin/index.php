<?php
if(!isset($_GET['a'])) { $a = ''; } else { $a = $_GET['a']; }
   switch ($a) {
      /*
      prijava korisnika u sustv
      */
      case 'prijava'     :
                         $template= 'login';
                         break;
      /*
      registracija korisnika u sustav
      */
      case 'registracija':
                         $template= 'register';
                         break;
   }
 /*
Sučelje na kojem se nalazi
 */
 include_once 'views/index.php';

?>
