<?php

use yii\db\Migration;

/**
 * Class m211126_105623_alter_table_model_alias_add_order
 */
class m211126_105623_alter_table_model_alias_add_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('model_alias', 'order', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('model_alias', 'order', $this->integer());
    }
}
