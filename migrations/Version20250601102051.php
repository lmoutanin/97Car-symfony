<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250601102051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture_type_reparation DROP CONSTRAINT fk_5aabff3d7f2dee08');
        $this->addSql('ALTER TABLE facture_type_reparation DROP CONSTRAINT fk_5aabff3d7994838f');
        $this->addSql('DROP TABLE facture_type_reparation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE facture_type_reparation (facture_id INT NOT NULL, type_reparation_id INT NOT NULL, PRIMARY KEY(facture_id, type_reparation_id))');
        $this->addSql('CREATE INDEX idx_5aabff3d7994838f ON facture_type_reparation (type_reparation_id)');
        $this->addSql('CREATE INDEX idx_5aabff3d7f2dee08 ON facture_type_reparation (facture_id)');
        $this->addSql('ALTER TABLE facture_type_reparation ADD CONSTRAINT fk_5aabff3d7f2dee08 FOREIGN KEY (facture_id) REFERENCES facture (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facture_type_reparation ADD CONSTRAINT fk_5aabff3d7994838f FOREIGN KEY (type_reparation_id) REFERENCES type_reparation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
