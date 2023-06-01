<?php

use yii\db\Migration;

class m170303_111324_alter_equipment_table extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn(
            'eqt_equipment',
            'archive_name',
            $this->string()->defaultValue(null)->after('name')
        );

        $this->addColumn(
            'eqt_equipment',
            'order',
            $this->integer()->defaultValue(null)->after('archive_name')
        );

        $this->addColumn(
            'eqt_equipment',
            'status',
            $this->smallInteger()->notNull()->defaultValue(1)->after('order')
        );
    }

    public function safeDown(): void
    {
        $this->dropColumn(
            'eqt_equipment',
            'status'
        );

        $this->dropColumn(
            'eqt_equipment',
            'order'
        );

        $this->dropColumn(
            'eqt_equipment',
            'archive_name'
        );
    }
}
