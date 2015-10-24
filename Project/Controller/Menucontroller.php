<?php
class Menucontroller
{
    public function __construct(Menuview $_View,Menumodel $_Model)
    {
        $this->View = $_View;
        $this->Model = $_Model;
    }
    
    public function Init()
    {
        //$this->View->Choosegamemode();
        if($this->View->ChoosegamemodeFT3())
        {
            
        }
        if($this->View->ChoosegamemodeFT5())
        {
            
        }
        return $this->View;
    }
}