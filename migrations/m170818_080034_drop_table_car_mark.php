<?php

use yii\db\Migration;

class m170818_080034_drop_table_car_mark extends Migration
{
    public function safeUp()
    {
        $this->dropTable('car_mark');
    }

    public function safeDown()
    {
        $this->execute(
            "create table car_mark
(
	id_car_mark int(8) auto_increment comment 'ID' primary key,
	ref_brand_id int null,
	name varchar(255) not null comment 'Название марки',
	is_visible tinyint(1) default '1' not null comment 'Видимость',
	id_car_type int(8) not null comment 'Тип авто',
	name_rus varchar(255) null comment 'Назв. рус.',
	origin_id int null,
	constraint ref_brand_id unique (ref_brand_id),
	key(id_car_type)
)comment 'Марки автомобилей'"
        );
        $this->execute(
            'INSERT INTO car_mark(id_car_mark, name, id_car_type, name_rus) SELECT id_car_mark, name, id_car_type, name_rus FROM eqt_car_mark'
        );
        $this->execute(
            'update car_mark, brands set car_mark.ref_brand_id = brands.origin_id where brands.origin_id = car_mark.id_car_mark'
        );
    }
}
