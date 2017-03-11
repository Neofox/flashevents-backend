<?php

namespace FlashEvents\DataFixtures;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use FlashEvents\Entities\Address;
use FlashEvents\Entities\User;

class UserFixtureLoader implements FixtureInterface
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


            $user = new User();
            $user->setPassword($faker->password)
                ->setLastName($faker->lastName)
                ->setFisrtName($faker->firstName)
                ->setEmail($faker->email)
                ->setAddress($address);

            $manager->persist($user);
        }
        $manager->flush();
    }
}