<?php
namespace FpBarreto\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author frank
 * @Entity
 *
 */
class Course
{

    /**
     *
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private ?int $id = null;

    /**
     *
     * @Column(type="string")
     */
    private string $name;

    /**
     *
     *@ManyToMany(targetEntity="Student",cascade={"persist","remove"})
     */
    private Collection $students;

    public function __construct(string $name)
    {
        $this->students = new ArrayCollection();
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addStudent(Student $student): self
    {
        if ($this->students->contains($student)) {
            return $this;
        }

        $this->students->add($student);
        $student->addCourse($this);
        return $this;
    }

    public function getStudents(): Collection
    {
        return $this->students;
    }
}

