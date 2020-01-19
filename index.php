<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'vendor\autoload.php';
use FpBarreto\Doctrine\Helper\EntityManagerFactory;
use FpBarreto\Doctrine\Entity\Student;

use FpBarreto\Doctrine\Entity\Phone;
use FpBarreto\Doctrine\Service\StudentService;
use FpBarreto\Doctrine\Entity\Course;

$entityManager = (new EntityManagerFactory())->getEntityManager();
$studentService = new StudentService($entityManager);


 /* $studentService->save((new Student('Franklin Barreto'))->addPhoneNumber(new Phone('11 97392-5204'))
  ->addPhoneNumber(new Phone('83 8507-448')))
  ->save((new Student('João Kishi'))->addPhoneNumber(new Phone('11 87549-54785')))
  ->save((new Student('Débora Ribeiro'))->addPhoneNumber(new Phone('11 99999-54785')))
  ->save((new Student('Antônio'))->addPhoneNumber(new Phone('11 77458-54785')))
  ->flush();
 */
echo '<br /><br />';
foreach ($studentService->findAll() as $student) {
    echo $student->getName() . '<br />';
    foreach ($student->getPhoneNumbers() as $phoneNumber) {
        echo $phoneNumber->getNumber() . '<br />';
    }
}

// $student = $studentService->find(3);
// $student->addCourse(new Course("Python Programming"));
//$franklin = (new Student('Franklin Barreto'))->addPhoneNumber(new Phone('11 97392-5204'))->addPhoneNumber(new Phone('83 8507-448'));
//$franklin2 = (new Student('Franklin Barreto'))->addPhoneNumber(new Phone('11 97392-5204'))->addPhoneNumber(new Phone('83 8507-448'));


//$studentService->update($student)->flush();
// $studentService->delete(4)->flush();
