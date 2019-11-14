<?php

namespace infotech\reference\models\avito;

use infotech\reference\models\avito\queries\ComplectationQuery;
use Yii;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "avito_complectation".
 *
 * @property int $id
 * @property string $name
 * @property int $modification_id
 *
 * @property Modification $modification
 * @property ComplectationMap[] $complectationMaps
 */
class Complectation extends ActiveRecord
{
    public static function tableName()
    {
        return 'avito_complectation';
    }

    public function rules()
    {
        return [
            [['modification_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['modification_id'], 'exist', 'skipOnError' => true, 'targetClass' => Modification::class, 'targetAttribute' => ['modification_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
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

    public static function find()
    {
        return new ComplectationQuery(static::class);
    }
}
