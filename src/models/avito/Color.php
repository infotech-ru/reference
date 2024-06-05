<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\autoru\queries\AutoruColorQuery;
use infotech\reference\models\avito\queries\ColorQuery;

/**
 * @property int $avito_id
 * @property int $color_id
 *
 * @property-read string $avitoName
 */
class Color extends ActiveRecord
{
    public static function avitoColorList()
    {
        return [
            1 => 'Белый',
            2 => 'Серебряный',
            3 => 'Серый',
            4 => 'Чёрный',
            5 => 'Коричневый',
            6 => 'Золотой',
            7 => 'Бежевый',
            8 => 'Красный',
            9 => 'Бордовый',
            10 => 'Оранжевый',
            11 => 'Жёлтый',
            12 => 'Зелёный',
            13 => 'Голубой',
            14 => 'Синий',
            15 => 'Фиолетовый',
            16 => 'Пурпурный',
            17 => 'Розовый',
        ];
    }

    public function getAvitoName(): ?string
    {
        return static::avitoColorList()[$this->avito_id] ?? null;
    }

    public static function tableName(): string
    {
        return 'eqt_avito_color';
    }

    public function rules(): array
    {
        return [
            [['avito_id', 'color_id'], 'required'],
            [['avito_id', 'color_id'], 'integer'],
            [['avito_id', 'color_id'], 'unique', 'targetAttribute' => ['avito_id', 'color_id']],
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

    public static function find(): ColorQuery
    {
        return new ColorQuery(static::class);
    }
}