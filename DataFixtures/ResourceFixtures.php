<?php

namespace YottaCms\Bundle\YottaSecurityBundle\DataFixtures;

use YottaCms\Bundle\YottaSecurityBundle\Entity\Resource;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ResourceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {    
        $resource = new Resource();
        $resource->setName('Admin');
        $resource->setDescription('Admin panel access');
        $manager->persist($resource);

        $manager->flush();
    }
}
