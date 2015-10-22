<?php
class GameModel
{
    private $gamemessage ="";
    private $board = array();
    private $boardtoreturn = array(array(),array(),array());
    private $totalMoves;
    
    public function ValidateData($_board,$_totalMoves)
    {
        $this->board = $_board;
        $this->totalMoves = $_totalMoves;
        $this->boardtoreturn = $_board;
        
        $this->Checkforwinner($this->board,$this->totalMoves);
    }

    private function Checkforwinner($board,$totalMoves)
	{
		//Översta raden
		if ($this->board[0][0] && $this->board[0][0] == $this->board[0][1] && $this->board[0][1] == $this->board[0][2])
			$this->boardtoreturn[0][0] = $this->board[0][0];
			
		//Andra raden
		if ($this->board[1][0] && $this->board[1][0] == $this->board[1][1] && $this->board[1][1] == $this->board[1][2])
			$this->boardtoreturn[1][0] = $this->board[1][0];
			
		//tredje raden
		if ($this->board[2][0] && $this->board[2][0] == $this->board[2][1] && $this->board[2][1] == $this->board[2][2])
			$this->boardtoreturn[2][0] = $this->board[2][0];
			
		//första columnen
		if ($this->board[0][0] && $this->board[0][0] == $this->board[1][0] && $this->board[1][0] == $this->board[2][0])
			$this->boardtoreturn[0][0] = $this->board[0][0];
			
		//andra koliumnen
		if ($this->board[0][1] && $this->board[0][1] == $this->board[1][1] && $this->board[1][1] == $this->board[2][1])
			$this->boardtoreturn[0][1] = $this->board[0][1];
			
		//Tredje kolumnen
		if ($this->board[0][2] && $this->board[0][2] == $this->board[1][2] && $this->board[1][2] == $this->board[2][2])
			$this->boardtoreturn[0][2] = $this->board[0][2];
			
		//Diagonalt 
		if ($this->board[0][0] && $this->board[0][0] == $this->board[1][1] && $this->board[1][1] == $this->board[2][2])
			$this->boardtoreturn[0][0] = $this->board[0][0];
			
		//Diagonalt
		if ($this->board[0][2] && $this->board[0][2] == $this->board[1][1] && $this->board[1][1] == $this->board[2][0])
			$this->boardtoreturn[0][2] = $this->board[0][2];
								
		if($this->totalMoves == 9)
		    $this->gamemessage ="Oavgjort";
	}
	
	
	public function getboardfrommodel()
	{
		return $this->boardtoreturn;
	}
	
	
    public function getMessage()
    {
        return $this->gamemessage;
    }
}