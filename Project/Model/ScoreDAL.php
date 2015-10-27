<?php
class ScoreDAL
{
    private static $Database = "../Data/Database.bin";
    private $users = array();
    
    
    public function Initialize()
    {
        $this->users = $this->GetAllUsers();
        if (!isset($this->users["FT3"]))
        {
            $this->users = array(
                "FT3" => array("X" => 0, "O" => 0),
                "FT5" => array("X" => 0, "O" => 0)
            );
        }
        return $this->users;
    }
    
    public function IncreasePlayerXScoreFT3()
    {
        $this->Initialize();
        $this->users["FT3"]["X"]++;
        $this->Save();
    }
    
    public function IncreasePlayerOScoreFT3()
    {
        $this->Initialize();
        $this->users["FT3"]["O"]++;
        $this->Save();
    }
    
    public function IncreasePlayerXScoreFT5()
    {
        $this->Initialize();
        $this->users["FT5"]["X"]++;
        $this->Save();
    }
    
    public function IncreasePlayerOScoreFT5()
    {
        $this->Initialize();
        $this->users["FT5"]["O"]++;
        $this->Save();
    }
    public function GetAllUserScores()
    {
        $this->Initialize();
        return $this->users;
    }
    
    
    private function GetAllUsers()
    {
        if (file_exists(self::$Database))
            return unserialize(file_get_contents(self::$Database));
        else
            return array();
    }
    
    public function Save()
    {
        file_put_contents(self::$Database, serialize($this->users));
    }
}