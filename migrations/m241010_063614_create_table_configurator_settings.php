<?php

use yii\db\Migration;

/**
 * Class m241010_063614_create_table_configurator_settings
 */
class m241010_063614_create_table_configurator_settings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('configurator_settings_templates', [
            'id' => $this->primaryKey(),
            'data_json' => $this->json(),
            'name' => $this->string(),
            'is_active' => $this->boolean()->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('configurator_settings');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241010_063614_create_table_configurator_settings cannot be reverted.\n";

        return false;
    }
    */
}
