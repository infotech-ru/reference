<?php

use yii\db\Migration;

/**
 * Class m240624_134342_create_tbl_autoru_options_map
 */
class m240624_134342_create_tbl_autoru_options_map extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('autoru_business_options_map', [
            'id' => $this->primaryKey(),
            'option_type_id' => $this->integer(),
            'option_value' => $this->string()->comment('Наше значение опции'),
            'autoru_option_code' => $this->string()->comment('ID опции у AutoruBusiness'),
            'autoru_option_group' => $this->string()->comment('Название группы опций'),
            'autoru_option_value' => $this->string()->comment('Значение опции у AutoruBusiness'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('autoru_business_options_map');
    }
}
