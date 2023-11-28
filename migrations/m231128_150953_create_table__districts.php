<?php

use yii\db\Migration;

/**
 * Class m231128_150953_create_table__districts
 */
class m231128_150953_create_table__districts extends Migration
{
    public function safeUp()
    {
        $this->createTable('districts', [
            'id' => $this->primaryKey(),
            'country_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'center_city_id' => $this->integer()->null(),
            'fias_id' => $this->string(36)->null(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $this->addForeignKey(
            'fk--districts--country_id',
            'districts',
            'country_id',
            'countries',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk--districts--region_id',
            'districts',
            'region_id',
            'regions',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk--districts--center_city_id',
            'districts',
            'center_city_id',
            'cities',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex('idx--districts--fias_id', 'districts', ['fias_id'], true);
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk--districts--country_id', 'districts');
        $this->dropForeignKey('fk--districts--region_id', 'districts');
        $this->dropForeignKey('fk--districts--center_city_id', 'districts');
        $this->dropIndex('idx--districts--fias_id', 'districts');
        $this->dropTable('districts');
    }
}
