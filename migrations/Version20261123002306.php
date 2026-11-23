<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261123002306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artists (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(60) NOT NULL, lastname VARCHAR(60) NOT NULL, date_naissance DATE NOT NULL, sexe VARCHAR(1) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, categorie_id INT NOT NULL, INDEX IDX_CEECCA51BCF5E72D (categorie_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE film_artist (film_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_6AABAB8D567F5183 (film_id), INDEX IDX_6AABAB8DB7970CF8 (artist_id), PRIMARY KEY (film_id, artist_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE films ADD CONSTRAINT FK_CEECCA51BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE film_artist ADD CONSTRAINT FK_6AABAB8D567F5183 FOREIGN KEY (film_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_artist ADD CONSTRAINT FK_6AABAB8DB7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films DROP FOREIGN KEY FK_CEECCA51BCF5E72D');
        $this->addSql('ALTER TABLE film_artist DROP FOREIGN KEY FK_6AABAB8D567F5183');
        $this->addSql('ALTER TABLE film_artist DROP FOREIGN KEY FK_6AABAB8DB7970CF8');
        $this->addSql('DROP TABLE artists');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE film_artist');
    }
}
