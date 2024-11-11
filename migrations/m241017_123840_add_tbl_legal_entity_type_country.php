<?php

use yii\db\Migration;

/**
 * Class m241017_123840_add_tbl_legal_entity_type_country
 */
class m241017_123840_add_tbl_legal_entity_type_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'legal_entity_type_country',
            [
                'id' => $this->primaryKey(),
                'legal_entity_type_id' => $this->integer(),
                'country_id' => $this->integer(),
            ],
        );

        $this->addForeignKey(
            'FK_legal_entity_type_country_legal_entity_type_id',
            'legal_entity_type_country',
            'legal_entity_type_id',
            'legal_entity_type',
            'id',
        );
        $this->addForeignKey(
            'FK_legal_entity_type_country_country_id',
            'legal_entity_type_country',
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
        $this->dropTable('legal_entity_type_country');
    }
}
