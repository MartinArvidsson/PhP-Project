<?php

class Menuview
{
    private static $Firsttothree ='Menuview::FT3';
    private static $Firsttofive ='Menuview::FT5';
    public function Response()
    {
        //TODO : Hämta värden från model, skicka till GenerateMenu.
        //TODO : Knapparna ska starta games
        //TODO : Status på wins under games FT5/FT3.
        return $this->GenerateMenu();
    }
    
    public function GenerateMenu($PlayerXscore,$PlayerOscore)
    {
        return '
			<form method="post" >
			    <h1>Playerscores overall:</h1>
			    <a>Player X : '.$PlayerXscore.'</a>
			    <a>Player O : '.$PlayerOscore.'</a>
				<fieldset>
					<legend>Choose gamemode, First to 3 or First to 5</legend>
    				<input type="submit" name="' . self::$Firsttothree . '" value="Först till 3" />
					<input type="submit" name="' . self::$Firsttofive . '" value="Först till 5" />
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