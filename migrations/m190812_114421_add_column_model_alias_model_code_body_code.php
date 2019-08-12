<?php

use yii\db\Migration;

/**
 * Class m190812_114421_add_column_model_alias_model_code_body_code
 */
class m190812_114421_add_column_model_alias_model_code_body_code extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('model_alias', 'model_code', $this->string());
        $this->addColumn('model_alias', 'body_code', $this->string());
    }

    public function safeDown()
    {
        $this->dropColumn('model_alias', 'model_code');
        $this->dropColumn('model_alias', 'body_code');
    }
}
