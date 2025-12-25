<?php

namespace infotech\reference\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int|null $hash
 * @property string $phone
 * @property int|null $request_id
 * @property int|null $dealer_id
 * @property int $status
 * @property int|null $free_at
 */
class MtsPhone extends ActiveRecord
{
    public const STATUS_FREE = 1;
    public const STATUS_PROCESS = 2;
    public const STATUS_FORWARD_TO_CLIENT = 3;
    public const STATUS_FORWARD_TO_DEALER = 4;
    public const STATUS_REMOVED = 5;
    public const STATUS_WAIT_SETUP = 6;

    public static function tableName(): string
    {
        return 'mts_phone';
    }

    public function rules(): array
    {
        return [
            [['hash', 'phone'], 'required'],
            ['hash', 'integer'],
            ['status', 'default', 'value' => self::STATUS_FREE],
            ['status', 'in', 'range' => array_keys(self::statusList())],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'phone' => Yii::t('app', 'Номер телефона'),
            'request_id' => Yii::t('app', 'ID лида'),
            'status' => Yii::t('app', 'Статус'),
        ];
    }

    public static function statusList(): array
    {
        return [
            self::STATUS_FREE => Yii::t('app', 'Свободен'),
            self::STATUS_PROCESS => Yii::t('app', 'Обрабатывается'),
            self::STATUS_FORWARD_TO_CLIENT => Yii::t('app', 'Переадресация к клиенту'),
            self::STATUS_FORWARD_TO_DEALER => Yii::t('app', 'Переадресация к дилеру'),
            self::STATUS_REMOVED => Yii::t('app', 'Удалён'),
            self::STATUS_WAIT_SETUP => Yii::t('app', 'Ожидает настройки'),
        ];
    }
}
