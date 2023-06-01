<?php

use yii\db\Migration;

/**
 * Class m190805_075217_cover
 */
class m190805_075217_cover extends Migration
{
    public function safeUp(): void
    {
        $this->createTable('cover', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'url' => $this->string()
        ]);
    }

    public function safeDown(): void
    {
        $this->dropTable('cover');
    }
}
