<?php

namespace Innova\PathBundle\Migrations\mysqli;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2013/10/01 03:35:38
 */
class Version20131001153537 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE innova_step2excludedResourceNode (
                id INT AUTO_INCREMENT NOT NULL,
                step_id INT DEFAULT NULL,
                resourceNode_id INT DEFAULT NULL,
                INDEX IDX_867AC78073B21E9C (step_id),
                INDEX IDX_867AC780B87FAB32 (resourceNode_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            ALTER TABLE innova_step2excludedResourceNode
            ADD CONSTRAINT FK_867AC78073B21E9C FOREIGN KEY (step_id)
            REFERENCES innova_step (id)
        ");
        $this->addSql("
            ALTER TABLE innova_step2excludedResourceNode
            ADD CONSTRAINT FK_867AC780B87FAB32 FOREIGN KEY (resourceNode_id)
            REFERENCES claro_resource_node (id)
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            DROP TABLE innova_step2excludedResourceNode
        ");
    }
}