<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210321115159 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE disque_auteur (disque_id INT NOT NULL, auteur_id INT NOT NULL, INDEX IDX_49B4DB7F91161FE8 (disque_id), INDEX IDX_49B4DB7F60BB6FE6 (auteur_id), PRIMARY KEY(disque_id, auteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disque_producteur (disque_id INT NOT NULL, producteur_id INT NOT NULL, INDEX IDX_2C449BC891161FE8 (disque_id), INDEX IDX_2C449BC8AB9BB300 (producteur_id), PRIMARY KEY(disque_id, producteur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disque_genre (disque_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_42A52D991161FE8 (disque_id), INDEX IDX_42A52D94296D31F (genre_id), PRIMARY KEY(disque_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE disque_auteur ADD CONSTRAINT FK_49B4DB7F91161FE8 FOREIGN KEY (disque_id) REFERENCES disque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disque_auteur ADD CONSTRAINT FK_49B4DB7F60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES auteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disque_producteur ADD CONSTRAINT FK_2C449BC891161FE8 FOREIGN KEY (disque_id) REFERENCES disque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disque_producteur ADD CONSTRAINT FK_2C449BC8AB9BB300 FOREIGN KEY (producteur_id) REFERENCES producteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disque_genre ADD CONSTRAINT FK_42A52D991161FE8 FOREIGN KEY (disque_id) REFERENCES disque (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disque_genre ADD CONSTRAINT FK_42A52D94296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disque ADD rayon_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE disque ADD CONSTRAINT FK_F5ACECA2391016D9 FOREIGN KEY (rayon_id_id) REFERENCES rayon (id)');
        $this->addSql('CREATE INDEX IDX_F5ACECA2391016D9 ON disque (rayon_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE disque_auteur');
        $this->addSql('DROP TABLE disque_producteur');
        $this->addSql('DROP TABLE disque_genre');
        $this->addSql('ALTER TABLE disque DROP FOREIGN KEY FK_F5ACECA2391016D9');
        $this->addSql('DROP INDEX IDX_F5ACECA2391016D9 ON disque');
        $this->addSql('ALTER TABLE disque DROP rayon_id_id');
    }
}
