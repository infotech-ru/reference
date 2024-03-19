<?php

namespace infotech\reference\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * @property int $id
 * @property string|null $category
 * @property string $message
 *
 * @property-read TranslationMessage[] $messages
 */
class TranslationSourceMessage extends ActiveRecord
{
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'category' => Yii::t('app', 'Категория'),
            'message' => Yii::t('app', 'Сообщение'),
        ];
    }

    public function formName(): string
    {
        return '';
    }

    public function rules(): array
    {
        return [
            ['category', 'string'],
            ['category', 'in', 'range' => array_keys(static::getCategoriesList())],
            ['message', 'required'],
            ['message', 'string'],
            [['category', 'message'], 'unique', 'targetAttribute' => ['category', 'message']],
        ];
    }

    public static function tableName(): string
    {
        return 'translation_source_message';
    }

    public static function getCategoriesList(): array
    {
        return [
            '_dsf_honda_moto' => '_dsf_honda_moto',
            'app' => 'app',
            'app-geely' => 'app-geely',
            'app-honda-moto' => 'app-honda-moto',
            'app-KZ' => 'app-KZ',
            'app-stellantis' => 'app-stellantis',
            'app-subaru' => 'app-subaru',
            'dsf-stellantis' => 'dsf-stellantis',
            'simple-discount' => 'simple-discount',
            'simple-discount-haval' => 'simple-discount-haval',
        ];
    }

    public static function find(): ActiveQuery
    {
        return new TranslationSourceMessageQuery(static::class);
    }

    public function getMessages(): ActiveQuery
    {
        return $this->hasMany(TranslationMessage::class, ['id' => 'id']);
    }
}
