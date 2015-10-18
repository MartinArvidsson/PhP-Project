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
        $this->View->Choosegamemode();
        
        return $this->View;
    }
}