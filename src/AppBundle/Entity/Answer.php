<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Answer extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $content;

    /**
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
     */
    private $question;

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function toArray()
    {
        return array('question' => $this->content);
    }
}