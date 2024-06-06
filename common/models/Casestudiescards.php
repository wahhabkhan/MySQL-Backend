<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "case_studies_cards".
 *
 * @property string $case_study_name
 * @property string|null $client_logo_file_name
 * @property string|null $client_name
 * @property string|null $description
 *
 * @property Casestudytags[] $caseStudyTags
 * @property Cardssearchtags[] $tagNames
 */
class Casestudiescards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'case_studies_cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['case_study_name'], 'required'],
            [['case_study_name', 'client_logo_file_name'], 'string', 'max' => 80],
            [['client_name', 'description'], 'string', 'max' => 100],
            [['case_study_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'case_study_name' => 'Case Study Name',
            'client_logo_file_name' => 'Client Logo File Name',
            'client_name' => 'Client Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[CaseStudyTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaseStudyTags()
    {
        return $this->hasMany(Casestudytags::class, ['case_study_name' => 'case_study_name']);
    }

    /**
     * Gets query for [[TagNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTagNames()
    {
        return $this->hasMany(Cardssearchtags::class, ['tag_name' => 'tag_name'])->viaTable('case_study_tags', ['case_study_name' => 'case_study_name']);
    }
}
