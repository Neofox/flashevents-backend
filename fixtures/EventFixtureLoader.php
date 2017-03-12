<?php

namespace FlashEvents\DataFixtures;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use FlashEvents\Entities\Address;
use FlashEvents\Entities\Event;
use FlashEvents\Entities\User;

class EventFixtureLoader implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; $i++){
            $address = new Address();
            $address->setCity($faker->city)
                ->setZipCode($faker->postcode)
                ->setLatitude($faker->latitude)
                ->setLongitude($faker->longitude)
                ->setStreetName($faker->streetName)
                ->setStreetNumber($faker->buildingNumber);


            $event = new Event();
            $event->setCost($faker->numberBetween(0, 100))
                ->setAddress($address)
                ->setCategory($faker->randomElement(['music', 'meeting', 'theater']))
                ->setDescription($faker->text())
                ->setStartDate($faker->dateTimeThisMonth)
                ->setEndDate($faker->dateTimeThisMonth)
                ->setEventLink($faker->url)
                ->setName($faker->words(3, true))
                ->setPicture($faker->imageUrl())
                ->setRating($faker->numberBetween(0,5))
            ;

            $manager->persist($event);
        }

        $manager->flush();
    }
}
