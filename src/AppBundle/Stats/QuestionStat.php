<?php

namespace AppBundle\Stats;

class QuestionStat
{
    private $title;
    private $answerStats;

    public function __construct($question, $answerStats)
    {
        $this->title = $question->getContent();
        $this->answerStats = $answerStats;
    }

    public function getAnswerStats()
    {
        return $this->answerStats;
    }

    public function getTitle()
    {
        return $this->title;
    }
}