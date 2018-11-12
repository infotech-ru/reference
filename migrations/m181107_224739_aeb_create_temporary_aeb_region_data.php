<?php

use yii\db\Migration;

/**
 * Class m181107_224739_create_temporary_aeb_region_data
 */
class m181107_224739_aeb_create_temporary_aeb_region_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('aeb_temporary_aeb_region_data', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'model' => $this->string(255),
            'model_id' => $this->integer()->null(),
            'segment' => $this->string(255),
            'federal_district' => $this->string(255),
            'region' => $this->string(255),
            'region_id' => $this->integer()->null(),
            'city' => $this->string(255),
            'city_id' => $this->integer()->null(),
            'year' => $this->integer()->notNull(),
            'month' => $this->integer()->notNull(),
            'value' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->dateTime(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('aeb_temporary_aeb_region_data');
    }
}
