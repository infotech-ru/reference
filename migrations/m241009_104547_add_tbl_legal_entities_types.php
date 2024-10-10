<?php

use yii\db\Migration;

/**
 * Class m241009_104547_add_tbl_legal_entities_types
 */
class m241009_104547_add_tbl_legal_entities_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('legal_entities_types', [
            'id' => $this->primaryKey(),
            'order' => $this->integer()->defaultValue(0),
            'country_id' => $this->integer(),
            'name' => $this->string(),
            'full_name' => $this->string(),
        ]);
        $this->createIndex(
            'IDX_legal_entities_types_order',
            'legal_entities_types',
            'order',
        );
        $this->addForeignKey(
            'FK_legal_entities_types_country_id',
            'legal_entities_types',
            'country_id',
            'countries',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('legal_entities_types');
    }
}
