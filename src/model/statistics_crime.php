<?php

class Statistics_Crime
{
    private $offence;
    private $Y2003;
    private $Y2004;
    private $Y2005;

    public function __construct($Offence,$year,$yearTwo,$yearThree)
    {
    $this->offence = $Offence;
    $this->Y2003 = $year;
    $this->Y2004 = $yearTwo;
    $this->Y2005 = $yearThree;
    }

    public function Offence()
    {
        return $this->offence;
    }

    public function year()
    {
        return $this->Y2003;
    }
    public function yearTwo()
    {
        return $this->Y2004;
    }

    public function YearThree()
    {
        return $this->Y2005;
    }

}