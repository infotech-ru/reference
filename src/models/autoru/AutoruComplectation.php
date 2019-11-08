<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;
use yii\helpers\ArrayHelper;
use infotech\reference\models\autoru\queries\AutoruComplectationQuery;

/**
 * This is the model class for table "{{%autoru_complectation}}".
 *
 * @property int $id
 * @property string $name
 *
 * @property AutoruComplectationRelation[] $maps
 */
class AutoruComplectation extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%autoru_complectation}}';
    }
    
    public static function getComplectationList(?int $serie_id): array
    {
        if (!$serie_id) {
            return [];
        }
        return ArrayHelper::map(Equipment::find()
            ->andFilterWhere(['series_id' => $serie_id])
            ->orderBy(['name' => SORT_ASC])
            ->all(),
            'id',
            'name'
        );
    }
    
    public static function getComplectationListWithTech(?array $serie_ids): array
    {
        if (!$serie_ids) {
            return [];
        }
        return ArrayHelper::map(Equipment::find()
            ->andFilterWhere(['series_id' => $serie_ids])
            ->orderBy(['name' => SORT_ASC])
            ->all(),
            'id',
            function (Equipment $item) {
                return $item->name . ' / ' . $item->tech_name;
            },
            function (Equipment $item) {
                return $item->serie->name;
            }
        );
    }
    
    public function rules(): array
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'id' => 'ИД (AutoRu)',
            'name' => 'Название (AutoRu)',
            'modification_id' => 'Modification ID',
            'complectation_id' => 'Комплектация',
        ];
    }
    
    public function getMaps(): ActiveQuery
    {
        return $this->hasOne(AutoruComplectationRelation::class, ['complectation_id' => 'id']);
    }
    
    public static function find(): AutoruComplectationQuery
    {
        return new AutoruComplectationQuery(static::class);
    }
}
