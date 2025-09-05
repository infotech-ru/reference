<?php

use yii\db\Migration;

/**
 * Class m250905_112156_alter_table_eqt_autoru_mark
 */
class m250905_112156_alter_table_eqt_autoru_mark extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
            ALTER TABLE `eqt_autoru_mark`
            DROP PRIMARY KEY,
            ADD PRIMARY KEY (`id`, `code`) USING BTREE;
        ');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('
            ALTER TABLE `eqt_autoru_mark`
            DROP PRIMARY KEY,
            ADD PRIMARY KEY (`id`) USING BTREE;
        ');
    }
}
