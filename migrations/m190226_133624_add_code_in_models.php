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
    public function safeUp()
    {
        $this->addColumn('models', 'code', $this->string()->null()->after('tradein_code'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('models', 'code');
    }
}
