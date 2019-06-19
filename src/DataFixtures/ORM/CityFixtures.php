<?php

declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\City;
use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class CityFixtures extends AbstractFixture
{
	public function load(ObjectManager $manager)
	{
		$verona = new City();
		$verona->id=1;
		$verona->name='Verona';

		$manager->persist($verona);

		$manager->flush();

		$this->setReference('city-verona', $verona);
	}

}
