<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class UserAnswer extends BaseEntity
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
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Questionnaire")
     */
    private $quesionnaire;

    /**
     * @Assert\NotNull()
     * @ORM\ManyToMany(targetEntity="User")
     */
    private $users;
}