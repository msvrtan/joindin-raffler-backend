<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    public $id;

	/** @ORM\Column(type="string",length=20) */
	public $username;

	/** @ORM\Column(type="string",length=20) */
	public $firstName;
}
