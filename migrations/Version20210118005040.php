<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118005040 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recept (id INT AUTO_INCREMENT NOT NULL, medicijn_id_id INT DEFAULT NULL, datum DATE NOT NULL, duur VARCHAR(255) NOT NULL, dosis VARCHAR(255) NOT NULL, INDEX IDX_B92268A1ED81C01D (medicijn_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recept ADD CONSTRAINT FK_B92268A1ED81C01D FOREIGN KEY (medicijn_id_id) REFERENCES medicijn_controller (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recept');
    }
}
