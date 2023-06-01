<?php

use yii\db\Migration;

/**
 * Handles the dropping for table `body_code`.
 */
class m160719_144216_drop_body_code extends Migration
{
    public function safeUp(): void
    {
        $this->dropColumn('car_modification', 'body_code');
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->addColumn('car_modification', 'body_code', $this->string());
    }
}
