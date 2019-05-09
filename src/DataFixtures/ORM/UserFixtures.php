<?php

declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends AbstractFixture
{
	public function load(ObjectManager $manager)
	{
		$admin = new User();
		$admin->id = 1;
		$admin->username = 'admin';

		$manager->persist($admin);

		$manager->flush();

		$this->setReference('user-admin', $admin);
	}

}
