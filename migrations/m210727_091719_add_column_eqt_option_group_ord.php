<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m210727_091719_add_column_eqt_option_group_ord
 */
class m210727_091719_add_column_eqt_option_group_ord extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('eqt_option_group', 'ord', $this->integer()->notNull());
        $this->update('eqt_option_group', ['ord' => new Expression('id')]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('eqt_option_group', 'ord');
    }
}
