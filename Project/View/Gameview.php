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
    
    public function Getaboard()
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

    public function response()
    {
        return $this->DisplayBoard();
    }
    
    
    private function DisplayBoard()
    {
        $this->message = $this->Model->getwhowonmessage();
        //Kolla om det är FT5 eller FT3
        if($_SESSION["IsgameFT3"] == true)
        {
            $currentXwins = $this->Model->currentXwinsFT3();
            $currentOwins = $this->Model->currentOwinsFT3();
        }
        else
        {
            $currentXwins = $this->Model->currentXwinsFT5();
            $currentOwins = $this->Model->currentOwinsFT5();
        }
        if($this->message == "")
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
					$text .= "<td =\"board_cell\">";
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

            // if($_SESSION["FT3Winner"] != "")
            if($this->Model->CheckforFT3Winner())
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
            // if($_SESSION["FT5Winner"] != "")
            if($this->Model->CheckforFT5Winner())
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
            if($this->message =="Oavgjort!")
            {
                $_SESSION["totalmoves"] = 0;
                $this->message ="";
                $text = "<p>No winner, game tied sadly!, Go again</p>";
                $text .= "<form method = post><input type=\"submit\" name=". self::$NewGame . " value=\"Play again\"/></form>";
                return $text;
            }
            else
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
    
        
    private function Trytomove()
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