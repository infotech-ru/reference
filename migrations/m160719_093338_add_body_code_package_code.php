<?php

use yii\db\Migration;

class m160719_093338_add_body_code_package_code extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('car_modification', 'body_code', $this->string());
        $this->addColumn('car_modification', 'package_code', $this->string());
    }

    public function safeDown(): void
    {
        $this->dropColumn('car_modification', 'body_code');
        $this->dropColumn('car_modification', 'package_code');
    }
}
