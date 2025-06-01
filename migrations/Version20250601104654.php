<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250601104654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facture_type_reparation ADD facture_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture_type_reparation ADD reparation_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture_type_reparation ADD CONSTRAINT FK_5AABFF3D7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facture_type_reparation ADD CONSTRAINT FK_5AABFF3D97934BA FOREIGN KEY (reparation_id) REFERENCES type_reparation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5AABFF3D7F2DEE08 ON facture_type_reparation (facture_id)');
        $this->addSql('CREATE INDEX IDX_5AABFF3D97934BA ON facture_type_reparation (reparation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE facture_type_reparation DROP CONSTRAINT FK_5AABFF3D7F2DEE08');
        $this->addSql('ALTER TABLE facture_type_reparation DROP CONSTRAINT FK_5AABFF3D97934BA');
        $this->addSql('DROP INDEX IDX_5AABFF3D7F2DEE08');
        $this->addSql('DROP INDEX IDX_5AABFF3D97934BA');
        $this->addSql('ALTER TABLE facture_type_reparation DROP facture_id');
        $this->addSql('ALTER TABLE facture_type_reparation DROP reparation_id');
    }
}
