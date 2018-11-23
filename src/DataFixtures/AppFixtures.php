<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $person1 = new Person();
        $person1->setName('alex');
        $person1->setRelationship('Friend');
        $person1->setDetails('whos is better? no-one');
        $person1->updateLastContacted();
        $person1->setUsername('b@b.com');

        $manager->persist($person1);                 

        $person2 = new Person();
        $person2->setName('brad');
        $person2->setRelationship('Lover');
        $person2->setDetails('whos is better? no-one');
        $person2->updateLastContacted();
        $person2->setUsername('c@c.com');

        $manager->persist($person2);                 


        $manager->flush();
    }
}
