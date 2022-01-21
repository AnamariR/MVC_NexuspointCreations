<!DOCTYPE html>
<html lang="en" dir="ltr">
     <head>
          <meta charset="utf-8">
          <title>Nexuspoint Creations</title>
          <link rel="stylesheet" type="text/css" href="/nexuspoint/css/stylesheet.css">
     </head>
     <body>
       <div id="wrapper">
       <div id="top">
         <ul id="topnav">
           <li><a href="views/upute.php">Upute za korištenje web sjedišta</a></li>
           <li><a type="button" href="admin/index.php?a=prijava">Prijava</a></li>
           <li><a type="button" href="admin/index.php?a=registracija">Registracija</a></li>
         </ul>
      </div>

      <a href="index.php"><div id="banner">
      </div></a>


      <?php if(isset($games)) { ?>
          <?php
              $trenutni_sort = array_fill(0,4,'');
              switch([$kako, $smjer]) {
                    case ['gameName', 'up']     : $trenutni_sort[0] = ' active'; break;
                    case ['gameName', 'down']   : $trenutni_sort[1] = ' active'; break;
                    case ['releaseDate', 'up']    : $trenutni_sort[2] = ' active'; break;
                    case ['releaseDate', 'down']  : $trenutni_sort[3] = ' active'; break;
              }
      ?>
      <div id="sname">
        <p>
              Sortiranje po -
              <?php if($kako == 'releaseDate') {?>
              datumu objave igara
              <?php } else {
                  $kako == 'gameName'?>
              imenu igara
              <?php } ?>
              <?php if($smjer == 'up') { ?>
              [ uzlazno ]
              <?php } else { ?>
              [ silazno ]
              <?php }?>
          </p>
      </div>
            <nav id="sort">
                <ul id="sortnav">
                    <li><a <?php echo $trenutni_sort[0] ?> href="?<?php echo $lokacija?>&kako=gameName&smjer=up">IMENU IGARA &#8593;</a><br></li>
                    <li><a <?php echo $trenutni_sort[1] ?> href="?<?php echo $lokacija?>&kako=gameName&smjer=down">IMENU IGARA &#8595;</a><br></li>
                    <li><a <?php echo $trenutni_sort[2] ?> href="?<?php echo $lokacija?>&kako=releaseDate&smjer=up">DATUMU OBJAVE &#8593;</a><br></li>
                    <li><a <?php echo $trenutni_sort[3] ?> href="?<?php echo $lokacija?>&kako=releaseDate&smjer=down">DATUMU OBJAVE &#8595;</a><br></li>
                </ul>
              </nav>
<?php unset($trenutni_sort); ?>
<?php } ?>


           <div class="content">
             <?php include ("views/$template.php") ?>
           </div>

          <footer>
            <p>| Dinamičke web aplikacije 2 | Anamari Romih | Mikela Oklen |</p>
          </footer>
        </div>
     </body>
</html>
