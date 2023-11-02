<?php

namespace infotech\reference\models;

/**
 * @link https://www.pochta.ru/support/database/ops
 *
 * @property int $id
 * @property string $index — Индекс объекта почтовой связи
 * @property string $ops_name — Название объекта почтовой связи
 * @property string $ops_type — Тип объекта почтовой связи
 * @property string $parent_index — Индекс вышестоящего по иерархии подчиненности объекта почтовой связи
 * @property string $region — Наименование области, авт. области, края, республики, в которой находится объект почтовой связи
 * @property string $area — Наименование района, в котором находится объект почтовой связи
 * @property string $city — Наименование населенного пункта, в котором находится объект почтовой связи
 * @property string $city1 — Наименование подчиненного населенного пункта, в котором находится объект почтовой связи
 * @property string $date — Дата актуализации информации об объекте почтовой связи
 */
class PostIndex extends \yii\db\ActiveRecord
{
    public static function tableName(): string
    {
        return 'post_index';
    }
}
