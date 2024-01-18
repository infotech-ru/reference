<?php

use yii\db\Migration;

/**
 * Class m240118_103916_add_col_is_deleted_to_color_and_skin
 */
class m240118_103916_add_col_is_deleted_to_color_and_skin extends Migration
{
    public function up()
    {

        $this->addColumn('eqt_color', 'is_deleted', $this->boolean()->notNull()->defaultValue(0));
        $this->addColumn('eqt_skin', 'is_deleted', $this->boolean()->notNull()->defaultValue(0));
    }

    public function down()
    {
        $this->dropColumn('eqt_color', 'is_deleted');
        $this->dropColumn('eqt_skin', 'is_deleted');
    }
}
