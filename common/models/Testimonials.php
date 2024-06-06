<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "testimonials".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $designation
 * @property string|null $company
 * @property string|null $details
 */
class Testimonials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimonials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['details'], 'string'],
            [['name', 'designation', 'company'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'designation' => 'Designation',
            'company' => 'Company',
            'details' => 'Details',
        ];
    }
}
