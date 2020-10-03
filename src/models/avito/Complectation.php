<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\avito\queries\ComplectationQuery;
use infotech\reference\models\Equipment;
use Yii;

/**
 * This is the model class for table "avito_complectation".
 *
 * @property int $id
 * @property int $avito_id
 * @property string $name
 * @property int $modification_id
 *
 * @property Modification $modification
 * @property ComplectationMap[] $complectationMaps
 * @property Equipment[] $refEquipments
 */
class Complectation extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_complectation';
    }

    public static function find()
    {
        return new ComplectationQuery(static::class);
    }

    public function rules()
    {
        return [
            [['modification_id', 'avito_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [
                ['modification_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Modification::class,
                'targetAttribute' => ['modification_id' => 'id']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'avito_id' => Yii::t('app', 'Avito ID'),
            'name' => Yii::t('app', 'Name'),
            'modification_id' => Yii::t('app', 'Modification ID'),
        ];
    }

    public function getModification()
    {
        return $this->hasOne(Modification::class, ['id' => 'modification_id']);
    }

    public function getComplectationMaps()
    {
        return $this->hasMany(ComplectationMap::class, ['complectation_id' => 'id']);
    }

    public function getRefEquipments()
    {
        return $this->hasMany(Equipment::class, ['id' => 'ref_complectation_id'])
            ->viaTable('avito_complectation_map', ['complectation_id' => 'id']);
    }
}
