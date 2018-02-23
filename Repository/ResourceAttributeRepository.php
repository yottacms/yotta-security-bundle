<?php 

namespace YottaCms\Bundle\YottaSecurityBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use YottaCms\Bundle\YottaSecurityBundle\Entity\ResourceAttribute;

class ResourceAttributeRepository extends ServiceEntityRepository
{
    protected $_attributes = null;
    
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ResourceAttribute::class);
    }
    
    /**
     * Find attribute by role and resource
     * @param string $attribute
     * @param string $role
     * @param string $resource
     * @return ResourceAttribute
     */
    public function findAttribute(string $attribute, array $roles, string $resource): ?ResourceAttribute
    {
        if ($this->_attributes === null) {
            $this->_attributes = $this->findAll();
        }
        
        foreach ($this->_attributes as $row) {
            
            if ($row->getAttribute() == $attribute && $resource == $row->getResource()->getName()) {

                foreach ($roles as $role) {
                    
                    if ($row->getRole()->getName() == $role->getRole()) {
                        return $row;
                    }
                    
                }
                
            }
            
        }
        
        return null;
    }

}
