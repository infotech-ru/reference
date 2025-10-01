<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Equipment;
use yii\helpers\ArrayHelper;
use infotech\reference\models\autoru\queries\AutoruComplectationQuery;

/**
 * This is the model class for table "{{%autoru_complectation}}".
 *
 * @property int $id
 * @property int $modification_id
 * @property string $name
 *
 * @property-read AutoruModification[] $modifications
 *
 * @property AutoruComplectationRelation[] $maps deprecated use mapped
 * @property AutoruComplectationMapped $mapped
 */
class AutoruComplectation extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_autoru_complectation';
    }

    public static function getComplectationList(?int $serie_id): array
    {
        if (!$serie_id) {
            return [];
        }
        return ArrayHelper::map(
            Equipment::find()
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
        return ArrayHelper::map(
            Equipment::find()
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
            [['id', 'modification_id'], 'integer'],
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

    /**
     * @deprecated
     */
    public function getMaps()
    {
        return $this->hasOne(AutoruComplectationRelation::class, ['complectation_id' => 'id']);
    }

    public function getMapped()
    {
        return $this->hasOne(AutoruComplectationMapped::class, ['complectation_id' => 'id']);
    }

    public function getModifications():ActiveQuery
    {
        return $this->hasMany(AutoruModification::class, ['id' => 'modification_id']);
    }

    public static function find(): AutoruComplectationQuery
    {
        return new AutoruComplectationQuery(static::class);
    }
}
