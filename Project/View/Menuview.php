<?php

class Menuview
{
    private static $Firsttothree ='Menuview::FT3';
    private static $Firsttofive ='Menuview::FT5';
    public function Response()
    {
        return $this->GenerateMenu();
    }
    
    public function GenerateMenu()
    {
        return '
			<form method="post" >
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