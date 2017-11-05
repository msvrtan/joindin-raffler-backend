<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RaffleRepository")
 * @ORM\Table(name="raffles")
 */
class Raffle implements \JsonSerializable
{
    /**
     * @ORM\Column(type="uuid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     *
     * @var string
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\JoindInEvent")
     * @ORM\JoinTable(name="raffleEvents")
     *
     * @var Collection
     */
    private $events;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\JoindInUser")
     * @ORM\JoinTable(name="raffleWinners")
     *
     * @var Collection
     */
    private $winners;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\JoindInUser")
     * @ORM\JoinTable(name="raffleNoShows")
     *
     * @var Collection
     */
    private $noShows;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     *
     * @var DateTime
     */
    private $createdAt;

    public function __construct(string $id, Collection $events)
    {
        $this->id        = $id;
        $this->events    = $events;
        $this->createdAt = new DateTime();
        $this->winners   = new ArrayCollection();
        $this->noShows   = new ArrayCollection();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getCommentsEligibleForRaffling(): Collection
    {
        $comments = new ArrayCollection();

        foreach ($this->events as $event) {
            foreach ($event->getTalks() as $talk) {
                foreach ($talk->getComments() as $comment) {
                    if (false === $this->userAlreadyWonOrIsNoShow($comment)) {
                        $comments->add($comment);
                    }
                }
            }
        }

        return $comments;
    }

    public function userWon(JoindInUser $user)
    {
        $this->winners->add($user);
    }

    public function userIsNoShow(JoindInUser $user)
    {
        $this->noShows->add($user);
    }

    public function jsonSerialize(): array
    {
        return [
            'id'        => $this->id,
            'createdAt' => $this->createdAt->format('c'),
        ];
    }

    /**
     * Checks if that commenter is already a winner or a no show so we can easily filter out which comments are
     * eligible for raffling.
     */
    private function userAlreadyWonOrIsNoShow(JoindInComment $comment): bool
    {
        foreach ($this->winners as $winner) {
            if ($winner === $comment->getUser()) {
                return true;
            }
        }

        foreach ($this->noShows as $noShow) {
            if ($noShow === $comment->getUser()) {
                return true;
            }
        }

        return false;
    }
}