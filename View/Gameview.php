<?php

class Gameview
{
    private $player = "X";
    private $board = array();
    private $gameOver = false;
    private $gameWon  = false;
    private $message;
    private $Boxcounter = 0;
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
    }
    
    public function response()
    {
        return $this->DisplayBoard();
    }
    
    private function DisplayBoard()
    {
        //Skapar en spelplan OM meddelandet är tom sträng
        $this->message = $this->Model->getMessage();
        
        //Behvöer kolla på detta http://php.net/manual/en/function.addslashes.php , verkar vara bättre lösning
        //Fullösning genom att spara som variabel tills vidare, vet inte hur for-loop i return görs annars.
        if($this->message == "")
        {
            $text = "<div id =\"board\">";
           // return '<div id =\"board\">'
            $text .= "<table>";
			for ($xlength = 0; $xlength < 3; $xlength++)
			{
			    $text .= "<tr>";
				for ($ylength = 0; $ylength < 3; $ylength++)
				{
				    $this->Boxcounter ++;
					$text .= "<td =\"board_cell\">";
					if($this->board[$xlength][$ylength])
					{
					    //Redan valt alternativ, skriv ut matchande bild. WIP
					}
					else
					{
					    //Annars välj alternativ, Första val tomt, andra val X eller O beronde på spelare.
					    $text .= "<select name= \"Box$this->Boxcounter\">
					            <option value=\"\"></option>
					            <option value=\"$this->player\">$this->player</option>
					          </select>";
					    
					}
					$text .= "</td>";
                }
			}
			$text .="</table>";
			$text .="<div id = \"button\">";
			//Knapp för att registrera att man har gjort sitt drag
			$text .= "<input type=\"submit\" name=\"playerMove\" value=\"Make your move! it's player {$this->player}:s turn to choose.\"/>
			</div>";
			$text .="</div>";
			return $text;
        }
        //Om det inte är tom sträng har man antingen vunnit eller spelat lika, det kollas här i else.
        else
        {
            if($this->message !="Oavgjort!")
            {
                return "";
                //Skriv ut att person X/O vann
            }
            else
            {
                return "";
                //Skriv ut att person X/O spelade oavgjort
            }
        }

    }
    
    public function GetMove()
    {
        
    }
    
}