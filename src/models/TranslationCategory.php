<?php

namespace infotech\reference\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * @property int $id
 * @property string $key
 * @property int|null $parent_id
 *
 * @property-read static|null $parent
 */
class TranslationCategory extends ActiveRecord
{
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'key' => Yii::t('app', 'Ключ'),
            'parent_id' => Yii::t('app', 'Родительская категория'),
        ];
    }

    public function formName(): string
    {
        return '';
    }

    public function rules(): array
    {
        return [
            ['key', 'required'],
            ['key', 'string'],
            ['key', 'unique'],
            ['parent_id', 'integer'],
            ['parent_id', 'exist', 'targetClass' => static::class, 'targetAttribute' => 'id'],
        ];
    }

    public static function tableName(): string
    {
        return 'translation_category';
    }

    public static function find(): ActiveQuery
    {
        return new TranslationCategoryQuery(static::class);
    }

    public function getParent(): ActiveQuery
    {
        return $this->hasOne(static::class, ['id' => 'parent_id']);
    }

    public function isRoot(): bool
    {
        return null === $this->parent_id;
    }

    public static function getList(): array
    {
        static $list = null;

        if (null === $list) {
            $list = static::find()
                ->select(['key'])
                ->orderBy(['key' => SORT_ASC])
                ->indexBy('key')
                ->column();
        }

        return $list;
    }
}
