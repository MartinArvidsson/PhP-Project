<?php

class Gameview
{
    private $player = "X";
    private $board = array();
    private $gameOver = false;
    private $gameWon  = false;
    private $message;
    
    public function __construct(Gamemodel $_Model)
    {
        $this->Model = $_Model;
    }

    
    public function startGame()
    {
        $this->gameOver = false;
        $this->gameWon = false;
        
        $this->newBoard();
    }

    
    private function newBoard()
    {
        $this->board = array(); //Återställer spelplanen till 0
        
        
        for($xlength = 0; $xlength <=2; $xlength++) //Genererar upp en 3x3 spelplan
        {
            for($ylength = 0; $ylength <=2; $ylength++)
            {
                $this->board[$xlength][$ylength] = null;
            }
        }
        $this->DisplayBoard();
    }
    
    private function DisplayBoard()
    {
        //Skapar en spelplan OM meddelandet är tom sträng
        $this->message = $this->Model->getMessage();
        
        //Behvöer kolla på detta http://php.net/manual/en/function.addslashes.php , verkar vara bättre lösning
        if($this->message == "")
        {
            echo "<div id ="'.board.'">";
            
			for ($xlength = 0; $xlength < 3; $xlength++)
			{
				for ($ylength = 0; $ylength < 3; $ylength++)
				{
					echo "<div class="'.board_cell.'">";
					
					if($this->board[$xlength][$ylength])
					{
					    //Redan valt alternativ, skriv ut matchande bild. WIP
					}
					else
					{
					    //Annars välj alternativ, Första val tomt, andra val X eller O beronde på spelare.
					    echo "<select name="'.{x}_{y}.'">
					            <option value=".."></option>
					            <option value="'.{$this->player}.'">{this->player}</option>
					          </select>";
					    
					}
					
					echo"</div>";
                }
                echo "<div class="'.Button.'"></div>";
			}
			//Knapp för att registrera att man har gjort sitt drag
			echo "<input type="'.submit.'" name="'.playerMove.'" value"'.Make your move! it is player {$this->player}:s turn to choose.'"/>
			</div>";
        }
        //Om det inte är tom sträng har man antingen vunnit eller spelat lika, det kollas här i else.
        else
        {
            if($this->message !="Oavgjort!")
            {
                //Skriv ut att person X/O vann
            }
            else
            {
                //Skriv ut att person X/O spelade oavgjort
            }
        }

    }
    
    public function GetMove()
    {
        
    }
    
}