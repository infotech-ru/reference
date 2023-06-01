<?php

use yii\db\Migration;

class m161212_072059_add_column_image_serie_id extends Migration
{
    public function up()
    {
        $this->delete('eqt_image');
        $this->addColumn('eqt_image', 'serie_id', $this->integer()->notNull()->after('body_id'));
        $this->addForeignKey(
            'eqt_fk_image_serie',
            'eqt_image',
            'serie_id',
            'car_serie',
            'id_car_serie',
            null,
            'CASCADE'
        );
        $this->dropForeignKey('eqt_fk_image_body', 'eqt_image');
        $this->dropColumn('eqt_image', 'body_id');
    }

    public function down()
    {
        $this->delete('eqt_image');
        $this->addColumn('eqt_image', 'body_id', $this->integer()->notNull()->after('serie_id'));
        $this->addForeignKey('eqt_fk_image_body', 'eqt_image', 'body_id', 'bodies', 'id', null, 'CASCADE');
        $this->dropForeignKey('eqt_fk_image_serie', 'eqt_image');
        $this->dropColumn('eqt_image', 'serie_id');
    }
}
