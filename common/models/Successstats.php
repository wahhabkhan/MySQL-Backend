<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "successstats".
 *
 * @property int $id
 * @property string|null $statName
 * @property string|null $statNumber
 */
class Successstats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'successstats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['statName'], 'string', 'max' => 255],
            [['statNumber'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'statName' => 'Stat Name',
            'statNumber' => 'Stat Number',
        ];
    }
}
