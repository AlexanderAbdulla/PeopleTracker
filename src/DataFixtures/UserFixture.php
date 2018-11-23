<?php

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }     

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('b@b.com');
        $roles = array("ROLE_USER");
        $user->setRoles($roles);
       
        $user->setPassword($this->passwordEncoder->encodePassword(
                     $user,
                     'b'
                 ));
        $manager->persist($user);                 
        
        $user2 = new User();
        $user2->setEmail('c@c.com');
        $roles = array("ROLE_USER");
        $user2->setRoles($roles);
       
        $user2->setPassword($this->passwordEncoder->encodePassword(
                     $user2,
                     'c'
                 ));
        $manager->persist($user2);                 
        
        
        $manager->flush();
    }
}
