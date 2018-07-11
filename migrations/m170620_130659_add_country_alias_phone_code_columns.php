<?php

use yii\db\Migration;

class m170620_130659_add_country_alias_phone_code_columns extends Migration
{
    public function up()
    {
        $this->addColumn('countries', 'phone_code', $this->string());
        $this->addColumn('countries', 'alias', $this->string());

        $this->update('countries', ['alias' => 'ru', 'phone_code' => '+7'], 'id = 1');
        $this->update('countries', ['alias' => 'by', 'phone_code' => '+375'], 'id = 2');
        $this->update('countries', ['alias' => 'ru', 'phone_code' => '+7'], 'id = 7');
    }

    public function down()
    {
        $this->dropColumn('countries', 'phone_code');
        $this->dropColumn('countries', 'alias');
    }
}
