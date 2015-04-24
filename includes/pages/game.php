<h1>Four in a row</h1>

<?php

/**
 * Showing the gameboard by retreiving an serialized array from database.
 * Firstly unserilize then manipulate the array.
 */



echo "<table style='no-spacing' cellspacing=\"0\">";
$lastMove =  $gameBoardFromDB->getLastStep();

if (empty($_SESSION['color'])) {
    if ($lastMove == 1) {
        $_SESSION['color'] = 2;
    }
    elseif ($lastMove == 2){
        $_SESSION['color'] = 1;
    }
}

foreach ($_SESSION['board'] as $rows => $cols) {
    echo "<tr>";
    $x = 0;
    foreach ($cols as $c)
    {

        if ($lastMove[0]['lastmove'] == $_SESSION['color']) {
            if($c == 0)
            {
                echo "<td><img src=\"./images/emptyslot.png\" alt=\"image\"/></td>";
            }
            elseif($c == 1)
            {
                echo "<td><img src=\"./images/yellowslot.png\" alt=\"image\"/></td>";
            }
            elseif($c == 2)
            {
                echo "<td><img src=\"./images/redslot.png\" alt=\"image\"/></td>";
            }
        }
        else
        {
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
        }

        $x++;

    }
    echo "</tr>";


}
echo "</table>";

?>

<br>
<a href="index.php?restart=1">Refresh gameboard</a>
<br>
<a href="index.php?restart=1">Restart game</a>


<?php




    echo "<pre>";
    print_r($_SESSION['row']);
    echo "</pre>";



