<?php

namespace YottaCms\Bundle\YottaSecurityBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;

class YottaSecurityBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator($this->getPath().'/Resources/config/'));
        $loader->load('config.yml');
    }
    
    public function registerBundles() {
        return [
            \FOS\UserBundle\FOSUserBundle::class,
            \Symfony\Bundle\SecurityBundle\SecurityBundle::class,
            \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle::class,
            \Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class,
            \Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class,
            \Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class,
            \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle::class
        ];
    }
}
