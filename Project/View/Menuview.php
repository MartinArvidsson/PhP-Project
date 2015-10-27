<?php

class Menuview
{
    private static $Firsttothree ='Menuview::FT3';
    private static $Firsttofive ='Menuview::FT5';
    private $Scorearray = array();
    
    public function __construct(Menumodel $_model, ScoreDAL $_DAL)
    {
        $this->model = $_model;
        $this->DAL = $_DAL;
    }
    public function Response()
    {
        //TODO : Hämta värden från model, skicka till GenerateMenu.
        //TODO : Knapparna ska starta games
        //TODO : Status på wins under games FT5/FT3.
        $this->Scorearray = $this->DAL->Initialize();
        return $this->GenerateMenu();
    }
    
    public function GenerateMenu()
    {
        return '
			<form method="post" >
			    <a>Playerscores overall in First to 3 games:</a>
			    <br>
			    <a>Player X : '.$this->Scorearray["FT3"]["X"].' </a>
			    <br>
			    <a>Player O : '.$this->Scorearray["FT3"]["O"].'</a>
			    <br>
			    <a>Playerscores overall in First to 5 games:</a>
			    <br>
			    <a>Player X : '.$this->Scorearray["FT5"]["X"].'</a>
			    <br>
			    <a>Player O : '.$this->Scorearray["FT5"]["O"].'</a>
			    
				<fieldset>
					<legend>Choose gamemode, First to 3 or First to 5</legend>
    				<input type="submit" name="' . self::$Firsttothree . '" value="First to 3" />
					<input type="submit" name="' . self::$Firsttofive . '" value="First to 5" />
					
				</fieldset>
			</form>
		';
    }
    
    public function ChoosegamemodeFT3()
    {
        if(isset($_POST[self::$Firsttothree]))
        {
            return true;
        }
    }
    
    public function ChoosegamemodeFT5()
    {
        if(isset($_POST[self::$Firsttofive]))
        {
            return true;
        }
    }
}