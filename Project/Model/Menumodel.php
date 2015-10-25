<?php

class Menumodel
{
    private $currentplayerXscore = 0;
    private $currentplayerOscore = 0;

    public function getPlayerXscore()
    {
      return $this->currentplayerXscore;
    }

    public function getPlayerOscore()
    {
      return $this->currentplayerOscore;
    }
    
}