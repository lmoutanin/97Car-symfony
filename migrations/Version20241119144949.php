<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241119144949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture DROP CONSTRAINT fk_e9e2810f19eb6921');
        $this->addSql('DROP INDEX idx_e9e2810f19eb6921');
        $this->addSql('ALTER TABLE voiture DROP client_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE voiture ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT fk_e9e2810f19eb6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_e9e2810f19eb6921 ON voiture (client_id)');
    }
}
