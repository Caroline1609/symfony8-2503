<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260130074816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flowers (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE flower CHANGE id_category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE flower ADD CONSTRAINT FK_A7D7C1DA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_A7D7C1DA12469DE2 ON flower (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE flowers');
        $this->addSql('ALTER TABLE flower DROP FOREIGN KEY FK_A7D7C1DA12469DE2');
        $this->addSql('DROP INDEX IDX_A7D7C1DA12469DE2 ON flower');
        $this->addSql('ALTER TABLE flower CHANGE category_id id_category_id INT NOT NULL');
    }
}
