<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260129090535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, adjusted to be idempotent
        $sm = method_exists($this->connection, 'createSchemaManager')
            ? $this->connection->createSchemaManager()
            : $this->connection->getSchemaManager();

        $columns = array_map(fn($c) => $c->getName(), $sm->listTableColumns('flower'));

        if (!in_array('id_category_id', $columns, true)) {
            $this->addSql('ALTER TABLE flower ADD id_category_id INT NOT NULL');
            $this->addSql('ALTER TABLE flower ADD CONSTRAINT FK_A7D7C1DAA545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
            $this->addSql('CREATE INDEX IDX_A7D7C1DAA545015 ON flower (id_category_id)');
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, adjusted to be safe
        $sm = method_exists($this->connection, 'createSchemaManager')
            ? $this->connection->createSchemaManager()
            : $this->connection->getSchemaManager();

        $columns = array_map(fn($c) => $c->getName(), $sm->listTableColumns('flower'));

        if (in_array('id_category_id', $columns, true)) {
            $this->addSql('ALTER TABLE flower DROP FOREIGN KEY IF EXISTS FK_A7D7C1DAA545015');
            $this->addSql('DROP INDEX IDX_A7D7C1DAA545015 ON flower');
            $this->addSql('ALTER TABLE flower DROP id_category_id');
        }
    }
}
