<?php 

namespace YottaCms\Bundle\YottaSecurityBundle\Core\Role;

use Symfony\Component\Security\Core\Role\RoleHierarchy as SymfonyRoleHierarchy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

/**
 * Replacing Symfony security core RoleHierarchy by RoleHierarchy entity (See Entity\Role)
 */
class RoleHierarchy extends SymfonyRoleHierarchy
{
    public function __construct(ServiceEntityRepository $roleRepository, TokenStorage $tokenStorage)
    {
        
        $roleHierarchy = [];
        
        if ($tokenStorage->getToken()) {
            
            $user = $tokenStorage->getToken()->getUser();

            if ($user instanceof User) {
                $roleHierarchy = $roleRepository->getHierarchy();
            }
            
        }
        
        parent::__construct($roleHierarchy);
    }
}
