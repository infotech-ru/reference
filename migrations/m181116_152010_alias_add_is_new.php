<?php

use yii\db\Migration;

/**
 * Class m181116_152010_alias_add_is_new
 */
class m181116_152010_alias_add_is_new extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('model_alias', 'is_new', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('model_alias', 'is_new');
    }
}
