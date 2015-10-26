<?php
class GameModel
{
    private $gamemessage ="";
    private $board;
    private $boardtoreturn;
    private $totalMoves;
    
    public function ValidateData($_board,$_totalMoves)
    {
        $this->board = $_board;
        $this->totalMoves = $_totalMoves;
        $this->boardtoreturn = new stdClass;
        $this->boardtoreturn->winner = null;
        $this->boardtoreturn->boardtoreturn = array(array(),array(),array());
        $this->boardtoreturn = $_board;
        
        $this->Checkforwinner($this->board,$this->totalMoves);
    }

    private function Checkforwinner($board,$totalMoves)
	{
		$board = $this->board->board;
		if($this->totalMoves >= 9)
		$this->gamemessage ="Oavgjort";
		//Översta raden
		if ($board[0][0] && $board[0][0] == $board[0][1] && $board[0][1] == $board[0][2])
			$this->boardtoreturn->winner = $board[0][0];
			
			
		//Andra raden
		if ($board[1][0] && $board[1][0] == $board[1][1] && $board[1][1] == $board[1][2])
			$this->boardtoreturn->winner = $board[1][0];
			
			
		//tredje raden
		if ($board[2][0] && $board[2][0] == $board[2][1] && $board[2][1] == $board[2][2])
			$this->boardtoreturn->winner = $board[2][0];
			
			
		//första kolumnen
		if ($board[0][0] && $board[0][0] == $board[1][0] && $board[1][0] == $board[2][0])
			$this->boardtoreturn->winner = $board[0][0];
			
			
		//andra kolumnen
		if ($board[0][1] && $board[0][1] == $board[1][1] && $board[1][1] == $board[2][1])
			$this->boardtoreturn->winner = $board[0][1];
			
			
		//Tredje kolumnen
		if ($board[0][2] && $board[0][2] == $board[1][2] && $board[1][2] == $board[2][2])
			$this->boardtoreturn->winner = $board[0][2];
			
			
		//Diagonalt 
		if ($board[0][0] && $board[0][0] == $board[1][1] && $board[1][1] == $board[2][2])
			$this->boardtoreturn->winner = $board[0][0];
			
			
		//Diagonalt
		if ($board[0][2] && $board[0][2] == $board[1][1] && $board[1][1] == $board[2][0])
			$this->boardtoreturn->winner = $board[0][2];
			

	}
	
	
	public function getwhowonmessage()
	{
		if(isset($this->boardtoreturn->winner) && $this->boardtoreturn->winner != null)
		{
			$Winner = $this->boardtoreturn->winner;
			$this->gamemessage = "Player \"$Winner\" you won this round";
			if($_SESSION["IsgameFT3"] == true)
			{
				if($Winner == "X")
				{
					$_SESSION["PlayerXwinsFT3"] ++;
						
					if(!isset($_SESSION["FT3Winner"]))
					{
						$_SESSION["FT3Winner"] = "";
					}
						if($_SESSION["PlayerXwinsFT3"] == 3)
						{
							//Spelare X vann FT3
							$_SESSION["FT3Winner"] = $Winner;
							$this->gamemessage = "Player \"$Winner\" you won the game!";
						}
					return $this->gamemessage;
				}
				else
				{
					$_SESSION["PlayerOwinsFT3"] ++;
					if(!isset($_SESSION["FT3Winner"]))
					{
						$_SESSION["FT3Winner"] = "";
					}					
						if($_SESSION["PlayerOwinsFT3"] == 3)
						{
							//Spelare O vann FT3
	
							$_SESSION["FT3Winner"] = $Winner;
							$this->gamemessage = "Player \"$Winner\" you won the game!";
						}
					return $this->gamemessage;
				}
			}
			else
			{
				if($Winner == "X")
				{
					$_SESSION["PlayerXwinsFT5"] ++;
					$this->gamemessage = "Player \"$Winner\" you won this round";
					if(!isset($_SESSION["FT5Winner"]))
					{
						$_SESSION["FT5Winner"] = "";
					}					
					if($_SESSION["PlayerXwinsFT5"] == 5)
					{

						//Spelare X vann FT5
						$_SESSION["FT5Winner"] = $Winner;
						$this->gamemessage = "Player \"$Winner\" you won the game!";
					}
					return $this->gamemessage;
				}
				else
				{
					$_SESSION["PlayerOwinsFT5"] ++;
					$this->gamemessage = "Player \"$Winner\" you won this round";
					if(!isset($_SESSION["FT5Winner"]))
					{
						$_SESSION["FT5Winner"] = "";
						
					}
					if($_SESSION["PlayerOwinsFT5"] == 5)
					{
						//Spelare O vann FT5
						$_SESSION["FT5Winner"] = $Winner;
						$this->gamemessage = "Player \"$Winner\" you won the game!";
					}
					return $this->gamemessage;
				}
			}
			return $this->gamemessage; //Vem som vann.
		}
		return $this->gamemessage; //Tom sträng då kraven inte uppfylldes
	}
	
	public function CheckforFT3Winner()
	{
		if(!isset($_SESSION["FT3Winner"]))
		{
			$_SESSION["FT3Winner"] = "";
		}
		return $_SESSION["FT3Winner"];
	}
	
	public function CheckforFT5Winner()
	{
		if(!isset($_SESSION["FT5Winner"]))
		{
			$_SESSION["FT5Winner"] = "";
		}
		return $_SESSION["FT5Winner"];
	}
	
	public function currentXwinsFT3()
	{
		if(!isset($_SESSION["PlayerXwinsFT3"]))
		{
			$_SESSION["PlayerXwinsFT3"] = 0;
		}
		return $_SESSION["PlayerXwinsFT3"];
	}
	
	public function currentOwinsFT3()
	{
		if(!isset($_SESSION["PlayerOwinsFT3"]))
		{
			$_SESSION["PlayerOwinsFT3"] = 0;
		}
		return $_SESSION["PlayerOwinsFT3"];
	}
	
	public function currentXwinsFT5()
	{
		if(!isset($_SESSION["PlayerXwinsFT5"]))
		{
			$_SESSION["PlayerXwinsFT5"] = 0;
		}
		return $_SESSION["PlayerXwinsFT5"];
	}
	
	public function currentOwinsFT5()
	{
		if(!isset($_SESSION["PlayerOwinsFT5"]))
		{
			$_SESSION["PlayerOwinsFT5"] = 0;
		}
		return $_SESSION["PlayerOwinsFT5"];
	}
}