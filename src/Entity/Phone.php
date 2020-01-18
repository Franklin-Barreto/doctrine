<?php
namespace FpBarreto\Doctrine\Entity;

/**
 *
 * @Entity
 */
class Phone
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
    private string $number;

    /**
     *
     * @ManyToOne(targetEntity="Student", inversedBy="phoneNumbers")
     * @JoinColumn(name="student_id", referencedColumnName="id")
     */
    private ?Student $student = null;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setStudent(Student $student)
    {
        $this->student = $student;
    }
}
