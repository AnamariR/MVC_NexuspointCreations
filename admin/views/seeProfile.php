<!-- ispis svih korisničkih podataka  -->

    <?php
    echo '<table>
    <tr>
    <td>Korisnicko ime:</td>
    <td>'.$korID->getUserName().'</td>
    </tr>

    <tr>
    <td>Ime:</td>
    <td>'. $korID->getUserRealName().'</td>
    </tr>

    <tr>
    <td>Prezime:</td>
    <td>'.$korID->getUserSurname().'</td>
    </tr>

    <tr>
    <td>E-mail:</td>
    <td>'.$korID->getUserEmail().'</td>
    </tr>

    <tr>
    <td>Datum rođenja:</td>
    <td>'.$korID->getbirthDate().'</td>
    </tr>

    <tr>
    <td>Tip korisnika:</td>
    <td>'.$korID->getUserType().'</td>
    </tr>

    <tr>
    <td>Spol:</td>
    <td>'.$korID->getUserGender().'</td>
    </tr>
    </table>';
    ?>
