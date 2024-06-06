<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pdfresources".
 *
 * @property int $id
 * @property string|null $category
 * @property string|null $title
 * @property string|null $detail
 * @property string|null $filePath
 */
class Pdfresources extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pdfresources';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail'], 'string'],
            [['category', 'title', 'filePath'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'title' => 'Title',
            'detail' => 'Detail',
            'filePath' => 'File Path',
        ];
    }
}
