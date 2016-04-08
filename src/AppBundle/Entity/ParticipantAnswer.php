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
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $textAnswer;

    /**
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Participant", inversedBy="answers")
     */
    private $participant;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $opinion;

    public function __construct($participant, $answer, $question)
    {
        $this->question = $question;
        $this->participant = $participant;
        $this->answer = $answer;
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

    public function getTextAnswer()
    {
        return $this->textAnswer;
    }

    public function setTextAnswer($textAnswer)
    {
        $this->textAnswer = $textAnswer;
    }

    public function getOpinion()
    {
        return $this->opinion;
    }

    public function setOpinion($opinion)
    {
        $this->opinion = $opinion;
    }
}