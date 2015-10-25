<?php
class Menucontroller
{
    public function __construct(Menuview $_View,Menumodel $_Model,Gamecontroller $_GameC)
    {
        $this->View = $_View;
        $this->Model = $_Model;
        $this->GameC = $_GameC;
    }
    
    public function Init()
    {
        //$this->View->Choosegamemode();
        if($this->View->ChoosegamemodeFT3())
        {
            $this->GameC->
        }
        if($this->View->ChoosegamemodeFT5())
        {
            
        }
        return $this->View;
    }
}