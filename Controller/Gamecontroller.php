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
        $this->View->StartGame();

        if($this->View->Doesuserwanttomove() == true)
        {
            $this->View->MakeaMove();
            //Om man trycker gör move ,, gör TryMove i view, sen Checkforwinner i model.  TODO
            $this->Model->Checkforwinner($this->View->Getcurrentboard,$this->View->GetMovesMade);
        }
        else
        {
            return $this->View;
        }
    }
}