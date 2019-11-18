<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;
use yii\helpers\ArrayHelper;
use infotech\reference\models\autoru\queries\AutoruConfigurationQuery;
use infotech\reference\models\Serie as Series;

/**
 * This is the model class for table "{{%autoru_configuration}}".
 *
 * @property int $id
 * @property int $folder_id
 * @property string $body_type
 * @property string $years
 * @property string $autoRuBody
 * @property string $doors_count
 *
 * @property AutoruFolder $folder
 * @property AutoruConfigurationMap[] $mapped
 * @property int[] $mappedIds
 */
class AutoruConfiguration extends ActiveRecord
{
    public static function getTypesBody()
    {
        return [
            'Кабриолет',
            'Компактвэн',
            'Купе',
            'Купе-хардтоп',
            'Фастбек',
            'Фургон',
            'Хэтчбек',
            'Ландо',
            'Лифтбек',
            'Лимузин',
            'Микровэн',
            'Минивэн',
            'Внедорожник',
            'Фаэтон-универсал',
            'Пикап',
            'Родстер',
            'Седан',
            'Тарга',
            'Седан-хардтоп',
            'Спидстер',
            'Внедорожник открытый',
            'Универсал',
            'Фаэтон',
        ];
    }
    
    public static function tableName(): string
    {
        return 'eqt_autoru_configuration';
    }
    
    /**
     * @param int|null $model_id
     * @param null|int|int[] $generation_id
     * @return array
     */
    public static function seriesList(?int $model_id, $generation_id = null): array
    {
        if (!$model_id) {
            return [];
        }
        return ArrayHelper::map(
            Series::find()
                ->andWhere(['model_id' => $model_id])
                ->andFilterWhere(['id_car_generation' => $generation_id])
                ->all(),
            'id_car_serie',
            'name',
            function (Series $series) {
                return ($series->is_recent ? 'Актуальные' : 'Не актуальные') . ' ' . ($series->generation->name ?? '');
            }
        );
    }
    
    public function rules(): array
    {
        return [
            [['id'], 'required'],
            [['id', 'folder_id', 'doors_count'], 'integer'],
            [['body_type', 'years'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['folder_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoruFolder::class, 'targetAttribute' => ['folder_id' => 'id']],
        ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'id' => 'ИД (AutoRu)',
            'folder_id' => 'Folder ID',
            'body_type' => 'Кузов (AutoRu)',
            'years' => 'Года (AutoRu)',
            'doors_count' => 'Кол-во дверей',
        ];
    }
    
    public function getFolder(): ActiveQuery
    {
        return $this->hasOne(AutoruFolder::class, ['id' => 'folder_id']);
    }
    
    public static function find(): AutoruConfigurationQuery
    {
        return new AutoruConfigurationQuery(static::class);
    }
    
    public function getAutoRuBody()
    {
        $val = explode(' ', $this->body_type)[0];
        return in_array($val, static::getTypesBody()) ? $val : null;
    }
    
    public function getMapped()
    {
        return $this->hasMany(AutoruConfigurationMap::class, ['configuration_id' => 'id']);
    }
    
    public function getMappedIds()
    {
        return array_column($this->mapped, 'serie_id');
    }
}
