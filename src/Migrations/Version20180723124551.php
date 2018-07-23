<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180723124551 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, rate_id_id INT NOT NULL, type_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, code VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E00CEDDEEF048774 (rate_id_id), UNIQUE INDEX UNIQ_E00CEDDE714819A0 (type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rate (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEEF048774 FOREIGN KEY (rate_id_id) REFERENCES rate (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE714819A0 FOREIGN KEY (type_id_id) REFERENCES type (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEEF048774');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE714819A0');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE rate');
        $this->addSql('DROP TABLE type');
    }
}
