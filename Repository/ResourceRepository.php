<?php 

namespace YottaCms\Bundle\YottaSecurityBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use YottaCms\Bundle\YottaSecurityBundle\Entity\Resource;

class ResourceRepository extends ServiceEntityRepository
{
    protected $_attributes = [];
    
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Resource::class);
    }
}
