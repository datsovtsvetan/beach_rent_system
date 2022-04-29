<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427142629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Beach (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, isActive TINYINT(1) NOT NULL, companyId INT NOT NULL, INDEX IDX_AC458B1C2480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE BeachType (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, imgUrl VARCHAR(255) NOT NULL, companyId INT NOT NULL, INDEX IDX_892DB0D22480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Booking (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, client VARCHAR(100) NOT NULL, deckChairId INT DEFAULT NULL, singleDeckChairId INT DEFAULT NULL, beachId INT NOT NULL, companyId INT NOT NULL, INDEX IDX_2FB1D4421B02737A (deckChairId), INDEX IDX_2FB1D4428E07AA90 (singleDeckChairId), INDEX IDX_2FB1D442791DD1DE (beachId), INDEX IDX_2FB1D4422480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, isActive TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ControlStat (id INT AUTO_INCREMENT NOT NULL, controlledAt DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', verifiedByRentEmployee TINYINT(1) NOT NULL, beachId INT NOT NULL, companyId INT NOT NULL, userId INT NOT NULL, INDEX IDX_C7233D61791DD1DE (beachId), INDEX IDX_C7233D612480E723 (companyId), INDEX IDX_C7233D6164B64DCC (userId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE DeckChair (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, xAxis INT NOT NULL, yAxis INT NOT NULL, isVipRented TINYINT(1) NOT NULL, vipName VARCHAR(100) DEFAULT NULL, isRented TINYINT(1) NOT NULL, rentCount SMALLINT NOT NULL, imgUrl VARCHAR(255) NOT NULL, rotation INT NOT NULL, pairId INT NOT NULL, beachId INT NOT NULL, companyId INT NOT NULL, INDEX IDX_87F1DD07648DA725 (pairId), INDEX IDX_87F1DD07791DD1DE (beachId), INDEX IDX_87F1DD072480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Pair (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, beachId INT NOT NULL, companyId INT NOT NULL, INDEX IDX_A968B157791DD1DE (beachId), INDEX IDX_A968B1572480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Pool (id INT AUTO_INCREMENT NOT NULL, xAxis INT NOT NULL, yAxis INT NOT NULL, typeId INT NOT NULL, beachId INT NOT NULL, companyId INT NOT NULL, INDEX IDX_FA306B89BF49490 (typeId), INDEX IDX_FA306B8791DD1DE (beachId), INDEX IDX_FA306B82480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PoolType (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, imgUrl VARCHAR(255) NOT NULL, companyId INT NOT NULL, INDEX IDX_E532106B2480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Rent (id INT AUTO_INCREMENT NOT NULL, rentedAt DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', rentedVip TINYINT(1) NOT NULL, employeeName VARCHAR(100) NOT NULL, includeChairCover TINYINT(1) DEFAULT NULL, beachId INT NOT NULL, companyId INT NOT NULL, INDEX IDX_A24AE2F2791DD1DE (beachId), INDEX IDX_A24AE2F22480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SingleDeckChair (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, xAxis INT NOT NULL, yAxis INT NOT NULL, isVipRented TINYINT(1) NOT NULL, vipName VARCHAR(100) DEFAULT NULL, isRented TINYINT(1) NOT NULL, rentCount SMALLINT NOT NULL, imgUrl VARCHAR(255) NOT NULL, rotation INT NOT NULL, beachId INT NOT NULL, companyId INT NOT NULL, INDEX IDX_CE9BACCE791DD1DE (beachId), INDEX IDX_CE9BACCE2480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Stat (id INT AUTO_INCREMENT NOT NULL, dateTime DATETIME NOT NULL, rentedCount INT NOT NULL, releasedByControllerCount INT NOT NULL, beachId INT NOT NULL, companyId INT NOT NULL, INDEX IDX_808A501F791DD1DE (beachId), INDEX IDX_808A501F2480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Umbrella (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, xAxis INT NOT NULL, yAxis INT NOT NULL, isVipRented TINYINT(1) NOT NULL, vipName VARCHAR(100) DEFAULT NULL, isRented TINYINT(1) NOT NULL, rentCount SMALLINT NOT NULL, imgUrl VARCHAR(255) NOT NULL, rotation INT NOT NULL, beachId INT NOT NULL, companyId INT NOT NULL, INDEX IDX_EA635200791DD1DE (beachId), INDEX IDX_EA6352002480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE User (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, companyId INT NOT NULL, UNIQUE INDEX UNIQ_2DA17977E7927C74 (email), INDEX IDX_2DA179772480E723 (companyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE userbeach (UserId INT NOT NULL, BeachId INT NOT NULL, INDEX IDX_4A2098CA631A48FA (UserId), INDEX IDX_4A2098CAB6A0E842 (BeachId), PRIMARY KEY(UserId, BeachId)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Beach ADD CONSTRAINT FK_AC458B1C2480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE BeachType ADD CONSTRAINT FK_892DB0D22480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE Booking ADD CONSTRAINT FK_2FB1D4421B02737A FOREIGN KEY (deckChairId) REFERENCES DeckChair (id)');
        $this->addSql('ALTER TABLE Booking ADD CONSTRAINT FK_2FB1D4428E07AA90 FOREIGN KEY (singleDeckChairId) REFERENCES SingleDeckChair (id)');
        $this->addSql('ALTER TABLE Booking ADD CONSTRAINT FK_2FB1D442791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE Booking ADD CONSTRAINT FK_2FB1D4422480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE ControlStat ADD CONSTRAINT FK_C7233D61791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE ControlStat ADD CONSTRAINT FK_C7233D612480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE ControlStat ADD CONSTRAINT FK_C7233D6164B64DCC FOREIGN KEY (userId) REFERENCES User (id)');
        $this->addSql('ALTER TABLE DeckChair ADD CONSTRAINT FK_87F1DD07648DA725 FOREIGN KEY (pairId) REFERENCES Pair (id)');
        $this->addSql('ALTER TABLE DeckChair ADD CONSTRAINT FK_87F1DD07791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE DeckChair ADD CONSTRAINT FK_87F1DD072480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE Pair ADD CONSTRAINT FK_A968B157791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE Pair ADD CONSTRAINT FK_A968B1572480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE Pool ADD CONSTRAINT FK_FA306B89BF49490 FOREIGN KEY (typeId) REFERENCES PoolType (id)');
        $this->addSql('ALTER TABLE Pool ADD CONSTRAINT FK_FA306B8791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE Pool ADD CONSTRAINT FK_FA306B82480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE PoolType ADD CONSTRAINT FK_E532106B2480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE Rent ADD CONSTRAINT FK_A24AE2F2791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE Rent ADD CONSTRAINT FK_A24AE2F22480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE SingleDeckChair ADD CONSTRAINT FK_CE9BACCE791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE SingleDeckChair ADD CONSTRAINT FK_CE9BACCE2480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE Stat ADD CONSTRAINT FK_808A501F791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE Stat ADD CONSTRAINT FK_808A501F2480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE Umbrella ADD CONSTRAINT FK_EA635200791DD1DE FOREIGN KEY (beachId) REFERENCES Beach (id)');
        $this->addSql('ALTER TABLE Umbrella ADD CONSTRAINT FK_EA6352002480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE User ADD CONSTRAINT FK_2DA179772480E723 FOREIGN KEY (companyId) REFERENCES Company (id)');
        $this->addSql('ALTER TABLE userbeach ADD CONSTRAINT FK_4A2098CA631A48FA FOREIGN KEY (UserId) REFERENCES User (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE userbeach ADD CONSTRAINT FK_4A2098CAB6A0E842 FOREIGN KEY (BeachId) REFERENCES Beach (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Booking DROP FOREIGN KEY FK_2FB1D442791DD1DE');
        $this->addSql('ALTER TABLE ControlStat DROP FOREIGN KEY FK_C7233D61791DD1DE');
        $this->addSql('ALTER TABLE DeckChair DROP FOREIGN KEY FK_87F1DD07791DD1DE');
        $this->addSql('ALTER TABLE Pair DROP FOREIGN KEY FK_A968B157791DD1DE');
        $this->addSql('ALTER TABLE Pool DROP FOREIGN KEY FK_FA306B8791DD1DE');
        $this->addSql('ALTER TABLE Rent DROP FOREIGN KEY FK_A24AE2F2791DD1DE');
        $this->addSql('ALTER TABLE SingleDeckChair DROP FOREIGN KEY FK_CE9BACCE791DD1DE');
        $this->addSql('ALTER TABLE Stat DROP FOREIGN KEY FK_808A501F791DD1DE');
        $this->addSql('ALTER TABLE Umbrella DROP FOREIGN KEY FK_EA635200791DD1DE');
        $this->addSql('ALTER TABLE userbeach DROP FOREIGN KEY FK_4A2098CAB6A0E842');
        $this->addSql('ALTER TABLE Beach DROP FOREIGN KEY FK_AC458B1C2480E723');
        $this->addSql('ALTER TABLE BeachType DROP FOREIGN KEY FK_892DB0D22480E723');
        $this->addSql('ALTER TABLE Booking DROP FOREIGN KEY FK_2FB1D4422480E723');
        $this->addSql('ALTER TABLE ControlStat DROP FOREIGN KEY FK_C7233D612480E723');
        $this->addSql('ALTER TABLE DeckChair DROP FOREIGN KEY FK_87F1DD072480E723');
        $this->addSql('ALTER TABLE Pair DROP FOREIGN KEY FK_A968B1572480E723');
        $this->addSql('ALTER TABLE Pool DROP FOREIGN KEY FK_FA306B82480E723');
        $this->addSql('ALTER TABLE PoolType DROP FOREIGN KEY FK_E532106B2480E723');
        $this->addSql('ALTER TABLE Rent DROP FOREIGN KEY FK_A24AE2F22480E723');
        $this->addSql('ALTER TABLE SingleDeckChair DROP FOREIGN KEY FK_CE9BACCE2480E723');
        $this->addSql('ALTER TABLE Stat DROP FOREIGN KEY FK_808A501F2480E723');
        $this->addSql('ALTER TABLE Umbrella DROP FOREIGN KEY FK_EA6352002480E723');
        $this->addSql('ALTER TABLE User DROP FOREIGN KEY FK_2DA179772480E723');
        $this->addSql('ALTER TABLE Booking DROP FOREIGN KEY FK_2FB1D4421B02737A');
        $this->addSql('ALTER TABLE DeckChair DROP FOREIGN KEY FK_87F1DD07648DA725');
        $this->addSql('ALTER TABLE Pool DROP FOREIGN KEY FK_FA306B89BF49490');
        $this->addSql('ALTER TABLE Booking DROP FOREIGN KEY FK_2FB1D4428E07AA90');
        $this->addSql('ALTER TABLE ControlStat DROP FOREIGN KEY FK_C7233D6164B64DCC');
        $this->addSql('ALTER TABLE userbeach DROP FOREIGN KEY FK_4A2098CA631A48FA');
        $this->addSql('DROP TABLE Beach');
        $this->addSql('DROP TABLE BeachType');
        $this->addSql('DROP TABLE Booking');
        $this->addSql('DROP TABLE Company');
        $this->addSql('DROP TABLE ControlStat');
        $this->addSql('DROP TABLE DeckChair');
        $this->addSql('DROP TABLE Pair');
        $this->addSql('DROP TABLE Pool');
        $this->addSql('DROP TABLE PoolType');
        $this->addSql('DROP TABLE Rent');
        $this->addSql('DROP TABLE SingleDeckChair');
        $this->addSql('DROP TABLE Stat');
        $this->addSql('DROP TABLE Umbrella');
        $this->addSql('DROP TABLE User');
        $this->addSql('DROP TABLE userbeach');
    }
}
