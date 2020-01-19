<?php

declare(strict_types=1);

namespace Fpbarreto\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200118192158 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Course (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_student (course_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_BFE0AADF591CC992 (course_id), INDEX IDX_BFE0AADFCB944F1A (student_id), PRIMARY KEY(course_id, student_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_student ADD CONSTRAINT FK_BFE0AADF591CC992 FOREIGN KEY (course_id) REFERENCES Course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_student ADD CONSTRAINT FK_BFE0AADFCB944F1A FOREIGN KEY (student_id) REFERENCES Student (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE course_student DROP FOREIGN KEY FK_BFE0AADF591CC992');
        $this->addSql('DROP TABLE Course');
        $this->addSql('DROP TABLE course_student');
    }
}
