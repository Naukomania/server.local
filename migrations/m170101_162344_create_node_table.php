<?php

use yii\db\Migration;

/**
 * Handles the creation of table `node`.
 */
class m170101_162344_create_node_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `node` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `node_id` INT NULL COMMENT '',
  `title` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_node_node_idx` (`node_id` ASC)  COMMENT '',
  CONSTRAINT `fk_node_node`
    FOREIGN KEY (`node_id`)
    REFERENCES `node` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
SQL;
        $this->execute($sql);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('node');
    }
}
