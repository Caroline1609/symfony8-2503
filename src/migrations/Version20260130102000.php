<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260130102000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Drop accidental table `flowers` if it exists';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS flowers');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE TABLE flowers (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }
}
