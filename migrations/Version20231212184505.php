<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231212184505 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attack DROP FOREIGN KEY FK_47C02D3BAB4FC384');
        $this->addSql('ALTER TABLE attack DROP FOREIGN KEY FK_47C02D3B1DBF857F');
        $this->addSql('ALTER TABLE attack DROP FOREIGN KEY FK_47C02D3BF5E9B83B');
        $this->addSql('DROP TABLE power');
        $this->addSql('DROP TABLE cost');
        $this->addSql('DROP TABLE effect');
        $this->addSql('DROP INDEX UNIQ_47C02D3B1DBF857F ON attack');
        $this->addSql('DROP INDEX UNIQ_47C02D3BF5E9B83B ON attack');
        $this->addSql('DROP INDEX UNIQ_47C02D3BAB4FC384 ON attack');
        $this->addSql('ALTER TABLE attack ADD power_type VARCHAR(2000) NOT NULL, ADD power_value INT NOT NULL, ADD cost_type VARCHAR(2000) NOT NULL, ADD cost_value INT NOT NULL, ADD effect_type VARCHAR(2000) DEFAULT NULL, DROP power_id, DROP cost_id, CHANGE effect_id effect_value INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE power (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cost (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE effect (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE attack ADD power_id INT NOT NULL, ADD cost_id INT NOT NULL, DROP power_type, DROP power_value, DROP cost_type, DROP cost_value, DROP effect_type, CHANGE effect_value effect_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE attack ADD CONSTRAINT FK_47C02D3B1DBF857F FOREIGN KEY (cost_id) REFERENCES cost (id)');
        $this->addSql('ALTER TABLE attack ADD CONSTRAINT FK_47C02D3BF5E9B83B FOREIGN KEY (effect_id) REFERENCES effect (id)');
        $this->addSql('ALTER TABLE attack ADD CONSTRAINT FK_47C02D3BAB4FC384 FOREIGN KEY (power_id) REFERENCES power (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_47C02D3B1DBF857F ON attack (cost_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_47C02D3BF5E9B83B ON attack (effect_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_47C02D3BAB4FC384 ON attack (power_id)');
    }
}
