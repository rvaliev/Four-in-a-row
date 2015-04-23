<h1>Four in a row</h1>

<?php

/**
 * Showing the gameboard by retreiving an serialized array from database.
 * Firstly unserilize then manipulate the array.
 */

echo "<table style='no-spacing' cellspacing=\"0\">";
foreach ($_SESSION['board'] as $rows => $cols) {
    echo "<tr>";
    $x = 0;
    foreach ($cols as $c) {
        if($c == 0)
        {
            echo "<td><a href='index.php?page=game&row=$rows&col=$x'><img src=\"./images/emptyslot.png\" alt=\"image\"/></a></td>";
        }
        elseif($c == 1)
        {
            echo "<td><a href='index.php?page=game&row=$rows&col=$x'><img src=\"./images/yellowslot.png\" alt=\"image\"/></a></td>";
        }
        elseif($c == 2)
        {
            echo "<td><a href='index.php?page=game&row=$rows&col=$x'><img src=\"./images/redslot.png\" alt=\"image\"/></a></td>";
        }

        $x++;

    }
    echo "</tr>";


}
echo "</table>";

?>

<br>
<a href="#">Refresh gameboard</a>
<br>
<a href="#">Restart game</a>


<?php




    echo "<pre>";
    print_r($_SESSION['row']);
    echo "</pre>";



