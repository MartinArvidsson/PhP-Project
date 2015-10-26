<?php
class GameModel
{
    private $gamemessage ="";
    private $board;
    private $boardtoreturn;
    private $totalMoves;
    private $currentXwins = 0;
    private $currentOwins = 0;
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
			$this->gamemessage = "Player \"$Winner\" you won!";
			if($Winner == "X")
			{
				$this->currentXwins ++;
			}
			else
			{
				$this->currentOwins ++;
			}
			return $this->gamemessage;
		}
		return $this->gamemessage;
	}
	
	public function currentXwins()
	{
		return $this->currentXwins;
	}
	public function currentOwins()
	{
		return $this->currentOwins;
	}
}