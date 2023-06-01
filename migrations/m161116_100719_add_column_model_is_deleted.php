<?php

use yii\db\Migration;

class m161116_100719_add_column_model_is_deleted extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('models', 'is_deleted', $this->boolean()->notNull()->defaultValue(0));
    }

    public function safeDown(): void
    {
        $this->dropColumn('models', 'is_deleted');
    }
}
