<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sls_toyota_model_alias}}`.
 */
class m240123_150233_create_sls_toyota_model_alias_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sls_toyota_model_alias', [
            'id' => $this->primaryKey(),
            'guid' => 'varchar(255) not null',
            'brand_id' => $this->integer()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'generation_id' => $this->integer(),
            'serie_id' => $this->integer(),
            'modification_id' => $this->integer(),
            'equipment_id' => $this->integer(),
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sls_toyota_model_alias');
    }
}
