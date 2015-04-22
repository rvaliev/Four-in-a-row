<h1>Four in a row</h1>

<?php
$row = 5;
$col = 6;


$board = array();
for($i = 0; $i <= $row; $i++)
{

    for($j = 0; $j <= $col; $j++)
    {
        $board[$i][$j] = 0;
    }

}


echo "<table style='no-spacing' cellspacing=\"0\">";
foreach ($board as $rows => $cols) {
    echo "<tr>";
    foreach ($cols as $c) {
        if($c == 0)
        {
            echo "<td><a href='index.php?row=$i&col=$j'><img src=\"/images/emptyslot.png\" alt=\"image\"/></a></td>";
        }
        elseif($c == 1)
        {
            echo "<td><a href='index.php?row=$i&col=$j'><img src=\"/images/yellowslot.png\" alt=\"image\"/></a></td>";
        }
        elseif($c == 2)
        {
            echo "<td><a href='index.php?row=$i&col=$j'><img src=\"/images/redslot.png\" alt=\"image\"/></a></td>";
        }

    }
    echo "</tr>";


}
echo "</table>";

/*echo "<table style='no-spacing' cellspacing=\"0\">";
for($i = 0; $i <= $row; $i++)
{
    echo "<tr>";
    for($j = 0; $j <= $col; $j++)
    {
        echo "<td><a href='index.php?row=$i&col=$j'><img src=\"/images/emptyslot.png\" alt=\"image\"/></a></td>";
    }
    echo "</tr>";
}
echo "</table>";*/



