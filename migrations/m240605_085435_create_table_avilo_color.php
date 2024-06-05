<?php

use yii\db\Migration;

/**
 * Class m240605_085435_create_table_avilo_color
 */
class m240605_085435_create_table_avilo_color extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('eqt_avito_color', [
            'avito_id' => $this->integer()->defaultValue(0),
            'color_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addPrimaryKey(
            'pk_eqt_avito_color',
            'eqt_avito_color',
            ['avito_id', 'color_id']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('eqt_avito_color');
    }

}
