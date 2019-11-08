<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "eqt_autoru_lkt".
 *
 * @property int $id
 * @property string $mark
 * @property int $folder_id
 * @property string $folder
 * @property int $brand_id
 *
 * @property AutoruLktFolderGeneration[] $autoruLktFolderGenerations
 * @property AutoruLktFolderMark[] $autoruLktFolderMarks
 * @property AutoruLktFolderModels[] $autoruLktFolderModels
 * @property AutoruLktFolderSerie[] $autoruLktFolderSeries
 *
 * @property int[] $autoruLktFolderGenerationsIds
 * @property int[] $autoruLktFolderMarksIds
 * @property int[] $autoruLktFolderModelsIds
 * @property int[] $autoruLktFolderSeriesIds
 */
class AutoruLkt extends ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eqt_autoru_lkt';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'folder_id', 'brand_id'], 'integer'],
            [['mark', 'folder'], 'string', 'max' => 255],
            [['folder_id'], 'unique'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mark' => 'Mark',
            'folder_id' => 'Folder ID',
            'folder' => 'Folder',
            'brand_id' => 'Brand ID',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoruLktFolderGenerations()
    {
        return $this->hasMany(AutoruLktFolderGeneration::class, ['folder_id' => 'folder_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoruLktFolderMarks()
    {
        return $this->hasMany(AutoruLktFolderMark::class, ['folder_id' => 'folder_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoruLktFolderModels()
    {
        return $this->hasMany(AutoruLktFolderModels::class, ['folder_id' => 'folder_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoruLktFolderSeries()
    {
        return $this->hasMany(AutoruLktFolderSerie::class, ['folder_id' => 'folder_id']);
    }
    
    public function getAutoruLktFolderGenerationsIds(): array
    {
        return array_column($this->autoruLktFolderGenerations,'generation_id');
    }
    
    public function getAutoruLktFolderMarksIds(): array
    {
        return array_column($this->autoruLktFolderMarks,'brand_id');
    }
    
    public function getAutoruLktFolderModelsIds(): array
    {
        return array_column($this->autoruLktFolderModels,'model_id');
    }
    
    public function getAutoruLktFolderSeriesIds(): array
    {
        return array_column($this->autoruLktFolderSeries,'serie_id');
    }
}
