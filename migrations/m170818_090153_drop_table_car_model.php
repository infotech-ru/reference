<?php

use yii\db\Migration;

class m170818_090153_drop_table_car_model extends Migration
{
    public function safeUp()
    {
        $this->dropTable('car_model');
    }

    public function safeDown()
    {
        $this->execute(
            <<< END
create table car_model
(
	id_car_model int auto_increment comment 'ID' primary key,
	id_car_mark int not null comment 'Марка автомобиля',
	ref_model_id int null,
	name varchar(255) not null comment 'Название модели',
	is_visible tinyint(1) default '1' not null comment 'Видимость',
	id_car_type int(8) not null comment 'Тип авто',
	name_rus varchar(255) null comment 'Название на русском',
	is_error_ignore tinyint(1) default '0' not null comment 'Игнорировать ошибки парсинга',
	origin_id int null,
	constraint ref_model_id unique (ref_model_id),
	key(id_car_mark),
	key(id_car_type),
	key(name),
	key(origin_id)
) comment 'Модели автомобилей'
END
        );
        $this->execute(
            'INSERT INTO car_model(id_car_model, id_car_mark, name, id_car_type, name_rus, origin_id) 
SELECT id_car_model, id_car_mark, name, id_car_type, name_rus, id_car_model FROM eqt_car_model'
        );
        $this->execute(
            'UPDATE car_model, models SET car_model.ref_model_id = models.id 
WHERE models.origin_id = car_model.id_car_model'
        );
    }
}
