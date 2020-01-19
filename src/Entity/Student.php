<?php
namespace FpBarreto\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 *
 * @author frank
 * @Entity
 */
class Student{

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
     * @OneToMany(targetEntity="Phone", mappedBy="student",cascade={"persist","remove"})
     */
    private Collection $phoneNumbers;

    /**
     *
     * @ManyToMany(targetEntity="Course",mappedBy="students",cascade={"persist","remove"})
     */
    private Collection $courses;

    public function __construct(string $name)
    {
        $this->phoneNumbers = new ArrayCollection();
        $this->courses = new ArrayCollection();
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function addPhoneNumber(Phone $phone): self
    {
        $this->phoneNumbers->add($phone);
        $phone->setStudent($this);
        return $this;
    }

    public function getPhoneNumbers(): Collection
    {
        return $this->phoneNumbers;
    }

    public function addCourse(Course $course): self
    {
        if ($this->courses->contains($course)) {
            return $this;
        }
        $this->courses->add($course);
        $course->addStudent($this);
        return $this;
    }

    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function isEqual (Student $student)
    {
        if (! $student instanceof Student) {
            throw new \InvalidArgumentException("Can only compare to other Student instance");
        }
        
       return $this->name === $student->getName();
    }
}
