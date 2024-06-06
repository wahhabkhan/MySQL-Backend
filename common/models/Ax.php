<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ax".
 *
 * @property string $serialNumber
 * @property string|null $subHead
 * @property string|null $headCopy
 * @property string|null $detail
 * @property string|null $svgIcon
 */
class Ax extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $svgLogoFile;
    public static function tableName()
    {
        return 'ax';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['svgLogoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'svg'],
            [['serialNumber'], 'required'],
            [['subHead', 'headCopy', 'svgIcon'], 'string'],
            [['serialNumber'], 'string', 'max' => 4],
            [['detail'], 'string', 'max' => 500],
            [['serialNumber'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'serialNumber' => 'Serial Number',
            'subHead' => 'Sub Head',
            'headCopy' => 'Head Copy',
            'detail' => 'Detail',
            'svgIcon' => 'Svg Icon',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->svgIcon = file_get_contents($this->svgLogoFile->tempName);
            return true;
        } else {
            return false;
        }
    }
}
