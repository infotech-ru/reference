<?php

use yii\db\Migration;

/**
 * Class m250417_115024_add_code_in_eqt_autoru_mark
 */
class m250417_115024_add_code_in_eqt_autoru_mark extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('eqt_autoru_mark', 'code', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_autoru_mark', 'code');
    }
}
