<h1>Four in a row</h1>

<?php
$row = 5;
$col = 6;

/**
 * If game not started yet, create an multidimensional array $board
 * with values = 0, which stands for emptyslot.
 */

/*if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array();
}*/

$board = array();
for($i = 0; $i <= $row; $i++)
{

    for($j = 0; $j <= $col; $j++)
    {
        $board[$i][$j] = 0;
    }

}


/**
 * Showing the gameboard by retreiving an serialized array from database.
 * Firstly unserilize then manipulate the array.
 */

echo "<table style='no-spacing' cellspacing=\"0\">";
foreach ($board as $rows => $cols) {
    echo "<tr>";
    $x = 0;
    foreach ($cols as $c) {
        if($c == 0)
        {
            echo "<td><a href='index.php?page=game&row=$rows&col=$x'><img src=\"./images/emptyslot.png\" alt=\"image\"/></a></td>";
        }
        elseif($c == 1)
        {
            echo "<td><a href='index.php?page=game&row=$rows&col=$c'><img src=\"./images/yellowslot.png\" alt=\"image\"/></a></td>";
        }
        elseif($c == 2)
        {
            echo "<td><a href='index.php?page=game&row=$rows&col=$c''><img src=\"./images/redslot.png\" alt=\"image\"/></a></td>";
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

//$board[5][0] = 2;

if (isset($_GET['col']))
{
    do {
        echo "test";
        $board[$row][$_GET['col']] = 2;
    } while ($board[$row][$_GET['col']] == 0);



}



