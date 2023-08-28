<?php

use yii\db\Migration;

/**
 * Class m230828_091518_create_table_operator_phones
 */
class m230828_091518_create_table_operator_phones extends Migration
{
    public function safeUp()
    {
        $this->createTable('operator_phones', [
            'id' => $this->primaryKey(),
            'from' => $this->bigInteger()->notNull(),
            'to' => $this->bigInteger()->notNull(),
            'region_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->createIndex('idx_from', 'operator_phones', 'from', true);
        $this->createIndex('idx_to', 'operator_phones', 'to', true);

        $this->addForeignKey(
            'fk_operator_phones_region_id_regions',
            'operator_phones',
            'region_id',
            'regions',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('operator_phones');
    }
}
