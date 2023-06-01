<?php

use yii\db\Migration;

class m170206_081854_add_column_catalog_image_is_serie_main extends Migration
{
    public function up()
    {
        $this->addColumn('eqt_catalog_image', 'is_serie_main', $this->boolean()->notNull()->after('is_main'));
    }

    public function down()
    {
        $this->dropColumn('eqt_catalog_image', 'is_serie_main');
    }
}
