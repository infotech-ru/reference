<?php

use yii\db\Migration;

/**
 * Class m200519_082109_add_column_avito_id_to_avito_modifications
 */
class m200519_082109_add_column_avito_id_to_avito_modifications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('avito_modification', 'avito_id', $this->integer()->after('id'));
        $this->createIndex('IDX_avito_modification_avito_id', 'avito_modification', 'avito_id');
        $this->createIndex('IDX_avito_modification_body_type', 'avito_modification', 'body_type');
        $this->createIndex('IDX_avito_modification_doors', 'avito_modification', 'doors');
        $this->createIndex('IDX_avito_modification_fuel_type', 'avito_modification', 'fuel_type');
        $this->createIndex('IDX_avito_modification_drive_type', 'avito_modification', 'drive_type');
        $this->createIndex('IDX_avito_modification_transmission', 'avito_modification', 'transmission');
        $this->createIndex('IDX_avito_modification_power', 'avito_modification', 'power');
        $this->createIndex('IDX_avito_modification_engine_size', 'avito_modification', 'engine_size');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('IDX_avito_modification_avito_id', 'avito_modification');

        $this->dropColumn('avito_modification', 'avito_id');

        $this->dropIndex('IDX_avito_modification_body_type', 'avito_modification');
        $this->dropIndex('IDX_avito_modification_doors', 'avito_modification');
        $this->dropIndex('IDX_avito_modification_fuel_type', 'avito_modification');
        $this->dropIndex('IDX_avito_modification_drive_type', 'avito_modification');
        $this->dropIndex('IDX_avito_modification_transmission', 'avito_modification');
        $this->dropIndex('IDX_avito_modification_power', 'avito_modification');
        $this->dropIndex('IDX_avito_modification_engine_size', 'avito_modification');
    }
}
