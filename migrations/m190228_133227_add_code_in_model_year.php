<?php

use yii\db\Migration;

/**
 * Class m190228_133227_add_code_in_model_year
 */
class m190228_133227_add_code_in_model_year extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->addColumn('model_year', 'code', $this->string()->null());
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropColumn('model_year', 'code');
    }
}
