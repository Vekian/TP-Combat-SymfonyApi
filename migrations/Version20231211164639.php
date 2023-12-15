<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231211164639 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attack (id INT AUTO_INCREMENT NOT NULL, player_id INT DEFAULT NULL, power_id INT NOT NULL, cost_id INT NOT NULL, effect_id INT DEFAULT NULL, name VARCHAR(1000) NOT NULL, description VARCHAR(3000) NOT NULL, INDEX IDX_47C02D3B99E6F5DF (player_id), UNIQUE INDEX UNIQ_47C02D3BAB4FC384 (power_id), UNIQUE INDEX UNIQ_47C02D3B1DBF857F (cost_id), UNIQUE INDEX UNIQ_47C02D3BF5E9B83B (effect_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE buff (id INT AUTO_INCREMENT NOT NULL, monster_id INT DEFAULT NULL, player_id INT DEFAULT NULL, atk_value INT NOT NULL, atk_turns INT NOT NULL, def_value INT NOT NULL, def_turns INT NOT NULL, dodge_value INT NOT NULL, dodge_turns INT NOT NULL, INDEX IDX_75274263C5FF1223 (monster_id), INDEX IDX_7527426399E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cost (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE effect (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, target_id INT DEFAULT NULL, turn INT NOT NULL, number_players_played INT NOT NULL, number_players_dead INT NOT NULL, INDEX IDX_232B318C158E0B66 (target_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, pv INT NOT NULL, pv_max INT NOT NULL, attack INT NOT NULL, defense INT NOT NULL, dodge INT NOT NULL, bg_type VARCHAR(255) NOT NULL, fa_type VARCHAR(255) NOT NULL, bar_name VARCHAR(255) NOT NULL, is_available TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, avatar VARCHAR(1000) DEFAULT NULL, pv INT NOT NULL, pv_max INT NOT NULL, mana INT NOT NULL, mana_max INT NOT NULL, attack INT NOT NULL, defense INT NOT NULL, dodge INT NOT NULL, is_available TINYINT(1) NOT NULL, is_dead TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE power (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, monster_id INT DEFAULT NULL, player_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, turns INT NOT NULL, INDEX IDX_7B00651CC5FF1223 (monster_id), INDEX IDX_7B00651C99E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attack ADD CONSTRAINT FK_47C02D3B99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE attack ADD CONSTRAINT FK_47C02D3BAB4FC384 FOREIGN KEY (power_id) REFERENCES power (id)');
        $this->addSql('ALTER TABLE attack ADD CONSTRAINT FK_47C02D3B1DBF857F FOREIGN KEY (cost_id) REFERENCES cost (id)');
        $this->addSql('ALTER TABLE attack ADD CONSTRAINT FK_47C02D3BF5E9B83B FOREIGN KEY (effect_id) REFERENCES effect (id)');
        $this->addSql('ALTER TABLE buff ADD CONSTRAINT FK_75274263C5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE buff ADD CONSTRAINT FK_7527426399E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C158E0B66 FOREIGN KEY (target_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE status ADD CONSTRAINT FK_7B00651CC5FF1223 FOREIGN KEY (monster_id) REFERENCES monster (id)');
        $this->addSql('ALTER TABLE status ADD CONSTRAINT FK_7B00651C99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attack DROP FOREIGN KEY FK_47C02D3B99E6F5DF');
        $this->addSql('ALTER TABLE attack DROP FOREIGN KEY FK_47C02D3BAB4FC384');
        $this->addSql('ALTER TABLE attack DROP FOREIGN KEY FK_47C02D3B1DBF857F');
        $this->addSql('ALTER TABLE attack DROP FOREIGN KEY FK_47C02D3BF5E9B83B');
        $this->addSql('ALTER TABLE buff DROP FOREIGN KEY FK_75274263C5FF1223');
        $this->addSql('ALTER TABLE buff DROP FOREIGN KEY FK_7527426399E6F5DF');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C158E0B66');
        $this->addSql('ALTER TABLE status DROP FOREIGN KEY FK_7B00651CC5FF1223');
        $this->addSql('ALTER TABLE status DROP FOREIGN KEY FK_7B00651C99E6F5DF');
        $this->addSql('DROP TABLE attack');
        $this->addSql('DROP TABLE buff');
        $this->addSql('DROP TABLE cost');
        $this->addSql('DROP TABLE effect');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE monster');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE power');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
