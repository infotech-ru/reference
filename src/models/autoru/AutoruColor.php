<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\autoru\queries\AutoruColorQuery;


class AutoruColor extends ActiveRecord
{
    public static function autoRuColorList()
    {
        return [
            1 => 'Бежевый',
            2 => 'Белый',
            3 => 'Голубой',
            4 => 'Желтый',
            5 => 'Зеленый',
            6 => 'Золотой',
            7 => 'Коричневый',
            8 => 'Красный',
            9 => 'Оранжевый',
            11 => 'Пурпурный',
            12 => 'Розовый',
            13 => 'Серебряный',
            14 => 'Серый',
            15 => 'Синий',
            16 => 'Фиолетовый',
            17 => 'Черный',
        ];
    }
    
    public function getAutoRuName(): ?string
    {
        return static::autoRuColorList()[$this->autoru_id] ?? null;
    }
    
    public static function tableName(): string
    {
        return '{{%autoru_color}}';
    }
    
    public function rules(): array
    {
        return [
            [['autoru_id', 'color_id'], 'required'],
            [['autoru_id', 'color_id'], 'integer'],
            [['autoru_id', 'color_id'], 'unique', 'targetAttribute' => ['autoru_id', 'color_id']],
        ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'color_id' => 'Color ID',
        ];
    }
    
    public static function find(): AutoruColorQuery
    {
        return new AutoruColorQuery(static::class);
    }
}
