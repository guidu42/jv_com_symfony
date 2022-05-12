<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207105357 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE forum (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_852BBECDE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, launch_at DATETIME NOT NULL, note INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, pegi INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, topic_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_B6BD307F1F55203D (topic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_game (type_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_F424F484C54C8C93 (type_id), INDEX IDX_F424F484E48FD905 (game_id), PRIMARY KEY(type_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forum ADD CONSTRAINT FK_852BBECDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F1F55203D FOREIGN KEY (topic_id) REFERENCES topic (id)');
        $this->addSql('ALTER TABLE type_game ADD CONSTRAINT FK_F424F484C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_game ADD CONSTRAINT FK_F424F484E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE forum DROP FOREIGN KEY FK_852BBECDE48FD905');
        $this->addSql('ALTER TABLE type_game DROP FOREIGN KEY FK_F424F484E48FD905');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F1F55203D');
        $this->addSql('ALTER TABLE type_game DROP FOREIGN KEY FK_F424F484C54C8C93');
        $this->addSql('DROP TABLE forum');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE topic');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE type_game');
    }
}
