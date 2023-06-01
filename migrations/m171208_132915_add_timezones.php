<?php

use yii\db\Migration;

class m171208_132915_add_timezones extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('regions', 'timezone', $this->string());
        $this->addColumn('regions', 'lat', $this->double());
        $this->addColumn('regions', 'lng', $this->double());

        $this->addColumn('cities', 'timezone', $this->string());
        $this->addColumn('cities', 'lat', $this->double());
        $this->addColumn('cities', 'lng', $this->double());
    }

    public function safeDown(): void
    {
        $this->dropColumn('regions', 'timezone');
        $this->dropColumn('regions', 'lat');
        $this->dropColumn('regions', 'lng');

        $this->dropColumn('cities', 'timezone');
        $this->dropColumn('cities', 'lat');
        $this->dropColumn('cities', 'lng');
    }
}
