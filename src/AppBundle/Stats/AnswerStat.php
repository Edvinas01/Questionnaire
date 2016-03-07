<?php

namespace AppBundle\Stats;

class AnswerStat
{
    private $title;
    private $trueCount;
    private $falseCount;

    public function __construct($trueCount, $falseCount, $title)
    {
        $this->trueCount = $trueCount;
        $this->falseCount = $falseCount;
        $this->title = $title;
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
}