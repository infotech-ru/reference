<?php

use yii\db\Migration;

/**
 * Class m201214_105839_add_column_model_alias_code
 */
class m201214_105839_add_column_model_alias_code extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('model_alias', 'code', $this->string()->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('model_alias', 'code');
    }
}
