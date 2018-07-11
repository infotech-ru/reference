<?php

use yii\db\Migration;

class m170406_153749_add__is_supported__in__brands extends Migration
{
    public function up()
    {
        $this->addColumn('brands', 'is_supported', 'bool not null default false');
    }

    public function down()
    {
        $this->dropColumn('brands', 'is_supported');
    }
}
