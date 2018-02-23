<?php

namespace YottaCms\Bundle\YottaSecurityBundle\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use   Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class DeveloperVoter extends Voter
{
    protected $authorizationChecker;

    public function __construct(AccessDecisionManagerInterface $decisionManager, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->decisionManager = $decisionManager;
        $this->authorizationChecker = $authorizationChecker;
    }
    
    protected function supports($attribute, $subject)
    {
        return true;
    }
    
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        if (sizeof($token->getRoles()) && $this->decisionManager->decide($token, array('ROLE_DEVELOPER'))) {
            return true;
        }
    }
}
