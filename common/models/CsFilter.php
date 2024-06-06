<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cs_filter".
 *
 * @property int $id
 * @property string $category_name
 * @property string|null $cat_options
 */
class Csfilter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cs_filter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['cat_options'], 'string'],
            [['category_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'cat_options' => 'Cat Options',
        ];
    }
}
