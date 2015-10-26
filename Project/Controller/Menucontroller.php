<?php
class Menucontroller
{
    // private $FT3Message = "First to Three!";
    // private $FT5Message = "First to five!";
    
    public function __construct(Menuview $_View,Menumodel $_Model,Gamecontroller $_GameC)
    {
        $this->View = $_View;
        $this->Model = $_Model;
        $this->GameC = $_GameC;
    }
    
    public function Init()
    {
        if($this->View->ChoosegamemodeFT3())
        {
            header("location:Index.php?Game");
            $this->GameC->StartFT3Game();
        }
        
        if($this->View->ChoosegamemodeFT5())
        {
            header("location:Index.php?Game");
            $this->GameC->StartFT5Game();
        }
        return $this->View;
    }
}