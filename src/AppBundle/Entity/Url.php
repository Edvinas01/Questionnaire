<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Url
{
    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $username;

    /**
     * @ORM\ManyToOne(targetEntity="Questionnaire", inversedBy="urls")
     */
    private $questionnaire;

    /**
     * @ORM\OneToOne(targetEntity="Participant", mappedBy="url")
     */
    private $participant;

    public function __construct($username, $questionnaire)
    {
        $this->username = $username;
        $this->questionnaire = $questionnaire;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getQuestionnaire()
    {
        return $this->questionnaire;
    }

    public function setQuestionnaire($questionnaire)
    {
        $this->questionnaire = $questionnaire;
    }

    public function getParticipant()
    {
        return $this->participant;
    }
}