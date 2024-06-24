<?php

use yii\db\Migration;

/**
 * Class m240624_084433_create_tbl_avito_options_map
 */
class m240624_084433_create_tbl_avito_options_map extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('avito_options_map', [
            'id' => $this->primaryKey(),
            'option_type_id' => $this->integer(),
            'option_value' => $this->string()->comment('Наше значение опции'),
            'avito_option_code' => $this->string()->comment('ID опции у Avito'),
            'avito_option_group' => $this->string()->comment('Название группы опций'),
            'avito_option_value' => $this->string()->comment('Значение опции у Avito'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('avito_options_map');
    }
}
