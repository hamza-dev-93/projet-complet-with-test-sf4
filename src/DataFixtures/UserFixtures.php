<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const ADMIN_USER_REFERENCE = 'admin-user';

    private $passwordEncoder;
    private $role = ["ROLE_SUPER_ADMIN", "ROLE_ADMIN_USER", "ROLE_USER"];

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
        $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setPassword($this->passwordEncoder->encodePassword(
                         $user,
                         'pass'
                     ));
        $user->setEmail("bedwihamza@gmail.com")
            ->setRoles($user->getRoles());
        
        $manager->persist($user);
        $manager->flush();

        // other fixtures can get this object using the UserFixtures::ADMIN_USER_REFERENCE constant
        $this->addReference(self::ADMIN_USER_REFERENCE, $user);
    }
}
