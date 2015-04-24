<?php

require_once("core/classes/dbc.class.php");



class Game
{
    private $handler;
    private $sql;
    private $query;
    private $result;
    private $steps;
    private $rows;
    private $lastStep;

    private function connectToDB()
    {
        /**
         * Подключение к БД
         */
        $this->handler = new Dbc();
        $this->handler = $this->handler->startConnection();
    }

    public function getPositions()
    {
        self::connectToDB();
        $this->sql = "SELECT steps FROM gameboard";

        try{
            $this->query = $this->handler->query($this->sql);




            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
            $this->query->closeCursor();
            $this->handler = null;
            return $this->result;
        }
        catch(Exception $e){
            echo "Error: Ошибка с запросом";
            return false;
        }
    }

    public function updateBoard($steps)
    {
        $this->steps = $steps;

        self::connectToDB();
        $this->sql = "UPDATE gameboard SET steps = ?";

        try{
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($this->steps));

            $this->handler = null;
            $this->query->closeCursor();
            return true;

        }
        catch (Exception $e)
        {
            echo "Updating of 1 movie failed";
            return false;
        }
    }

    public function updateRows($rows)
    {
        $this->rows = $rows;
        self::connectToDB();
        $this->sql = "UPDATE gameboard SET rowscount = ?";

        try{
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($this->rows));

            $this->handler = null;
            $this->query->closeCursor();
            return true;

        }
        catch (Exception $e)
        {
            echo "Updating of 1 movie failed";
            return false;
        }
    }

    public function getRows()
    {
        self::connectToDB();
        $this->sql = "SELECT rowscount FROM gameboard";

        try{
            $this->query = $this->handler->query($this->sql);

            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
            $this->query->closeCursor();
            $this->handler = null;
            return $this->result;
        }
        catch(Exception $e){
            echo "Error: Ошибка с запросом";
            return false;
        }
    }

    public function getLastStep()
    {
        self::connectToDB();
        $this->sql = "SELECT lastmove FROM gameboard";

        try{
            $this->query = $this->handler->query($this->sql);

            $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
            $this->query->closeCursor();
            $this->handler = null;
            return $this->result;
        }
        catch(Exception $e){
            echo "Error: Ошибка с запросом";
            return false;
        }
    }

    public function setLastStep($lastStep)
    {
        $this->lastStep = $lastStep;
        self::connectToDB();
        $this->sql = "UPDATE gameboard SET lastmove = ?";

        try{
            $this->query = $this->handler->prepare($this->sql);
            $this->query->execute(array($this->lastStep));

            $this->handler = null;
            $this->query->closeCursor();
            return true;

        }
        catch (Exception $e)
        {
            echo "Updating of 1 movie failed";
            return false;
        }
    }
}