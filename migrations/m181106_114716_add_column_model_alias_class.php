<?php

use yii\db\Migration;

/**
 * Class m181106_114716_add_column_model_alias_class
 */
class m181106_114716_add_column_model_alias_class extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('model_alias', 'classification', $this->tinyInteger()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('model_alias', 'classification');
    }
}
