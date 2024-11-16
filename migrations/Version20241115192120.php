<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241115192120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facture_type_reparation (facture_id INT NOT NULL, type_reparation_id INT NOT NULL, PRIMARY KEY(facture_id, type_reparation_id))');
        $this->addSql('CREATE INDEX IDX_5AABFF3D7F2DEE08 ON facture_type_reparation (facture_id)');
        $this->addSql('CREATE INDEX IDX_5AABFF3D7994838F ON facture_type_reparation (type_reparation_id)');
        $this->addSql('ALTER TABLE facture_type_reparation ADD CONSTRAINT FK_5AABFF3D7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facture_type_reparation ADD CONSTRAINT FK_5AABFF3D7994838F FOREIGN KEY (type_reparation_id) REFERENCES type_reparation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE facture_type_reparation DROP CONSTRAINT FK_5AABFF3D7F2DEE08');
        $this->addSql('ALTER TABLE facture_type_reparation DROP CONSTRAINT FK_5AABFF3D7994838F');
        $this->addSql('DROP TABLE facture_type_reparation');
    }
}
