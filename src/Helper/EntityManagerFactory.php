<?php
namespace FpBarreto\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{

    public function getEntityManager(): EntityManagerInterface
    {
        $paths = array(
            __DIR__ . '/..'
        );
        $config = Setup::createAnnotationMetadataConfiguration($paths, true);
        $connection = array(
            'dbname' => 'doctrine',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        );

        return EntityManager::create($connection, $config);
    }
}