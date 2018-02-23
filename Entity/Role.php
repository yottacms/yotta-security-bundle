<?php
namespace YottaCms\Bundle\YottaSecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="security_role")
 */
class Role
{
    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @ORM\Id
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumn(name="parent_name", referencedColumnName="name", onDelete="CASCADE")
     **/
    private $parent;
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setParent($parent)
    {
        $this->parent = $parent;
    }
    
    public function getParent()
    {
        return $this->parent;
    }
}
