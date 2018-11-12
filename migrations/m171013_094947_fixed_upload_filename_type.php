<?php

use yii\db\Migration;

class m171013_094947_fixed_upload_filename_type extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('dsf_upload', 'filename', $this->string()->defaultValue(null));
    }

    public function safeDown()
    {
        $this->alterColumn('dsf_upload', 'filename', $this->string()->notNull());
    }
}
