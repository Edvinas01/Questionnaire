<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Participant extends BaseEntity
{
    /**
     * @Assert\NotNull()
     * @ORM\Column(type="string", length=64)
     */
    private $ip;

    /**
     * @ORM\OneToMany(targetEntity="ParticipantAnswer", mappedBy="participant", orphanRemoval=true, cascade="persist")
     */
    private $answers;

    /**
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Questionnaire", inversedBy="participants")
     */
    private $questionnaire;

    /**
     * @ORM\Column(type="datetime", length=32)
     */
    private $participationDate;

    public function __construct($participationDate)
    {
        $this->participationDate = $participationDate;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getQuestionnaire()
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire($questionnaire)
    {
        $this->questionnaire = $questionnaire;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function setAnswers($answers)
    {
        $this->answers = $answers;
    }

    public function getParticipationDate()
    {
        return $this->participationDate;
    }
}