<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180818091334 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP INDEX UNIQ_E00CEDDEBC999F9F, ADD INDEX IDX_E00CEDDEBC999F9F (rate_id)');
        $this->addSql('ALTER TABLE booking DROP INDEX UNIQ_E00CEDDEC54C8C93, ADD INDEX IDX_E00CEDDEC54C8C93 (type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP INDEX IDX_E00CEDDEBC999F9F, ADD UNIQUE INDEX UNIQ_E00CEDDEBC999F9F (rate_id)');
        $this->addSql('ALTER TABLE booking DROP INDEX IDX_E00CEDDEC54C8C93, ADD UNIQUE INDEX UNIQ_E00CEDDEC54C8C93 (type_id)');
    }
}
