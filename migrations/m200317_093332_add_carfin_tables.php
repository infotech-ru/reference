<?php

use yii\db\Migration;

/**
 * Class m200317_093332_add_carfin_tables
 */
class m200317_093332_add_carfin_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('carfin_mark', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32),
            'brand_id' => $this->integer(),
        ]);
        $this->createTable('carfin_model', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32),
            'brand_id' => $this->integer(),
            'model_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('carfin_mark');
        $this->dropTable('carfin_model');
    }
}
