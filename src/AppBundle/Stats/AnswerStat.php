<?php

namespace AppBundle\Stats;

class AnswerStat
{
    private $title;
    private $trueCount;
    private $truePercentage;

    private $falseCount;

    public function __construct($trueCount, $falseCount, $title)
    {
        $this->trueCount = $trueCount;
        $this->falseCount = $falseCount;
        $this->title = $title;

        $total = $trueCount + $falseCount;
        $this->truePercentage = $total == 0 ? 0 : ($trueCount * 100) / $total;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getTrueCount()
    {
        return $this->trueCount;
    }

    public function getFalseCount()
    {
        return $this->falseCount;
    }

    public function getTruePercentage()
    {
        return $this->truePercentage;
    }
}