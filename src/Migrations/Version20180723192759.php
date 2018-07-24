<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180723192759 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE714819A0');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEEF048774');
        $this->addSql('DROP INDEX UNIQ_E00CEDDE714819A0 ON booking');
        $this->addSql('DROP INDEX UNIQ_E00CEDDEEF048774 ON booking');
        $this->addSql('ALTER TABLE booking ADD rate_id INT NOT NULL, ADD type_id INT NOT NULL, DROP rate_id_id, DROP type_id_id');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEBC999F9F FOREIGN KEY (rate_id) REFERENCES rate (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDEBC999F9F ON booking (rate_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDEC54C8C93 ON booking (type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEBC999F9F');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEC54C8C93');
        $this->addSql('DROP INDEX UNIQ_E00CEDDEBC999F9F ON booking');
        $this->addSql('DROP INDEX UNIQ_E00CEDDEC54C8C93 ON booking');
        $this->addSql('ALTER TABLE booking ADD rate_id_id INT NOT NULL, ADD type_id_id INT NOT NULL, DROP rate_id, DROP type_id');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE714819A0 FOREIGN KEY (type_id_id) REFERENCES type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEEF048774 FOREIGN KEY (rate_id_id) REFERENCES rate (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDE714819A0 ON booking (type_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDEEF048774 ON booking (rate_id_id)');
    }
}
