<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cards_search_tags".
 *
 * @property string $tag_name
 *
 * @property Casestudiescards[] $caseStudyNames
 * @property Casestudytags[] $caseStudyTags
 */
class Cardssearchtags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cards_search_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_name'], 'required'],
            [['tag_name'], 'string', 'max' => 50],
            [['tag_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tag_name' => 'Region',
        ];
    }

    /**
     * Gets query for [[CaseStudyNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaseStudyNames()
    {
        return $this->hasMany(Casestudiescards::class, ['case_study_name' => 'case_study_name'])->viaTable('case_study_tags', ['tag_name' => 'tag_name']);
    }

    /**
     * Gets query for [[CaseStudyTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaseStudyTags()
    {
        return $this->hasMany(Casestudytags::class, ['tag_name' => 'tag_name']);
    }
}
