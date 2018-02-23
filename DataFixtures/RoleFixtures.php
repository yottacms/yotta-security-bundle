<?php

namespace YottaCms\Bundle\YottaSecurityBundle\DataFixtures;

use YottaCms\Bundle\YottaSecurityBundle\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {    
        $roleDeveloper = new Role();
        $roleDeveloper->setName('ROLE_DEVELOPER');
        $manager->persist($roleDeveloper);
        
        $roleAdmin = new Role();
        $roleAdmin->setName('ROLE_ADMIN');
        $roleAdmin->setParent($roleDeveloper);
        $manager->persist($roleAdmin);
        
        $roleUser = new Role();
        $roleUser->setName('ROLE_USER');
        $roleUser->setParent($roleAdmin);
        $manager->persist($roleUser);

        $manager->flush();
    }
}
