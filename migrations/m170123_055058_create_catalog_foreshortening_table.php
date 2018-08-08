<?php

use yii\db\Migration;

/**
 * Handles the creation of table `catalog_foreshortening`.
 */
class m170123_055058_create_catalog_foreshortening_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(
            'eqt_catalog_foreshortening',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'order' => $this->integer()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('eqt_catalog_foreshortening');
    }
}
