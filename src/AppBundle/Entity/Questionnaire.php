<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Questionnaire extends BaseEntity
{

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", length=32)
     */
    private $expires;

    /**
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visible = false;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="questionnaire", orphanRemoval=true)
     */
    private $questions;

    public function __construct($name, $user, $expires)
    {
        $this->name = $name;
        $this->user = $user;
        $this->expires = $expires;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getExpires()
    {
        return $this->expires;
    }

    public function setExpires($expires)
    {
        $this->expires = $expires;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getVisible()
    {
        return $this->visible;
    }

    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}