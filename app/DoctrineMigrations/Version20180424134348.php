<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180424134348 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(5000) DEFAULT NULL, maxSize INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(5000) DEFAULT NULL, size INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, disctrict_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(5000) DEFAULT NULL, idMap VARCHAR(5) NOT NULL, INDEX IDX_741D53CDDC519CD1 (disctrict_id), INDEX IDX_741D53CD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_pnj (place_id INT NOT NULL, pnj_id INT NOT NULL, INDEX IDX_F21B19DCDA6A219 (place_id), INDEX IDX_F21B19DC51796E0B (pnj_id), PRIMARY KEY(place_id, pnj_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pnj (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) DEFAULT NULL, description VARCHAR(5000) DEFAULT NULL, job VARCHAR(255) DEFAULT NULL, rumor VARCHAR(5000) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDDC519CD1 FOREIGN KEY (disctrict_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE place_pnj ADD CONSTRAINT FK_F21B19DCDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_pnj ADD CONSTRAINT FK_F21B19DC51796E0B FOREIGN KEY (pnj_id) REFERENCES pnj (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD12469DE2');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDDC519CD1');
        $this->addSql('ALTER TABLE place_pnj DROP FOREIGN KEY FK_F21B19DCDA6A219');
        $this->addSql('ALTER TABLE place_pnj DROP FOREIGN KEY FK_F21B19DC51796E0B');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE district');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE place_pnj');
        $this->addSql('DROP TABLE pnj');
    }
}
