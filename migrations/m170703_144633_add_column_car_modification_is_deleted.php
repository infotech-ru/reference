<?php

use yii\db\Migration;

class m170703_144633_add_column_car_modification_is_deleted extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('car_modification', 'is_deleted', $this->boolean()->notNull()->defaultValue(0));
        $this->update('car_modification', ['is_deleted' => 0]);
    }

    public function safeDown(): void
    {
        $this->dropColumn('car_modification', 'is_deleted');
    }
}
