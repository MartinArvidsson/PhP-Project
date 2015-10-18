<?php
class GameModel
{
    private $gamemessage ="";
    private $board = array();
    private $totalMoves;
    
    public function ValidateData($board,$totalMoves)
    {
        $this->board = $board;
        $this->totalMoves = $totalMoves;
        
        $this->Checkforwinner($this->board,$this->totalMoves);
    }

    public function getMessage()
    {
        return $this->gamemessage;
    }
    
    function Checkforwinner($board,$totalMoves)
	{
		
		//Översta raden
		if ($this->board[0][0] && $this->board[0][0] == $this->board[0][1] && $this->board[0][1] == $this->board[0][2])
			return $this->board[0][0];
			
		//Andra raden
		if ($this->board[1][0] && $this->board[1][0] == $this->board[1][1] && $this->board[1][1] == $this->board[1][2])
			return $this->board[1][0];
			
		//tredje raden
		if ($this->board[2][0] && $this->board[2][0] == $this->board[2][1] && $this->board[2][1] == $this->board[2][2])
			return $this->board[2][0];
			
		//första columnen
		if ($this->board[0][0] && $this->board[0][0] == $this->board[1][0] && $this->board[1][0] == $this->board[2][0])
			return $this->board[0][0];
			
		//andra koliumnen
		if ($this->board[0][1] && $this->board[0][1] == $this->board[1][1] && $this->board[1][1] == $this->board[2][1])
			return $this->board[0][1];
			
		//Tredje kolumnen
		if ($this->board[0][2] && $this->board[0][2] == $this->board[1][2] && $this->board[1][2] == $this->board[2][2])
			return $this->board[0][2];
			
		//Diagonalt 
		if ($this->board[0][0] && $this->board[0][0] == $this->board[1][1] && $this->board[1][1] == $this->board[2][2])
			return $this->board[0][0];
			
		//Diagonalt
		if ($this->board[0][2] && $this->board[0][2] == $this->board[1][1] && $this->board[1][1] == $this->board[2][0])
			return $this->board[0][2];
		if($this->totalMoves = 9)
		    return "tie";
	}
}