<?php 

namespace YottaCms\Bundle\YottaSecurityBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use YottaCms\Bundle\YottaSecurityBundle\Entity\Role;

class RoleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Role::class);
    }
    
    /**
     * @return Role[]
     */
    public function getHierarchy(): array
    {
        $hierarchy = array();
        $roles = $this->findAll();
        foreach ($roles as $role) {
            if ($role->getParent()) {
                if (!isset($hierarchy[$role->getParent()->getName()])) {
                    $hierarchy[$role->getParent()->getName()] = array();
                }
                $hierarchy[$role->getParent()->getName()][] = $role->getName();
            } else {
                if (!isset($hierarchy[$role->getName()])) {
                    $hierarchy[$role->getName()] = array();
                }
            }
        }
        
        return $hierarchy;
    }
}
