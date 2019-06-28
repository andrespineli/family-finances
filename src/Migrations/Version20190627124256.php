<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190627124256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_family (user_id INT NOT NULL, family_id INT NOT NULL, INDEX IDX_C0B43A66A76ED395 (user_id), INDEX IDX_C0B43A66C35E566A (family_id), PRIMARY KEY(user_id, family_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_family ADD CONSTRAINT FK_C0B43A66A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_family ADD CONSTRAINT FK_C0B43A66C35E566A FOREIGN KEY (family_id) REFERENCES family (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE user_families');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_families (user_id INT NOT NULL, family_id INT NOT NULL, INDEX IDX_79D2DBCCA76ED395 (user_id), INDEX IDX_79D2DBCCC35E566A (family_id), PRIMARY KEY(user_id, family_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_families ADD CONSTRAINT FK_79D2DBCCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_families ADD CONSTRAINT FK_79D2DBCCC35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('DROP TABLE user_family');
    }
}
