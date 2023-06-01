<?php

use yii\db\Migration;

/**
 * Class m181108_111731_create_table_aeb_region
 */
class m181108_111731_aeb_create_table_aeb_region extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('aeb_region', [
            'id' => $this->primaryKey(),
            'year' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'federal_district_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'month' => $this->integer()->notNull(),
            'value' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'segment' => $this->string(255),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('aeb_region');
    }
}
