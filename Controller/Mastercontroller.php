<?php
require_once("View/Layoutview.php");

require_once("View/Menuview.php.php");
require_once("Controller/Menucontroller.php");
require_once("Model/Menumodel.php");

require_once("View/Gameview.php");
require_once("Controller/Gamecontroller.php");
require_once("Model/Gamemodel.php");

class Mastercontroller
{
    public function Startapplication()
    {
        $Layout = new LayoutView();

        $Menumodel = new Menumodel();        
        $Menuview = new Menuview();
        $Menucontroller = new Menucontroller($Menuview);
        
        $Gamemodel = new Gamemodel();
        $Gameview = new Gameview($Gamemodel);
        $Gamecontroller = new Gamecontroller($Gameview,$Gamemodel);
        
        // if(isset($_GET["Game"]))
        // {
             $this->v = $Gamecontroller->Init();
        // }
        // else
        // {
        //     $this->v = $Menucontroller->Init();
        // }
        $Layout->render($this-v);
    }
}