<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m210727_092144_add_column_eqt_model_option_ord
 */
class m210727_092144_add_column_eqt_model_option_ord extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('eqt_model_option', 'ord', $this->integer()->notNull());
        $this->update('eqt_model_option', ['ord' => new Expression('id')]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_model_option', 'ord');
    }
}
