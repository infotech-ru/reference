<?php

use yii\db\Migration;

class m160414_125307_add_to_works extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('works', 'maintenance', $this->integer());
        $this->execute('UPDATE `works` SET `maintenance` = substr(`name`,4) WHERE `name` LIKE "ТО-%"');
    }

    public function safeDown(): void
    {
        $this->dropColumn('works', 'maintenance');
    }
}
