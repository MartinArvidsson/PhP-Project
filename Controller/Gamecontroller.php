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

        return $this->View;
    }
}