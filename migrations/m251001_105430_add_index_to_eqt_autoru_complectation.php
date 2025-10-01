<?php

use yii\db\Migration;

/**
 * Class m251001_105430_add_index_to_eqt_autoru_complectation
 */
class m251001_105430_add_index_to_eqt_autoru_complectation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'IDX_eqt_autoru_complectation_modification_id',
            'eqt_autoru_complectation',
            'modification_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'IDX_eqt_autoru_complectation_modification_id',
            'eqt_autoru_complectation',
        );
    }
}
