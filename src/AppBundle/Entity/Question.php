<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Question extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=32)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $content;

    /**
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Questionnaire", inversedBy="questions")
     */
    private $questionnaire;

    /**
     * @Assert\NotNull()
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question",  orphanRemoval=true)
     */
    private $answers;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
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

    public function addAnswer($answer)
    {
        if ($this->answers == null) {
            $this->answers = array();
        }
        array_push($this->answers, $answer);
    }
}