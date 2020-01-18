<?php
namespace FpBarreto\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @author frank
 * @Entity
 */
class Student
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
     * @OneToMany(targetEntity="Phone", mappedBy="student",cascade={"persist","remove"})
     */
    private Collection $phoneNumbers;

    public function __construct(string $name)
    {
        $this->phoneNumbers = new ArrayCollection();
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

    public function setPhoneNumber(Phone $phone): self
    {
        $this->phoneNumbers->add($phone);
        $phone->setStudent($this);
        return $this;
    }

    public function getPhoneNumbers(): Collection
    {
        return $this->phoneNumbers;
    }
}
