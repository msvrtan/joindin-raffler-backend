<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="conferences")
 */
class Conference
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    public $id;

	/** @ORM\Column(type="string",length=20) */
	public $name;

	/** @ORM\Column(type="integer") */
	public $year;

	/** @ORM\ManyToOne(targetEntity="City") */
	public $city;
}
