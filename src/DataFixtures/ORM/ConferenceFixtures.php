<?php

declare(strict_types=1);

namespace App\DataFixtures\ORM;

use App\Entity\Conference;
use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ConferenceFixtures extends AbstractFixture implements DependentFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$phpday = new Conference();
		$phpday->id = 1;
		$phpday->name = 'PHPDay';
		$phpday->year = 2019;
		$phpday->city = $this->getReference('city-verona');

		$manager->persist($phpday);

		$manager->flush();

		$this->setReference('conference-phpday-2019', $phpday);
	}


	/**
	 * This method must return an array of fixtures classes
	 * on which the implementing class depends on
	 *
	 * @return array
	 */
	function getDependencies()
	{
		return [CityFixtures::class,UserFixtures::class] ;
	}
}
