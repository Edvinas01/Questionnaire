<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class ParticipantAnswer extends BaseEntity
{
    /**
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Answer")
     */
    private $answer;

    /**
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Question")
     */
    private $question;

    /**
     * @ORM\Column(type="boolean")
     */
    private $checked = false;

    /**
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Participant", inversedBy="answers")
     */
    private $participant;

    public function __construct($participant, $answer, $question, $checked)
    {
        $this->question = $question;
        $this->participant = $participant;
        $this->answer = $answer;
        $this->checked = $checked;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    public function getChecked()
    {
        return $this->checked;
    }

    public function setChecked($checked)
    {
        $this->checked = $checked;
    }

    public function getParticipant()
    {
        return $this->participant;
    }

    public function setParticipant($participant)
    {
        $this->participant = $participant;
    }

    public function getQuestion()
    {
        return $this->question;
    }
}