<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class JoindInEventRepository extends EntityRepository
{
    /**
     * @return \App\Entity\JoindInEvent[]
     */
    public function findAllSortedFromNewestToOldest(): array
    {
        return $this->findBy([], ['startDate' => 'DESC']);
    }
}
