<?php

namespace YottaCms\Bundle\YottaSecurityBundle\DataFixtures;

use YottaCms\Bundle\YottaSecurityBundle\Entity\ResourceAttribute;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use YottaCms\Bundle\YottaSecurityBundle\Repository\RoleRepository;
use YottaCms\Bundle\YottaSecurityBundle\Repository\ResourceRepository;

class ResourceAttributeFixtures extends Fixture
{
    protected $roleRepository;
    protected $resourceRepository;

    public function __construct(RoleRepository $roleRepository, ResourceRepository $resourceRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->resourceRepository = $resourceRepository;
    }

    public function load(ObjectManager $manager)
    {    
        $resourceAttr = new ResourceAttribute();
        $resourceAttr->setAttribute('read');
        $resourceAttr->setRole($this->roleRepository->find('ROLE_ADMIN'));
        $resourceAttr->setResource($this->resourceRepository->find('Admin'));
        $manager->persist($resourceAttr);

        $manager->flush();
    }
}
