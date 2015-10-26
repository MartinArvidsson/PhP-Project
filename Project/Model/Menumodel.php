<?php

class Menumodel
{
    private $currentplayerXscore = 0;
     private $currentplayerOscore = 0;

    public function getPlayerXscoreFT3()
    {
      return $this->currentplayerXscore;
    }

    public function getPlayerOscoreFT3()
    {
      return $this->currentplayerOscore;
    }
    
}