<?php

use yii\db\Migration;

/**
 * Class m200520_100611_add_column_avito_id_to_avito_complectetions
 */
class m200520_100611_add_column_avito_id_to_avito_complectetions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('avito_complectation', 'avito_id', $this->integer()->after('id'));
        $this->createIndex('IDX_avito_complectation_avito_id', 'avito_complectation', 'avito_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropIndex('IDX_avito_complectation_avito_id', 'avito_complectation');
        $this->dropColumn('avito_complectation', 'avito_id');
    }
}
