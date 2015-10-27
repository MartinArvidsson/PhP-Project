<?php
class RegisterDAL
{
    private static $Database = "../Data/Database.bin";
    private $users = array(array());
    
    public function AddUserScoreFT3($PlayerXScoreFT3,$PlayerOScoreFT3,$PlayerXScoreFT5,$PlayerOScoreFT5)
    {
        $this->users = self::GetAllUsers();
        
        if($this->users == false)
        {
            $this->users = array(array());
        }
        
        array_push($this->users,$PlayerXScoreFT3,$PlayerOScoreFT3,$PlayerXScoreFT5,$PlayerOScoreFT5);
        
        $serialized = serialize($this->users);
        
        file_put_contents(self::$Database, $this->serialized);
    }
    
    public function GetAllUsers()
    {
        return unserialize(file_get_contents(self::$Database));
    }
}