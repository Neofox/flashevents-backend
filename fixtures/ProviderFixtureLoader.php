<?php

namespace FlashEvents\DataFixtures;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use FlashEvents\Entities\Address;
use FlashEvents\Entities\Provider;
use FlashEvents\Entities\User;

class ProviderFixtureLoader implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $facebookProvider = new Provider();
        $facebookProvider->setId(1)
                        ->setName('facebook');
        $manager->persist($facebookProvider);

        $meetupProvider = new Provider();
        $meetupProvider->setId(2)
                        ->setName('meetup');
        $manager->persist($meetupProvider);

        $opendataProvider = new Provider();
        $opendataProvider->setId(3)
                        ->setName('opendata');
        $manager->persist($opendataProvider);

        $manager->flush();
    }
}