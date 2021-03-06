<?php

use yii\db\Migration;

class m170705_093621_add_column_model_is_commercial extends Migration
{
    public function safeUp()
    {
        $this->addColumn('models', 'is_commercial', $this->boolean()->notNull());
    }

    public function safeDown()
    {
        $this->dropColumn('models', 'is_commercial');
    }
}
