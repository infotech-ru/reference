<?php

use yii\db\Migration;

/**
 * Class m190226_133624_add_code_in_models
 */
class m190226_133624_add_code_in_models extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->addColumn('models', 'code', $this->string()->null()->after('tradein_code'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropColumn('models', 'code');
    }
}
