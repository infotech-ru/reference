<?php

namespace infotech\reference;

/**
 * Class Image
 * @package infotech\reference
 * @property integer $emplacement_id
 * @property integer $foreshortening_id
 * @property string  $url
 * @property boolean $is_main
 * @property boolean $is_serie_main
 * @property string  $created_at
 * @property string  $updated_at
 */
class Image extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_catalog_image';
    }

    public static function primaryKey(): array
    {
        return ['emplacement_id', 'foreshortening_id'];
    }

    public static function find()
    {
        return new ImageQuery(get_called_class());
    }

    public function getEmplacement(): EmplacementQuery
    {
        return $this->hasOne(Emplacement::class, ['id' => 'emplacement_id']);
    }

    public function getForeshortening(): ForeshorteningQuery
    {
        return $this->hasOne(Foreshortening::class, ['id' => 'foreshortening_id']);
    }
}