<?php

namespace infotech\reference\models;

use Yii;

/**
 * Class CreditProgram
 * @package infotech\reference\models
 *
 * @property integer                     $id
 * @property string                      $name
 * @property string                      $description
 * @property integer                     $period_min
 * @property integer                     $period_max
 * @property integer                     $initial_fee_min
 * @property integer                     $initial_fee_max
 * @property integer                     $period_step
 * @property integer                     $bank_id
 * @property string                      $matrix_json
 * @property integer                     $status
 *
 * @property CreditProgramBrand[]        $brands
 * @property CreditProgramModel[]        $models
 * @property CreditProgramGeneration[]   $generations
 * @property CreditProgramSeries[]       $series
 * @property CreditProgramModification[] $modifications
 * @property CreditProgramEquipment[]    $equipments
 * @property CreditBank                  $bank
 */
class CreditProgram extends ActiveRecord
{
    public const STATUS_ACTIVE = 0;
    public const STATUS_DELETED = 1;

    public static function tableName()
    {
        return 'credit_program';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app', 'Наименование'),
            'description' => Yii::t('app', 'Описание'),
            'period_min' => Yii::t('app', 'Минимальный срок кредитования (мес.)'),
            'period_max' => Yii::t('app', 'Максимальный срок кредитования (мес.)'),
            'initial_fee_min' => Yii::t('app', 'Минимальный первоначальный взнос (%)'),
            'initial_fee_max' => Yii::t('app', 'Максимальный первоначальный взнос (%)'),
            'period_step' => Yii::t('app', 'Шаг для периода'),
            'bank_id' => Yii::t('app', 'Банк'),
            'matrix_json' => Yii::t('app', 'Матрица первоначального взноса, срока кредитования и ставки'),
            'status' => Yii::t('app', 'Статус'),
            'statusName' => Yii::t('app', 'Статус'),
        ];
    }

    public static function getStatusesList()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Активна'),
            self::STATUS_DELETED => Yii::t('app', 'Удалена'),
        ];
    }

    public function getStatusName()
    {
        return self::getStatusesList()[$this->status] ?? null;
    }

    public function getBrands()
    {
        return $this->hasMany(CreditProgramBrand::class, ['program_id' => 'id']);
    }

    public function getModels()
    {
        return $this->hasMany(CreditProgramModel::class, ['program_id' => 'id']);
    }

    public function getGenerations()
    {
        return $this->hasMany(CreditProgramGeneration::class, ['program_id' => 'id']);
    }

    public function getSeries()
    {
        return $this->hasMany(CreditProgramSeries::class, ['program_id' => 'id']);
    }

    public function getModifications()
    {
        return $this->hasMany(CreditProgramModification::class, ['program_id' => 'id']);
    }

    public function getEquipments()
    {
        return $this->hasMany(CreditProgramEquipment::class, ['program_id' => 'id']);
    }

    public function getBank()
    {
        return $this->hasOne(CreditBank::class, ['id' => 'bank_id']);
    }
}
