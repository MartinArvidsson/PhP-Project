<?php
require_once("View/Layoutview.php");

require_once("View/Menuview.php");
require_once("Controller/Menucontroller.php");
require_once("Model/Menumodel.php");

require_once("View/Gameview.php");
require_once("Controller/Gamecontroller.php");
require_once("Model/Gamemodel.php");

class Mastercontroller
{
    private $currentgamemessage;
    
    public function Startapplication()
    {
        $Layout = new LayoutView();
        
        $Gamemodel = new Gamemodel();
        $Gameview = new Gameview($Gamemodel); 
        $Gamecontroller = new Gamecontroller($Gameview,$Gamemodel);
        
        $Menumodel = new Menumodel();        
        $Menuview = new Menuview($Menumodel);
        $Menucontroller = new Menucontroller($Menuview,$Menumodel,$Gamecontroller);
        
        
        if(isset($_GET["Game"]))
        {
            $v = $Gamecontroller->Init();
            $this->currentgamemessage = $Gamecontroller->Currentgamemode();
        }
        else
        {
            $v = $Menucontroller->Init();
        }
        $Layout->render($v,$this->currentgamemessage);
    }
}