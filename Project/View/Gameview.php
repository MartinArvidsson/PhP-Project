<?php

class Gameview
{
    private static $PlayerMove = 'Gameview::Play';
    private $player = "X";
    private $board = array();
    private $gameOver = false;
    private $gameWon  = false;
    private $message = "";
    private $Boxcounter = 0;
    private $TotalMoves = 0;
    private $boarddata = array();
    private $valuetoremove = array();
   
    public function __construct(Gamemodel $_Model)
    {
        $this->gameOver = false;
        $this->gameWon = false;
        $this->Model = $_Model;
    }
    
    public function Getaboard()
    {
        //$this->board = array(); //Återställer spelplanen till 0
        if(sizeof($this->board) == 0)
        {
            for($xlength = 0; $xlength <=2; $xlength++) //Genererar upp en 3x3 spelplan
            {
                for($ylength = 0; $ylength <=2; $ylength++)
                {
                    $this->board[$xlength][$ylength] = null;

                }
            }
        }
        else
        {
            $this->board = $this->Model->getboardfrommodel();
        }
    }

    
    public function startGame()
    {
        $this->Trytomove();
    }

    
    public function response()
    {
        
        return $this->DisplayBoard();
    }
    
    private function DisplayBoard()
    {
        $this->message = $this->Model->getMessage();
        if($this->message == "")
        {
            $text = "
                <div id =\"board\">
                    <form method=\"post\">
                        <table>
            ";
			for ($xlength = 0; $xlength < 3; $xlength++)
			{
			    $text .= "<tr>";
				for ($ylength = 0; $ylength < 3; $ylength++)
				{
				    $this->Boxcounter ++;
					$text .= "<td =\"board_cell\">";
					if($this->board[$xlength][$ylength])
					{
					    //Redan valda rutor,skriv ut matchande bild. wip
					    $text .= "<img src=\"Pictures/{$this->board[$xlength][$ylength]}.png\" alt=\"{$this->board[$xlength][$ylength]}\" title=\"{$this->board[$xlength][$ylength]}\" />";
					}
					else
					{
					    //Annars välj alternativ, Första val tomt, andra val X eller O beronde på spelare.
					    $text .= "
					        <select name= \"{$xlength}-{$ylength}\">
					            <option value=\"\"></option>
					            <option value=\"$this->player\">$this->player</option>
					        </select>
					        ";
					    
					}
					$text .= "</td>";
                }
			}
			$text .="
        			    </table>
            			<div id = \"button\">
                            <input type=\"submit\" name=".self::$PlayerMove." value=\"Play\"/>
                        </div>
                    </form>
                </div>
            ";
			return $text;
        }
        // Om det inte är tom sträng har man antingen vunnit eller spelat lika, det kollas här i else.
        else
        {
            if($this->message !="Oavgjort!" && $this->message != "")
            {
                $this->message ="";
                $this->TotalMoves = 0;
                $text ="<p>Du vann! spela en till match?</p>";
                $text .= "<p><input type =\"Submit\" name =\"newgame\" value=\"Ny Match\"/></p>";
                return $text;

                //Skriv ut att person X/O vann
                
                
            }
            else
            {  
                $this->message ="";
                $this->TotalMoves = 0;
                $text .= "<p><input type =\"Submit\" name =\"newgame\" value=\"Ny Match\"/></p>";
                return $text;
                //Skriv ut att person X/O spelade oavgjort

            }
        }

    }
    
        
    private function Trytomove()
	{
	    $boardtoval = array_unique($this->boarddata); //Tar bort alla dupliceringar, kommer bara finnas kvar 3 element i arrayen, en tom ruta, samt en kryssad ruta samt att man har tryckt knapp.
		var_dump($boardtoval);
		foreach ($boardtoval as $key => $value) //Kollar varje rad
		{
			if ($value == $this->player) //Om ett värde matchar spelarnamnet (en ruta har värdet X på spelare X:s runda)
			{	
				//Uppdatera att spelaren X eller O har markerat den rutan..
				
				$coords = explode("-", $key);
				
				$this->board[$coords[0]][$coords[1]] = $this->player;

				//Byter spelare
				if ($this->player == "X")
					$this->player = "O";
				else
					$this->player = "X";
					
				$this->TotalMoves ++;
			}
		}
	}
	
    public function Doesuserwanttomove()
    {
	    if(isset($_POST[self::$PlayerMove]))
	    {
	        $this->boarddata = $_POST;
	        return true;
	    }
	    return false;
	}
    
    public function Getcurrentboard()
    {
        return $this->board;
    }
    
    public function GetMovesMade()
    {
        return $this->TotalMoves;
    }

}