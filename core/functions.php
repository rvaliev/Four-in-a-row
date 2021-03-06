<?php

/**
 * Define rows and columns in the game
 */
$row = 5;
$col = 6;

/**
 * Creating new object $gameBoardFromDB
 * and retrieving the serialized positions from DB
 * and retrieving the serialized used rows from DB
 */
$gameBoardFromDB = new Game();
$gamePositions = $gameBoardFromDB->getPositions();
$gameRows = $gameBoardFromDB->getRows();

/**
 * Start of the game.
 * Checking if there's something in $gamePositions[0]['steps'] (if game was initiated)
 *If not, then initiate $_SESSION['board'] and $_SESSION['row']
 * And filling initiated data from sessions to DB
 */
if(empty($gamePositions[0]['steps']))
{
    $_SESSION['board'] = array();
    $_SESSION['row'] = array();
    for($i = 0; $i <= $row; $i++)
    {
        for($j = 0; $j <= $col; $j++)
        {
            $_SESSION['board'][$i][$j] = 0;
            $_SESSION['row'][$j] = $row;
        }

    }
    $gameBoardFromDB->updateBoard(serialize($_SESSION['board']));
    $gameBoardFromDB->updateRows(serialize($_SESSION['row']));
}
 /**
  * If game has already been initiated, load the table data an the steps data from the DB
  * Assign that data to the sessions (renew session with fresh data)
 */
else
{
    $_SESSION['board'] = unserialize($gamePositions[0]['steps']);
    $_SESSION['row'] = unserialize($gameRows[0]['rowscount']);
}





/**
 * Player has clicked on the coins.
 * Look if column has place to add extra coin.
 * After a coin added to empty cell, substract 1 from the available rows
 * Update DB with the last new data from sessions.
 */
if (isset($_GET['col']))
{
    if ($_SESSION['row'][$_GET['col']] >= 0) {
        $_SESSION['board'][$_SESSION['row'][$_GET['col']]][$_GET['col']] = $_SESSION['color'];

        if ($_SESSION['row'][$_GET['col']] != 0) {
            $_SESSION['row'][$_GET['col']]--;
        }
        $gameBoardFromDB->updateBoard(serialize($_SESSION['board']));
        $gameBoardFromDB->updateRows(serialize($_SESSION['row']));

        $gameBoardFromDB->setLastStep($_SESSION['color']);
    }
    header("Location: index.php?page=game");
}




/**
 * Restarting the game
 */
if (isset($_GET['restart']) && $_GET['restart'] == 1)
{
    $boardRestart = 0;
    $rowsRestart = 0;
    $gameBoardFromDB->updateBoard($boardRestart);
    $gameBoardFromDB->updateRows($rowsRestart);
    $gameBoardFromDB->setLastStep(0);

    /**
     * Remove choosen color from session
     */
    $_SESSION = array();
    unset($_COOKIE[session_name()]);
    session_destroy();

    header("Location: index.php");
}




/**
 * Assigning the color
 */
if (isset($_GET['color']))
{
    if ($_GET['color'] == "yellow")
    {
        $_SESSION['color'] = 1;
    }
    elseif ($_GET['color'] == "red")
    {
        $_SESSION['color'] = 2;
    }

    header("Location: index.php?page=game");
}

