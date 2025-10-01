<?php

use yii\db\Migration;

/**
 * Class m251001_100818_add_column_modification_id_to_autoru_complectation
 */
class m251001_100818_add_column_modification_id_to_autoru_complectation extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('eqt_autoru_complectation', 'modification_id', $this->integer()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_autoru_complectation', 'modification_id');
    }
}
