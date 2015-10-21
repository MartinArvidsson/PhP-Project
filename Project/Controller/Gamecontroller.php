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
            $this->View->StartGame();
            //$this->Model->Checkforwinner($this->View->Getcurrentboard,$this->View->GetMovesMade);
        }
        else
        {
            return $this->View;
        }
    }
}