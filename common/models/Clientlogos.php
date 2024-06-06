<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "clientlogos".
 *
 * @property int $id
 * @property string|null $logoName
 * @property string|null $svgLogo
 * @property UploadedFile $svgLogoFile
 */
class Clientlogos extends \yii\db\ActiveRecord
{
    public $svgLogoFile; // Virtual attribute for file upload

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientlogos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['svgLogoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'svg'],
            [['svgLogo'], 'string'],
            [['logoName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logoName' => 'Logo Name',
            'svgLogo' => 'Svg Logo',
            'svgLogoFile' => 'SVG Logo File', // Label for file upload field
        ];
    }

    /**
     * Uploads and saves the SVG logo file.
     * @return bool Whether the saving is successful
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->svgLogo = file_get_contents($this->svgLogoFile->tempName);
            return true;
        } else {
            return false;
        }
    }
}
