<?php
namespace FpBarreto\Doctrine\Service;

use Doctrine\ORM\EntityManagerInterface;
use FpBarreto\Doctrine\Entity\Student;
use Doctrine\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class StudentService
{

    private EntityManager $entityManager;

    private ObjectRepository $repository;

    private Collection $students;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Student::class);
        $this->entityManager = $entityManager;
        $this->students = new ArrayCollection();
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

    public function update(Student $student): self
    {
        $this->entityManager->persist($student);
        return $this;
    }

    public function delete(int $id): self
    {
        try {
            $student = $this->entityManager->getReference(Student::class, $id);
            $this->entityManager->remove($student);
        } catch (EntityNotFoundException $e) {
            echo "Id not found";
        } finally {

            return $this;
        }
    }

    public function flush(): self
    {
        $this->entityManager->flush();
        return $this;
    }
}