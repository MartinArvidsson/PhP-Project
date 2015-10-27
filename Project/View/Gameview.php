<?php

class Gameview
{
    private static $PlayerMove = 'Gameview::Play';
    private static $NewGame = 'Gameview::NewGame';
    private static $BacktoStart = 'Gameview::StartMenu';
    private $player = "X";
    private $board;
    private $message;
    private $gameOver = false;
    private $gameWon  = false;
    private $Boxcounter = 0;
    private $TotalMoves = 0;
    private $boarddata = array();
    private $valuetoremove = array();
    private $CurrentGamemode ="";
   
    public function __construct(Gamemodel $_Model)
    {
        $this->gameOver = false;
        $this->gameWon = false;
        $this->Model = $_Model;
    }
    
    public function Getaboard() //Creates a 3X3 board if none exists, otherwhise set it to the value of the session
    {
        if (!isset($_SESSION["board"]))
        {
            $this->board = new stdClass;
            $this->board->board = array();
            for($xlength = 0; $xlength < 3; $xlength++)
            {
                for($ylength = 0; $ylength < 3; $ylength++)
                {
                    $this->board->board[$xlength][$ylength] = null;
                    
                }
            }
            $_SESSION["board"] = $this->board;
            $this->player = "X";
            $_SESSION["player"] = $this->player;
        }
        else
        {
            $this->board = $_SESSION["board"];
            $this->player = $_SESSION["player"];
        }
        
        return $this->board;
    }
    
    public function startGame()
    {
        $this->Trytomove();
    }

    public function response() //What gets shown in layoutview.
    {
        return $this->DisplayBoard();
    }
    
    
    private function DisplayBoard()
    {
        $this->message = $this->Model->getwhowonmessage();
        if($_SESSION["IsgameFT3"] == true) //Check if the player wants to play FT3 or FT5
        {
            $currentXwins = $this->Model->currentXwinsFT3();
            $currentOwins = $this->Model->currentOwinsFT3();
        }
        else
        {
            $currentXwins = $this->Model->currentXwinsFT5();
            $currentOwins = $this->Model->currentOwinsFT5();
        }
        if($this->message == "") // IF the game hasn't been played before or no winner is found, generate the 3x3 board.
        {
            $text = "
                <div id =\"board\">
                <a> Current X wins : $currentXwins</a>
                <br>
                <a> Current O wins : $currentOwins</a>
                    <form method=\"post\">
                        <table>
            ";
			for ($xlength = 0; $xlength < 3; $xlength++)
			{
			    $text .= "<tr>";
				for ($ylength = 0; $ylength < 3; $ylength++)
				{
				    $this->Boxcounter ++;
					$text .= "<td id= \"board_cell\">";
					$board = $this->board->board;
					if($board[$xlength][$ylength])
					{
					    $text .= "<img src=\"../Pictures/{$board[$xlength][$ylength]}.png\" alt=\"{$board[$xlength][$ylength]}\" title=\"{$board[$xlength][$ylength]}\" />";
					}
					else
					{
					    $text .= "
					        <select name= \"{$xlength}-{$ylength}\">
					            <option value=\"\"></option>
					            <option value=\"$this->player\">$this->player</option>
					        </select>
					        ";
					}
					$text .= "</td>";
                }
                $text .= "</tr>";
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
        else
        {
            if($this->Model->CheckforFT3Winner()) //If someone won the entire FT3 series.
            {
                $_SESSION["totalmoves"] = 0;
                $_SESSION["PlayerXwinsFT3"] = 0;
                $_SESSION["PlayerOwinsFT3"] = 0;
                $_SESSION["FT3Winner"] = "";
                $text = "<p>$this->message</p>";
                $text .= "<form method = post><input type=\"submit\" name=". self::$BacktoStart . " value=\"Back to start\"/></form>";
                $this->message ="";
                return $text;   
            }
            if($this->Model->CheckforFT5Winner()) //If someone won the entire FT5 Series
            {
                $_SESSION["totalmoves"] = 0;
                $_SESSION["PlayerXwinsFT5"] = 0;
                $_SESSION["PlayerOwinsFT5"] = 0;
                $_SESSION["FT5Winner"] = "";
                $text = "<p>$this->message</p>";
                $text .= "<form method = post><input type=\"submit\" name=". self::$BacktoStart . " value=\"Back to start\"/></form>";
                $this->message ="";
                return $text;
            }
            if($this->message =="Oavgjort!") //If no winner was found, play again
            {
                $_SESSION["totalmoves"] = 0;
                $this->message ="";
                $text = "<p>No winner, game tied sadly!, Go again</p>";
                $text .= "<form method = post><input type=\"submit\" name=". self::$NewGame . " value=\"Play again\"/></form>";
                return $text;
            }
            else //If a series is underway..
            {
                $_SESSION["FT3Winner"] = "";
                $_SESSION["totalmoves"] = 0;
                $text = "<p>$this->message</p>";
                $text .= "<form method = post><input type=\"submit\" name=". self::$NewGame . " value=\"Play again\"/></form>";
                $this->message ="";
                return $text;
            }
        }

    }
    
        
    private function Trytomove() //Attempts to place a marker on the board, this functionallity could prob. have been placed in the model and not in the view...
	{
	    $boardtoval = array_unique($this->boarddata);
	    
		foreach ($boardtoval as $key => $value)
		{
			if ($value == $this->player)
			{	
				$coords = explode("-", $key);
				$this->board->board[$coords[0]][$coords[1]] = $this->player;
                $this->player = $this->player == "X" ? "O" : "X";
                $_SESSION["player"] = $this->player;
				//IF
				if(!isset($_SESSION["totalmoves"]))
				{
                    $_SESSION["totalmoves"] = 0;
				}
				$_SESSION["totalmoves"] ++;
			}
		}
	}
	//Button functionality.
    public function Doesuserwanttomove()
    {
	    if(isset($_POST[self::$PlayerMove]))
	    {
	        $this->boarddata = $_POST;
	        return true;
	    }
	    else
	    {
	        unset($_SESSION["board"]);
	    }
	    return false;
	}
	
	public function Doesuserwanttoplayagain()
	{
	    if(isset($_POST[self::$NewGame]))
	    {
	        unset($_SESSION["board"]);
            $_SESSION["totalmoves"] = 0;	        
	        return true;
	    }
	    return false;
	}
	
	public function DoesUserwanttostartagain()
	{
	    if(isset($_POST[self::$BacktoStart]))
	    {
	        unset($_SESSION["board"]);
            $_SESSION["totalmoves"] = 0;	        
	        return true;
	    }
	    return false;
	}
    
    public function GetMovesMade()
    {
        return $_SESSION["totalmoves"];
    }

}