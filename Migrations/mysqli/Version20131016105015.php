<?php

namespace Innova\PathBundle\Migrations\mysqli;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2013/10/16 10:50:16
 */
class Version20131016105015 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE innova_stepType (
                id INT AUTO_INCREMENT NOT NULL, 
                name VARCHAR(255) NOT NULL, 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_step2resourceNode (
                id INT AUTO_INCREMENT NOT NULL, 
                step_id INT DEFAULT NULL, 
                propagated TINYINT(1) NOT NULL, 
                excluded TINYINT(1) NOT NULL, 
                resourceOrder INT DEFAULT NULL, 
                resourceNode_id INT DEFAULT NULL, 
                INDEX IDX_21EA11F73B21E9C (step_id), 
                INDEX IDX_21EA11FB87FAB32 (resourceNode_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_user2path (
                id INT AUTO_INCREMENT NOT NULL, 
                user_id INT NOT NULL, 
                path_id INT NOT NULL, 
                status INT NOT NULL, 
                INDEX IDX_2D4590E5A76ED395 (user_id), 
                INDEX IDX_2D4590E5D96C566B (path_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_pathtemplate (
                id INT AUTO_INCREMENT NOT NULL, 
                name VARCHAR(255) NOT NULL, 
                description LONGTEXT DEFAULT NULL, 
                step LONGTEXT NOT NULL, 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_stepWhere (
                id INT AUTO_INCREMENT NOT NULL, 
                name VARCHAR(255) NOT NULL, 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_path (
                id INT AUTO_INCREMENT NOT NULL, 
                path LONGTEXT NOT NULL, 
                deployed TINYINT(1) NOT NULL, 
                modified TINYINT(1) NOT NULL, 
                resourceNode_id INT DEFAULT NULL, 
                UNIQUE INDEX UNIQ_CE19F054B87FAB32 (resourceNode_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_stepWho (
                id INT AUTO_INCREMENT NOT NULL, 
                name VARCHAR(255) NOT NULL, 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_nonDigitalResource (
                id INT AUTO_INCREMENT NOT NULL, 
                description LONGTEXT NOT NULL, 
                type VARCHAR(255) NOT NULL, 
                resourceNode_id INT DEFAULT NULL, 
                UNIQUE INDEX UNIQ_305E9E56B87FAB32 (resourceNode_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_step (
                id INT AUTO_INCREMENT NOT NULL, 
                parent_id INT DEFAULT NULL, 
                path_id INT DEFAULT NULL, 
                stepOrder INT NOT NULL, 
                expanded TINYINT(1) NOT NULL, 
                instructions LONGTEXT DEFAULT NULL, 
                image VARCHAR(255) DEFAULT NULL, 
                withTutor TINYINT(1) NOT NULL, 
                withComputer TINYINT(1) NOT NULL, 
                duration DATETIME NOT NULL, 
                stepType_id INT DEFAULT NULL, 
                stepWho_id INT DEFAULT NULL, 
                stepWhere_id INT DEFAULT NULL, 
                resourceNode_id INT DEFAULT NULL, 
                INDEX IDX_86F48567727ACA70 (parent_id), 
                INDEX IDX_86F48567D96C566B (path_id), 
                INDEX IDX_86F48567DEDC9FF6 (stepType_id), 
                INDEX IDX_86F4856765544574 (stepWho_id), 
                INDEX IDX_86F485678FE76F3 (stepWhere_id), 
                UNIQUE INDEX UNIQ_86F48567B87FAB32 (resourceNode_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            ALTER TABLE innova_step2resourceNode 
            ADD CONSTRAINT FK_21EA11F73B21E9C FOREIGN KEY (step_id) 
            REFERENCES innova_step (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE innova_step2resourceNode 
            ADD CONSTRAINT FK_21EA11FB87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id)
        ");
        $this->addSql("
            ALTER TABLE innova_user2path 
            ADD CONSTRAINT FK_2D4590E5A76ED395 FOREIGN KEY (user_id) 
            REFERENCES claro_user (id)
        ");
        $this->addSql("
            ALTER TABLE innova_user2path 
            ADD CONSTRAINT FK_2D4590E5D96C566B FOREIGN KEY (path_id) 
            REFERENCES innova_path (id)
        ");
        $this->addSql("
            ALTER TABLE innova_path 
            ADD CONSTRAINT FK_CE19F054B87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE innova_nonDigitalResource 
            ADD CONSTRAINT FK_305E9E56B87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            ADD CONSTRAINT FK_86F48567727ACA70 FOREIGN KEY (parent_id) 
            REFERENCES innova_step (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            ADD CONSTRAINT FK_86F48567D96C566B FOREIGN KEY (path_id) 
            REFERENCES innova_path (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            ADD CONSTRAINT FK_86F48567DEDC9FF6 FOREIGN KEY (stepType_id) 
            REFERENCES innova_stepType (id)
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            ADD CONSTRAINT FK_86F4856765544574 FOREIGN KEY (stepWho_id) 
            REFERENCES innova_stepWho (id)
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            ADD CONSTRAINT FK_86F485678FE76F3 FOREIGN KEY (stepWhere_id) 
            REFERENCES innova_stepWhere (id)
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            ADD CONSTRAINT FK_86F48567B87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id) 
            ON DELETE CASCADE
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            ALTER TABLE innova_step 
            DROP FOREIGN KEY FK_86F48567DEDC9FF6
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            DROP FOREIGN KEY FK_86F485678FE76F3
        ");
        $this->addSql("
            ALTER TABLE innova_user2path 
            DROP FOREIGN KEY FK_2D4590E5D96C566B
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            DROP FOREIGN KEY FK_86F48567D96C566B
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            DROP FOREIGN KEY FK_86F4856765544574
        ");
        $this->addSql("
            ALTER TABLE innova_step2resourceNode 
            DROP FOREIGN KEY FK_21EA11F73B21E9C
        ");
        $this->addSql("
            ALTER TABLE innova_step 
            DROP FOREIGN KEY FK_86F48567727ACA70
        ");
        $this->addSql("
            DROP TABLE innova_stepType
        ");
        $this->addSql("
            DROP TABLE innova_step2resourceNode
        ");
        $this->addSql("
            DROP TABLE innova_user2path
        ");
        $this->addSql("
            DROP TABLE innova_pathtemplate
        ");
        $this->addSql("
            DROP TABLE innova_stepWhere
        ");
        $this->addSql("
            DROP TABLE innova_path
        ");
        $this->addSql("
            DROP TABLE innova_stepWho
        ");
        $this->addSql("
            DROP TABLE innova_nonDigitalResource
        ");
        $this->addSql("
            DROP TABLE innova_step
        ");
    }
}