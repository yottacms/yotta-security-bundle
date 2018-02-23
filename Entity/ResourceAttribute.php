<?php

namespace YottaCms\Bundle\YottaSecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use YottaCms\Bundle\YottaSecurityBundle\Entity\Role;
use YottaCms\Bundle\YottaSecurityBundle\Entity\Resource;

/**
 * @ORM\Entity
 * @ORM\Table(name="security_resource_attribute")
 */
class ResourceAttribute
{
    /**
    * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $attribute;
    
    /**
    * @ORM\ManyToOne(targetEntity="Role")
    * @ORM\JoinColumn(referencedColumnName="name", onDelete="CASCADE")
     */
    private $role;
    
    /**
    * @ORM\ManyToOne(targetEntity="Resource")
    * @ORM\JoinColumn(referencedColumnName="name", onDelete="CASCADE")
     */
    private $resource;
    
    public function getAttribute()
    {
        return $this->attribute;
    }
    
    public function getRole()
    {
        return $this->role;
    }
    
    public function getResource()
    {
        return $this->resource;
    }
    
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
    }
    
    public function setRole(Role $role)
    {
        $this->role = $role;
    }
    
    public function setResource(Resource $resource)
    {
        $this->resource = $resource;
    }
}
