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
            return $this->View;
        }        
        
        $this->View->Getaboard();
        return $this->View;
    }
}