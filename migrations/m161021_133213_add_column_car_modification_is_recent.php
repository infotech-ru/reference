<?php

use yii\db\Migration;

class m161021_133213_add_column_car_modification_is_recent extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('car_modification', 'is_recent', $this->boolean()->notNull()->defaultValue(1));
    }

    public function safeDown(): void
    {
        $this->dropColumn('car_modification', 'is_recent');
    }
}
