<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "freedemo".
 *
 * @property int $serialNumber
 * @property string $name
 * @property string $email
 * @property string $description
 */
class Freedemo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $recipientEmail;
    public static function tableName()
    {
        return 'freedemo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'serialNumber' => 'Serial Number',
            'name' => 'Name',
            'email' => 'Email',
            'description' => 'Description',
        ];
    }
    public function attributes()
    {
        return array_merge(parent::attributes(), ['recipientEmail']);
    }
}
