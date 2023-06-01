<?php

use yii\db\Migration;

class m220804_120205_vehicle_verification_program_color extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('vehicle_verification_program', 'color', $this->string(7));
    }

    public function safeDown(): void
    {
        $this->dropColumn('vehicle_verification_program', 'color');
    }
}
