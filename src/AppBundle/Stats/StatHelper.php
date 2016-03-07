<?php

namespace AppBundle\Stats;

class StatHelper
{
    private $questionnaire;
    private $participants;

    public function __construct($questionnaire)
    {
        $this->questionnaire = $questionnaire;
        $this->participants = $questionnaire->getParticipants();
    }

    public function getParticipantCount()
    {
        return count($this->participants);
    }
}