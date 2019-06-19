<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cities")
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    public $id;

	/** @ORM\Column(type="string",length=20) */
	public $name;

}
