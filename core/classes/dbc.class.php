<?php



class Dbc
{
    private $handler;

    public function startConnection()
    {
        try
        {
            /**
             *
             */
            require_once("/config.php");
            $dbName = 'game';
            $dbUser = 'root';
            $dbPassword = '';
            $this->handler = new PDO('mysql:
            host=localhost;
            dbname='.$dbName.';
            charset=utf8',
                $dbUser,
                $dbPassword,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

            $this->handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->handler;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            echo "Problem with DB";
            die();
        }
    }
}
