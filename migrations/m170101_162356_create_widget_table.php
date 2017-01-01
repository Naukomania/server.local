<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widget`.
 */
class m170101_162356_create_widget_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `widget` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `node_id` INT NOT NULL COMMENT '',
  `type` INT NOT NULL DEFAULT 1 COMMENT '',
  `settings` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_widget_node1_idx` (`node_id` ASC)  COMMENT '',
  CONSTRAINT `fk_widget_node1`
    FOREIGN KEY (`node_id`)
    REFERENCES `node`.`node` (`id`)
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
        $this->dropTable('widget');
    }
}
