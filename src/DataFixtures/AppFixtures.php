<?php

namespace App\DataFixtures;

use App\Entity\Software;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $passwordEncoder;



    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User;
        $user->setRoles(['ROLE_USER'])
                ->setEmail("admin@test.com")
            ->setPassword($this->passwordEncoder->encodePassword($user, 'demo123'))
            ;
        $software1 = new Software();
        $software1->setCategory("IDE")
            ->setConstructor("je suis une description")
            ->setName("Intellij IDEA")
            ->setDescription("lorem ipsum")
            ->setConstructor("Intellij")
        ;

        $software2 = new Software();
        $software2->setCategory("IDE")
            ->setConstructor("je suis une description")
            ->setName("SublimeText")
            ->setDescription("lorem ipsum")
            ->setConstructor("Sublime HQ")
        ;
        $software3 = new Software();
        $software3->setCategory("Browser")
            ->setConstructor("je suis une description")
            ->setName("Firefox")
            ->setDescription("lorem ipsum")
            ->setConstructor("Mozilla")
        ;
        $manager->persist($software1);
        $manager->persist($software2);
        $manager->persist($software3);
        $manager->persist($user);
        $manager->flush();
    }
}
