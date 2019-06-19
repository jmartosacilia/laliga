<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Player
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayerRepository")
 */
class Player
{
    const PLAYERS = 'players';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Please enter a name")
     * @ORM\Column(name="name", type="string", length=255)
     * @Groups({Player::PLAYERS})
     */
    private $name;

    /**
     * @Assert\NotBlank(message="Please enter a dorsal")
     * @var int
     *
     * @ORM\Column(name="dorsal", type="smallint")
     */
    private $dorsal;

    /**
     * @ORM\ManyToOne(targetEntity="Club", inversedBy="players")
     * @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     */
    private $club;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Player
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dorsal
     *
     * @param int $dorsal
     *
     * @return Player
     */
    public function setDorsal($dorsal)
    {
        $this->dorsal = $dorsal;

        return $this;
    }

    /**
     * Get dorsal
     *
     * @return int
     */
    public function getDorsal()
    {
        return $this->dorsal;
    }

    /**
     * Set club
     *
     * @param Club $club
     *
     * @return Player
     */
    public function setClub(Club $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return Club
     */
    public function getClub()
    {
        return $this->club;
    }
}
