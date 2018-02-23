<?php

namespace YottaCms\Bundle\YottaSecurityBundle\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use FOS\UserBundle\Model\User;
use YottaCms\Bundle\YottaSecurityBundle\Entity\Resource;

class ResourceVoter extends Voter
{
    const CREATE = 'create';
    const READ = 'read';
    const UPDATE = 'update';
    const DELETE = 'delete';
    
    protected $decisionManager;
    protected $roleHierarchy;
    protected $resourceAttributeRepository;

    public function __construct(AccessDecisionManagerInterface $decisionManager, RoleHierarchyInterface $roleHierarchy, ServiceEntityRepository $resourceAttributeRepository)
    {
        $this->decisionManager = $decisionManager;
        $this->roleHierarchy = $roleHierarchy;
        $this->resourceAttributeRepository = $resourceAttributeRepository;
    }
    
    protected function supports($attribute, $subject)
    {
        if (!in_array($attribute, array(self::CREATE, self::READ, self::UPDATE, self::DELETE))) {
            return false;
        }

        if (false === strpos($subject, Resource::PREFIX)) {
            return false;
        }

        return true;
    }
    
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            return false;
        }
    
        return (bool)$this->resourceAttributeRepository->findAttribute(
            $attribute,
            $this->roleHierarchy->getReachableRoles($token->getRoles()),
            $subject
        );
        
    }
}
