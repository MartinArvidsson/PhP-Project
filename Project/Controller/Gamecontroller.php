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
             $this->View->Getaboard();
             $this->View->StartGame();
             $this->Model->ValidateData($this->View->Getcurrentboard(),$this->View->GetMovesMade());
        }
            $this->View->Getaboard();
            return $this->View;
    }
}