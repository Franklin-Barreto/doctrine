<?php
namespace FpBarreto\Doctrine\Service;

use Doctrine\ORM\EntityManagerInterface;
use FpBarreto\Doctrine\Entity\Student;
use Doctrine\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;

class StudentService
{

    private EntityManager $entityManager;

    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Student::class);
        $this->entityManager = $entityManager;
    }

    public function findAll(): array
    {
        return $this->repository->findAll();
    }

    public function find(int $id): Student
    {
        return $this->repository->find($id);
    }

    public function save(Student $student): self
    {
        $this->entityManager->persist($student);
        return $this;
    }

    public function delete(Student $student): self
    {
        $this->entityManager->remove($student);
        return $this;
    }

    public function flush(): self
    {
        $this->entityManager->flush();
        return $this;
    }
}