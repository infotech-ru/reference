<?php

namespace infotech\reference\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * @property int $id
 * @property string $language
 * @property string|null $translation
 *
 * @property-read TranslationSourceMessage $sourceMessage
 */
class TranslationMessage extends ActiveRecord
{
    public const EN_US = 'en_US';
    public const RU_RU = 'ru_RU';
    public const ZH_CN = 'zh_CN';

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID исходного сообщения'),
            'language' => Yii::t('app', 'Язык'),
            'translation' => Yii::t('app', 'Перевод'),
        ];
    }

    public function formName(): string
    {
        return '';
    }

    public function rules(): array
    {
        return [
            ['id', 'required'],
            ['id', 'integer'],
            ['id', 'exist', 'targetClass' => TranslationSourceMessage::class, 'targetAttribute' => 'id'],
            ['language', 'required'],
            ['language', 'string'],
            ['language', 'in', 'range' => array_keys(static::getLanguagesList())],
            [['id', 'language'], 'unique', 'targetAttribute' => ['id', 'language']],
            ['translation', 'string'],
        ];
    }

    public static function tableName(): string
    {
        return 'translation_message';
    }

    public static function find(): ActiveQuery
    {
        return new TranslationMessageQuery(static::class);
    }

    public function getSourceMessage(): ActiveQuery
    {
        return $this->hasOne(TranslationSourceMessage::class, ['id' => 'id']);
    }

    public static function getLanguagesList(): array
    {
        return [
            static::EN_US => static::EN_US,
            static::RU_RU => static::RU_RU,
            static::ZH_CN => static::ZH_CN,
        ];
    }
}
