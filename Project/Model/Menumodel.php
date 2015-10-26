<?php

class Menumodel
{
    private $totalplayerXscoreFT3 = 0;
    private $totalplayerOscoreFT3 = 0;
    private $totalplayerXscoreFT5 = 0;
    private $totalplayerOscoreFT5 = 0;

    public function getPlayerXscoreFT3()
    {
      $this->totalplayerXscoreFT3 = $this->Model->
      return $this->totalplayerXscoreFT3;
    }

    public function getPlayerOscoreFT3()
    {
      return $this->totalplayerOscoreFT3;
    }
    
    
    public function getPlayerXscoreFT5()
    {
      return $this->totalplayerXscoreFT5;
    }

    public function getPlayerOscoreFT5()
    {
      return $this->totalplayerOscoreFT5;
    }
}