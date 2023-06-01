<?php

namespace infotech\reference\models;

use yii\base\InvalidConfigException;

/**
 * Class ModelOptionTag
 * @package infotech\reference\models
 * @property integer $id
 * @property integer $model_id
 * @property integer $name
 * @property-read Model $model
 */
class ModelOptionTag extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_model_option_tag';
    }

    public static function find(): ModelOptionTagQuery
    {
        return new ModelOptionTagQuery(static::class);
    }

    public function getModel(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    /**
     * @param int $model_id
     * @return array
     * @throws InvalidConfigException
     */
    public static function getList(int $model_id): array
    {
        return static::find()->model($model_id)->select('name, id')->indexBy('id')->column();
    }
}
