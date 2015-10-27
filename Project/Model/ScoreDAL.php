<?php
class RegisterDAL
{
    private static $Database = "../Data/Database.bin";
    private $usersFT3 = array(array());
    private $usersFT5 = array(array());
    private $serialized;
    //http://conctus.eu/example/5
    public function AddUserScoreFT3($PlayerXScoreFT3,$PlayerOScoreFT3)
    {
        
        
        array_push($this->usersFT3,$PlayerXScoreFT3,$PlayerOScoreFT3);
        
        $this->serialized = serialize($this->usersFT3);
        
        
        
        file_put_contents(self::$Database, $this->serialized);
        
    }
    
    public function AddUserScoreFT5($PlayerXScoreFT5,$PlayerOScoreFT5)
    {
        
        
        array_push($this->usersFT5,$PlayerXScoreFT5,$PlayerOScoreFT5);
        
        $this->serialized = serialize($this->usersFT5);
        
        
        
        file_put_contents(self::$Database, $this->serialized);
        
    }
    
    public function GetAllUsers()
    {
        //Returnerar platsen där datan sparas unserialized så att man kan lägga till fler användare, man kan också jämföra mot datan som finns i arrayen.
        
        return unserialize(file_get_contents(self::$Database));
        
    }
}