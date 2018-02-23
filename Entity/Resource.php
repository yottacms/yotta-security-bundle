<?php

namespace YottaCms\Bundle\YottaSecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="security_resource")
 */
class Resource
{
    const PREFIX = 'CRUD:';
    
    /**
     * @ORM\Id
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    public function getName()
    {
        return self::PREFIX . $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
