<?php

use yii\db\Migration;

/**
 * Class m251002_113911_drop_column_modification_in_in_eqt_autoru_complectation
 */
class m251002_113911_drop_column_modification_in_in_eqt_autoru_complectation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('eqt_autoru_complectation', 'modification_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('eqt_autoru_complectation', 'modification_id', $this->integer()->after('id'));
        $this->createIndex(
            'IDX_eqt_autoru_complectation_modification_id',
            'eqt_autoru_complectation',
            'modification_id'
        );
    }
}
