<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use FpBarreto\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '\..\vendor\autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);