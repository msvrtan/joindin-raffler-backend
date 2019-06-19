<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Raffle;
use Doctrine\ORM\EntityRepository;

class RaffleRepository extends EntityRepository
{
    public function load(string $raffleId): Raffle
    {
        $raffle = $this->find($raffleId);

        if (null === $raffle) {
            throw new \RuntimeException('No raffle with id:'.$raffleId);
        }

        return $raffle;
    }
}
