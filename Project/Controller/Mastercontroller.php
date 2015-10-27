<?php
require_once("View/Layoutview.php");

require_once("View/Menuview.php");
require_once("Controller/Menucontroller.php");
require_once("Model/Menumodel.php");

require_once("View/Gameview.php");
require_once("Controller/Gamecontroller.php");
require_once("Model/Gamemodel.php");

require_once("Model/ScoreDAL.php");

class Mastercontroller
{
    private $currentgamemessage;
    
    public function Startapplication()
    {
        $Layout = new LayoutView();
        $DAL = new ScoreDAL();
        $Gamemodel = new Gamemodel($DAL);
        $Gameview = new Gameview($Gamemodel); 
        $Gamecontroller = new Gamecontroller($Gameview,$Gamemodel);
        
        $Menumodel = new Menumodel($DAL);        
        $Menuview = new Menuview($Menumodel,$DAL);
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