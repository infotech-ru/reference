<?php

use yii\db\Migration;

/**
 * Class m241017_123111_alter_tbl_legal_entity_type
 */
class m241017_123111_drop_column_legal_entity_type_country_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey(
            'FK_legal_entities_types_country_id',
            'legal_entity_type'
        );
        $this->dropColumn(
            'legal_entity_type',
            'country_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn(
            'legal_entity_type',
            'country_id',
            $this->integer(),
        );
        $this->addForeignKey(
            'FK_legal_entities_types_country_id',
            'legal_entity_type',
            'country_id',
            'countries',
            'id',
        );
    }
}
