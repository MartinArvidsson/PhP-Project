<?php
class Gamecontroller
{
    public function __construct(Gameview $_View,Gamemodel $_Model)
    {
        $this->View = $_View;
        $this->Model = $_Model;
    }
    
    public function Init()
    {
        if($this->View->Doesuserwanttomove())
        {
             $board = $this->View->Getaboard();
             $this->View->StartGame();
             $this->Model->ValidateData($board,$this->View->GetMovesMade());
        }
        
        if($this->View->Doesuserwanttoplayagain())
        {
            $this->View->Getaboard();
            header("location:Index.php?Game"); //Fungerar inte :(
            return $this->View;
        }
        
        $this->View->Getaboard();
        return $this->View;
    }
    
    public function StartFT3Game()
    {
        //TODO: Hämta värde ifrån modellen, som specifierar att det är 3 vinster som krävs.
        //TODO: Tala om detta för vyn, 
        $this->Currentgamemode();
        $_SESSION["Currentgamemode"] = "First to three wins is the winner!";
        $this->Init();
    }
    
    public function StartFT5Game()
    {
        
        $this->Currentgamemode();
        $_SESSION["Currentgamemode"] = "First to five wins is the winner!";
        $this->Init();
    }
    
    
    public function Currentgamemode()
    {
        if(!isset($_SESSION["Currentgamemode"]))
        {
            $_SESSION["Currentgamemode"] = "";
        }
        return $_SESSION["Currentgamemode"];
    }
}